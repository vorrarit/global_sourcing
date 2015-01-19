<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo __('Search UserGroups'); ?></h1>

		<div class = 'usergroup search'>
     <?php echo $this->Form->create('UserGroup');?>
    <?php echo $this->Form->input('user_group_name',array('type'=>'text'));?>
    <?php echo $this->Form->button('search',array('class'=>'btn btn-default'));?>
	<?php echo $this->Form->button('reset',array('type'=>'reset','class'=>'btn btn-default'));?>
	<?php echo $this->Form->end(); ?>	
		</div>
	</div>
</div>

<div class="userGroups index">
<?php echo $this->Form->create('UserGroup',array('action'=>'multiSelect'))?>

	<h2><?php echo __('User Groups'); ?></h2>

	<div class="btn-group pull-right" role="group" aria-label="...">
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-pencil"></span>',array('onclick'=>"window.location.href='../UserGroups/add'",'type'=>'button','escape'=>false, 'title'=>__('Add'), 'class'=>'btn btn-default')); ?>
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span>',array('type'=>'button', 'escape'=>false, 'class'=>'btn btn-default')); ?>   
	</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th width="50"><?php echo $this->Form->checkbox('check_all',array('id'=> 'chkCheckAll')); ?></th>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('user_group_name'); ?></th>
				<th class="actions" width="50"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
	<?php foreach ($userGroups as $userGroup): ?>
			<tr>
				<td><?php echo $this->Form->checkbox('UserGroup.id.'. $userGroup['UserGroup']['id'],array('value'=> $userGroup['UserGroup']['id'])); ?></td>
				<td><?php echo h($userGroup['UserGroup']['id']); ?>&nbsp;</td>
				<td><?php echo h($userGroup['UserGroup']['user_group_name']); ?>&nbsp;</td>
				<td class="actions">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $userGroup['UserGroup']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
			<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $userGroup['UserGroup']['id']), array('escape'=>false, 'title'=>__('Delete')), __('Are you sure you want to delete # %s?', $userGroup['UserGroup']['id'])); ?>
				</td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo $this->Form->end(); ?>		
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
		<li><?php echo $this->Html->link(__('New User Group'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<script type="text/javascript">
	$("#chkCheckAll").click(function () {
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
</script>    