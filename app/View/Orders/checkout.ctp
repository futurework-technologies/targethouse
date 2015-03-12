<div class="checkout_box">
    <h2><?php echo __("New customer")?></h2>
    <?php echo $this->Form->create('orders', array('action' => 'checkout')); ?>
    <div class="checkout_inn">
        <p><?php echo __("By creating an account on fantazi.dk you can see your orders, 
            save your designs and reordering.")?></p>
        <span><label><?php echo __("Name:")?></label>
            <input type="text" name="data[Order][name]" class="form-control" value="" placeholder="name"/>
        </span>
        <span><label><?php echo __("E-mail:")?></label>
            <input type="email" name="data[Order][email]" class="form-control" value="" placeholder="email"/>
        </span> 
        <span><label><?php echo __("Contact No:")?></label>
            <input type="number" name="data[Order][contact_number]" class="form-control" value="" placeholder="contact no"/>
        </span>
        <span><label><?php echo __("Address:")?></label>
            <input type="text" name="data[Order][billing_add]" class="form-control" value="" placeholder="address"/>
        </span>
        <span><label><?php echo __("Country:")?></label>
            <input type="text" name="data[Order][country]" class="form-control" value="" placeholder="country"/>
        </span>

        <input type="hidden" name="data[Order][status]" value="1" class="form-control" value="" placeholder="status"/>
        <input type="hidden" name="data[Order][price]" value="" class="form-control price" value="" placeholder="status"/>

        <input name="" type="submit" value="Submit">
    </div>
</form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var price = localStorage.getItem("price");
        $('.price').val(price);
    });
</script>