<div class="klasses view">
<h2><?php echo __('Klass'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($klass['Klass']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($klass['Division']['id'], array('controller' => 'divisions', 'action' => 'view', $klass['Division']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($klass['Department']['id'], array('controller' => 'departments', 'action' => 'view', $klass['Department']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Klass Name'); ?></dt>
		<dd>
			<?php echo h($klass['Klass']['klass_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($klass['Klass']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($klass['Klass']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($klass['Klass']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($klass['Klass']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Klass'), array('action' => 'edit', $klass['Klass']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Klass'), array('action' => 'delete', $klass['Klass']['id']), array(), __('Are you sure you want to delete # %s?', $klass['Klass']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Klasses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Klass'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($klass['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Name'); ?></th>
		<th><?php echo __('Division Id'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Product Barcode No'); ?></th>
		<th><?php echo __('Product Sku No'); ?></th>
		<th><?php echo __('Product Description Th'); ?></th>
		<th><?php echo __('Product Description Eng'); ?></th>
		<th><?php echo __('Product Short Description Th'); ?></th>
		<th><?php echo __('Product Short Description Eng'); ?></th>
		<th><?php echo __('Product Specification'); ?></th>
		<th><?php echo __('Retail Price'); ?></th>
		<th><?php echo __('Currency Id'); ?></th>
		<th><?php echo __('Unit Id'); ?></th>
		<th><?php echo __('Manufacturer Id'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Klass Id'); ?></th>
		<th><?php echo __('Sub Klass Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($klass['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['product_name']; ?></td>
			<td><?php echo $product['division_id']; ?></td>
			<td><?php echo $product['department_id']; ?></td>
			<td><?php echo $product['product_barcode_no']; ?></td>
			<td><?php echo $product['product_sku_no']; ?></td>
			<td><?php echo $product['product_description_th']; ?></td>
			<td><?php echo $product['product_description_eng']; ?></td>
			<td><?php echo $product['product_short_description_th']; ?></td>
			<td><?php echo $product['product_short_description_eng']; ?></td>
			<td><?php echo $product['product_specification']; ?></td>
			<td><?php echo $product['retail_price']; ?></td>
			<td><?php echo $product['currency_id']; ?></td>
			<td><?php echo $product['unit_id']; ?></td>
			<td><?php echo $product['manufacturer_id']; ?></td>
			<td><?php echo $product['created_by']; ?></td>
			<td><?php echo $product['created']; ?></td>
			<td><?php echo $product['modified_by']; ?></td>
			<td><?php echo $product['modified']; ?></td>
			<td><?php echo $product['klass_id']; ?></td>
			<td><?php echo $product['sub_klass_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), array(), __('Are you sure you want to delete # %s?', $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
