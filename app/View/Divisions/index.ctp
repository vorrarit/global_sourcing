<div class="divisions form">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo __('Search Divisions'); ?></h1>
        </div>
    </div>
    &nbsp;
<?php echo $this->Form->create('Division',array('action'=>'index')); ?>
    <div class="col-lg-12">
        <div class="col-lg-8">
            <fieldset>
	<?php echo $this->Form->input('text_search', array('label'=>false)); ?>
            </fieldset>
        </div>
        <div class="col-lg-2">
            <button type="submit" class="btn btn-primary col-lg-12"><span class="glyphicon glyphicon-search"></span>&nbsp;Search</button>
        </div>
        <div class="col-lg-2">   
            <?php echo $this->Form->button(__('Clear'),array('onclick'=>"window.location.href='../Divisions/index'",'type'=>'button','class'=>'btn btn-default btn-form')); ?>    
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
&nbsp;
<div class="divisions index">

     <?php echo $this->Form->create('Division',array('action'=>'multiSelect'))?>

    <div class="btn-group pull-right" role="group" aria-label="...">
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-plus"></span>', array('onclick'=>"window.location.href='../Divisions/add'",'type'=>'button','escape'=>false, 'title'=>__('Add'),'class'=>'btn btn-default')); ?>
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span>',array('type'=>'submit','escape'=>false, 'class'=>'btn btn-default')); ?>   
    </div>

    <h2><?php echo __('Divisions'); ?></h2>


    <table class="table table-hover">
        <thead>
            <tr>
                <th width="70"><?php echo $this->Form->checkbox('check_all',array('id'=> 'chkCheckAll')); ?></th>
                <th><?php echo $this->Paginator->sort('id','Division ID'); ?></th>
                <th><?php echo $this->Paginator->sort('division_name'); ?></th>
                <th class="actions" width="100"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody> 
	<?php foreach ($divisions as $division): ?>
            <tr>
                <td><?php echo $this->Form->checkbox('Division.id.'. $division['Division']['id'],array('value'=> $division['Division']['id'])); ?></td>
                <td><?php echo h($division['Division']['id']); ?>&nbsp;</td>
                <td><?php echo h($division['Division']['division_name']); ?>&nbsp;</td>         
                <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $division['Division']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
			<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $division['Division']['id']), array('inline'=>false,'escape'=>false, 'title'=>__('Delete')), __('Are you sure you want to delete # %s?', $division['Division']['id'])); ?>

                </td>
            </tr>
<?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->Form->end(); ?>
    <?php echo $this->fetch('postLink'); ?>
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
</div>
<script type="text/javascript">
    $("#chkCheckAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
