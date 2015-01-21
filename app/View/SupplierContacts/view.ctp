<div class="supplierContacts view">
<h2><?php echo __('Supplier Contact'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($supplierContact['SupplierContact']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier'); ?></dt>
		<dd>
			<?php echo $this->Html->link($supplierContact['Supplier']['id'], array('controller' => 'suppliers', 'action' => 'view', $supplierContact['Supplier']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier Contact Name'); ?></dt>
		<dd>
			<?php echo h($supplierContact['SupplierContact']['supplier_contact_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier Contact Position'); ?></dt>
		<dd>
			<?php echo h($supplierContact['SupplierContact']['supplier_contact_position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier Contact Email'); ?></dt>
		<dd>
			<?php echo h($supplierContact['SupplierContact']['supplier_contact_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier Contact Number'); ?></dt>
		<dd>
			<?php echo h($supplierContact['SupplierContact']['supplier_contact_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($supplierContact['SupplierContact']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($supplierContact['SupplierContact']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($supplierContact['SupplierContact']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($supplierContact['SupplierContact']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Supplier Contact'), array('action' => 'edit', $supplierContact['SupplierContact']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Supplier Contact'), array('action' => 'delete', $supplierContact['SupplierContact']['id']), array(), __('Are you sure you want to delete # %s?', $supplierContact['SupplierContact']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplier Contacts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier Contact'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
	</ul>
</div>
