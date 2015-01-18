
<div class="suppliers form">
    <?php echo $this->Form->create('Supplier', array('enctype' => 'multipart/form-data', 'type' => 'post', array('action' => 'mutiselect'))); ?>
    <fieldset>
        <legend><?php echo __('Add Supplier'); ?></legend>
        <?php
//        echo $this->Form->input('supplier_id', array('type' => 'hidden','placeholder'=>'Auto genarate'));
        echo $this->Form->input('id', array('type' => 'text', 'readonly' => true));
        echo $this->Form->input('supplier_name_th');
        echo $this->Form->input('supplier_name_eng');
        echo $this->Form->input('supplier_tax_id', array('type' => 'text'));
        echo $this->Form->input('supplier_contact_address');
        echo $this->Form->input('supplier_phone_number');
        echo $this->Form->input('supplier_map_name', array('type' => 'hidden'));
        echo $this->Form->input('supplier_map_path', array('type' => 'hidden'));
        echo $this->Form->input('supplier_map_flie_type', array('type' => 'hidden'));
        echo $this->Form->input('Map', array('class' => 'btn btn-primary btn-form', 'name' => 'data[Supplier][map]', 'type' => 'file'));
        ?>  
        Remark: File type(JPG,PNG,GIF)
    </fieldset>
    <br>
    <?php echo $this->Form->button(__('Save'), array('class' => 'btn btn-primary btn-form', 'action' => '/suppliers/add')); ?>
</div>


