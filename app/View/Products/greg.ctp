<div class="products form">
<?php echo $this->Form->create('Product'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Product'); ?></legend>
	<?php
		echo $this->Form->input('product_name');
		echo $this->Form->input('product_image');
		echo $this->Form->input('product_description');
		echo $this->Form->input('timestamo');
		echo $this->Form->input('pcategories_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pcategories'), array('controller' => 'pcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pcategories'), array('controller' => 'pcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>