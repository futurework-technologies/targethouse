<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Add Content</h1>
        <ul class="breadcrumb">
            <li class="active">Add Content</li>
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
                <?php echo $this->Form->create('Content',array('type'=>'file')); ?>
                    <div class="form-group">
                        <label>Footer Content</label>
                        <input type="text" name="data[Content][footer_content]" class="form-control" required>
                    </div>
                
                   <div class="form-group">
                        <label>Header logo</label>
                        <?php echo $this->Form->input('header_logo',array('type'=>'file','label'=>FALSE,'div'=>FALSE));?>
                    </div>
             
                  </div>
            
            
            <input type="hidden" name="data[Content][created]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                 

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Save</button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Contentss', 'action' => 'admin_add')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
        </form>
            </div>
        </div>
   </div>