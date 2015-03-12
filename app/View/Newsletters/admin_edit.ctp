
<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Edit Newsletter</h1>
       

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
            <?php echo $this->Form->create('Newsletter',array('id'=>'tab','type'=>'file')); ?>
            <div class="col-md-4">                
                    <div class="form-group">                        
                        <?php echo $this->Form->input('first_name',array('class'=>'form-control'));?>                        
                    </div>
                    <div class="form-group">                        
                        <?php echo $this->Form->input('last_name',array('class'=>'form-control'));?>                        
                    </div>
                   <div class="form-group">
                        <?php echo $this->Form->input('email',array('class'=>'form-control'));?>
                    </div>
                 <div class="form-group">
                         <textarea rows="2" name="data[Newsletter][description]" class="form-control" value="<?php echo $editname['Newsletter']['description']?>"></textarea>
                    </div>
                <input type="hidden" name="data[Newsletter][created]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="data[Newsletter][status]" value="1">

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i>Update</button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Newsletters', 'action' => 'admin_index')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
            </div>
             <?php echo $this->Form->end();?>
        </div>
    </div>

    
    
    
    
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: "media"

    });
</script>