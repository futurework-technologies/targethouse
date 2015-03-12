<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title"><?php echo __('Change Password');?></h1>
        

    </div>
    <div class="main-content">
        <p>
            <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                    <div class="alert success">
                        <span class="icon"></span>
                    <strong>Success!</strong><?php echo $x; ?>
                    </div>
                    <?php } ?>
        </p>
        <div class="row">
            <div class="col-md-4">
                <?php echo $this->Form->create('User',array('id'=>'tab')); ?>
                    <div class="form-group">
                        <label>Old Password:</label>
                        <?php echo $this->Form->input("old_password",array("label"=>false,"type"=>"password",'Placeholder'=>'Old Password...'));?>
                    </div>
                    <div class="form-group">
                        <label>New Password:</label>
                        <?php echo $this->Form->input("new_password",array("label"=>false,"type"=>"password",'Placeholder'=>'New Password...'));?>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password:</label>
                        <?php echo $this->Form->input("cpassword",array("label"=>false,"type"=>"password",'Placeholder'=>'confirm Password...'));?>
                    </div>   
                <div class="btn-toolbar list-toolbar">
                    <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Save</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
