<div class="orders form">
    <h2><?php echo __('Manufacturers'); ?></h2>

        <?php echo $this->Form->create('search'); ?>
	<?php echo $this->Form->input('manufac_name');?>
        <?php echo $this->Form->end('search'); ?>

        <?php echo $this->Form->button('New Manufacturer',array('action' => 'add')); ?>

    <?php echo $this->Form->button('clear',array('onclick'=>'clearClick()')); ?>
    
		  
	

    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Form->checkbox('check_all', array('id' => 'chkCheckAll')); ?></th>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('manufac_name_th'); ?></th>
                <th><?php echo $this->Paginator->sort('manufac_name_eng'); ?></th>
                <th><?php echo $this->Paginator->sort('manufac_tax'); ?></th>
                <th><?php echo $this->Paginator->sort('manufac_phone_number'); ?></th>

                <?php echo $this->Form->create('Manufacturer',array('action'=>'multiSelect'))?>
                <th class="actions"><th><button title="Add" class="btn btn-default" type="submit"><span class="glyphicon glyphicon-pencil"></span></button>
                
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></button></th>
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
                <td><?php echo h($manufacturer['Manufacturer']['manufac_phone_number']); ?>&nbsp;</td>
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

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Manufacturer'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Manufacturer Contacts'), array('controller' => 'manufacturer_contacts', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Manufacturer Contact'), array('controller' => 'manufacturer_contacts', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
    </ul>
</div>



<script type="text/javascript">
    $("#chkCheckAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    function clearClick()
    {
        $('#searchManufacName').val('');
        $('#searchIndexForm').submit();
    }
</script>   

