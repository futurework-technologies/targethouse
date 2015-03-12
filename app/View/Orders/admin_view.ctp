<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title"><?php echo __("View Order")?></h1>
       <h1 class="page-title"><a href="/orders/testpdf/"><?php echo __("Genrate PDF")?></a></h1>
    </div>
    <div class="main-content"> 
      
        


        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label><h4><?php echo __("Order Id:")?></h4></label><br>
                    <td>  <?php echo h($user['Order']['id']); ?></td>
                </div>


                <?php foreach ($user['Inlineitem'] as $ini){ ?>
                <div class="form-group">
                    <label><h4><?php echo __("Image:")?></h4></label><br>
                         <img src="<?php echo $this->Html->url('/' . $ini['image'], array('alt' => 'Image', 'height' => '70px', 'width' => '100px')); ?>">  
                </div>
                <?php } ?>

                  <div class="form-group">
                    <label><h4><?php echo __("Quantity:")?></h4></label><br>
                    <?php echo count($user['Inlineitem']); ?>
                </div>
         
                <div class="form-group">
                    <label><h4><?php echo __("Consumer Price:")?></h4></label><br>
                    <?php echo h($user['Order']['price']); ?>
                </div>
                <div class="form-group">
                    <label><h4><?php echo __("Name:")?></h4></label><br>
                    <?php echo h($user['Order']['name']); ?>
                </div>
                <div class="form-group">
                    <label><h4><?php echo __("Email:")?></h4></label><br>
                    <?php echo h($user['Order']['email']); ?>
                </div>
                  <div class="form-group">
                    <label><h4><?php echo __("Contact Number")?></h4></label><br>
                    <?php echo h($user['Order']['contact_number']); ?>
                </div>
              
                </div>
            </div>
        </div>
    </div>