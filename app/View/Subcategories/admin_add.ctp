<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Add Subcategoriess</h1>
        <ul class="breadcrumb">
            <li class="active">Add Subcategoriess</li>
        </ul>zx

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
		 <?php echo $this->Form->create('Subcategory',array('type'=>'file')); ?>
        <div class="row">
            <div class="col-md-4">
               
                    <div class="form-group">
                        <label>SubCategory Name</label>
                        <input type="text" name="data[Subcategory][name]" class="form-control" required>
                    </div>
                  <div class="form-group">
                        <label>SubCategory Image</label>
                        <?php echo $this->Form->input('image',array('type'=>'file','label'=>FALSE,'div'=>FALSE,'required'));?>
                    </div>
                <div class="form-group">
                     <label>Select Category</label>
                 <span><select name="data[Subcategory][categories_id]">
                       <option value=""><?php echo __("Select");?></option>
                     <?php foreach($payment_types as $payment_type){?>
                        <option value="<?php echo $payment_type['Category']['id'];?>">
                       <?php echo $payment_type['Category']['categorie_name'];?></option>
                     <?php } ?>
                </select>
               </span>
                 </div>
                
                
                
                  <div class="form-group">
                        <label> Description</label>
                        <input type="text" name="data[Subcategory][description]" class="form-control" required>
                    </div>
                  </div>
            
            
            <input type="hidden" name="data[Subcategory][timestamp]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                 

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-save"></i> Save</button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Subcategories', 'action' => 'admin_add')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
       
            </div>
			 <?php echo $this->Form->end();?>
        </div>
   </div>