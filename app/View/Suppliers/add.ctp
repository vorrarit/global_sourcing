
<div class="suppliers form">
    <?php echo $this->Form->create('Supplier', array('enctype' => 'multipart/form-data', 'type' => 'post', array('action' => 'mutiselect'))); ?>
    <fieldset>
        <legend><?php echo __('Add Supplier'); ?></legend>
        <?php
//        echo $this->Form->input('supplier_id', array('type' => 'hidden','placeholder'=>'Auto genarate'));
        echo $this->Form->input('id', array('type' => 'text', 'readonly' => true));
        echo $this->Form->input('supplier_name_th',array('required'=>true));
        echo $this->Form->input('supplier_name_eng',array('required'=>true));
        echo $this->Form->input('supplier_tax_id', array('type' => 'text','required'=>true)	);
        echo $this->Form->input('supplier_contact_address',array('required'=>true));
        echo $this->Form->input('supplier_phone_number',array('required'=>true));
        echo $this->Form->input('supplier_map_name', array('type' => 'hidden'));
        echo $this->Form->input('supplier_map_path', array('type' => 'hidden'));
        echo $this->Form->input('supplier_map_flie_type', array('type' => 'hidden'));
//        echo $this->Form->input('Map', array('name' => 'data[Supplier][map]', 'type' => 'file'));
        ?>  
        <input type="file", name="data['Supplier']['map']"/>
        Remark: File type (jpg,png,gif)
    </fieldset>
    <br>
    <?php echo $this->Form->button(__('Save'), array('class' => 'btn btn-primary btn-form', 'action' => '/suppliers/add')); ?>
    <?php echo $this->Form->button(__('Reset'), array('class' => 'btn btn-default', 'type' => 'reset'));?>
    <a href="/Suppliers/index" button title="Cancal" class="btn btn-default">Cancel</a>
    
</div>


