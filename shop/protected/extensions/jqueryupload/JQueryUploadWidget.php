<?php

Yii::import('zii.widgets.jui.CJuiInputWidget');

/**
 * JQueryUpload extension for Yii.
 *
 * jQuery file upload extension for Yii, allows your users to easily upload files to your server using jquery
 * Its a wrapper of  http://aquantum-demo.appspot.com/file-upload
 *
 * @author huytbt
 * @date 2011-07-11
 * @version 0.1
 *
 */
class JQueryUploadWidget extends CJuiInputWidget
{

    /**
     * the url to the upload handler
     * @var string
     */
    public $url;
    /**
     * set to true to use multiple file upload
     * @var boolean
     */
    public $multiple = false;

    /**
     * Publishes the required assets
     */
    public function init()
    {
        parent::init();
        $this->publishAssets();
    }
    
    public $htmlUIOptions = array();

    /**
     * Generates the required HTML and Javascript
     */
    public function run()
    {

        list($name, $id) = $this->resolveNameID();

        $model = $this->model;
        
        if (!isset($this->htmlOptions['enctype'])) {
            $this->htmlOptions['enctype'] = 'multipart/form-data';
        }
        
        if (!isset($this->htmlOptions['class'])) {
            $this->htmlOptions['class'] = 'JQueryUpload-form file_upload';
        }
        
        if (!isset($this->htmlUIOptions['classFileUploadButtonBar'])) {
            $this->htmlUIOptions['classFileUploadButtonBar'] = 'fileupload-buttonbar';
        }
        
        if (!isset($this->htmlUIOptions['classFileInputButton'])) {
            $this->htmlUIOptions['classFileInputButton'] = 'fileinput-button';
        }
        
        if (!isset($this->htmlUIOptions['classFileUploadContent'])) {
            $this->htmlUIOptions['classFileUploadContent'] = 'fileupload-content';
        }
        
        if (!isset($this->htmlUIOptions['scriptTemplateUpload'])) {
            $this->htmlUIOptions['scriptTemplateUpload'] = $this->_getScriptTemplateUpload();
        }
        
        if (!isset($this->htmlUIOptions['scriptTemplateDownload'])) {
            $this->htmlUIOptions['scriptTemplateDownload'] = $this->_getScriptTemplateDownload();
        }

        if (!isset($this->htmlOptions['id'])) {
            $this->htmlOptions['id'] = get_class($model) . "_div";
        }
        
        Yii::app()->clientScript->registerScript(__CLASS__.'#'.$this->htmlOptions['id'], $this->_getScriptJQueryUploads(), CClientScript::POS_READY);
        
        echo CHtml::beginForm($this->url, 'post', array('id'=>get_class($model)."_form"));
        
        if (isset($this->htmlUIOptions['htmlHeader'])) {
            echo $this->htmlUIOptions['htmlHeader'];
        }
        
        echo CHtml::openTag("div", $this->htmlOptions);
            
            echo CHtml::openTag("div", array('class'=>$this->htmlUIOptions['classFileUploadButtonBar']));
                echo CHtml::openTag("label", array('class'=>$this->htmlUIOptions['classFileInputButton']));
                    echo CHtml::tag("span", array(), 'Add files...', true);
                    $htmlOptions = array();
                    if ($this->multiple) {
                        $htmlOptions["multiple"] = true;
                    }

                    if ($this->hasModel()) {
                        echo CHtml::activeFileField($this->model, $this->attribute, $htmlOptions);
                    } else {
                        echo CHtml::fileField($name, $this->value, $htmlOptions);
                    }
                echo CHtml::closeTag("label");
                echo CHtml::tag("button", array('type'=>'submit','class'=>'start'), 'Start upload', true);
                echo CHtml::tag("button", array('type'=>'reset','class'=>'cancel'), 'Cancel upload', true);
                echo CHtml::tag("button", array('type'=>'button','class'=>'delete'), 'Delete files', true);
            echo CHtml::closeTag("div");
            
            echo CHtml::openTag("div", array('class'=>$this->htmlUIOptions['classFileUploadContent']));
                echo CHtml::tag("table", array('class'=>'files'), '', true);
                echo CHtml::tag("div", array('class'=>'fileupload-progressbar'), '', true);
            echo CHtml::closeTag("div");
        echo CHtml::closeTag("div");
        
        echo $this->htmlUIOptions['scriptTemplateUpload'];
        
        echo $this->htmlUIOptions['scriptTemplateDownload'];
        
        echo CHtml::endForm();
    }

    /**
     * Publises and registers the required CSS and Javascript
     * @throws CHttpException if the assets folder was not found
     */
    public function publishAssets()
    {
        $assets = dirname(__FILE__) . '/assets';
        $baseUrl = Yii::app()->assetManager->publish($assets);
        if (is_dir($assets)) {
            Yii::app()->clientScript->registerCssFile($baseUrl.'/jquery.fileupload-ui.css');
            Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');
            Yii::app()->clientScript->registerCoreScript('jquery.ui');
            Yii::app()->clientScript->registerScriptFile($baseUrl.'/jquery.fileupload.js', CClientScript::POS_END);
            Yii::app()->clientScript->registerScriptFile($baseUrl.'/jquery.fileupload-ui.js', CClientScript::POS_END);
            Yii::app()->clientScript->registerScriptFile($baseUrl.'/jquery.iframe-transport.js', CClientScript::POS_END);
            Yii::app()->clientScript->registerScriptFile($baseUrl.'/jquery.tmpl.min.js', CClientScript::POS_END);
        } else {
            throw new CHttpException(500, 'JQueryUpload - Error: Couldn\'t find assets to publish.');
        }
    }
    
    private function _getScriptTemplateUpload()
    {
        $js = <<<EOD
    <script id="template-upload" type="text/x-jquery-tmpl">
        <tr class="template-upload{{if error}} ui-state-error{{/if}}">
            <td class="preview"></td>
            <td class="name">\${name}</td>
            <td class="size">\${sizef}</td>
            {{if error}}
                <td class="error" colspan="2">Error:
                    {{if error === 'maxFileSize'}}File is too big
                    {{else error === 'minFileSize'}}File is too small
                    {{else error === 'acceptFileTypes'}}Filetype not allowed
                    {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                    {{else}}\${error}
                    {{/if}}
                </td>
            {{else}}
                <td class="progress"><div></div></td>
                <td class="start"><button>Start</button></td>
            {{/if}}
            <td class="cancel"><button>Cancel</button></td>
        </tr>
    </script>
EOD;
		return $js;
    }
    
    private function _getScriptTemplateDownload()
    {
        $js = <<<EOD
    <script id="template-download" type="text/x-jquery-tmpl">
        <tr class="template-download{{if error}} ui-state-error{{/if}}">
            {{if error}}
                <td></td>
                <td class="name">\${name}</td>
                <td class="size">\${sizef}</td>
                <td class="error" colspan="2">Error:
                    {{if error === 1}}File exceeds upload_max_filesize (php.ini directive)
                    {{else error === 2}}File exceeds MAX_FILE_SIZE (HTML form directive)
                    {{else error === 3}}File was only partially uploaded
                    {{else error === 4}}No File was uploaded
                    {{else error === 5}}Missing a temporary folder
                    {{else error === 6}}Failed to write file to disk
                    {{else error === 7}}File upload stopped by extension
                    {{else error === 'maxFileSize'}}File is too big
                    {{else error === 'minFileSize'}}File is too small
                    {{else error === 'acceptFileTypes'}}Filetype not allowed
                    {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                    {{else error === 'uploadedBytes'}}Uploaded bytes exceed file size
                    {{else error === 'emptyResult'}}Empty file upload result
                    {{else}}\${error}
                    {{/if}}
                </td>
            {{else}}
                <td class="preview">
                    {{if thumbnail_url}}
                        <a href="\${url}" target="_blank"><img src="\${thumbnail_url}"></a>
                    {{/if}}
                </td>
                <td class="name">
                    <a href="\${url}"{{if thumbnail_url}} target="_blank"{{/if}}>\${name}</a>
                </td>
                <td class="size">\${sizef}</td>
                <td colspan="2"></td>
            {{/if}}
            <td class="delete">
                <button data-type="\${delete_type}" data-url="\${delete_url}">Delete</button>
            </td>
        </tr>
    </script>
EOD;
		return $js;
    }
    
    private function _getScriptJQueryUploads()
    {
        $options=CJavaScript::encode($this->options);
        $formID = get_class($this->model)."_form";
        $js = <<<EOD
$(function () {
    'use strict';
        
    // Initialize the jQuery File Upload widget:
    jQuery('#{$this->htmlOptions['id']}').fileupload({$options});
       
    /*$.getJSON($('#{$formID}').prop('action'), function (files) {
        var fu = $('#{$formID}').data('fileupload');
        fu._adjustMaxNumberOfFiles(-files.length);
        fu._renderDownload(files)
            .appendTo($('#{$formID} .files'))
            .fadeIn(function () {
                // Fix for IE7 and lower:
                $(this).show();
            });
    });*/

    // Open download dialogs via iframes,
    // to prevent aborting current uploads:
    $('#{$this->htmlOptions['id']} .files a:not([target^=_blank])').live('click', function (e) {
        e.preventDefault();
        $('<iframe style="display:none;"></iframe>')
            .prop('src', this.href)
            .appendTo('body');
    });
    
});
EOD;
		return $js;
    }

}