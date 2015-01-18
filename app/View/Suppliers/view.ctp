<div class="suppliers view">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('Supplier'); ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="alert alert-success">
                    <h3><?php echo __('Id'); ?></h3><?php echo h($supplier['Supplier']['id']);?><br>
                    <h3><?php echo __('Supplier Name Th'); ?>&nbsp;<?php echo h($supplier['Supplier']['supplier_name_th']); ?><br>
                    <?php echo __('Supplier Name Eng'); ?>&nbsp;<?php echo h($supplier['Supplier']['supplier_name_eng']); ?><br>
                    <?php echo __('Supplier Tax Id'); ?>&nbsp;<?php echo h($supplier['Supplier']['supplier_tax_id']); ?><br>
                    <?php echo __('Supplier Contact Address'); ?>&nbsp;<?php echo h($supplier['Supplier']['supplier_contact_address']); ?><br>
                    <?php echo __('Supplier Phone Number'); ?>&nbsp;<?php echo h($supplier['Supplier']['supplier_phone_number']); ?><br>
                </div>

            </div>
            <!-- .panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    
        
    <div class="supplierContacts index">
        <h2><?php echo __('Supplier Contacts'); ?></h2>
        <table class="table table-hover" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?php echo 'supplier_contact_name'; ?></th>
                    <th><?php echo 'supplier_contact_position'; ?></th>
                    <th><?php echo 'supplier_contact_email'; ?></th>
                    <th><?php echo 'supplier_contact_number'; ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($supplierContacts as $supplierContact): ?>
                    <tr>
                        <td><?php echo h($supplierContact['SupplierContact']['supplier_contact_name']); ?>&nbsp;</td>
                        <td><?php echo h($supplierContact['SupplierContact']['supplier_contact_position']); ?>&nbsp;</td>
                        <td><?php echo h($supplierContact['SupplierContact']['supplier_contact_email']); ?>&nbsp;</td>
                        <td><?php echo h($supplierContact['SupplierContact']['supplier_contact_number']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $supplier['Supplier']['id']), array('escape' => false, 'title' => __('Add'))); ?>	
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $supplierContact['SupplierContact']['supplier_id'], $supplierContact['SupplierContact']['id']), array('escape' => false, 'title' => __('Edit'))); ?>
                            <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'SupplierContacts', 'action' => 'delete', $supplierContact['SupplierContact']['id']), array('escape' => false, 'title' => __('Edit')), __('Are you sure you want to delete # %s?', $supplierContact['SupplierContact']['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
