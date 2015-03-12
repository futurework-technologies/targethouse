
<?php ?>
<?php echo $this->Html->script(array('/admin/lib/bootstrap/js/bootstrap.min'));?>
    <ul>
        <li data-popover="true" rel="popover" data-placement="right">
             <a href="#" data-target=".premium-menu" class="nav-header collapsed" data-toggle="collapse">
                 <i class="fa fa-fw fa-shopping-cart"></i>User Management<i class="fa fa-collapse"></i>
             </a>
         </li>
         <ul class="premium-menu nav nav-list collapse">                
            <li><a href="<?php echo $this->Html->url('/admin/Users/');?>">
                    <span class="fa fa-fw fa-shopping-cart"></span><?php echo __('All Users');?>
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url('/admin/Users/add/');?>">
                    <span class="fa fa fa-fw fa-photo"></span><?php echo __('Add New');?>
                </a>
            </li>
         </ul>
         <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Subscribers/');?>" class="nav-header"><i class="fa fa-fw fa-user"></i>
               <?php echo __('Subscrib Management');?>
            </a>
        </li>
        
        <li data-popover="true" rel="popover" data-placement="right">
             <a href="#" data-target=".premium-menu" class="nav-header collapsed" data-toggle="collapse">
                 <i class="fa fa-fw fa-shopping-cart"></i>Newsletter Management<i class="fa fa-collapse"></i>
             </a>
         </li>
         <ul class="premium-menu nav nav-list collapse">                
            <li><a href="<?php echo $this->Html->url('/admin/Newsletters/');?>">
                    <span class="fa fa-fw fa-shopping-cart"></span><?php echo __('All Newsletters');?>
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url('/admin/Newsletters/add/');?>">
                    <span class="fa fa fa-fw fa-photo"></span><?php echo __('Add New');?>
                </a>
            </li>
         </ul>
           <li data-popover="true" rel="popover" data-placement="right">
             <a href="#" data-target=".premium-menu" class="nav-header collapsed" data-toggle="collapse">
                 <i class="fa fa-fw fa-shopping-cart"></i>Product Management<i class="fa fa-collapse"></i>
             </a>
         </li>
         <ul class="premium-menu nav nav-list collapse">                
            <li><a href="<?php echo $this->Html->url('/admin/Products/');?>">
                    <span class="fa fa-fw fa-shopping-cart"></span><?php echo __('All Products');?>
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url('/admin/Pcategories/add/');?>">
                    <span class="fa fa fa-fw fa-photo"></span><?php echo __('Add Product Categories');?>
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url('/admin/Products/add/');?>">
                    <span class="fa fa fa-fw fa-photo"></span><?php echo __('Add New Product');?>
                </a>
            </li>
         </ul>
           <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Contacts/');?>" class="nav-header"><i class="fa fa-fw fa-user"></i>
               <?php echo __('Contact Management');?>
            </a>
        </li>
    </ul>