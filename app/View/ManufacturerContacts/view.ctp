<div class="manufacturerContacts view">
<h2><?php echo __('Manufacturer Contact'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($manufacturerContact['ManufacturerContact']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufacturer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($manufacturerContact['Manufacturer']['id'], array('controller' => 'manufacturers', 'action' => 'view', $manufacturerContact['Manufacturer']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufac Contact Name'); ?></dt>
		<dd>
			<?php echo h($manufacturerContact['ManufacturerContact']['manufac_contact_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufac Contact Position'); ?></dt>
		<dd>
			<?php echo h($manufacturerContact['ManufacturerContact']['manufac_contact_position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufac Contact Email'); ?></dt>
		<dd>
			<?php echo h($manufacturerContact['ManufacturerContact']['manufac_contact_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufac Contact Number'); ?></dt>
		<dd>
			<?php echo h($manufacturerContact['ManufacturerContact']['manufac_contact_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($manufacturerContact['ManufacturerContact']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($manufacturerContact['ManufacturerContact']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($manufacturerContact['ManufacturerContact']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($manufacturerContact['ManufacturerContact']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Manufacturer Contact'), array('action' => 'edit', $manufacturerContact['ManufacturerContact']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Manufacturer Contact'), array('action' => 'delete', $manufacturerContact['ManufacturerContact']['id']), array(), __('Are you sure you want to delete # %s?', $manufacturerContact['ManufacturerContact']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Manufacturer Contacts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer Contact'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manufacturers'), array('controller' => 'manufacturers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer'), array('controller' => 'manufacturers', 'action' => 'add')); ?> </li>
	</ul>
</div>
