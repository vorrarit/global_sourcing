<div class="supplierTypes form">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo __('Search Supplier Types'); ?></h1>
        </div>
    </div>
<?php echo $this->Form->create('SupplierTypes',array('action'=>'index')); ?>
    <fieldset>

	<?php echo $this->Form->input('text_search'); ?>

    </fieldset>
    <?php echo $this->Form->button(__('Search'),array('type'=>'submit','class'=>'btn btn-primary btn-form')); ?>
    <?php echo $this->Form->button(__('Clear'),array('type'=>'reset','class'=>'btn btn-primary btn-form')); ?>
    <?php echo $this->Form->end(); ?>
</div>
<div class="supplierTypes index">

         <?php echo $this->Form->create('SupplierTypes',array('action'=>'multiSelect'))?>

    <h2><?php echo __('Supplier Types'); ?></h2>

    <div class="btn-group pull-right" role="group" aria-label="...">
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-pencil"></span>', array('onclick'=>"window.location.href='../SupplierTypes/add'",'type'=>'button','escape'=>false, 'title'=>__('Add'),'class'=>'btn btn-default')); ?>
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span>',array('type'=>'submit','escape'=>false, 'class'=>'btn btn-default')); ?>   
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th width="70"><?php echo $this->Form->checkbox('check_all',array('id'=> 'chkCheckAll')); ?></th>
                <th width="300"><?php echo $this->Paginator->sort('id','Supplier Type ID'); ?></th>
                <th width="300"><?php echo $this->Paginator->sort('supplier_type_name'); ?></th>
                <th class="actions" width="100"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
	<?php foreach ($supplierTypes as $supplierType): ?>
            <tr>
                <td><?php echo $this->Form->checkbox('SupplierType.id.'. $supplierType['SupplierType']['id'],array('value'=> $supplierType['SupplierType']['id'])); ?></td>
                <td><?php echo h($supplierType['SupplierType']['id']); ?>&nbsp;</td>
                <td><?php echo h($supplierType['SupplierType']['supplier_type_name']); ?>&nbsp;</td>
                <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $supplierType['SupplierType']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
			<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $supplierType['SupplierType']['id']), array('escape'=>false, 'title'=>__('Delete')), __('Are you sure you want to delete # %s?', $supplierType['SupplierType']['id'])); ?>

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
    <div class="pagination">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array('tag' => 'li'), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('tag'=>'li', 'separator' => '', 'currentTag'=>'a', 'currentClass'=>'active'));
		echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li'), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'next disabled'));
	?>
    </div>
    <script type="text/javascript">
        $("#chkCheckAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>