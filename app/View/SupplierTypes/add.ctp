<div class="supplierTypes form">
<?php echo $this->Form->create('SupplierType',array('type'=>'post')); ?>
    <fieldset>
        <legend><?php echo __('Add Supplier Type'); ?></legend>
	<?php
                echo $this->Form->input('id',array('type'=>'text','readonly'=>true));
		echo $this->Form->input('supplier_type_name');
	?>
    </fieldset>
    <?php echo $this->Form->button(__('Search'),array('type'=>'submit','class'=>'btn btn-primary btn-form')); ?>
    <?php echo $this->Form->button(__('Cancel'),array('onclick'=>"window.location.href='../SupplierTypes/index'",'type'=>'button','class'=>'btn btn-primary btn-form')); ?>
   <?php echo $this->Form->end(); ?>
</div>
