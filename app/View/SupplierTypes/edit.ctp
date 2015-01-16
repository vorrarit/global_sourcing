<div class="supplierTypes form">
<?php echo $this->Form->create('SupplierType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Supplier Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('supplier_type_name');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SupplierType.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('SupplierType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Supplier Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Supplier Products'), array('controller' => 'supplier_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier Product'), array('controller' => 'supplier_products', 'action' => 'add')); ?> </li>
	</ul>
</div>
