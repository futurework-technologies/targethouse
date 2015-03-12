
<?php ?>

    <ul>
        <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Users/');?>" class="nav-header"><i class="fa fa-fw fa-user"></i>
               <?php echo __('Users Management');?>
            </a>
        </li>
         <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Subscribers/');?>" class="nav-header"><i class="fa fa-fw fa-user"></i>
               <?php echo __('Subscrib Management');?>
            </a>
        </li>
         <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Newsletters/');?>" class="nav-header"><i class="fa fa-fw fa-user"></i>
               <?php echo __('Newsletter Management');?>
            </a>
        </li>
         <li class="active">
            <a href="<?php echo $this->Html->url('/admin/Products/');?>" class="nav-header"><i class="fa fa-fw fa-user"></i>
               <?php echo __('Products Management');?>
            </a>
        </li>
    </ul>