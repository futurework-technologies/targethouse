     <div class="container-fluid">
<div class="col-sm-10 padding">
                	<div class="pro_info_right"> 
                            
                         
                    <form role="form">
  <span><select name="data[Product][categorie_name]">
                       <option value=""><?php echo __("Select");?></option>
                     <?php foreach($payment_types as $payment_type){?>
                        <option value="<?php echo $payment_type['Subcategory']['name'];?>">
                       <?php echo $payment_type['Subcategory']['name'];?></option>
                     <?php } ?>
                </select>
</span>
  <div class="form-group">
                     <label>Select Article</label>
                 <span><select name="">
                       <option value=""><?php echo __("Select");?></option>
                     <?php foreach($payment_types as $payment_type){?>
                        <option value="<?php //echo $payment_type['Subcategory']['name'];?>">
                       <?php //echo $payment_type['Subcategory']['name'];?></option>
                     <?php } ?>
                </select>
               </span>
                 </div>
  <div class="form-group">
                     <label>Select Material</label>
                 <span><select name="">
                       <option value=""><?php echo __("Select");?></option>
                     <?php foreach($payment_types as $payment_type){?>
                        <option value="<?php //echo $payment_type['Subcategory']['name'];?>">
                       <?php //echo $payment_type['Subcategory']['name'];?></option>
                     <?php } ?>
                </select>
               </span>
                 </div>
                        <div class="form-group">
                     <label>Select Size</label>
                 <span><select name="">
                       <option value=""><?php echo __("Select");?></option>
                     <?php foreach($payment_types as $payment_type){?>
                        <option value="<?php //echo $payment_type['Subcategory']['name'];?>">
                       <?php //echo $payment_type['Subcategory']['name'];?></option>
                     <?php } ?>
                </select>
               </span>
                 </div>
                    <div class="form-group">
                     <label>Select Color</label>
                 <span><select name="">
                       <option value=""><?php echo __("Select");?></option>
                     <?php foreach($payment_types as $payment_type){?>
                        <option value="<?php //echo $payment_type['Subcategory']['name'];?>">
                       <?php //echo $payment_type['Subcategory']['name'];?></option>
                     <?php } ?>
                </select>
               </span>
                 </div>
                          <div class="form-group">
                     <label>Price</label>
                 <span><input type="text" class="form-control" id="usr">
               </span>
                 </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
                        </div>
                   </div>
                    
                    
                    
 </div>
 </div>