  
<?php
$url = $this->request->query('url');
//if ($url == null) {
  // throw new NotFoundException("Page not found...");
//}
?>
<style>
    
    .pro_form label {
    float: left;
    margin: 5px 0;
    width: 100%;
    background: none;
     margin-right: 0 !important;
    padding: 0 !important;
}

.pro_form label::before {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    float: left;
    height: 0;
    margin-right: 0 !important;
    padding: 0 !important;
    position: inherit;
    width: 0 !important;
}
.submit_btn {
    float: left;
    margin: 15px 0;
    width: 100%;
}

.submit_btn > button {
    background: none repeat scroll 0 0 #ec6707;
    border: medium none;
    color: #fff;
    float: left;
    padding: 7px 15px;
    width: auto;
}

</style>

<div class="container-fluid">
<!--    <div class="col-sm-3"></div>-->
 <div class="col-sm-4">
        <div class="pro_form"> 

           <?php //echo $this->Form->create('Inlineitem',array('url'=>'/Inlineitems/ordersave/'.$category['Pdetail']['id']))?>
            <?php echo $this->Form->create('Inlineitem',array('url'=>'/Inlineitems/ordersave/'.$category['Pdetail']['id']))?>
            <label>Select Material</label>
            <span><select id="material" name="data[Inlineitem][Material]">
                       <option  value=""><?php echo __("Select");?></option>
                     <?php foreach($products as $payment_type){?>
                       <option value="<?php echo $payment_type['Pdetail']['Material'];?>" class="material1" required/>
                       <?php echo $payment_type['Pdetail']['Material'];?></option>
                     <?php } ?>
                </select></span>
            <div class="form-group">
                <label>Size</label>
               <span> <span><select id="size" name="data[Inlineitem][Size]" class="selectsize">
                       <option value=""><?php echo __("Select");?></option>
                     <?php foreach($products as $payment_type){?>
                       <option value="<?php echo $payment_type['Pdetail']['size'];?>"  required/>
                       <?php echo $payment_type['Pdetail']['size'];?></option>
                     <?php } ?>
                </select></span>
            </div>
            <input type="hidden" id="test"  value="<?php echo ($category['Pdetail']['id']); ?>" >
<!--            <div class="form-group">
                <label>Color</label>
                <span><input type="text" id="color" name="data[Inlineitem][Color]" class="form-control"  value="<?php //echo ($category['Pdetail']['Color']); ?>"></span>
            </div>-->
<!--            <div class="form-group">
                <label>Production Price</label>
           <span><input type="hidden"  name="data[Inlineitem][Production_price]" class="form-control"  value="<?php //echo ($category['Pdetail']['Production_price']); ?>"></span>
            </div>-->



<!--            <div class="form-group">
                <label>Partner Price</label>
                 <span><input type="hidden"  name="data[Inlineitem][Partner_price]" class="form-control"  value="<?php //echo ($category['Pdetail']['Partner_price']); ?>"></span>
            </div>-->
            <div class="form-group">
                <label>Consumer Price</label>
                <span><input type="text" readonly="readonly" id="conprice" name="data[Inlineitem][Consumer_price]" class="form-control cprice"  value="<?php echo ($category['Pdetail']['Consumer_price']); ?>">
                </span>
            </div>
<!--             <div class="form-group">
                <label>Remark</label>
                 <span><input type="hidden"  name="data[Inlineitem][Remark]" class="form-control"  value="<?php //echo ($category['Pdetail']['Remark']); ?>"></span>
            </div>-->
             <div class="form-group">
                <label>Height</label>
                 <span><input type="text" readonly="readonly" id="spanval" name="data[Inlineitem][Height]" class="form-control height"  value="<?php echo ($category['Pdetail']['Height']); ?>"></span>
            </div>
             <div class="form-group">
                <label>Width</label>
                 <span><input type="text" readonly="readonly" id="width" name="data[Inlineitem][Width]" class="form-control width"  value="<?php echo ($category['Pdetail']['Width']); ?>"></span>
            </div>
            
<div class="submit_btn"><button type="submit" value="" class="btn btn-default">Aplly</button></div>


            </form>
<!--   <div class="submit_btn">  <button style="margin-top:-65px; margin-left: 150px;" class="btn btn-default clickhere">Submit Detail</button></div>-->
       
        </div>
    </div>

<div style="border:1pxsolid;" class="col-sm-8">
    
    <div class="area vc_area clearfix  vc_custom_1407843918532   ">
    <div class="masking">
        <div class="container-fluid">
                <div class="vc_col-sm-12 wpb_column vc_column_container">
                    <div class="wpb_wrapper">
                        <iframe onload="onIfrLoad()" style="width:100%;height:1000px;" src="http://www.targethouse.dk/designyourself?url=<?php echo $url; ?>">
                        </iframe>
                    </div>
                 </div>
                <button id="next-step" value="submit" >Next<button>
                       </div>
    </div>
</div>
       <script type="text/javascript">
                            var onIfrLoad = function() {
                                console.log("loaded...");
                                jQuery('#next-step').on("click", function() {
                                    var str = jQuery('iframe')[0].contentWindow.window.svgCanvas.svgCanvasToString();
                                    jQuery.post("<?php echo $this->Html->url('/inlineitems/productsvg/'.$this->request->query('url')); ?>", {"data": str}, function(d) {
                                        if(d.error == 0){
                                            window.location = "<?php echo $this->Html->url('/inlineitems/productsvg/'); ?>" + d.id;
                                        }else{
                                            console.log(d);
                                        }

                                    });

                                });
                            }
                        </script>




</div>
</div>


</div>
</div>

//<?php
//echo $this->Html->script(array(
//    'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js',
//    'jquery-ui-1.10.3.min'
//));
//?>



<script src="http://code.jquery.com/jquery-1.10.2.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#material').on("change",function(){   
        chang=$(this).val();
        //console.log(chang);
        });
$(".clickhere").click(function(){
    console.log("hi");
   var a=$('#spanval').val();
   var c=$('#size').val();
   var d=$('#color').val();
   var e=$('#conprice').val();
   var f=$('#ratio').val();
   var g=$('#width').val();
   var h=$('#test').val();
   $.post("<?php echo $this->Html->url('/pdetails/test');?>",{"data[Pdetail][Color]":d,"data[Pdetail][Size]":c,"data[Pdetail][Consumer_price]":e,"data[Pdetail][Material]":chang,"data[Pdetail][Width]":g,"data[Pdetail][Height]":a,"data[Pdetail][Ratio]":f,"data[Pdetail][id]":h},function(d){
      // console.log(d);
      console.log(d.r);
      console.log(d.id);
      
      if(d.r==1){
           window.location = "<?php echo $this->Html->url('/Pdetails/submit_form/'); ?>" + d.id;
      }

});
});
});
</script>




<script type="text/javascript">
      $(document).ready(function() {
      $('.selectsize').on("change", function(d) {
            var data = $(this).val();
            $.post("<?php echo $this->Html->url('/pdetails/chk'); ?>", {"data": data}, function(d) {
                console.log(d.Pdetail.size);
              $('.height').val(d.Pdetail.Height);
              $('.width').val(d.Pdetail.Width);
               $('.cprice').val(d.Pdetail.Consumer_price);
            });
        });
     });
</script>



<style>
    .pro_info_right button{
        margin-bottom: 20px;
    }
    .img_detail{
        width: 100%;
        float: left;
    }
    .img_detail img{
        width: 100%;
        border: 1px solid #000;
    }
</style>