<?php
$this->pageTitle=Yii::app()->name . ' - Tìm kiếm ' . $keyword;
$this->breadcrumbs=array(
	'Tìm kiếm',
);
?>
<h4 class="heading colr">Kết quả tìm kiếm với từ khóa '<?php echo $keyword; ?>'</h4>
<div class="static">
    <form id="frmSearch" action="<?php echo $this->createUrl('/search') ?>" method="get"> 
        <ul class="forms">
		  <li class="txt">Từ khóa</li>
		  <input type="text" id="keyword" name="keyword" value="<?php echo $keyword; ?>" />
        </ul>
        <ul class="forms">
        <a class="buttonthree" id="btnSend"><span>Tìm</span></a>
        </ul>
    </form>
</div>
<div class="listingbasic">
    <ul>
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$result,
        'itemView'=>'_view',
        'template' => '{summary}{sorter}{items}'
    )); ?>
    </ul>
</div>
<br/>
 <?php 
    $this->widget('CLinkPager', array('header' => '','pages'=>$result->pagination)); 
    ?>
<div class="clear"></div>
<br /><br/>

<script type="text/javascript">
$(document).ready(function(){
    $('#btnSend').click(function(){
        $('#frmSearch').submit();
    });
});
</script>