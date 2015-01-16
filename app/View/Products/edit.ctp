<div class="products form">
<?php echo $this->Form->create('Product'); ?>
	<fieldset>
		<legend><?php echo __('Edit Product'); ?></legend>
	<?php
                echo $this->Form->input('id',array('type'=>'text','readonly'=> true));
		echo $this->Form->input('product_name');
		echo $this->Form->input('Division.division_name',array(
                    'type' => 'text','readonly'=>true
                    ));
		echo $this->Form->input('Department.department_name', array(
                    'type' => 'text','readonly'=>true
                    ));
                echo $this->Form->input('Klass.klass_name', array(
                    'type' => 'text','readonly'=>true
                    ));
		echo $this->Form->input('SubKlass.sub_klass_name',array(
                    'type' => 'text','readonly'=>true
                    ));
		echo $this->Form->input('product_barcode_no');
                echo $this->Form->input('copy to sku no',array('type'=>'checkbox' ,'id'=>'copyBarcode','onchange'=>'tickCopyBarcode()'));
		echo $this->Form->input('product_sku_no');
		echo $this->Form->input('product_description_th');
                echo $this->Form->input('copy to short description th',array('type'=>'checkbox','id'=>'copyShortTh','onchange'=>'tickCopyShortTh()'));
		echo $this->Form->input('product_description_eng');
                echo $this->Form->input('copy to short description eng',array('type'=>'checkbox' ,'id'=>'copyShortEng','onchange'=>'tickCopyShortEng()'));
		echo $this->Form->input('product_short_description_th');
		echo $this->Form->input('product_short_description_eng');
		echo $this->Form->input('product_specification');
		echo $this->Form->input('retail_price');
		echo $this->Form->input('currency_id');
		echo $this->Form->input('unit_id');
		echo $this->Form->input('manufacturer_id');
		echo $this->Form->input('created_by',array('type'=>'hidden'));
		echo $this->Form->input('modified_by',array('type'=>'hidden'));
		echo $this->Form->input('product_status',array('type'=>'hidden','id'=>'prst'));
                echo $this->Form->input('save draft',array('type'=>'button' , 'onclick'=>'saveDraftClick()'));
        ?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Product.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Product.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Currencies'), array('controller' => 'currencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Currency'), array('controller' => 'currencies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manufacturers'), array('controller' => 'manufacturers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer'), array('controller' => 'manufacturers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Klasses'), array('controller' => 'klasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Klass'), array('controller' => 'klasses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sub Klasses'), array('controller' => 'sub_klasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sub Klass'), array('controller' => 'sub_klasses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List File Documents'), array('controller' => 'file_documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New File Document'), array('controller' => 'file_documents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<script type ="text/javascript">
     
    function tickCopyBarcode()
    {
        var copy = ($('#copyBarcode').prop("checked")) ? $('#ProductProductBarcodeNo').val() : '';
        $('#ProductProductSkuNo').val(copy);
    }
    
    function tickCopyShortTh()
    {
        var copy = ($('#copyShortTh').prop("checked")) ? $('#ProductProductDescriptionTh').val() : '';
        $('#ProductProductShortDescriptionTh').val(copy);
    }
    
    function tickCopyShortEng()
    {
        var copy = ($('#copyShortEng').prop("checked")) ? $('#ProductProductDescriptionEng').val() : '';
        $('#ProductProductShortDescriptionEng').val(copy);
    }
    function saveDraftClick()
    {
        $('#prst').val('DRAFT');
        $('.ProductAddForm').submit();
    }
</script>