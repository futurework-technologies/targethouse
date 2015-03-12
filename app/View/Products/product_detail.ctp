<?php
$url = $this->request->query('url');
//if ($url == null) {
//    throw new NotFoundException("Page not found...");
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

    <div class="col-sm-4">
        <div class="pro_form"> 

<!--            <form  method="post" action="/new/Web/editproduct?url=<?php //echo ($category['Product']['id']);  ?>">-->
            <?php echo $this->Form->create('Inlineitem', array('url' => '/Inlineitems/productsave/' . $category['Product']['id'])) ?>

            <!--                <label>Ration</label>-->
            <!--               <span><input type="hidden"  name="data[Order][Ratio]" class="form-control"  value="<?php //echo ($category['Product']['size']);  ?>"></span>-->

            <div class="form-group">
                <label>Size</label>
                <span> <span><select id="size" name="data[Inlineitem][Size]" class="selectsize">
                            <option value=""><?php echo __("Select"); ?></option>
                            <?php foreach ($products as $payment_type) { ?>
                                <option value="<?php echo $payment_type['Product']['size']; ?>"  required/>
                                <?php echo $payment_type['Product']['size']; ?></option>
                            <?php } ?>
                        </select></span>
            </div>

            <div class="form-group">
                <label>Consumer Price</label>
                <span><input type="text" readonly="readonly" id="conprice" name="data[Inlineitem][consumer_price]" class="form-control cprice"  value="<?php echo ($category['Product']['consumer_price']); ?>">
                </span>
            </div>

<!--            <div class="form-group">   
                <label><?php //echo __("Background Color") ?></label>
                <span><input type="text"  readonly="readonly" name="data[Inlineitem][Color]" class="form-control"  value="<?php //echo ($category['Product']['back_color']); ?>"></span>
            </div>-->

            <div class="form-group">
                <label><?php echo __("Height") ?></label>
                <span><input type="text"  readonly="readonly" name="data[Inlineitem][Height]" class="form-control height"  value="<?php echo ($category['Product']['height']); ?>"></span>
            </div>
            <div class="form-group">
                <label><?php echo __("Width") ?></label>
                <span><input type="text"  readonly="readonly" name="data[Inlineitem][Width]" class="form-control width"  value="<?php echo ($category['Product']['width']); ?>"></span>
            </div>

            <div class="submit_btn"><button type="submit" value="" class="btn btn-default"><?php echo __("Apply") ?></button></div>

            </form>
        
        </div>
    </div>






    <div style="border:1pxsolid;" class="col-sm-8">
        <div class="container-fluid">
            <div class="vc_col-sm-12 wpb_column vc_column_container">
                <div class="wpb_wrapper">
                    <iframe onload="onIfrLoad()" style="width:100%;height:1000px;" src="http://targethouse.dk/ifr?url=<?php echo $url; ?>">
                    </iframe>
                </div>
            </div>
        </div>
        <button id="next-step" value="submit" >   <?php echo __("Next") ?><button>

                <script type="text/javascript">
                    var onIfrLoad = function() {
                        console.log("loaded...");
                        jQuery('#next-step').on("click", function() {
                            var str = jQuery('iframe')[0].contentWindow.window.svgCanvas.svgCanvasToString();
                            jQuery.post("<?php echo $this->Html->url('/inlineitems/productimgs/' . $this->request->query('url')); ?>", {"data": str}, function(d) {
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


                </div>
                </div>

                <script src="http://code.jquery.com/jquery-1.10.2.js"></script>

               <script type="text/javascript">
      $(document).ready(function() {
      $('.selectsize').on("change", function(d) {
            var data = $(this).val();
            $.post("<?php echo $this->Html->url('/products/chk'); ?>", {"data": data}, function(d) {
                console.log(d.Product.size);
              $('.height').val(d.Product.height);
              $('.width').val(d.Product.width);
               $('.cprice').val(d.Product.consumer_price);
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