<div class="supplierProducts form">
<?php echo $this->Form->create('SupplierProduct'); ?>
	<fieldset>
		<legend><?php echo __('Edit Supplier Product'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('supplier_id');
		echo $this->Form->input('supplier_type_id');
		echo $this->Form->input('supplier_product_name');
		echo $this->Form->input('supplier_product_retail_price');
		echo $this->Form->input('unit_id');
		echo $this->Form->input('currency_id');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SupplierProduct.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('SupplierProduct.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Supplier Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplier Types'), array('controller' => 'supplier_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier Type'), array('controller' => 'supplier_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Currencies'), array('controller' => 'currencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Currency'), array('controller' => 'currencies', 'action' => 'add')); ?> </li>
	</ul>
</div>
