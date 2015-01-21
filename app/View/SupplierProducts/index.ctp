<div class="supplierProducts index">
	<h2><?php echo __('Supplier Products'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table-hover">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('supplier_id'); ?></th>
			<th><?php echo $this->Paginator->sort('supplier_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('supplier_product_name'); ?></th>
			<th><?php echo $this->Paginator->sort('supplier_product_retail_price'); ?></th>
			<th><?php echo $this->Paginator->sort('unit_id'); ?></th>
			<th><?php echo $this->Paginator->sort('currency_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($supplierProducts as $supplierProduct): ?>
	<tr>
		<td><?php echo h($supplierProduct['SupplierProduct']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($supplierProduct['Product']['id'], array('controller' => 'products', 'action' => 'view', $supplierProduct['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($supplierProduct['Supplier']['id'], array('controller' => 'suppliers', 'action' => 'view', $supplierProduct['Supplier']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($supplierProduct['SupplierType']['id'], array('controller' => 'supplier_types', 'action' => 'view', $supplierProduct['SupplierType']['id'])); ?>
		</td>
		<td><?php echo h($supplierProduct['SupplierProduct']['supplier_product_name']); ?>&nbsp;</td>
		<td><?php echo h($supplierProduct['SupplierProduct']['supplier_product_retail_price']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($supplierProduct['Unit']['id'], array('controller' => 'units', 'action' => 'view', $supplierProduct['Unit']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($supplierProduct['Currency']['id'], array('controller' => 'currencies', 'action' => 'view', $supplierProduct['Currency']['id'])); ?>
		</td>
		<td><?php echo h($supplierProduct['SupplierProduct']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($supplierProduct['SupplierProduct']['created']); ?>&nbsp;</td>
		<td><?php echo h($supplierProduct['SupplierProduct']['modified_by']); ?>&nbsp;</td>
		<td><?php echo h($supplierProduct['SupplierProduct']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $supplierProduct['SupplierProduct']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $supplierProduct['SupplierProduct']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $supplierProduct['SupplierProduct']['id']), array(), __('Are you sure you want to delete # %s?', $supplierProduct['SupplierProduct']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Supplier Product'), array('action' => 'add')); ?></li>
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
