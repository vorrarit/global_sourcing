    
<div class="manufacturers form">
<?php echo $this->Form->create('Manufacturer', array('type' => 'post','enctype' => 'multipart/form-data')   ); ?>
    <fieldset>
        <legend><?php echo __('Add Manufacturer'); ?></legend>
<!--        <label for="manufacturer ID">manufacturer ID</label>-->

        <!--<input type="text" id="manufacturer_id" spellcheck="false" placeholder="Auto generlate" readonly=true />-->
            <?php
                
                echo $this->Form->input('id', array('type' => 'text','readonly'=>true));
		echo $this->Form->input('manufac_name_th');
		echo $this->Form->input('manufac_name_eng');
		echo $this->Form->input('manufac_tax');
		echo $this->Form->input('manufac_contact_address');
		echo $this->Form->input('manufac_phone_number');   
                echo $this->Form->input('map',array ('name'=>'data[Manufac][map]','type'=>'file'));
                echo ('Remark : File type (jpg,png,gif)');
                ?> 

    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

<!--
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Manufacturers'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Manufacturer Contacts'), array('controller' => 'manufacturer_contacts', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Manufacturer Contact'), array('controller' => 'manufacturer_contacts', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
    </ul>
</div>-->
<!--<script type = "text/javascript">
    function addmore_click() {
        $('#person').append('<?php echo $this->Form->input('manufac_contact_name');?>');
//		echo $this->Form->input('manufacturer_id', array ('type' => 'hidden'));
//		echo $this->Form->input('manufac_contact_name');
//		echo $this->Form->input('manufac_contact_position');
//		echo $this->Form->input('manufac_contact_email');
//		echo $this->Form->input('manufac_contact_number');

//        alert('Hello world');
    }

</script>-->
