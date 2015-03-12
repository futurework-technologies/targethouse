<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Add Product Detail</h1>
    </div>
    <div class="main-content">
      
        <div class="row">
            <div class="col-md-4">
<?php echo $this->Form->create('Pdetail'); ?>
	<fieldset>
		
	<?php
		echo $this->Form->input('Category');
                echo $this->Form->input('Article');
		echo $this->Form->input('Material');
                echo $this->Form->input('Size');
		echo $this->Form->input('Quantity');
		echo $this->Form->input('Color');
		echo $this->Form->input('Production_price');
                echo $this->Form->input('Partner_price');
                echo $this->Form->input('Consumer_price');
		echo $this->Form->input('Remark');
		echo $this->Form->input('Height');
		echo $this->Form->input('Width');
                echo $this->Form->input('Ratio');
		echo $this->Form->input('created');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Details'), array('action' => 'index')); ?></li>
	</ul>
</div>
    </div>
        </div>
