<div class="divisions form">
<?php echo $this->Form->create('Division',array('type'=>'post')); ?>
    <fieldset>
        <legend><?php echo __('Add Division'); ?></legend>
	<?php
                echo $this->Form->input('id',array('type'=>'text','readonly'=>true));
		echo $this->Form->input('division_name');       
           	?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit'),array('type'=>'submit')); ?>
    <?php echo $this->Form->button(__('Cancel'),array('type'=>'reset')); ?>
    <?php echo $this->Form->end(); ?>
</div>
<!--<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Divisions'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Klasses'), array('controller' => 'klasses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Klass'), array('controller' => 'klasses', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Sub Klasses'), array('controller' => 'sub_klasses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Sub Klass'), array('controller' => 'sub_klasses', 'action' => 'add')); ?> </li>
    </ul>
</div>-->
<!--<script type="text/javascript">
    function divisionSave(supplierId,supplierName) {
        window.opener.document.forms[0].elements["data[Product][supplier_id]"].value = supplierId;
        window.opener.document.forms[0].elements["data[Product][suplier_name]"].value = supplierName;
        window.close();
    }
</script>-->

