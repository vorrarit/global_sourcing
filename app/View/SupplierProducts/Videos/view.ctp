<div class="videos view">
<h2><?php echo __('Video'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($video['Video']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video Name'); ?></dt>
		<dd>
			<?php echo h($video['Video']['video_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video Path'); ?></dt>
		<dd>
			<?php echo h($video['Video']['video_path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video File Type'); ?></dt>
		<dd>
			<?php echo h($video['Video']['video_file_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($video['Video']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($video['Video']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifiled By'); ?></dt>
		<dd>
			<?php echo h($video['Video']['modifiled_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifiled'); ?></dt>
		<dd>
			<?php echo h($video['Video']['modifiled']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($video['Product']['id'], array('controller' => 'products', 'action' => 'view', $video['Product']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Video'), array('action' => 'edit', $video['Video']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Video'), array('action' => 'delete', $video['Video']['id']), array(), __('Are you sure you want to delete # %s?', $video['Video']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
