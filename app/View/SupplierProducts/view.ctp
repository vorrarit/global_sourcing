<div class="supplierProducts view">
<h2><?php echo __('Supplier Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($supplierProduct['SupplierProduct']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($supplierProduct['Product']['id'], array('controller' => 'products', 'action' => 'view', $supplierProduct['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier'); ?></dt>
		<dd>
			<?php echo $this->Html->link($supplierProduct['Supplier']['id'], array('controller' => 'suppliers', 'action' => 'view', $supplierProduct['Supplier']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($supplierProduct['SupplierType']['id'], array('controller' => 'supplier_types', 'action' => 'view', $supplierProduct['SupplierType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier Product Name'); ?></dt>
		<dd>
			<?php echo h($supplierProduct['SupplierProduct']['supplier_product_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier Product Retail Price'); ?></dt>
		<dd>
			<?php echo h($supplierProduct['SupplierProduct']['supplier_product_retail_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unit'); ?></dt>
		<dd>
			<?php echo $this->Html->link($supplierProduct['Unit']['id'], array('controller' => 'units', 'action' => 'view', $supplierProduct['Unit']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Currency'); ?></dt>
		<dd>
			<?php echo $this->Html->link($supplierProduct['Currency']['id'], array('controller' => 'currencies', 'action' => 'view', $supplierProduct['Currency']['id'])); ?>
			&nbsp;
		</dd>

	</dl>
</div>

