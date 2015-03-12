<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Add Users</h1>
        <ul class="breadcrumb">
            <li class="active">Add Users</li>
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
                <?php echo $this->Form->create('User',array('id'=>'tab','type'=>'file')); ?>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="data[User][username]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="email" name="data[User][password]" class="form-control span12" required>                        
                    </div>
                   <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="data[User][email]" class="form-control span12" required>                        
                    </div>
                   <div class="form-group">
                        <label>User Type</label>
                        <input type="text" name="data[User][type]" class="form-control span12" required>                        
                    </div>
                    
                    <input type="hidden" name="data[User][timestamp]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="data[User][status]" value="1">

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Save</button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'admin_index')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
                    </form>
            </div>
        </div>
   </div>