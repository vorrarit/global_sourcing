<div class="manufacturers form">
<?php echo $this->Form->create('Manufacturer'); ?>
	<fieldset>
		<legend><?php echo __('Edit Manufacturer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('manufac_name_th');
		echo $this->Form->input('manufac_name_eng');
		echo $this->Form->input('manufac_tax');
		echo $this->Form->input('manufac_contact_address');
		echo $this->Form->input('manufac_phone_number');

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="manufacturerContacts form">
<?php echo $this->Form->create('ManufacturerContact',array('controller' => 'ManufacturerContact','action'=>'add' )); ?>
    <fieldset>
        <legend><?php echo __('Add Manufacturer Contact'); ?></legend>
        <div id="person">
	<?php
                echo $this->Form->input('id');
		echo $this->Form->input('manufacturer_id', array ('type' => 'hidden', 'value' => $this->request->data['Manufacturer']['id']));
		echo $this->Form->input('manufac_contact_name');
		echo $this->Form->input('manufac_contact_position');
		echo $this->Form->input('manufac_contact_email');
		echo $this->Form->input('manufac_contact_number');
	?>	
        </div>
<!--        <div class="actions" >
        <a href = "javascript:void(null)" onclick="addmore_click()" > + add more </a>
        </div>-->
        
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="manufacturerContacts index">
	<h2><?php echo __('Manufacturer Contacts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo 'manufac_contact_name'; ?></th>
			<th><?php echo 'manufac_contact_position'; ?></th>
			<th><?php echo 'manufac_contact_email'; ?></th>
			<th><?php echo 'manufac_contact_number'; ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($manufacturerContacts as $manufacturerContact): ?>
	<tr>
		<td><?php echo h($manufacturerContact['ManufacturerContact']['manufac_contact_name']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerContact['ManufacturerContact']['manufac_contact_position']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerContact['ManufacturerContact']['manufac_contact_email']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerContact['ManufacturerContact']['manufac_contact_number']); ?>&nbsp;</td>

                <td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit',$manufacturerContact['ManufacturerContact']['manufacturer_id'], $manufacturerContact['ManufacturerContact']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $manufacturerContact['ManufacturerContact']['id']), array(), __('Are you sure you want to delete # %s?', $manufacturerContact['ManufacturerContact']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
   
</div>




<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Manufacturer.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Manufacturer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Manufacturers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Manufacturer Contacts'), array('controller' => 'manufacturer_contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer Contact'), array('controller' => 'manufacturer_contacts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>