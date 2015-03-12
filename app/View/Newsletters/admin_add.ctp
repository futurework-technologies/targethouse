<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Publish Newsletter</h1>
       
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
                <?php echo $this->Form->create('Newsletter',array('id'=>'tab','type'=>'file')); ?>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="data[Newsletter][first_name]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="email" name="data[Newsletter][last_name]" class="form-control span12" required>                        
                    </div>
                   <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="data[Newsletter][email]" class="form-control span12" required>                        
                    </div>
                <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="data[Newsletter][description]" class="form-control span12" required>                        
                    </div>
                   
                    <input type="hidden" name="data[Newsletter][timestamp]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="data[Newsletter][status]" value="1">

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Save</button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Newsletters', 'action' => 'admin_index')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
                    </form>
            </div>
        </div>
   </div>
    
    
    
    
    
    
    
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: "media"

    });
</script>