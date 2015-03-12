
<?php ?>
<?php echo $this->Html->script(array('/admin/lib/bootstrap/js/bootstrap.min'));?>
    <ul>
        <li data-popover="true" rel="popover" data-placement="right">
             <a href="#" data-target=".premium-menu" class="nav-header collapsed" data-toggle="collapse">
                 <i class="fa fa-fw fa-shopping-cart"></i><?php echo __(" User Management")?><i class="fa fa-collapse"></i>
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
<!--         <li class="active">
            <a href="<?php //echo $this->Html->url('/admin/Subscribers/');?>" class="nav-header"><i class="fa fa-fw fa-user"></i>
               <?php //echo __('Subscrib Management');?>
            </a>
        </li>-->
        
<!--        <li data-popover="true" rel="popover" data-placement="right">
             <a href="#" data-target=".premium-menu" class="nav-header collapsed" data-toggle="collapse">
                 <i class="fa fa-fw fa-shopping-cart"></i>Newsletter Management<i class="fa fa-collapse"></i>
             </a>
         </li>-->
        
           <li data-popover="true" rel="popover" data-placement="right">
             <a href="#" data-target=".premium-menu" class="nav-header collapsed" data-toggle="collapse">
                 <i class="fa fa-fw fa-shopping-cart"></i><?php echo __("Product Management")?><i class="fa fa-collapse"></i>
             </a>
           </li>
         <ul class="premium-menu nav nav-list collapse">                
            <li><a href="<?php echo $this->Html->url('/admin/Products/');?>">
                    <span class="fa fa-fw fa-shopping-cart"></span><?php echo __('All Products');?>
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url('/admin/Categories/add/');?>">
                    <span class="fa fa fa-fw fa-photo"></span><?php echo __('Add Product Categories/Types');?>
                </a>
            </li>
<!--			 <li>
                <a href="<?php echo $this->Html->url('/admin/Subcategories/add/');?>">
                    <span class="fa fa fa- fw fa-photo"></span><?php //echo __('Add Product Subcategories');?>
                </a>
            </li>-->
            <li>
                <a href="<?php echo $this->Html->url('/admin/Products/add/');?>">
                    <span class="fa fa fa-fw fa-photo"></span><?php echo __('Add New Product');?>
                </a>
            </li>
           <li>
                <a href="<?php echo $this->Html->url('/admin/Pdetails/add/');?>">
                    <span class="fa fa fa-fw fa-photo"></span><?php echo __('Add New Detail');?>
                </a>
            </li>
             <li>
                <a href="<?php echo $this->Html->url('/admin/Pdetails/index/');?>">
                    <span class="fa fa fa-fw fa-photo"></span><?php echo __('All Product detail');?>
                </a>
            </li>
             <li>
                <a href="<?php echo $this->Html->url('/admin/articles/add/');?>">
                    <span class="fa fa fa-fw fa-photo"></span><?php echo __('Add New article');?>
                </a>
            </li>
         </ul>
           <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Contacts/');?>" class="nav-header"><i class="fa fa-fw fa-user"></i>
               <?php echo __('Contact Management');?>
            </a>
        </li>
          <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Orders/');?>" class="nav-header"><i class="fa fa-fw fa-user"></i>
               <?php echo __('Paid Order ');?>
            </a>
        </li>
        <li class="active">
            <a href="<?php echo $this->Html->url('/Inlineitems/orderitem');?>" class="nav-header"><i class="fa fa-fw fa-user"></i>
               <?php echo __('Order Items ');?>
            </a>
        </li>
          <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Pdetails/index/');?>" class="nav-header"><i class="fa fa-fw fa-user"></i>
               <?php echo __('Posted Products Details');?>
            </a>
        </li>
            
         <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Categories/index/');?>" class="nav-header"><i class="fa fa-fw fa-user"></i>
               <?php echo __('All Categories');?>
            </a>
        </li>
         <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Coupans/add/');?>" class="nav-header"><i class="fa fa-fw fa-user"></i>
               <?php echo __('Add Coupan');?>
            </a>
        </li>
         <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Contents/add/');?>" class="nav-header"><i class="fa fa-fw fa-user"></i>
               <?php echo __('Change Content');?>
            </a>
        </li>
          <li data-popover="true" rel="popover" data-placement="right">
             <a href="#" data-target=".premium-menu" class="nav-header collapsed" data-toggle="collapse">
                 <i class="fa fa-fw fa-shopping-cart"></i><?php echo __("Language Manage")?><i class="fa fa-collapse"></i>
             </a>
           </li>
               <ul class="premium-menu nav nav-list collapse"> 
           <li>
                <a href="<?php echo $this->Html->url('/lang/index/eng'); ?>">
                    <span class="fa fa fa-fw fa-photo"></span><?php echo __('English');?>
                </a>
            </li>
             <li>
                <a href="<?php echo $this->Html->url('/lang/index/dan'); ?>">
                    <span class="fa fa fa-fw fa-photo"></span><?php echo __('Denish');?>
                </a>
            </li>
             <li>
                <a href="<?php echo $this->Html->url('/admin/lang/pa/dan'); ?>">
                    <span class="fa fa fa-fw fa-photo"></span><?php echo __('Change Content');?>
                </a>
            </li>
         </ul>
         
    </ul>
