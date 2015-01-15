<div class="userGroups view">
<h2><?php echo __('User Group'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userGroup['UserGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Group Name'); ?></dt>
		<dd>
			<?php echo h($userGroup['UserGroup']['user_group_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($userGroup['UserGroup']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($userGroup['UserGroup']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($userGroup['UserGroup']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($userGroup['UserGroup']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Group'), array('action' => 'edit', $userGroup['UserGroup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Group'), array('action' => 'delete', $userGroup['UserGroup']['id']), array(), __('Are you sure you want to delete # %s?', $userGroup['UserGroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($userGroup['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Group Id'); ?></th>
		<th><?php echo __('User Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userGroup['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['user_group_id']; ?></td>
			<td><?php echo $user['user_name']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['created_by']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified_by']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
