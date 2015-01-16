<div class="supplierTypes form">
<?php echo $this->Form->create('SupplierType',array('type'=>'post')); ?>
	<fieldset>
		<legend><?php echo __('Add Supplier Type'); ?></legend>
	<?php
                echo $this->Form->input('id',array('type'=>'text','readonly'=>true));
		echo $this->Form->input('supplier_type_name');
	?>
	</fieldset>
    <?php echo $this->Form->button(__('Submit'),array('type'=>'submit')); ?>
    <?php echo $this->Form->button(__('Cancel'),array('type'=>'reset')); ?>
    <?php echo $this->Form->end(); ?>
</div>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Supplier Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Supplier Products'), array('controller' => 'supplier_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier Product'), array('controller' => 'supplier_products', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
