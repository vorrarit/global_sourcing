<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo __('Search Users'); ?></h1>
		<div class = 'users search'>
     <?php echo $this->Form->create('User');?>
   <?php  echo $this->Form->input('user_group_id',array('options'=>$drop,'empty'=>'All'));?>
			<!--<?php  echo $this->Form->select('id',$drop,array('style'=>'color:#00f;', 'empty'=> false,));?>-->
    <?php echo $this->Form->input('user_name');?>
    <?php echo $this->Form->input('username');?>
    <?php echo $this->Form->button(__('Search'),array('class'=>'btn btn-primary btn-form'));?>
	<?php echo $this->Form->button(__('Reset'),array('type'=>'reset','class'=>'btn btn-default btn-form'));?>
		</div>
	</div>
</div>

<div class="users index">
<?php echo $this->Form->create('User',array('action'=>'multiSelect'))?>

    <h2><?php echo __('Users'); ?></h2>


	<div class="btn-group pull-right" role="group" aria-label="...">
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-pencil"></span>',array('onclick'=>"window.location.href='../users/add'",'type'=>'button','escape'=>false, 'title'=>__('Add'), 'class'=>'btn btn-default')); ?>
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span>',array('type'=>'submit', 'escape'=>false, 'class'=>'btn btn-default')); ?>   
	</div>

    <table class="table table-hover">
        <thead>      
            <tr>
				<th width="50"><?php echo $this->Form->checkbox('check_all',array('id'=> 'chkCheckAll')); ?></th>
                <th width="50"><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('user_group_id'); ?></th>
                <th><?php echo $this->Paginator->sort('user_name'); ?></th>
                <th><?php echo $this->Paginator->sort('username'); ?></th>
                <th class="actions" width="50"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
	<?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $this->Form->checkbox('User.id.'. $user['User']['id'],array('value'=> $user['User']['id'])); ?></td>
                <td><?php echo h($user['User']['id']); ?>&nbsp;</td>

                <td>
			<?php echo $this->Html->link($user['UserGroup']['user_group_name'], array('controller' => 'user_groups', 'action' => 'view', $user['UserGroup']['id'])); ?>
                </td>
                <td><?php echo h($user['User']['user_name']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                <td class="actions">

			<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $user['User']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
			<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $user['User']['id']), array('escape'=>false, 'title'=>__('Delete')), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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