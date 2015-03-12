<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title"><?php echo __("Add Koupan")?></h1>
        
        <h2><?php echo __("Note : Apply Formula")?></h2>
        <b><?php echo __(" For %(Percentage Discount) Apply Formula: price-(price*2/100)")?></b></br>
        <b><?php echo __("For Price Discount Apply this: price-10")?></b></br>
        &nbsp;
        <p><?php echo __("For  Example if you want to provide 10% discount then:   price-(price*10/100)")?></p>
        
       <p><?php echo __(" If you want discount -20 then apply:   price-20")?></p>
        
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
                <?php echo $this->Form->create('Coupan'); ?>
                    <div class="form-group">
                        <label><?php echo __("Add Coupan")?></label>
                        <input type="text" name="data[Coupan][coupanname]" class="form-control" required>
                    </div>
                 
                 <div class="form-group">
                        <label><?php echo __("Put Discount")?></label>
                        <input type="text" name="data[Coupan][value]" class="form-control" required>
                  </div>
                 <div class="form-group">
                        <label><?php echo __("Apply Detail")?></label>
                        <input type="text" name="data[Coupan][msg]" class="form-control" required>
                  </div>
                
                
                  </div>
            
             <input type="hidden" name="data[Coupan][timestamp]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                 

                <div class="btn-toolbar list-toolbar">
                    <button class="btn btn-primary" name="submit"><i class="fa fa-save"></i><?php echo __(" Save")?></button>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Coupans', 'action' => 'admin_add')); ?>" data-toggle="modal" class="btn btn-danger">Cancel</a>
                </div>
        </form>
            </div>
        </div>
   </div>