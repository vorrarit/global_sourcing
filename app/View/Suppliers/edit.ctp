<div class="suppliers form">
<?php echo $this->Form->create('Supplier'); ?>
	<fieldset>
		<legend><?php echo __('Supplier'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('supplier_name_th');
		echo $this->Form->input('supplier_name_eng');
		echo $this->Form->input('supplier_tax_id', array('type'=>'text'));
		echo $this->Form->input('supplier_contact_address');
		echo $this->Form->input('supplier_phone_number');
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Edit'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
</div>

<br>

<div class="supplierContacts form">
<?php echo $this->Form->create('SupplierContact', array('controller'=>'SupplierContact', 'action'=>'add')); ?>
	<fieldset>
		<legend><?php echo __('Add Supplier Contact'); ?></legend>
	<?php
                echo $this->Form->input('id');
                echo $this->Form->input('supplier_id', array('type'=>'hidden', 'value'=>$this->request->data['Supplier']['id']));
		echo $this->Form->input('supplier_contact_name');
		echo $this->Form->input('supplier_contact_position');
		echo $this->Form->input('supplier_contact_email');
		echo $this->Form->input('supplier_contact_number');
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Add'), array('class' => 'btn btn-primary','div'=>false)); ?>
    <?php echo $this->Form->button(__('Clear'), array('class' => 'btn btn-default','type'=>'reset')); ?>
<?php echo $this->Form->end(); ?>
</div>

<div class="supplierContacts index">
	<h2><?php echo __('Supplier Contacts'); ?></h2>
	<table class="table table-hover" cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo 'supplier_contact_name'; ?></th>
			<th><?php echo 'supplier_contact_position'; ?></th>
			<th><?php echo 'supplier_contact_email'; ?></th>
			<th><?php echo 'supplier_contact_number'; ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($supplierContacts as $supplierContact): ?>
	<tr>
		<td><?php echo h($supplierContact['SupplierContact']['supplier_contact_name']); ?>&nbsp;</td>
		<td><?php echo h($supplierContact['SupplierContact']['supplier_contact_position']); ?>&nbsp;</td>
		<td><?php echo h($supplierContact['SupplierContact']['supplier_contact_email']); ?>&nbsp;</td>
		<td><?php echo h($supplierContact['SupplierContact']['supplier_contact_number']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $supplierContact['SupplierContact']['supplier_id'], $supplierContact['SupplierContact']['id']),array('escape'=>false, 'title'=>__('Edit'))); ?>
			<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'SupplierContacts', 'action' => 'delete', $supplierContact['SupplierContact']['id']), array('escape'=>false, 'title'=>__('Edit')), __('Are you sure you want to delete # %s?', $supplierContact['SupplierContact']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>

