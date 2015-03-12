<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title"><?php echo __("Add Product")?></h1>
        <ul class="breadcrumb">
            <li class="active"><?php echo __("Add Product")?></li>
        </ul>

    </div>
    <div class="main-content">
        <p>
            <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                    <div class="alert success">
                        <span class="icon"></span>
                    <strong></strong><?php echo $x; ?>
                    </div>
                    <?php } ?>
        </p>
        <div class="row">
            <div class="col-md-4">
                <?php echo $this->Form->create('Product',array('type'=>'file')); ?>
                    <div class="form-group">
                        <label><?php echo __("Product Name")?></label>
                        <input type="text" name="data[Product][product_name]" class="form-control" required>
                    </div>
                  <div class="form-group">
                        <label><?php echo __("Product Price")?></label>
                        <input type="text" name="data[Product][price]" class="form-control" required>
                    </div>
                   <div class="form-group">
                        <label><?php echo __("Product Image")?></label>
                        <?php echo $this->Form->input('product_image',array('type'=>'file','label'=>FALSE,'div'=>FALSE,'required'));?>
                    </div>
                 <div class="form-group">
                     <label><?php echo __("Select Category")?></label>
                 <span><select name="data[Product][categorie_name]">
                       <option value=""><?php echo __("Select");?></option>
                     <?php foreach($payment_types as $payment_type){?>
                        <option value="<?php echo $payment_type['Category']['categorie_name'];?>">
                       <?php echo $payment_type['Category']['categorie_name'];?></option>
                     <?php } ?>
                </select>
                
                
               
               <div class="form-group">
                     <label><?php echo __("Select Article")?></label>
                 <span><select name="data[Product][Article]">
                       <option value=""><?php echo __("Select");?></option>
                     <?php foreach($payments as $payment_type){?>
                        <option value="<?php echo $payment_type['Article']['article_name'];?>">
                       <?php echo $payment_type['Article']['article_name'];?></option>
                     <?php } ?>
                </select>
               </span>
                 </div>
                
                   <div class="form-group">
                        <label><?php echo __("Background Color")?></label>
                        <input type="text" name="data[Product][back_color]" class="form-control" required>
                    </div>
                     
                      <div class="form-group">
                        <label><?php echo __("Height")?></label>
                        <input type="text" name="data[Product][height]" class="form-control" required>
                    </div>
                     
                      <div class="form-group">
                        <label><?php echo __("Width")?></label>
                        <input type="text" name="data[Product][width]" class="form-control" required>
                      </div>
                     
                      <div class="form-group">
                        <label><?php echo __("Product Description")?></label>
                        <input type="text" name="data[Product][product_description]" class="form-control" required>
                    </div>
                  </div>
            
            
            <input type="hidden" name="data[Product][timestamp]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                 

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i><?php echo __(" Save")?></button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Productss', 'action' => 'admin_add')); ?>" data-toggle="modal" class="btn btn-danger"><?php echo __("Cancel")?></a>
                </div>
        </form>
            </div>
        </div>
   </div>