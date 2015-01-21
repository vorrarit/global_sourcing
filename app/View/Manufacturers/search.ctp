<div class="manufacturers index">
    
<?php echo $this->Form->create('Manufacturer',array('action'=>'multiSelect'))?>
<?php echo $this->Form->button('Delete All',array('type'=>'submit')); ?>  	
    <h2><?php echo __('Manufacturers'); ?></h2>

    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Form->checkbox('check_all', array('id' => 'chkCheckAll')); ?></th>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('manufac_name_th'); ?></th>
                <th><?php echo $this->Paginator->sort('manufac_name_eng'); ?></th>
                <th><?php echo $this->Paginator->sort('manufac_tax'); ?></th>
                <th><?php echo $this->Paginator->sort('manufac_contact_address'); ?></th>
                <th><?php echo $this->Paginator->sort('manufac_phone_number'); ?></th>
                <th><?php echo $this->Paginator->sort('manufac_map_name'); ?></th>
                <th><?php echo $this->Paginator->sort('manufac_map_path'); ?></th>
                <th><?php echo $this->Paginator->sort('manufac_map_file_type'); ?></th>
                <th><?php echo $this->Paginator->sort('created_by'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified_by'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
	<?php foreach ($manufacturers as $manufacturer): ?>
            <tr>
                
                <th><?php echo $this->Form->checkbox('Manufacturer.id.'. $manufacturer['Manufacturer']['id'],array('value'=> $manufacturer['Manufacturer']['id'])); ?></th>
<!--                <th><?php echo $this->Paginator->sort('id'); ?></th>-->
                <td><?php echo h($manufacturer['Manufacturer']['id']); ?>&nbsp;</td>
                <td><?php echo h($manufacturer['Manufacturer']['manufac_name_th']); ?>&nbsp;</td>
                <td><?php echo h($manufacturer['Manufacturer']['manufac_name_eng']); ?>&nbsp;</td>
                <td><?php echo h($manufacturer['Manufacturer']['manufac_tax']); ?>&nbsp;</td>
                <td><?php echo h($manufacturer['Manufacturer']['manufac_contact_address']); ?>&nbsp;</td>
                <td><?php echo h($manufacturer['Manufacturer']['manufac_phone_number']); ?>&nbsp;</td>
                <td><?php echo h($manufacturer['Manufacturer']['manufac_map_name']); ?>&nbsp;</td>
                <td><?php echo h($manufacturer['Manufacturer']['manufac_map_path']); ?>&nbsp;</td>
                <td><?php echo h($manufacturer['Manufacturer']['manufac_map_file_type']); ?>&nbsp;</td>
                <td><?php echo h($manufacturer['Manufacturer']['created_by']); ?>&nbsp;</td>
                <td><?php echo h($manufacturer['Manufacturer']['created']); ?>&nbsp;</td>
                <td><?php echo h($manufacturer['Manufacturer']['modified_by']); ?>&nbsp;</td>
                <td><?php echo h($manufacturer['Manufacturer']['modified']); ?>&nbsp;</td>
                <td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $manufacturer['Manufacturer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $manufacturer['Manufacturer']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $manufacturer['Manufacturer']['id']), array(), __('Are you sure you want to delete # %s?', $manufacturer['Manufacturer']['id'])); ?>
                </td>
            </tr>
<?php endforeach; ?>
        </tbody>
    </table>
    <p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
    <div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
    </div>
</div>

<!--<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Manufacturer'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Manufacturer Contacts'), array('controller' => 'manufacturer_contacts', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Manufacturer Contact'), array('controller' => 'manufacturer_contacts', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
    </ul>
</div>-->

<div class="orders form">
<?php echo $this->Form->create('manu'); ?>
    <fieldset>
        <legend><?php echo __('search'); ?></legend>
	<?php
		echo $this->Form->input('manufac_name');
		
	?>
    </fieldset>

   <?php echo $this->Form->end('Submit'); ?>
</div>


<script type="text/javascript">
    $("#chkCheckAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>   