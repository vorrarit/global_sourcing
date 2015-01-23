
<div class="search">

    <h2><div class="col-lg-12">
            <h1 class="page-header"><?php echo __('Search Manufacturers'); ?></h1>
        </div>
        &nbsp;
        <?php echo $this->Form->create('search'); ?>
        <div class="col-lg-12">
            <div class="col-lg-8">
	<?php echo $this->Form->input('manufacturer_name', array('label'=>false));?>
            </div>
            <div class="col-lg-2">
        <?php echo $this->Form->button('<span class="glyphicon glyphicon-search"></span> Search',array('class'=>'btn btn-primary btn-form')); ?>
            </div>
            <div class="col-lg-2">
        <?php echo $this->Form->button('Clear',array('onclick' => 'clearClick()','class'=>'btn btn-default btn-form')); ?>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
</div>
&nbsp;

<div class="manufacturer form">

<?php echo $this->Form->create('Manufacturer',array('action'=>'multiSelect'))?>

    <h3><?php echo __('Manufacturers');?></h3>


    <div class="btn-group pull-right" role="group" aria-label="...">
        <a href="/manufacturers/add" button title="Add" class="btn btn-default" align = "right"><span class="glyphicon glyphicon-plus"></span></a>
            <?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span>',array('type'=>'submit', 'escape'=>false, 'class'=>'btn btn-default')); ?>
    </div>


    <table class ="table table-hover">

        <thead>
            <tr>
                <th><?php echo $this->Form->checkbox('check_all', array('id' => 'chkCheckAll')); ?></th>
                <th><?php echo $this->Paginator->sort('id','Manufacturer ID'); ?></th>
                <th><?php echo $this->Paginator->sort('manufac_name_th','Manufacturer Name Thai'); ?></th>
                <th><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
	<?php foreach ($manufacturers as $manufacturer): ?>
            <tr>

                <th><?php echo $this->Form->checkbox('Manufacturer.id.'. $manufacturer['Manufacturer']['id'],array('value'=> $manufacturer['Manufacturer']['id'])); ?></th>
        <!--                <th><?php echo $this->Paginator->sort('id'); ?></th>-->
                <td><?php echo h($manufacturer['Manufacturer']['id']); ?>&nbsp;</td>
                <td><?php echo h($manufacturer['Manufacturer']['manufac_name_th']); ?>&nbsp;</td>


                <td class="actions">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $manufacturer['Manufacturer']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
			<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $manufacturer['Manufacturer']['id']), array('inline' => FALSE ,'escape'=>false, 'title'=>__('Delete')), __('Are you sure you want to delete # %s?', $manufacturer['Manufacturer']['id'])); ?>
                </td>
            </tr>
<?php endforeach; ?>

        </tbody>
    </table>
        <?php echo $this->Form->end();?>
            <?php echo $this->fetch('postLink'); ?>
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



<script type="text/javascript">
    $("#chkCheckAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    function clearClick()
    {
        $('#searchManufacturerName').val('');
        $('#searchManufacName').val('');
        $('#searchIndexForm').submit();
    }


</script>