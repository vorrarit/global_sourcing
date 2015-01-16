<div class="manufacturers view">
<h2><?php echo __('Manufacturer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($manufacturer['Manufacturer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufac Name Th'); ?></dt>
		<dd>
			<?php echo h($manufacturer['Manufacturer']['manufac_name_th']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufac Name Eng'); ?></dt>
		<dd>
			<?php echo h($manufacturer['Manufacturer']['manufac_name_eng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufac Tax'); ?></dt>
		<dd>
			<?php echo h($manufacturer['Manufacturer']['manufac_tax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufac Contact Address'); ?></dt>
		<dd>
			<?php echo h($manufacturer['Manufacturer']['manufac_contact_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufac Phone Number'); ?></dt>
		<dd>
			<?php echo h($manufacturer['Manufacturer']['manufac_phone_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufac Map Name'); ?></dt>
		<dd>
			<?php echo h($manufacturer['Manufacturer']['manufac_map_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufac Map Path'); ?></dt>
		<dd>
			<?php echo h($manufacturer['Manufacturer']['manufac_map_path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufac Map File Type'); ?></dt>
		<dd>
			<?php echo h($manufacturer['Manufacturer']['manufac_map_file_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($manufacturer['Manufacturer']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($manufacturer['Manufacturer']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($manufacturer['Manufacturer']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($manufacturer['Manufacturer']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Manufacturer'), array('action' => 'edit', $manufacturer['Manufacturer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Manufacturer'), array('action' => 'delete', $manufacturer['Manufacturer']['id']), array(), __('Are you sure you want to delete # %s?', $manufacturer['Manufacturer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Manufacturers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manufacturer Contacts'), array('controller' => 'manufacturer_contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer Contact'), array('controller' => 'manufacturer_contacts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Manufacturer Contacts'); ?></h3>
	<?php if (!empty($manufacturer['ManufacturerContact'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Manufacturer Id'); ?></th>
		<th><?php echo __('Manufac Contact Name'); ?></th>
		<th><?php echo __('Manufac Contact Position'); ?></th>
		<th><?php echo __('Manufac Contact Email'); ?></th>
		<th><?php echo __('Manufac Contact Number'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($manufacturer['ManufacturerContact'] as $manufacturerContact): ?>
		<tr>
			<td><?php echo $manufacturerContact['id']; ?></td>
			<td><?php echo $manufacturerContact['manufacturer_id']; ?></td>
			<td><?php echo $manufacturerContact['manufac_contact_name']; ?></td>
			<td><?php echo $manufacturerContact['manufac_contact_position']; ?></td>
			<td><?php echo $manufacturerContact['manufac_contact_email']; ?></td>
			<td><?php echo $manufacturerContact['manufac_contact_number']; ?></td>
			<td><?php echo $manufacturerContact['created_by']; ?></td>
			<td><?php echo $manufacturerContact['created']; ?></td>
			<td><?php echo $manufacturerContact['modified_by']; ?></td>
			<td><?php echo $manufacturerContact['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'manufacturer_contacts', 'action' => 'view', $manufacturerContact['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'manufacturer_contacts', 'action' => 'edit', $manufacturerContact['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'manufacturer_contacts', 'action' => 'delete', $manufacturerContact['id']), array(), __('Are you sure you want to delete # %s?', $manufacturerContact['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Manufacturer Contact'), array('controller' => 'manufacturer_contacts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($manufacturer['Product'])): ?>
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
	<?php foreach ($manufacturer['Product'] as $product): ?>
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
