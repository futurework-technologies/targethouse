<div class="products view">
<h2><?php echo __('Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($product['Product']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Name'); ?></dt>
		<dd>
			<?php echo h($product['Product']['product_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Image'); ?></dt>
		<dd>
			<?php echo h($product['Product']['product_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Description'); ?></dt>
		<dd>
			<?php echo h($product['Product']['product_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timestamo'); ?></dt>
		<dd>
			<?php echo h($product['Product']['timestamo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pcategories'); ?></dt>
		<dd>
			<?php echo $this->Html->link($product['Pcategories']['id'], array('controller' => 'pcategories', 'action' => 'view', $product['Pcategories']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product['Product']['id']), array(), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pcategories'), array('controller' => 'pcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pcategories'), array('controller' => 'pcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
