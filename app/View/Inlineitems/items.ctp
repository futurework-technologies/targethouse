
    <div class="main_container">
    	<div class="container">
            <div class="toppro_menu">
            	<ul>      
                	<li><a href="#"> <?php echo __("Home")?></a><i class="fa fa-angle-right"></i></li>
                    <li><a href="#"> <?php echo __("Design")?></a><i class="fa fa-angle-right"></i></li>
                    <li><a href="#"> <?php echo __("Checkout")?></a></li>
                </ul>
            </div>
            
            <div class="cart">
                	<div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th> <?php echo __("Product")?></th>
            <th> <?php echo __("Product Details")?></th>
            <th> <?php echo __("Unitprice")?></th>
            <th> <?php echo __("Quantity")?></th>
            <th> <?php echo __("Discount Price")?></th>
            <th> <?php echo __("Refresh")?></th>
            <th> <?php echo __("Edit")?></th>
            <th> <?php echo __("Total")?></th>
            <th> <?php echo __("Remove")?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><img src="img/cart1.jpg" alt=""></td>
            <td><p> <?php echo __("18321 (Bumper)Material: Transparent Foil")?></p></td>
            <td> <?php echo __("195.00 DKK")?></td>
            <td><div class="center">
                <div class="input-group">
                      <span class="input-group-btn">
                          <button data-field="quant[1]" data-type="minus" class="btn btn-default btn-number" type="button">
                              <span class="glyphicon glyphicon-minus"></span>
                          </button>
                      </span>
                      <input type="text" max="10" min="1" value="1" class="form-control input-number" name="quant[1]">
                      <span class="input-group-btn">
                          <button data-field="quant[1]" data-type="plus" class="btn btn-default btn-number" type="button">
                              <span class="glyphicon glyphicon-plus"></span>
                          </button>
                      </span>
                  </div>
				</div></td>
            <td>0.00%</td>
            <td><a href="#"><i class="fa fa-refresh fa-1"></i></a></td>
            <td><a href="#"><i class="fa fa-edit"></i></a></td>
            <td>$390.00</td>
            <td><a href="#"><i class="fa fa-remove"></i></a></td>
          </tr>	
           <tr>
            <td><img src="img/cart2.jpg" alt=""></td>
            <td><p> <?php echo __("18321 (Bumper)Material: Transparent Foil")?></p></td>
            <td> <?php echo __("195.00 DKK")?></td>
            <td><div class="center">
                <div class="input-group">
                      <span class="input-group-btn">
                          <button data-field="quant[1]" data-type="minus" class="btn btn-default btn-number" type="button">
                              <span class="glyphicon glyphicon-minus"></span>
                          </button>
                      </span>
                      <input type="text" max="10" min="1" value="1" class="form-control input-number" name="quant[1]">
                      <span class="input-group-btn">
                          <button data-field="quant[1]" data-type="plus" class="btn btn-default btn-number" type="button">
                              <span class="glyphicon glyphicon-plus"></span>
                          </button>
                      </span>
                  </div>
				</div></td>
            <td>0.00%</td>
            <td><a href="#"><i class="fa fa-refresh fa-1"></i></a></td>
            <td><a href="#"><i class="fa fa-edit"></i></a></td>
            <td>$390.00</td>
            <td><a href="#"><i class="fa fa-remove"></i></a></td>
          </tr>
          
          <tr>
            <td><img src="img/cart3.jpg" alt=""></td>
            <td><p> <?php echo __("18321 (Bumper)Material: Transparent Foil")?></p></td>
            <td> <?php echo __("195.00 DKK")?></td>
            <td><div class="center">
                <div class="input-group">
                      <span class="input-group-btn">
                          <button data-field="quant[1]" data-type="minus" class="btn btn-default btn-number" type="button">
                              <span class="glyphicon glyphicon-minus"></span>
                          </button>
                      </span>
                      <input type="text" max="10" min="1" value="1" class="form-control input-number" name="quant[1]">
                      <span class="input-group-btn">
                          <button data-field="quant[1]" data-type="plus" class="btn btn-default btn-number" type="button">
                              <span class="glyphicon glyphicon-plus"></span>
                          </button>
                      </span>
                  </div>
				</div></td>
            <td>0.00%</td>
            <td><a href="#"><i class="fa fa-refresh fa-1"></i></a></td>
            <td><a href="#"><i class="fa fa-edit"></i></a></td>
            <td>$390.00</td>
            <td><a href="#"><i class="fa fa-remove"></i></a></td>
          </tr>
          
          
          <tr class="rendom">
          	<td colspan="9"> <?php echo __("Redeem voucher code")?></td>
          </tr>	           
          <tr>
          	<td> <?php echo __("Indtast kode:")?> </td>
            <td><input name="" type="text"></td>
            <td><div class="add"><a href="#"> <?php echo __("Add")?></a></div></td>
            <td><div class="add"><a href="#"> <?php echo __("Cancel")?></a></div></td>
          	<td colspan="5"></td>
          </tr>		
          <tr class="rendom">
          	<td> <?php echo __("Shipping")?></td>
            <td colspan="7"> <?php echo __("Time")?></td>
          	<td> <?php echo __("Price")?></td>
          </tr>		
          <tr>
          	<td> <?php echo __("Post Denmark")?></td>
            <td colspan="7"> <?php echo __("2-5 working days depending on the product")?></td>
          	<td> <?php echo __("22.00 DKK")?></td>
          </tr>			
          <tr class="total_price">
          	<td colspan="7"></td>
            <td> <?php echo __("Sub Total")?></td>
            <td>1090.00</td>
          </tr>		
          <tr class="total_price">
          	<td colspan="7"></td>
            <td> <?php echo __("Discount")?></td>
            <td>0.00</td>
          </tr>			
          <tr class="total_price">
          	<td colspan="7"></td>
            <td> <?php echo __("vat")?></td>
            <td>0.00</td>
          </tr>			
          <tr class="total_price">
          	<td colspan="7"></td>
            <td> <?php echo __("Grand Total")?> </td>
            <td>1090.00</td>
          </tr>				                                                                                                                                                                                  
        </tbody>
      </table>
      <div class="cart_next">
                 	<span><p> <a href="#"> <?php echo __("Continue shopping")?></a></p></span>
                    <a href=""> <?php echo __("Checkout")?></a>
                 </div>
                </div>
            </div>
        </div>  	
    </div>
    
    
    
    
    
    