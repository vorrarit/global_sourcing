<div class="manufacturers form">
<?php echo $this->Form->create('Manufacturer'); ?>
    <fieldset>
        <legend><?php echo __('Edit Manufacturer'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label'=> 'Manufacturer ID'));
		echo $this->Form->input('manufac_name_th',array('label'=> 'Manufacturer Name Th','required' => true));
		echo $this->Form->input('manufac_name_eng' ,array('label'=> 'Manufacturer Name Eng'));
		echo $this->Form->input('manufac_tax',array('label'=> 'Manufacturer Tax'));
		echo $this->Form->input('manufac_contact_address',array('label'=> 'Manufacturer Contact Address'));
		echo $this->Form->input('manufac_phone_number',array('label'=> 'Manufacturer Phone Number'));

	?>
    </fieldset>
<?php echo $this->Form->button('Edit', array ('class' => 'btn btn-primary btn-form')); ?>
    <?php echo $this->Form->end() ; ?>
</div>

<div class="manufacturerContacts form">
<?php echo $this->Form->create('ManufacturerContact',array('controller' => 'ManufacturerContact','action'=>'add' )); ?>
    <fieldset>
        <legend><?php echo __('Add Manufacturer Contact'); ?></legend>
        <div id="person">
	<?php
                echo $this->Form->input('id');
		echo $this->Form->input('manufacturer_id', array ('type' => 'hidden', 'value' => $this->request->data['Manufacturer']['id']));
		echo $this->Form->input('manufac_contact_name',array('label'=> 'Manufacturer Contact Name','required' => true));
		echo $this->Form->input('manufac_contact_position',array('label'=> 'Manufacturer Contact Position','required' => true));
                echo $this->Form->input('manufac_contact_email',array('label'=> 'Manufacturer Contact Email','required' => true));
		echo $this->Form->input('manufac_contact_number',array('label'=> 'Manufacturer Contact Number','required' => true));
                echo $this->Form->input('manufac_map_name',array('type' => 'hidden'));
		echo $this->Form->input('manufac_map_path',array('type' => 'hidden'));
		echo $this->Form->input('manufac_map_file_type',array('type' => 'hidden'));
	?>	
        </div>

    </fieldset>
    <?php echo $this->Form->button('Save', array ('class' => 'btn btn-primary btn-form')); ?>
     <?php echo $this->Form->button('Reset',array('type' => 'reset','class'=>'btn btn-default btn-form')); ?>
    <a href="/manufacturers/index" button title="Cancel" class="btn btn-default">Cancel</a>
    <?php echo $this->Form->end(); ?>
</div>

<div class="manufacturerContacts index">
    <h2><?php echo __('Manufacturer Contacts'); ?></h2>
    <table class ="table table-hover">
        <thead>
            <tr>
                <th><?php echo 'manufacturer contact name'; ?></th>
                <th><?php echo 'manufacturer contact position'; ?></th>
                <th><?php echo 'manufacturer contact email'; ?></th>
                <th><?php echo 'manufacturer contact number'; ?></th>
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
			<?php // echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>'__('Delete'), array('action' => 'delete', $manufacturerContact['ManufacturerContact']['id']), array(), __('Are you sure you want to delete # %s?', $manufacturerContact['ManufacturerContact']['id'])); ?>
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit',$manufacturerContact['ManufacturerContact']['manufacturer_id'], $manufacturerContact['ManufacturerContact']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
			<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller'=>'ManufacturerContacts', 'action' => 'delete', $manufacturerContact['ManufacturerContact']['id']), array('escape'=>false, 'title'=>__('Delete')), __('Are you sure you want to delete # %s?', $manufacturerContact['ManufacturerContact']['id'])); ?>
                
                </td>
            </tr>
<?php endforeach; ?>
        </tbody>
    </table>

</div>
