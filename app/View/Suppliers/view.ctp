<div class="suppliers view">
    <h2><?php echo __('Supplier'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($supplier['Supplier']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Supplier Name Th'); ?></dt>
        <dd>
            <?php echo h($supplier['Supplier']['supplier_name_th']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Supplier Name Eng'); ?></dt>
        <dd>
            <?php echo h($supplier['Supplier']['supplier_name_eng']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Supplier Tax Id'); ?></dt>
        <dd>
            <?php echo h($supplier['Supplier']['supplier_tax_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Supplier Contact Address'); ?></dt>
        <dd>
            <?php echo h($supplier['Supplier']['supplier_contact_address']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Supplier Phone Number'); ?></dt>
        <dd>
            <?php echo h($supplier['Supplier']['supplier_phone_number']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Supplier Map Name'); ?></dt>
        <dd>
            <?php echo h($supplier['Supplier']['supplier_map_name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Supplier Map Path'); ?></dt>
        <dd>
            <?php echo h($supplier['Supplier']['supplier_map_path']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Supplier Map Flie Type'); ?></dt>
        <dd>
            <?php echo h($supplier['Supplier']['supplier_map_flie_type']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created By'); ?></dt>
        <dd>
            <?php echo h($supplier['Supplier']['created_by']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($supplier['Supplier']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified By'); ?></dt>
        <dd>
            <?php echo h($supplier['Supplier']['modified_by']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($supplier['Supplier']['modified']); ?>
            &nbsp;
        </dd>
    </dl>

    <div class="related">
        <br>
        <h3><?php echo __('Related Supplier Contacts'); ?></h3>
        <?php if (!empty($supplier['SupplierContact'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php echo __('Id'); ?></th>
                    <th><?php echo __('Supplier Id'); ?></th>
                    <th><?php echo __('Supplier Contact Name'); ?></th>
                    <th><?php echo __('Supplier Contact Position'); ?></th>
                    <th><?php echo __('Supplier Contact Email'); ?></th>
                    <th><?php echo __('Supplier Contact Number'); ?></th>
                    <th><?php echo __('Created By'); ?></th>
                    <th><?php echo __('Created'); ?></th>
                    <th><?php echo __('Modified By'); ?></th>
                    <th><?php echo __('Modified'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php foreach ($supplier['SupplierContact'] as $supplierContact): ?>
                    <tr>
                        <td><?php echo $supplierContact['id']; ?></td>
                        <td><?php echo $supplierContact['supplier_id']; ?></td>
                        <td><?php echo $supplierContact['supplier_contact_name']; ?></td>
                        <td><?php echo $supplierContact['supplier_contact_position']; ?></td>
                        <td><?php echo $supplierContact['supplier_contact_email']; ?></td>
                        <td><?php echo $supplierContact['supplier_contact_number']; ?></td>
                        <td><?php echo $supplierContact['created_by']; ?></td>
                        <td><?php echo $supplierContact['created']; ?></td>
                        <td><?php echo $supplierContact['modified_by']; ?></td>
                        <td><?php echo $supplierContact['modified']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('View'), array('controller' => 'supplier_contacts', 'action' => 'view', $supplierContact['id'])); ?>
                            <?php echo $this->Html->link(__('Edit'), array('controller' => 'supplier_contacts', 'action' => 'edit', $supplierContact['id'])); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'supplier_contacts', 'action' => 'delete', $supplierContact['id']), array(), __('Are you sure you want to delete # %s?', $supplierContact['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

        <div class="actions">
            <ul>
                <li><?php echo $this->Html->link(__('New Supplier Contact'), array('controller' => 'suppliers', 'action' => 'edit', $supplierContact['supplier_id'])); ?></li>
            </ul>
        </div>
    </div>

</div>
<div class="actions">
        <h3><?php echo __('Actions'); ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('Edit Supplier'), array('action' => 'edit', $supplier['Supplier']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Supplier'), array('action' => 'delete', $supplier['Supplier']['id']), array(), __('Are you sure you want to delete # %s?', $supplier['Supplier']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Suppliers'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Supplier'), array('action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Supplier Contacts'), array('controller' => 'supplier_contacts', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Supplier Contact'), array('controller' => 'supplier_contacts', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Supplier Products'), array('controller' => 'supplier_products', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Supplier Product'), array('controller' => 'supplier_products', 'action' => 'add')); ?> </li>
        </ul>
    </div>
