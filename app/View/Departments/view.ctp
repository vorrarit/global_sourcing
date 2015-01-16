<div class="departments view">
<h2><?php echo __('Department'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($department['Department']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($department['Division']['id'], array('controller' => 'divisions', 'action' => 'view', $department['Division']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department Name'); ?></dt>
		<dd>
			<?php echo h($department['Department']['department_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($department['Department']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($department['Department']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($department['Department']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($department['Department']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Department'), array('action' => 'edit', $department['Department']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Department'), array('action' => 'delete', $department['Department']['id']), array(), __('Are you sure you want to delete # %s?', $department['Department']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Klasses'), array('controller' => 'klasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Klass'), array('controller' => 'klasses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sub Klasses'), array('controller' => 'sub_klasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sub Klass'), array('controller' => 'sub_klasses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Klasses'); ?></h3>
	<?php if (!empty($department['Klass'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Division Id'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Klass Name'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($department['Klass'] as $klass): ?>
		<tr>
			<td><?php echo $klass['id']; ?></td>
			<td><?php echo $klass['division_id']; ?></td>
			<td><?php echo $klass['department_id']; ?></td>
			<td><?php echo $klass['klass_name']; ?></td>
			<td><?php echo $klass['created_by']; ?></td>
			<td><?php echo $klass['created']; ?></td>
			<td><?php echo $klass['modified_by']; ?></td>
			<td><?php echo $klass['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'klasses', 'action' => 'view', $klass['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'klasses', 'action' => 'edit', $klass['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'klasses', 'action' => 'delete', $klass['id']), array(), __('Are you sure you want to delete # %s?', $klass['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Klass'), array('controller' => 'klasses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($department['Product'])): ?>
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
	<?php foreach ($department['Product'] as $product): ?>
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
<div class="related">
	<h3><?php echo __('Related Sub Klasses'); ?></h3>
	<?php if (!empty($department['SubKlass'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Division Id'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Klass Id'); ?></th>
		<th><?php echo __('Sub Klass Name'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($department['SubKlass'] as $subKlass): ?>
		<tr>
			<td><?php echo $subKlass['id']; ?></td>
			<td><?php echo $subKlass['division_id']; ?></td>
			<td><?php echo $subKlass['department_id']; ?></td>
			<td><?php echo $subKlass['klass_id']; ?></td>
			<td><?php echo $subKlass['sub_klass_name']; ?></td>
			<td><?php echo $subKlass['created_by']; ?></td>
			<td><?php echo $subKlass['created']; ?></td>
			<td><?php echo $subKlass['modified_by']; ?></td>
			<td><?php echo $subKlass['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sub_klasses', 'action' => 'view', $subKlass['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sub_klasses', 'action' => 'edit', $subKlass['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sub_klasses', 'action' => 'delete', $subKlass['id']), array(), __('Are you sure you want to delete # %s?', $subKlass['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sub Klass'), array('controller' => 'sub_klasses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
