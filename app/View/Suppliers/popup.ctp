
<div class="suppliers form">
    <?php echo $this->Form->create('Supplier'); ?>
    <fieldset>
        <legend><?php echo __('suppliers'); ?></legend>
        <?php
        echo $this->Form->input('supplier_name_eng');
        ?>
    </fieldset>

    <?php echo $this->Form->end('Search'); ?>
</div>

<div class="suppliers index">
    <table cellpadding="0" cellspacing="0">
        <thead>

            <tr>
                <th><?php echo $this->Paginator->sort('Supplier_id'); ?></th>
                <th><?php echo $this->Paginator->sort('supplier_name_eng'); ?></th>

            </tr>
        </thead>
        <tbody>



            <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?php echo h($supplier['Supplier']['id']); ?>&nbsp;</td>
                    <td><?php echo h($supplier['Supplier']['supplier_name_eng']); ?>&nbsp;</td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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

