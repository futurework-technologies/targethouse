<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title"><?php echo __("Add Product Detail")?></h1>
       
    </div>
    <div class="main-content">
    
        <div class="row">
            <div class="col-md-4">
                <?php echo $this->Form->create('Pdetail',array('type'=>'file')); 
               
                ?>
                     <div class="form-group">
                     <label>Select Category</label>
                 <span><select name="data[Pdetail][Category]">
                       <option value=""><?php echo __("Select");?></option>
                     <?php foreach($payment_types as $payment_type){?>
                        <option value="<?php echo $payment_type['Category']['id'];?>">
                       <?php echo $payment_type['Category']['categorie_name'];?></option>
                     <?php } ?>
                </select>
               </span>
                 </div>
                    <div class="form-group">
                        <label>Select Article</label>
                        <span><select name="data[Pdetail][Article]">
                       <option value=""><?php echo __("Select");?></option>
                     <?php foreach($payments as $payment){?>
                        <option value="<?php echo $payment['Article']['article_name'];?>">
                       <?php echo $payment['Article']['article_name'];?></option>
                     <?php } ?>
                </select>
               </span>                    
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <?php echo $this->Form->input('image',array('type'=>'file','label'=>FALSE,'div'=>FALSE,'required'));?>
                    </div>
                   <div class="form-group">
                        <label>Material</label>
                        <input type="text" name="data[Pdetail][Material]" class="form-control span12" required>                        
                    </div>
                   <div class="form-group">
                        <label>Size</label>
                        <input type="text" name="data[Pdetail][Size]" class="form-control span12" required>                        
                    </div>
                  <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="data[Pdetail][Quantity]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <input type="text" name="data[Pdetail][Color]" class="form-control span12" required>                        
                    </div>
                   <div class="form-group">
                        <label>Production price</label>
                        <input type="text" name="data[Pdetail][Production_price]" class="form-control span12" required>                        
                    </div>
                   <div class="form-group">
                        <label>Partner price</label>
                        <input type="text" name="data[Pdetail][Partner_price]" class="form-control span12" required>                        
                    </div>
                      <div class="form-group">
                        <label>Consumer price</label>
                        <input type="text" name="data[Pdetail][Consumer_price]" class="form-control span12" required>                        
                    </div>
                   <div class="form-group">
                        <label>Remark</label>
                        <input type="text" name="data[Pdetail][Remark]" class="form-control span12" required>                        
                    </div>
                   <div class="form-group">
                        <label>Height</label>
                        <input type="text" name="data[Pdetail][Height]" class="form-control span12" required>                        
                    </div>
                   <div class="form-group">
                        <label>Width</label>
                        <input type="text" name="data[Pdetail][Width]" class="form-control span12" required>                        
                    </div>
                   <div class="form-group">
                        <label>Ratio</label>
                        <input type="text" name="data[Pdetail][Ratio]" class="form-control span12" required>                        
                    </div>
                
                    <input type="hidden" name="data[Pdetail][created]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                  

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Save</button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Pdetails', 'action' => 'aadmin_add')); ?>" data-toggle="modal" class="btn btn-danger"><?php echo __("Cancel")?></a>
                </div>
                    </form>
            </div>
        </div>
   </div>