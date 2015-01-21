<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo __('Search UserGroups'); ?></h1>

		<div class = 'usergroup search'>
     <?php echo $this->Form->create('UserGroup');?>
    <?php echo $this->Form->input('user_group_name',array('type'=>'text'));?>
        <?php echo $this->Form->button('<span class="glyphicon glyphicon-search"> Search',array('class'=>'btn btn-primary btn-form','label'=>'Search'));?>
		<?php echo $this->Form->button(__('Reset'),array('id'=>'btn_reset','class'=>'btn btn-default btn-form'));?>
	
<?php echo $this->Form->end(); ?>	
		</div>
	</div>
</div>

<div class="userGroups index">
<?php echo $this->Form->create('UserGroup',array('action'=>'multiSelect'))?>

	<h2><?php echo __('User Groups'); ?></h2>

	<div class="btn-group pull-right" role="group" aria-label="...">
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-plus"></span>',array('onclick'=>"window.location.href='../UserGroups/add'",'type'=>'button','escape'=>false, 'title'=>__('Add'), 'class'=>'btn btn-default')); ?>
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span>',array('type'=>'submit', 'escape'=>false, 'class'=>'btn btn-default')); ?>   
	</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th width="50"><?php echo $this->Form->checkbox('check_all',array('hiddenField'=>false,'id'=> 'chkCheckAll')); ?></th>
                <th width="50"><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('user_group_name'); ?></th>
				<th class="actions" width="50"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
	<?php foreach ($userGroups as $userGroup): ?>
			<tr>
				<td><?php echo $this->Form->checkbox('UserGroup.id.'. $userGroup['UserGroup']['id'],array('hiddenField'=>false,'value'=> $userGroup['UserGroup']['id'])); ?></td>
				<td><?php echo h($userGroup['UserGroup']['id']); ?>&nbsp;</td>
				<td><?php echo h($userGroup['UserGroup']['user_group_name']); ?>&nbsp;</td>
				<td class="actions">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $userGroup['UserGroup']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
			<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $userGroup['UserGroup']['id']), array('inline'=>false,'escape'=>false, 'title'=>__('Delete')), __('Are you sure you want to delete # %s?', $userGroup['UserGroup']['id'])); ?>

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
	$("#btn_reset").click(function () {		

		$("#UserGroupUserGroupName").val('');
		
	});
</script>    