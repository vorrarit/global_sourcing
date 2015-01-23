    
<div class="manufacturers form">
<?php echo $this->Form->create('Manufacturer', array('type' => 'post','enctype' => 'multipart/form-data')   ); ?>
    <fieldset>
        <legend><?php echo __('Add Manufacturer'); ?></legend>
        <!--        <label for="manufacturer ID">manufacturer ID</label>-->

        <!--<input type="text" id="manufacturer_id" spellcheck="false" placeholder="Auto generlate" readonly=true />-->
            <?php
                
                echo $this->Form->input('id', array('type' => 'text','readonly'=>true ,'label'=>'Manufacturer ID'));
		echo $this->Form->input('manufac_name_th',array('label'=> 'Manufacturer Name Th','required' => true));
		echo $this->Form->input('manufac_name_eng' ,array('label'=> 'Manufacturer Name Eng'));
		echo $this->Form->input('manufac_tax',array('label'=> 'Manufacturer Tax'));
		echo $this->Form->input('manufac_contact_address',array('label'=> 'Manufacturer Contact Address'));
		echo $this->Form->input('manufac_phone_number',array('label'=> 'Manufacturer Phone Number'));   
                echo $this->Form->input('manufac_map_name',array('type' => 'hidden'));
		echo $this->Form->input('manufac_map_path',array('type' => 'hidden'));
		echo $this->Form->input('manufac_map_file_type',array('type' => 'hidden')); 
                ?>
       
            <input type="file" name="data[Manufacturer][input]"/>
                <?php echo 'Remark : File type (jpg,png,gif)'; ?>
   
            
    </fieldset>
        <?php echo $this->Form->button('Save', array ('class' => 'btn btn-primary btn-form')); ?>
     <?php echo $this->Form->button('Reset',array('type' => 'reset','class'=>'btn btn-default btn-form')); ?>
    <a href="/manufacturers/index" button title="Cancel" class="btn btn-default">Cancel</a>
    <?php echo $this->Form->end(); ?>
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
        $('#person').append('<?//php echo $this->Form->input('manufac_contact_name');?>');
//		echo $this->Form->input('manufacturer_id', array ('type' => 'hidden'));
//		echo $this->Form->input('manufac_contact_name');
//		echo $this->Form->input('manufac_contact_position');
//		echo $this->Form->input('manufac_contact_email');
//		echo $this->Form->input('manufac_contact_number');

//        alert('Hello world');
    }

</script>-->
<script type="text/javascript">

function checkeng(evt) {
    var theEvent = evt || window.event;
     var obj=frm_member.user
     var str="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ" //กำหนดอักษรอังกฤษส่วนนี้ครับ
     var val=obj.value
     var valOK = true;
     
     for (i=0; i<val.length & valOK; i++){
           valOK = (str.indexOf(val.charAt(i))!= -1) 
     }
     
     if (!valOK) {
           alert("ภาษาอังกฤษเท่านั้น !!! ")
           obj.focus()
           return false
     } return true
} 
function checknum(evt) {
    var theEvent = evt || window.event;
     var obj=frm_member.user
     var str="0987654321" 
     var val=obj.value
     var valOK = true;
     
     for (i=0; i<val.length & valOK; i++){
           valOK = (str.indexOf(val.charAt(i))!= -1) 
     }
     
     if (!valOK) {
           alert("ตัวเลขเท่านั้น!!! ")
           obj.focus()
           return false
     } return true
} 

function isThaichar(str,obj,evt){
    var theEvent = evt || window.event;
	var orgi_text="ๅภถุึคตจขชๆไำพะัีรนยบลฃฟหกดเ้่าสวงผปแอิืทมใฝ๑๒๓๔ู฿๕๖๗๘๙๐ฎฑธํ๊ณฯญฐฅฤฆฏโฌ็๋ษศซฉฮฺ์ฒฬฦ";
	var str_length=str.length;
	var str_length_end=str_length-1;
	var isThai=true;
	var Char_At="";
	for(i=0;i<str_length;i++){
		Char_At=str.charAt(i);
		if(orgi_text.indexOf(Char_At)==-1){
			isThai=false;
		}   
	}
	if(str_length>=1){
		if(isThai==false){
			obj.value=str.substr(0,str_length_end);
		}
	}
	return isThai; // ถ้าเป็น true แสดงว่าเป็นภาษาไทยทั้งหมด
}
</script>