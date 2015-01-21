<div class="supplierContacts form">
<?php echo $this->Form->create('SupplierContact'); ?>
	<fieldset>
		<legend><?php echo __('Edit Supplier Contact'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('supplier_id');
		echo $this->Form->input('supplier_contact_name');
		echo $this->Form->input('supplier_contact_position');
		echo $this->Form->input('supplier_contact_email');
		echo $this->Form->input('supplier_contact_number');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SupplierContact.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('SupplierContact.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Supplier Contacts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
	</ul>
</div>
