<div class="products form">
    <div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo __('Add Product'); ?></h1>
	</div>
    </div>
<?php echo $this->Form->create('Product',array('type'=>'post')); ?>
    <fieldset>
	<?php
		echo $this->Form->input('id',array('type'=>'text','readonly'=> true));
		echo $this->Form->input('product_name',array('type'=>'hidden'));
		echo $this->Form->input('division_id',array(
                    'empty'=>'Please Select',
                    'onchange' => 'division_Changed()'
                ));
		echo $this->Form->input('department_id', array(
                    'empty'=>'Please Select',
                    'onchange'=>'deparment_Changed()'));
                echo $this->Form->input('klass_id', array(
                    'empty'=>'Please Select',
                    'onchange'=>'klass_Changed()'));
		echo $this->Form->input('sub_klass_id',array(
                    'empty'=>'Please Select',
                    ));
		echo $this->Form->input('product_barcode_no');
                echo $this->Form->input('copy to sku no',array('type'=>'checkbox' ,'id'=>'copyBarcode','onchange'=>'tickCopyBarcode()'));
		echo $this->Form->input('product_sku_no');
		echo $this->Form->input('product_description_th');
                echo $this->Form->input('copy to short description th',array('type'=>'checkbox','id'=>'copyShortTh','onchange'=>'tickCopyShortTh()'));
		echo $this->Form->input('product_description_eng');
                echo $this->Form->input('copy to short description eng',array('type'=>'checkbox' ,'id'=>'copyShortEng','onchange'=>'tickCopyShortEng()'));
		echo $this->Form->input('product_short_description_th');
		echo $this->Form->input('product_short_description_eng');
		echo $this->Form->input('product_specification');
		echo $this->Form->input('retail_price');
		echo $this->Form->input('currency_id');
		echo $this->Form->input('unit_id');
		echo $this->Form->input('manufacturer_id');
		echo $this->Form->input('created_by',array('type'=>'hidden'));
		echo $this->Form->input('modified_by',array('type'=>'hidden'));
		echo $this->Form->input('product_status',array('type'=>'hidden','id'=>'prst'));
                echo $this->Form->button('save draft',array('onclick'=>'saveDraftClick()'));
                echo $this->Form->button('next >>');
                echo $this->Form->button(('cancel'), array('controller' => 'products', 'action' => 'index'));
                ?>
    </fieldset>
<?php  echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary')); ?>
<?php  echo $this->Form->end(); ?>
</div>
<!--<div class="actions">
    <h3><?php // echo __('Actions'); ?></h3>
    <ul>

        <li><?php // echo $this->Html->link(__('List Products'), array('action' => 'index')); ?></li>
        <li><?php // echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Currencies'), array('controller' => 'currencies', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Currency'), array('controller' => 'currencies', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Manufacturers'), array('controller' => 'manufacturers', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Manufacturer'), array('controller' => 'manufacturers', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Klasses'), array('controller' => 'klasses', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Klass'), array('controller' => 'klasses', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Sub Klasses'), array('controller' => 'sub_klasses', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Sub Klass'), array('controller' => 'sub_klasses', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List File Documents'), array('controller' => 'file_documents', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New File Document'), array('controller' => 'file_documents', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
        <li><?php // echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
        <li><?php // echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
    </ul>
</div>-->

<script type="text/javascript">

    function division_Changed() { 
        var dvID = document.getElementById('ProductDivisionId').value;
        
        $.post('../Products/loadDepartments/'+dvID+'.json',function(data){
            var ddlDepartments = document.forms[0].elements['data[Product][department_id]'];
            var ddlKlasses = document.forms[0].elements['data[Product][klass_id]'];
            var ddlSubKlasses = document.forms[0].elements['data[Product][sub_klass_id]'];
            
            ddlDepartments.selectedIndex = 0;
            ddlDepartments.options.length = 1;
            ddlKlasses.options.length = 1;
            ddlSubKlasses.options.length =1;
            
            ddlDepartments.options.length = data.result.Departments.length + 1;
            for (i=0; i<data.result.Departments.length; i++) {
                ddlDepartments.options[i+1].text = data.result.Departments[i].Department.department_name;
                ddlDepartments.options[i+1].value = data.result.Departments[i].Department.id;
            }
        });
    }
    
    function deparment_Changed() {
        var deptID = document.getElementById('ProductDepartmentId').value;
        
        $.post('../Products/loadKlasses/'+deptID+'.json',function(data){
            var ddlKlasses = document.forms[0].elements['data[Product][klass_id]'];
            ddlKlasses.options.length = data.result.Klasses.length + 1;
            
            for (i=0; i<data.result.Klasses.length; i++) {
                ddlKlasses.options[i+1].text = data.result.Klasses[i].Klass.klass_name;
                ddlKlasses.options[i+1].value = data.result.Klasses[i].Klass.id;
            }
        });
    }
    function klass_Changed(){
        var klsID = document.getElementById('ProductKlassId').value;
        
        $.post('../Products/loadSubKlass/'+klsID+'.json',function(data){
            var ddlSubKlasses = document.forms[0].elements['data[Product][sub_klass_id]'];
            ddlSubKlasses.options.length = data.result.SubKlasses.length + 1;
            for (i=0; i<data.result.SubKlasses.length; i++) {
                ddlSubKlasses.options[i+1].text = data.result.SubKlasses[i].SubKlass.sub_klass_name;
                ddlSubKlasses.options[i+1].value = data.result.SubKlasses[i].SubKlass.id;
            }
        });
    }
    
  
    $('#ProductDivisionId').change(function(){ 
        var getID = $('#ProductDivisionId').val();
        $('#ProductId').val(getID);
    });
    
    $('#ProductDepartmentId').change(function(){ 
        var getID = $('#ProductDepartmentId').val();
        $('#ProductId').val(getID);
    });
    
    $('#ProductKlassId').change(function(){ 
        var getID = $('#ProductKlassId').val();
        $('#ProductId').val(getID);
    });
    
    $('#ProductSubKlassId').change(function(){
        var subKlassID = $('#ProductSubKlassId').val();
        
        if(!$("select[name='data[Product][sub_klass_id]'] option:selected").index()== 0){
            $.post('../Products/setNewID/'+subKlassID,function(data){
            $('#ProductId').val(data);
            });
        }
        else{
            var getID = $('#ProductKlassId').val();
            $('#ProductId').val(getID);
        }
    });
    
    function tickCopyBarcode()
    {
        var copy = ($('#copyBarcode').prop("checked")) ? $('#ProductProductBarcodeNo').val() : '';
        $('#ProductProductSkuNo').val(copy);
    }
    
    function tickCopyShortTh()
    {
        var copy = ($('#copyShortTh').prop("checked")) ? $('#ProductProductDescriptionTh').val() : '';
        $('#ProductProductShortDescriptionTh').val(copy);
    }
    
    function tickCopyShortEng()
    {
        var copy = ($('#copyShortEng').prop("checked")) ? $('#ProductProductDescriptionEng').val() : '';
        $('#ProductProductShortDescriptionEng').val(copy);
    }
    function saveDraftClick()
    {
        $('#prst').val('DRAFT');
        $('.ProductAddForm').submit();
    }
    
</script>