<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">View User</h1>
        
      </div>
    <div class="main-content"> 
        <p>
            <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                    <div class="alert success">
                        <span class="icon"></span>
                    <strong> <?php echo __("Success!")?></strong><?php echo $x; ?>
                    </div>
                    <?php } ?>
        </p>
         <div class="btn-toolbar list-toolbar">
            <a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'changepassword'));?>"><span class="btn btn-primary"><i class="fa fa-edit"></i>Change Password</span></a>
            <div class="btn-group">
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-4">
                 <div class="form-group">
                        <label><h4>Id:</h4></label><br>
                        <?php echo h($user['User']['id']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Username:</h4></label><br>
                        <?php echo h($user['User']['username']); ?>
                    </div>
                    
                    <div class="form-group">
                        <label><h4>Email:</h4></label><br>
                        <?php echo h($user['User']['email']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Password:</h4></label><br>
                        <?php echo h($user['User']['password']); ?>
                    </div>
                    <div class="form-group">
                        <label><h4>Created:</h4></label><br>
                        <?php echo h($user['User']['timestamp']); ?>
                    </div>
                    
            </div>
        </div>
    </div>