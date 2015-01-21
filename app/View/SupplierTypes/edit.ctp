<div class="supplierTypes form">
<?php echo $this->Form->create('SupplierType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Supplier Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('supplier_type_name');
?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

