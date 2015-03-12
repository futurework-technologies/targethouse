  
<div class="container-fluid">
    <div class="col-sm-6">

        <div class="img_detail">
            <img src="<?php echo $this->Html->url('/' . $ord['Userdetail']['image'], array('alt' => 'Image')); ?>" width="350" height="350">
        </div>

    </div>

    <div class="col-sm-6">
        <div class="pro_info_right"> 

            <?php echo $this->Form->create('Detail'); ?>

            <label>Type</label>
            <span><select name="data[Order][type]" >
                    <option value=""><?php echo __("Select"); ?></option>
                    <?php foreach ($payment_types as $payment_type) { ?>
                        <option value="<?php echo $payment_type['Detail']['id']; ?>">
                            <?php echo $payment_type['Detail']['type']; ?></option>
                    <?php } ?>
                </select>
            </span>
            <div class="form-group">
                <label>Select Article</label>
                <span><select name="data[Order][article]" >
                        <option value="" class="hello"><?php echo __("Select"); ?></option>
                        <?php foreach ($payment_types as $payment_type) { ?>
                            <option value="<?php echo $payment_type['Order']['id']; ?>">
                                <?php echo $payment_type['Detail']['article']; ?></option>
                        <?php } ?>
                    </select>
                </span>
            </div>
            <div class="form-group">
                <label>Select Material</label>
                <span><select name="data[Order][material]">
                        <option value="" class="matarial"><?php echo __("Select"); ?></option>
                        <?php foreach ($payment_types as $payment_type) { ?>
                            <option value="<?php echo $payment_type['Order']['id']; ?>">
                                <?php echo $payment_type['Detail']['type']; ?></option>
                        <?php } ?>
                    </select>
                </span>
            </div>
            <div class="form-group">
                <label>Select Size</label>
                <span><select name="data[Order][size]" class="selectsize">
                        <option value="" class="psize"><?php echo __("Select"); ?></option>
                        <?php foreach ($payment_types as $payment_type) { ?>
                            <option value="<?php echo $payment_type['Order']['id']; ?>">
                                <?php echo $payment_type['Detail']['size']; ?></option>
                        <?php } ?>
                    </select>
                </span>
            </div>



            <div class="form-group">
                <label>Select Color</label>
                <span><select name="data[Order][color]">
                        <option value="" class="color"><?php echo __("Select"); ?></option>
                        <?php foreach ($payment_types as $payment_type) { ?>
                            <option value="<?php echo $payment_type['Order']['id']; ?>">
                                <?php echo $payment_type['Detail']['color']; ?></option>
                        <?php } ?>
                    </select>
                </span>
            </div>
            <div class="form-group">
                <label>Price</label>
                <span><input type="text" readonly="readonly" name="data[Order][price]" class="form-control" id="usr" value="">
                </span>
                <a href="../Pdetails/add.ctp"></a>
                <span><input type="hidden" name="data[Order][image]" class="form-control" value="<?php echo $ord['Userdetail']['image'] ?> ">
                </span>
                <input type="hidden" name="data[Order][sessionid]" class="form-control" value="<?php echo $ord['Userdetail']['sessionid'] ?> ">
                <input type="hidden" name="data[Order][user_id]" class="form-control" value="<?php echo $ord['Userdetail']['user_id'] ?> ">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
            <?php echo $this->Form->end(); ?>  
        </div>
    </div></div>


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