  <?php //debug($product);exit; ?>
<div class="container-fluid">
    <div style="align: center;" class="col-sm-9">

        <div style="margin-left: 121px;" class="img_detail">
          <?php echo $this->Html->image('../'.$product['Userdetail']['image']
                            ,array('alt'=>'Image','height'=>'70px','width'=>'100px')); ?>
        </div>

    </div>

     

   

        <div class="pro_info_right"> 

<!--            <form  method="post" action="/new/Web/editproduct?url=<?php //echo ($category['Product']['id']); ?>">-->
             <?php echo $this->Form->create('Order',array('url'=>'/Orders/img/'.$product['Userdetail']['id']))?>;
                <div class="form-group">   
                 <span><input type="hidden"  name="data[Order][image]" class="form-control"  value="<?php echo ($product['Userdetail']['image']); ?>"></span>
                </div>

             
            <button type="submit" value="" class="btn btn-default">Next</button>
            &nbsp;
             <button type="submit" value="" class="btn btn-default">Back</button>
            </form>
            <a href="../../../../../../../../D:/Manoj/New folder (2)/new/app/View/Subcategories/test.ctp"></a>
        </div>
</div>


</div>
</div>

<?php
echo $this->Html->script(array(
    'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js',
    'jquery-ui-1.10.3.min'
));
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('select').on("change", function() {
            var v = $(this).val();
            $.post("<?php echo $this->Html->url('/details/chk'); ?>", {"data": v}, function(d) {
                //console.log(d.Detail.article);
                $('.hello').html(d.Detail.article);
                $('.matarial').html(d.Detail.material);
                $('.psize').html(d.Detail.size);
                $('.color').html(d.Detail.color);
                $('#usr').val(d.Detail.price);
            });
        });
        $('.selectsize').on("change", function(d) {
            var data = $(this).val();
            $.post("<?php echo $this->Html->url('/details/imagesize'); ?>", {"data": data}, function(d) {
                $('#usr').val(d.Detail.price);
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
</style></div>


</div>
</div>

<?php
echo $this->Html->script(array(
    'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js',
    'jquery-ui-1.10.3.min'
));
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('select').on("change", function() {
            var v = $(this).val();
            $.post("<?php echo $this->Html->url('/details/chk'); ?>", {"data": v}, function(d) {
                //console.log(d.Detail.article);
                $('.hello').html(d.Detail.article);
                $('.matarial').html(d.Detail.material);
                $('.psize').html(d.Detail.size);
                $('.color').html(d.Detail.color);
                $('#usr').val(d.Detail.price);
            });
        });
        $('.selectsize').on("change", function(d) {
            var data = $(this).val();
            $.post("<?php echo $this->Html->url('/details/imagesize'); ?>", {"data": data}, function(d) {
                $('#usr').val(d.Detail.price);
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