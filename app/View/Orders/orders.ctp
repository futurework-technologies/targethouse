<?php //debug($doller); exit;  ?>

<div class="container-fluid">
    <?php echo $this->Form->create('Order', array('action' => 'update')); ?>
    <div class="checkout">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo __("Item")?></th>
                        <th><?php echo __("Price")?></th>
                        <th><?php echo __("Quantity")?></th>
                        <th><?php echo __("Total")?></th>
                        <th><?php echo __("Remove")?></th>
                    </tr> 	 	 	
                </thead>
                <tbody>
                    <?php $tabindex = 1;
                   $abc = 0;
					?>
 
                    <?php 
					
				
					foreach ($order as $key => $item) { 
					    echo $abc; 
					?>
                    <tr>
                            <td><img src="<?php echo $this->Html->url('/' . $item['Order']['image'], array('alt' => 'Image')); ?>" width="70" height="100"></td>
                            <td><div id="form-control<?php echo $item['Order']['id']; ?>"><?php echo $item['Order']['Consumer_price']; ?></div></td>
                            <td>
                               
                                    <fieldset>
                                        <div class="form-group">


                                            <input type="text" name="data[<?php echo  $abc ;?>][Order][quantitiy]" value="<?php echo $item['Order']['quantity']; ?>" class="form-control<?php echo $item['Order']['id']; ?>" required="true" >
											<input type="hidden" name="data[<?php echo  $abc ;?>][Order][id]" value="<?php echo $item['Order']['id']; ?>" class="form-control" required>

                                        </div>
                                    </fieldset>
                                

                            </td>
                            <td>

                                <div class="well<?php echo $item['Order']['id']; ?>">
                                    <?php $total = $item['Order']['Consumer_price'] * $item['Order']['quantity'];
                                    echo $total;
                                    ?>

                                </div>

                            </td>
                              <td><a href="javascript:void(0)"><i class="fa fa-times" data-id="<?php echo $item['Order']['id']; ?>"></i></a></td>
                           
                        </tr> 
<?php 
 $abc = $abc + $total;
}

 ?>

                </tbody>
            </table>
        </div>

        <div class="total_price">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <table class="table table-condensed">
                    <tbody>

                        <tr>
                            <td><?php echo __("Total")?> </td>



                            <td class="total">
                                <?php
							  echo $abc;
                              
                                ?>

                            </td>

                        </tr>

                    </tbody>
                </table>

                <div class="col-sm-3 padding">
                    <div class="checkout_btn">
                    <?php echo $this->Form->submit('Update', array('class' => 'btn btn-default_shop', 'div' => false)); ?>
                    </div>
                </div>

               
<!--                <input type="hidden" name="data[Payment][status]" value="1" />                                                                -->
<!--                <input type="hidden" name="data[Payment][created]" value="<?php echo date('Y-m-d H:i:s'); ?>" />-->
                <div class="col-sm-6"></div>
            </div>
        </div>
    </div>
<?php echo $this->Form->end(); ?>
</div>

<?php foreach ($order as $key => $item) { ?>
<script type="text/javascript">
//   var tot=[];
//   var t=[];
//    jQuery(document).ready(function(){
//         price=<?php echo $item['Order']['Consumer_price']; ?>;   
//         sumto=(<?php echo $item['Order']['Consumer_price']; ?> * <?php echo $item['Order']['quantity']; ?>);           
//       jQuery('.form-control<?php echo $item['Order']['id']; ?>').on("change",function(){
//          var v=jQuery(this).val();
//          var p=jQuery('#form-control<?php echo $item['Order']['id']; ?>').html();          
//          var total=(parseInt(v) * parseInt(p));
//          t.push(total);
//          jQuery('.well<?php echo $item['Order']['id']; ?>').html(total);          
//          var z=total + sumto;
//          var m= jQuery('.total').html();
//           if(z==m){
//              jQuery('.total').html(m); 
//           }else {
//              jQuery('.total').html(z);   
//           }
//         
//         
//          
//       });             
//    });  
</script>

<?php } ?>


 <div class="panel panel-danger"></div>
<div class="container">
    <div class='row'>
        <div class='col-md-12'></div>
            <?php echo $this->Form->create('Order',array('action'=>'orders')); ?>
     
        <div class='col-md-12'>
          <div class='col-md-12 form-group'>
          <h1>Payment</h1>
       
      </div>
          <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
    
                <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'><?php echo __("First Name")?></label>
                <input class='form-control' name="data[Payment][first_name]" size='4' type='text'>
               </div>
               </div>
              
           <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'><?php echo __("Last Name")?></label>
                <input class='form-control' name="data[Payment][last_name]" size='4' type='text'>
              </div>
            </div>
           <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'><?php echo __("Comapny")?></label>
                <input class='form-control' name="data[Payment][company]" size='4' type='text'>
              </div>
            </div>
           <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'><?php echo __("Country")?></label>
                <input class='form-control' name="data[Payment][country]" size='4' type='text'>
              </div>
            </div>
           <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'><?php echo __("City")?></label>
                <input class='form-control' name="data[Payment][city]" size='4' type='text'>
              </div>
            </div>
           <input class='form-control' name="data[Payment][totalprice]" value="<?php echo $abc ?>" size='4' type='hidden'>
    
            <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'><?php echo __("Contact no")?></label>
                <input class='form-control' name="data[Payment][contact]" size='4' type='text'>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'><?php echo __("Card Number")?></label>
                <input autocomplete='off' class='form-control card-number' name="data[Payment][card_no]" size='20' type='text'>
              </div>
            </div>
             <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'><?php echo __("Billing Address")?></label>
                <input autocomplete='off' class='form-control' name="data[Payment][billing_add]" size='20' type='text'>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12'>
                <div class='form-control total btn btn-info'>
                  <?php echo __("Total:")?>
                  <span class='amount'><?php echo $abc ?></span>
                </div>
              </div>
            </div>
           
<!--     <input type="hidden" name="data[Payment][order_id]" value="<?php //echo $orde['Order']['order_id'] ?>" />   -->
            <input type="hidden" name="data[Payment][status]" value="1" />                                                                
             <input type="hidden" name="data[Payment][created]" value="<?php echo date('Y-m-d H:i:s'); ?>" />
           <div class='form-row'>
              <div class='col-md-12 form-group'>
                     
<!--                <button class='form-control btn btn-success submit-button' disabled><span class="badge"><?php //echo $payments['Order']['price']; ?></span></button>-->
                <button class='form-control btn btn-primary submit-button' type='submit' name="submit"><?php echo __(" Pay »")?></button>
                
              </div>
            </div>
            
            <div class='form-row'>
              <div class='col-md-12 error form-group hide'>
                <div class='alert-danger alert'>
                  <?php echo __("Please correct the errors and try again.")?>
                </div>
              </div>
            </div>
			
        
        </div>
      
          <?php echo $this->Form->end(); ?>
        <div class='col-md-4'></div>
    </div>
</div>
</div>
<br>
<div class="panel panel-danger"></div>





<!--<script type="text/javascript">
    var tot=[];
    jQuery(document).ready(function(){
       jQuery('.form-control<?php echo $item['Order']['id']; ?>').on("change",function(){
          var v=jQuery(this).val();
          var p=jQuery('#form-control<?php echo $item['Order']['id']; ?>').html();
          var total=(parseInt(v) * parseInt(p));
          var q=jQuery('.well<?php echo $item['Order']['id']; ?>').html(total);
          tot.push(total);
            var n=0;
          for(i in tot){           
              console.log(n);
               m=tot[i]; 
               c=n+m;
               n=c;
              jQuery('.total').html(n); 
          }
       }); 
    });
</script>-->

    <style>
        .submit-button {
  margin-top: 10px;
}
        </style>















<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<script type="text/javascript">

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


