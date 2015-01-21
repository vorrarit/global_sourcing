<div class="row">
	<h1 class="page-header"><?php echo __('Edit Product'); ?></h1>
</div>

<div class="supplierProducts form row">

	<ul class="nav nav-tabs">
		<li role="presentation"><a href="/Products/edit/<?php echo $this->data['SupplierProduct']['product_id']; ?>">Product Info.</a></li>
		<li role="presentation" class="active"><a href="/SupplierProducts/add/<?php echo $this->data['SupplierProduct']['product_id']; ?>">Suppliers</a></li>
		<li role="presentation"><a href="/Attachments/index/<?php echo $this->data['SupplierProduct']['product_id']; ?>">Attachments</a></li>
	</ul>
	
	<p></p>
	
<?php
echo $this->Form->create('SupplierProduct', array('type'=>'post'));
echo $this->Form->input('id',array('type' => 'hidden'));
echo $this->Form->input('product_id',array('type' => 'hidden'));
echo $this->Form->input('supplier_id',array('type'=>'hidden'));

echo $this->Form->input('supplier_name', 
		array('type'=>'text','readonly'=>true, 
			'div'=> array('class'=>'col-lg-2 form-group'), 'wrap'=>'input-group',
			'afterInput'=>'<span class="input-group-btn"><button type="button" class="btn btn-default" onclick="popup_click()"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button></span>'));

echo $this->Form->input('supplier_type_id', 
		array('options'=>$supplierTypes, 'empty'=>'please select', 
			'div'=> array('class'=>'col-lg-2 form-group')));

echo $this->Form->input('supplier_product_purchase_price', array('type'=>'number',
	'label'=>'Purchase Price',
		'div'=> array('class'=>'col-lg-2 form-group')));

echo $this->Form->input('unit_id', array('options'=>$units, 'empty'=>'please select', 
			'div'=> array('class'=>'col-lg-2 form-group')));

echo $this->Form->input('currency_id', array('options'=>$currencies, 'empty'=>'please select', 
			'div'=> array('class'=>'col-lg-2 form-group')));

echo '<div class="col-lg-2 form-group"><label>&nbsp;</label>';
echo $this->Form->submit(__('Save'), array('class'=>'btn btn-primary btn-block'));
echo '</div>';
?>

</div>
<?php echo $this->Form->end(); ?>

<div class="supplierProducts index row">
    <table class="table table-hover">
        <thead>
            <tr>
                <th><?php echo h('Supplier Name'); ?></th>
                <th width="120"><?php echo h('Supplier Type'); ?></th>
                <th width="120"><?php echo h('Purchase Price'); ?></th>
                <th width="60"><?php echo h('Unit'); ?></th>
                <th width="60"><?php echo h('Currency'); ?></th>
                <th class="actions" width="60"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
	<?php foreach ($supplierProducts as $supplierProduct): ?>
            <tr>
                <td>
                    <?php echo h($supplierProduct['Supplier']['supplier_name_th']); ?>&nbsp;
                </td>
                <td>
                    <?php echo ($supplierProduct['SupplierType']['supplier_type_name']); ?>
                </td>
                <td>
                    <?php echo h($supplierProduct['SupplierProduct']['supplier_product_purchase_price']); ?>&nbsp;
                </td>
                <td>
			<?php echo ($supplierProduct['Unit']['unit_name']); ?>
                </td>
                <td>
			<?php echo ($supplierProduct['Currency']['currency_name']); ?>
                </td>

                <td>
			<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), array('action' => 'add', $this->request->data['SupplierProduct']['product_id'], $supplierProduct['SupplierProduct']['id']),array('escape'=>false, 'title'=>__('Edit'))); ?>
			<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), array('action' => 'delete', $supplierProduct['SupplierProduct']['id']),array('escape'=>false, 'title'=>__('Delete')), array( __('Are you sure you want to delete # %s?', $supplierProduct['SupplierProduct']['id']))); ?>
                </td>
            </tr>
<?php endforeach; ?>
        </tbody>
    </table>

</div>

<div class="row">
	<button type="button" class="btn btn-default btn-form" onclick="popupNotifySupplier_click()">Notify Suppliers</button>
</div>

<script>
    function popup_click(){
        open('/suppliers/popup');
    }
	
	function popupNotifySupplier_click() {
		open('/SupplierProducts/popup/<?php echo $this->data['SupplierProduct']['product_id']; ?>');
		return true;
	}
</script>

