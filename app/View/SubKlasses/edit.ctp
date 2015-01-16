<div class="subKlasses form">
<?php echo $this->Form->create('SubKlass'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sub Klass'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('division_id');
		echo $this->Form->input('department_id');
		echo $this->Form->input('klass_id');
		echo $this->Form->input('sub_klass_name');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SubKlass.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('SubKlass.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sub Klasses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Klasses'), array('controller' => 'klasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Klass'), array('controller' => 'klasses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
