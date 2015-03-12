<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title"><?php echo __(" View Order")?></h1>

    </div>
    <div class="main-content"> 
      
        


        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label><h4><?php echo __(" Order Id:")?></h4></label><br>
                    <td>  <?php echo h($user['Inlineitem']['id']); ?></td>
                </div>
                <div class="form-group">
                    <label><h4><?php echo __(" Image:")?></h4></label><br>
                         <img src="<?php echo $this->Html->url('/' . $user['Inlineitem']['image'], array('alt' => 'Image', 'height' => '70px', 'width' => '100px')); ?>">  
                </div>
           
                <div class="form-group">
                    <label><h4><?php echo __(" Consumer Price:")?></h4></label><br>
                    <?php echo h($user['Inlineitem']['Consumer_price']); ?>
                </div>
                <div class="form-group">
                    <label><h4><?php echo __(" Order id:")?></h4></label><br>
                    <?php echo h($user['Inlineitem']['order_id']); ?>
                </div>
                <div class="form-group">
                    <label><h4><?php echo __(" Self Create product id:")?></h4></label><br>
                    <?php echo h($user['Inlineitem']['pdetail_id']); ?>
                </div>
                  <div class="form-group">
                    <label><h4><?php echo __("Product id")?></h4></label><br>
                    <?php echo h($user['Inlineitem']['product_id']); ?>
                </div>
              
                </div>
            </div>
        </div>
    </div>