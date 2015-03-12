<?php //debug($doller); exit; ?>

<div class="container-fluid">
    <?php echo $this->Form->create('Order', array('action' => 'update')); ?>
    <div class="checkout">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr> 	 	 	
                </thead>
                <tbody>
                    <?php $tabindex = 1; ?>
                    <?php foreach ($doller as $d) { ?>
                    <?php foreach ($order as $key => $item) { ?>
                        <tr>
                            <td><img src="<?php echo $this->Html->url('/' . $item['Order']['image'], array('alt' => 'Image')); ?>" width="70" height="100"></td>
                            <td><div id="price-<?php echo $key; ?>"><?php echo $item['Order']['price']; ?></div></td>
                            <td>
                                <form>
                                    <fieldset>
                                        <div class="form-group">
                                      
		
                                    <input type="text" name="data[Order][quantity]" value="<?php echo $item['Order']['quantity']; ?>" class="form-control" required>
                           
                                        </div>
                                    </fieldset>
                                </form>

                            </td>
                            <td>
                                
                                <div>
                               <?php echo $d;?>   
                                
                                </div>
                                
                            </td>
                            <td><a href="#"><i class="fa fa-times"></i></a></td>
                        </tr> 
                    <?php }} ?>
                       
                </tbody>
            </table>
        </div>

        <div class="total_price">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <table class="table table-condensed">
                    <tbody>

                        <tr>
                            <td>Total </td>
                            <td><div class="normal" id="subtotal"><input name="data[Order][subtotal]" value="<?php echo $item['Order']['subtotal']; ?>" type="text">$</div></td>
                        </tr>

                    </tbody>
                </table>

                <div class="col-sm-3 padding">
                    <div class="checkout_btn">
                    <?php echo $this->Form->submit('Update',array('class'=>'btn btn-default_shop','div'=>false));?>
                
                    </div>
                </div>

                <div class="col-sm-3">
                    
                    <div class="checkout_btn">
                        <div class="btn-group_shop">
                            <h3><a href="<?php echo $this->Html->url('/payments/payment');?>"> Check Out </a></h3>
                        </div>
                    </div>
                    
                </div>
                <input type="hidden" name="data[Payment][status]" value="1" />                                                                
                <input type="hidden" name="data[Payment][created]" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                <div class="col-sm-6"></div>
            </div>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<script type="text/javascript">
    $(document).ready(function(){

	$('.numeric1').on('keypress', function(event) {
		if (event.keyCode == 13) {
			return true;
		}
		return (/\d/.test(String.fromCharCode(event.keyCode)));
	});

	$('.numeric').on('keyup change', function(event) {

		var quantity = Math.round($(this).val());

		if ((event.keyCode == 46 || event.keyCode == 8) && quantity > 0) {
		} else {
			if(/\d/.test(String.fromCharCode(event.keyCode)) === false) {
				return false;
			}
		}

		ajaxcart($(this).attr("data-id"), quantity, $(this).attr("data-mods"));

	});

	$(".remove").each(function() {
		$(this).replaceWith('<a class="remove" id="' + $(this).attr('id') + '" href="' + Order.basePath + 'order/remove/' + $(this).attr('id') + '" title="Remove item"><img src="' + Order.basePath + 'img/icon-remove.gif" alt="Remove" /></a>');
	});

	$(".remove").click(function() {
		ajaxcart($(this).attr("id"), 0);
		return false;
	});

	function ajaxcart(id, quantity, mods) {

		if(quantity === 0) {
			$('#row-' + id).fadeOut(1000, function(){ $('#row-' + id).remove(); });
		}

		$.ajax({
			type: "POST",
			url: Order.basePath + "/",
			data: {
				id: id,
				mods: mods,
				quantity: quantity
			},
			dataType: "json",
			success: function(data) {
				$.each(data.OrderItem, function(key, value) {
					if($('#subtotal_' + key).html() != value.subtotal) {
						$('#Quantity' + key).val(value.quantity);
						$('#subtotal_' + key).html(value.subtotal).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);
					}
				});
				$('#subtotal').html('$' + data.Order.total).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);
				$('#total').html('$' + data.Order.total).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);
				if(data.Order.total === 0) {
					window.location.replace(Order.basePath + "orders/clear");
				}
			},
			error: function() {
				window.location.replace(Order.basePath + "orders/clear");
			}
		});
	}

});

    </script>


<style>
    .checkout{
        width:100%;
        float:left;
    }

    .checkout table th {
        background: none repeat scroll 0 0 #ff6c00;
        color: #fff;
        border-bottom:none !important;
    }
    .checkout table td {
        border-bottom: 1px solid #ddd !important;
        border-top: none !important;
        vertical-align: middle !important;
    }
    .checkout table td input {
        border: 1px solid #ddd !important;
        border-radius: 0;
        margin-top: 31px;
        width: 70px !important;
        padding: 0 4px !important;
    }

    .total_price{
        width:100%;
        float:left;
    }

    .total_price table th {
        background:none !important;
        color: #333;
        border-bottom: 1px solid #ddd !important;
    }
    .total_price table td {
        border-bottom:none !important;
        border-top: none !important;
        vertical-align: middle !important;
        background:#f2f2f2;
        margin-bottom:7px;
    }
    .total_price td input {
        border: medium none !important;
        float: right;
        text-align: right;
        width: auto;
        background:none;
        margin: 0px !important;
    }
    .total_price tr {
        border-bottom: 8px solid #fff;
    }
    .total_price table{
        margin-bottom:0px !important;
    }

    .checkout_btn button{

        width: 100%;
        margin-bottom: 30px;
    }

</style>


