<div class="products view">
    <h2><?php echo __('Product'); ?></h2>
    

        <?php echo	$this->Html->image('image1.jpg', array('width'=>'300px','height'=>'300px'));?>&nbsp;
       <dl> <dt><?php echo __('Id'); ?></dt>
        <dd>			<?php echo h($product['Product']['id']); ?>
            &nbsp;		</dd>		
        <dt><?php echo __('Product Name'); ?></dt>
        <dd>			<?php echo h($product['Product']['product_name']); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Division'); ?></dt>
        <dd>			<?php echo $this->Html->link($product['Division']['division_name'], array('controller' => 'divisions', 'action' => 'view', $product['Division']['id'])); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Department'); ?></dt>
        <dd>			<?php echo $this->Html->link($product['Department']['department_name'], array('controller' => 'departments', 'action' => 'view', $product['Department']['id'])); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Klass'); ?></dt>
        <dd>			<?php echo $this->Html->link($product['Klass']['klass_name'], array('controller' => 'klasses', 'action' => 'view', $product['Klass']['id'])); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Sub Klass'); ?></dt>
        <dd>			<?php echo $this->Html->link($product['SubKlass']['sub_klass_name'], array('controller' => 'sub_klasses', 'action' => 'view', $product['SubKlass']['id'])); ?>
            &nbsp;
        <dt><?php echo __('Product Barcode No'); ?></dt>
        <dd>			<?php echo h($product['Product']['product_barcode_no']); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Product Sku No'); ?></dt>
        <dd>			<?php echo h($product['Product']['product_sku_no']); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Product Description Th'); ?></dt>
        <dd>			<?php echo h($product['Product']['product_description_th']); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Product Description Eng'); ?></dt>
        <dd>			<?php echo h($product['Product']['product_description_eng']); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Product Short Description Th'); ?></dt>
        <dd>			<?php echo h($product['Product']['product_short_description_th']); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Product Short Description Eng'); ?></dt>
        <dd>			<?php echo h($product['Product']['product_short_description_eng']); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Product Specification'); ?></dt>
        <dd>			<?php echo h($product['Product']['product_specification']); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Retail Price'); ?></dt>
        <dd>			<?php echo h($product['Product']['retail_price']); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Currency'); ?></dt>
        <dd>			<?php echo $this->Html->link($product['Currency']['currency_name'], array('controller' => 'currencies', 'action' => 'view', $product['Currency']['id'])); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Unit'); ?></dt>
        <dd>			<?php echo $this->Html->link($product['Unit']['unit_name'], array('controller' => 'units', 'action' => 'view', $product['Unit']['id'])); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Manufacturer'); ?></dt>
        <dd>			<?php echo $this->Html->link($product['Manufacturer']['manufac_name_eng'], array('controller' => 'manufacturers', 'action' => 'view', $product['Manufacturer']['id'])); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Created By'); ?></dt>
        <dd>			<?php echo h($product['Product']['created_by']); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>			<?php echo h($product['Product']['created']); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Modified By'); ?></dt>
        <dd>			<?php echo h($product['Product']['modified_by']); ?>
            &nbsp;		</dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>			<?php echo h($product['Product']['modified']); ?>
            &nbsp;		</dd>		
        <dt><?php echo __('Product Status'); ?></dt>
        <dd>			<?php echo h($product['Product']['product_status']); ?>
            &nbsp;		</dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product['Product']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product['Product']['id']), array(), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Currencies'), array('controller' => 'currencies', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Currency'), array('controller' => 'currencies', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Manufacturers'), array('controller' => 'manufacturers', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Manufacturer'), array('controller' => 'manufacturers', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Klasses'), array('controller' => 'klasses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Klass'), array('controller' => 'klasses', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Sub Klasses'), array('controller' => 'sub_klasses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Sub Klass'), array('controller' => 'sub_klasses', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List File Documents'), array('controller' => 'file_documents', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New File Document'), array('controller' => 'file_documents', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('Related File Documents'); ?></h3>
	<?php if (!empty($product['FileDocument'])): ?>
    <table cellpadding = "0" cellspacing = "0">
        <tr>
            <th><?php echo __('Id'); ?></th>
            <th><?php echo __('File Doc Name'); ?></th>
            <th><?php echo __('File Doc Path'); ?></th>
            <th><?php echo __('File Doc File Type'); ?></th>
            <th><?php echo __('Created By'); ?></th>
            <th><?php echo __('Created'); ?></th>
            <th><?php echo __('Modified By'); ?></th>
            <th><?php echo __('Modified'); ?></th>
            <th><?php echo __('Product Id'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
	<?php foreach ($product['FileDocument'] as $fileDocument): ?>
        <tr>
            <td><?php echo $fileDocument['id']; ?></td>
            <td><?php echo $fileDocument['file_doc_name']; ?></td>
            <td><?php echo $fileDocument['file_doc_path']; ?></td>
            <td><?php echo $fileDocument['file_doc_file_type']; ?></td>
            <td><?php echo $fileDocument['created_by']; ?></td>
            <td><?php echo $fileDocument['created']; ?></td>
            <td><?php echo $fileDocument['modified_by']; ?></td>
            <td><?php echo $fileDocument['modified']; ?></td>
            <td><?php echo $fileDocument['product_id']; ?></td>
            <td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'file_documents', 'action' => 'view', $fileDocument['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'file_documents', 'action' => 'edit', $fileDocument['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'file_documents', 'action' => 'delete', $fileDocument['id']), array(), __('Are you sure you want to delete # %s?', $fileDocument['id'])); ?>
            </td>
        </tr>
	<?php endforeach; ?>
    </table>
<?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New File Document'), array('controller' => 'file_documents', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
<div class="related">
    <h3><?php echo __('Related Photos'); ?></h3>
	<?php if (!empty($product['Photo'])): ?>
    <table cellpadding = "0" cellspacing = "0">
        <tr>
            <th><?php echo __('Id'); ?></th>
            <th><?php echo __('Photo Name'); ?></th>
            <th><?php echo __('Photo Path'); ?></th>
            <th><?php echo __('Photo File Type'); ?></th>
            <th><?php echo __('Created By'); ?></th>
            <th><?php echo __('Created'); ?></th>
            <th><?php echo __('Modified By'); ?></th>
            <th><?php echo __('Modified'); ?></th>
            <th><?php echo __('Product Id'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
	<?php foreach ($product['Photo'] as $photo): ?>
        <tr>
            <td><?php echo $photo['id']; ?></td>
            <td><?php echo $photo['photo_name']; ?></td>
            <td><?php echo $photo['photo_path']; ?></td>
            <td><?php echo $photo['photo_file_type']; ?></td>
            <td><?php echo $photo['created_by']; ?></td>
            <td><?php echo $photo['created']; ?></td>
            <td><?php echo $photo['modified_by']; ?></td>
            <td><?php echo $photo['modified']; ?></td>
            <td><?php echo $photo['product_id']; ?></td>
            <td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'photos', 'action' => 'view', $photo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'photos', 'action' => 'edit', $photo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'photos', 'action' => 'delete', $photo['id']), array(), __('Are you sure you want to delete # %s?', $photo['id'])); ?>
            </td>
        </tr>
	<?php endforeach; ?>
    </table>
<?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
<div class="related">
    <h3><?php echo __('Related Videos'); ?></h3>
	<?php if (!empty($product['Video'])): ?>
    <table cellpadding = "0" cellspacing = "0">
        <tr>
            <th><?php echo __('Id'); ?></th>
            <th><?php echo __('Video Name'); ?></th>
            <th><?php echo __('Video Path'); ?></th>
            <th><?php echo __('Video File Type'); ?></th>
            <th><?php echo __('Created By'); ?></th>
            <th><?php echo __('Created'); ?></th>
            <th><?php echo __('Modifiled By'); ?></th>
            <th><?php echo __('Modifiled'); ?></th>
            <th><?php echo __('Product Id'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
	<?php foreach ($product['Video'] as $video): ?>
        <tr>
            <td><?php echo $video['id']; ?></td>
            <td><?php echo $video['video_name']; ?></td>
            <td><?php echo $video['video_path']; ?></td>
            <td><?php echo $video['video_file_type']; ?></td>
            <td><?php echo $video['created_by']; ?></td>
            <td><?php echo $video['created']; ?></td>
            <td><?php echo $video['modifiled_by']; ?></td>
            <td><?php echo $video['modifiled']; ?></td>
            <td><?php echo $video['product_id']; ?></td>
            <td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'videos', 'action' => 'view', $video['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'videos', 'action' => 'edit', $video['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'videos', 'action' => 'delete', $video['id']), array(), __('Are you sure you want to delete # %s?', $video['id'])); ?>
            </td>
        </tr>
	<?php endforeach; ?>
    </table>
<?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>