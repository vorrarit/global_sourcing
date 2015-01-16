<div class="supplierTypes view">
<h2><?php echo __('Supplier Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($supplierType['SupplierType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier Type Name'); ?></dt>
		<dd>
			<?php echo h($supplierType['SupplierType']['supplier_type_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($supplierType['SupplierType']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($supplierType['SupplierType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($supplierType['SupplierType']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($supplierType['SupplierType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Supplier Type'), array('action' => 'edit', $supplierType['SupplierType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Supplier Type'), array('action' => 'delete', $supplierType['SupplierType']['id']), array(), __('Are you sure you want to delete # %s?', $supplierType['SupplierType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplier Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplier Products'), array('controller' => 'supplier_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier Product'), array('controller' => 'supplier_products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Supplier Products'); ?></h3>
	<?php if (!empty($supplierType['SupplierProduct'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Supplier Id'); ?></th>
		<th><?php echo __('Supplier Type Id'); ?></th>
		<th><?php echo __('Supplier Product Name'); ?></th>
		<th><?php echo __('Supplier Product Retail Price'); ?></th>
		<th><?php echo __('Unit Id'); ?></th>
		<th><?php echo __('Currency Id'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($supplierType['SupplierProduct'] as $supplierProduct): ?>
		<tr>
			<td><?php echo $supplierProduct['id']; ?></td>
			<td><?php echo $supplierProduct['product_id']; ?></td>
			<td><?php echo $supplierProduct['supplier_id']; ?></td>
			<td><?php echo $supplierProduct['supplier_type_id']; ?></td>
			<td><?php echo $supplierProduct['supplier_product_name']; ?></td>
			<td><?php echo $supplierProduct['supplier_product_retail_price']; ?></td>
			<td><?php echo $supplierProduct['unit_id']; ?></td>
			<td><?php echo $supplierProduct['currency_id']; ?></td>
			<td><?php echo $supplierProduct['created_by']; ?></td>
			<td><?php echo $supplierProduct['created']; ?></td>
			<td><?php echo $supplierProduct['modified_by']; ?></td>
			<td><?php echo $supplierProduct['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'supplier_products', 'action' => 'view', $supplierProduct['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'supplier_products', 'action' => 'edit', $supplierProduct['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'supplier_products', 'action' => 'delete', $supplierProduct['id']), array(), __('Are you sure you want to delete # %s?', $supplierProduct['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Supplier Product'), array('controller' => 'supplier_products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
