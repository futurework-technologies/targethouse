<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title"><?php echo __("Add Categories")?></h1>
        <ul class="breadcrumb">
            <li class="active"><?php echo __("Add Categories")?></li>
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
                <?php echo $this->Form->create('Category',array('id'=>'tab','type'=>'file')); ?>
                    <div class="form-group">
                        <label><?php echo __("Categories Name")?></label>
                        <input type="text" name="data[Category][categorie_name]" class="form-control" required>
                    </div>
                  <div class="form-group">
                        <label><?php echo __("File")?></label>
                        <?php echo $this->Form->input('image',array('type'=>'file','label'=>FALSE,'div'=>FALSE,'required'));?>
                    </div>
               <div class="form-group">
                        <label><?php echo __("Description")?></label>
                        <input type="text" name="data[Category][description]" class="form-control" required>
                    </div>
                  </div>
            
             <input type="hidden" name="data[Category][timestamp]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                 

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i><?php echo __(" Save")?></button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Categoryss', 'action' => 'admin_add')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
        </form>
            </div>
        </div>
   </div>