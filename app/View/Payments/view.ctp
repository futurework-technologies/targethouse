<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">View Order</h1>

    </div>
    <div class="main-content"> 
        <p>
            <?php $x = $this->Session->flash(); ?>
            <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong>Success!</strong><?php echo $x; ?>
            </div>
        <?php } ?>
        </p>
        <div class="btn-toolbar list-toolbar">

            <div class="btn-group">
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label><h4>Order Id:</h4></label><br>
                    <td><?php
                        $ram = unserialize($user['Payment']['order_id']);
                        foreach ($ram as $r) {
                            echo $r . ",";
                        }
                        ?>&nbsp;</td>
                </div>
                <div class="form-group">
                    <label><h4>Image:</h4></label><br>
                 

                        <img src="<?php echo $this->Html->url('/' . $user['Inlineitem']['image'], array('alt' => 'Image', 'height' => '70px', 'width' => '100px')); ?>">

                </div>
                <a href="../../../../New folder (2)/products.ctp"></a>
                <div class="form-group">
                    <label><h4>Type:</h4></label><br>
                    <?php //echo h($user['Payment']['type']);  ?>
                </div>
                <div class="form-group">
                    <label><h4>First name:</h4></label><br>
                    <?php echo h($user['Payment']['first_name']); ?>
                </div>
                <div class="form-group">
                    <label><h4>Last Name:</h4></label><br>
                    <?php echo h($user['Payment']['last_name']); ?>
                </div>
                <div class="form-group">
                    <label><h4>Price:</h4></label><br>
                    <?php echo h($user['Payment']['totalprice']); ?>
                </div>
                  <div class="form-group">
                    <label><h4>Transaction Id:</h4></label><br>
                    <?php echo h($user['Payment']['paypal_transaction_id']); ?>
                </div>
                <div class="form-group">
                    <label><h4>Country:</h4></label><br>
                    <?php echo h($user['Payment']['country']); ?>
                </div>
                <div class="form-group">
                    <label><h4>Company:</h4></label><br>
                    <?php echo h($user['Payment']['company']); ?>
                </div>
                <div class="form-group">
                    <label><h4>City:</h4></label><br>
                    <?php echo h($user['Payment']['city']); ?>
                </div>
                <div class="form-group">
                    <label><h4>Contact:</h4></label><br>
                    <?php echo h($user['Payment']['contact']); ?>
                </div>
            </div>
        </div>
    </div>