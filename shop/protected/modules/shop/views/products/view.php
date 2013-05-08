<?php
$this->breadcrumbs=array(
	Shop::t('Shop')=>array('index'),
    $model->category->title,
	$model->title,
);
?>
<div class="des_head">
	<br />
    <h3 class="left"><?php echo $model->title; ?></h3>    
</div>

<div class="prod_detail">
	<div class="big_thumb">
    	<div id="slider2">
            <div class="contentdiv">
               <?php 
                if($model->images) {
                	foreach($model->images as $image) {
                        echo '<a rel="example_group" href="javascript:void(null);">';
                		$this->renderPartial('/image/view', array( 'model' => $image));
                        echo '</a>';
                		echo '<br />'; 
                	}
                } else 
                $this->renderPartial('/image/view', array( 'model' => new Image()));
                ?>	                
          </div>            
        </div>
        <a href="javascript:void(null)" class="prevsmall"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/prev.gif" alt="" /></a>
        <div style="float:left; width:189px !important; overflow:hidden;">
        <div class="anyClass" id="paginate-slider2">
            <ul>
               <?php 
                if($model->images) {
                	foreach($model->images as $image) {
                	    echo '<li><a href="javascript:void(null);" rel="example_group">';
                		$this->renderPartial('/image/view', array( 'model' => $image));
                		echo '</a></li>'; 
                	}
                } else 
                $this->renderPartial('/image/view', array( 'model' => new Image()));
                ?>	       
            </ul>
        </div>
        </div>
        <a href="javascript:void(null)" class="nextsmall"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/next.gif" alt="" /></a>
    </div>
    <div class="desc">
    	<div class="des_head">
        	<h4 class="left" style="color: red;"><?php echo Shop::priceFormat($model->price); ?></h4>
        </div>
        <div class="clear"></div>
   	  <div class="quickreview">		 
          <br />
          <?php 
            $specs = $model->getSpecifications();
            $counter = 0;
             if($specs) {
            	echo '<table>';
            	
            	foreach($specs as $key => $spec) {
            		if($spec != '')
                    {
                        
                            $counter++;
                            echo '<tr height="25px"> <td> <strong>' . $key . ': </strong> </td> <td> '. $spec .' </td> </td>';                            
                    }
            		if($counter == 3)
                    break;    	                    
            	}
                
                $addToCart = $this->renderPartial('/products/addToCart', array('model' => $model),true);                
                echo '<tr height="35px"><td colspan="2">' .$model->description . $addToCart . '</td></tr>';
                ;
            	echo '</table>';
            } 
            ?>
        <?php  ?>
    </div>   
    </div>
    <div class="clear"></div>
    <br /><br />
     <?php 
            $specs = $model->getSpecifications();
            $counter = 0;
            if($specs) {
            	echo '<table width="100%">';
            	
            	printf ('<tr><th colspan="2"><strong>%s</strong></th></tr>',
            			Shop::t('Mô tả sản phẩm'));
            			
            	foreach($specs as $key => $spec) {
            		if($spec != '')
                    {                        
                        $counter++;
                        if($counter < 4)
                            continue;
                        if($counter % 2)
                            echo '<tr> <td width="30%"> ' . $key . ': </td> <td> '. $spec .' </td> </td>';
                        else
                            echo '<tr> <td width="30%" class="alt"> ' . $key . ': </td> <td class="alt"> '. $spec .' </td> </td>';
                    }
            			                    
            	}
                if($counter <= 3)
                     echo '<tr> <td> Chưa có mô tả sản phẩm </td> </td>';
            	echo '</table>';
            } 
            ?>   
    <br /><br />
    <div class="clear"></div>
    <br />
    <div class="listingbasic">
        <h4 class="heading colr">Sản phẩm khác</h4>
            <ul>
                <?php foreach($related as $data): ?>
                <li>
                    <h6><?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id),array('class' => 'title')); ?></h6>
                <a href="<?php echo $this->createUrl('products/view',array( 'id' => $data->product_id)) ?>">
                    <?php 
            	  	if($data->images){
            	   		$this->renderPartial('/image/view', array('thumb' =>true, 'model' => $data->images[0]));
            		}else {
            			echo CHtml::image(Shop::register('no-pic.jpg'));
            		}?>
                </a>
                <p style="padding: 0;" class="bold colr"><?php echo Shop::priceFormat($data->price); ?></p>
                <div style="text-align: center; margin-left: 40px;">
                 <a href="<?php echo $this->createUrl('products/view', array('id' => $data->product_id)) ?>" class="buttonthree"><span>Xem</span></a>  
                </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
</div>
<style type="text/css">
caption {
padding: 0 0 5px 0;
width: 700px;	 
font: italic 11px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
text-align: right;
}

th {
font: bold 11px Verdana, Arial, Helvetica, sans-serif;
color: #4f6b72;
border-right: 1px solid #C1DAD7;
border-bottom: 1px solid #C1DAD7;
border-top: 1px solid #C1DAD7;
letter-spacing: 2px;
text-transform: uppercase;
text-align: left;
padding: 6px 6px 6px 12px;
background: #CAE8EA url(<?php echo Yii::app()->request->baseUrl ?>/images/bg_header.jpg) no-repeat;
}

th.nobg {
border-top: 0;
border-left: 0;
border-right: 1px solid #C1DAD7;
background: none;
}

td {
border-right: 1px solid #C1DAD7;
border-bottom: 1px solid #C1DAD7;
background: #fff;
padding: 6px 6px 6px 12px;
color: olive;
}


td.alt {
background: #F5FAFA;
color: #808040;
}

th.spec {
border-left: 1px solid #C1DAD7;
border-top: 0;
background: #fff;
font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
}

th.specalt {
border-left: 1px solid #C1DAD7;
border-top: 0;
background: #f5fafa;
font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
color: #797268;
}
</style>