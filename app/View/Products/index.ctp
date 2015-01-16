<div class="products form">
<?php echo $this->Form->create('Product',array('action'=>'index')); ?>
    <fieldset>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo __('Search Products'); ?></h1>
            </div>
        </div>
	<?php
                echo $this->Form->input('text_search'); ?>
        <table width="100%">
            <tbody>
            <td width="7%" id="embed_button">
                <input type="submit" name="Submit" value="Advance Search" onclick="JavaScript:fncShow('embed_div');">
            </td>
            <tr id="embed_div" style="display:none; ">
                <td width="50%"> 
                <?php // echo $this->Form->input('division_id',array(
//                    'onchange'=>'division_Changed()',
//                    'empty' => 'Please Select',
//                    'default'=>0,
//                    'option' => array(0=>'Please Select'),
//                    )); 
                 echo $this->Form->input('division_id',array(
                    'empty'=>'Please Select',
                    'onchange' => 'division_Changed()'
                ));   
                    
                    ?>

                <?php 
//                echo $this->Form->input('klass_id',array(
//                    'class' => 'get_klass',
//                    'onchange'=>'klass_Changed()',
//                    'default'=>'Please Select',
//                    'empty' => 'Please Select'
//                    )); 
                echo $this->Form->input('klass_id', array(
                    'empty'=>'Please Select',
                    'onchange'=>'klass_Changed()'));
                ?>


                <?php echo $this->Form->input('product_barcode_no'); ?>
                <?php echo $this->Form->input('product_description_eng'); ?>
                <?php echo $this->Form->input('min_price'); ?>
                <?php echo $this->Form->input('max_price'); ?>


                <?php echo $this->Form->input('supplier_name_eng'); ?>
                </td>
                <td width="50%">
                <?php 
//                echo $this->Form->input('department_id', array(
//                    'class' => 'get_depart',
//                    'empty'=>'Please Select',
//                    'default'=>'Please Select',
//                    'onchange'=>'deparment_Changed()')); 
                echo $this->Form->input('department_id', array(
                    'empty'=>'Please Select',
                    'onchange'=>'deparment_Changed()'));
                ?>
                <?php 
//                echo $this->Form->input('sub_klass_id', array(
//                    'class' => 'get_sub_klass',
//                    'default'=>'Please Select',
//                    'empty'=>'Please Select')); 
                echo $this->Form->input('sub_klass_id',array(
                    'empty'=>'Please Select',
                    ));
                ?>              
                <?php echo $this->Form->input('product_sku_no'); ?>
                <?php echo $this->Form->input('product_specification'); ?>
                <?php echo $this->Form->input('manufac_name_eng'); ?>
                <?php echo $this->Form->input('supplier_type_id', array(
                    'empty'=>'Please Select',
                    'onchange'=>'deparment_Changed()')); ?>     
                </td>
            </tr>
            </tbody></table>
    </fieldset>
<?php echo $this->Form->end(__('Search')); ?>
</div>
<div class="products index">
    <h2><?php echo __('Products'); ?></h2>
    <table cellpadding="0" cellspacing="0">

        <tbody>
        <?php echo $this->Form->create('Product',array('action'=>'multiExport')); ?>
        <?php 
            $columnIndex = 0;
            foreach ($products as $product) {
                $columnIndex += 1;
                if ($columnIndex == 1) {
                    echo "<tr>";
                }
                echo "<td width=\"33%\">";
                if (!empty($product['Photo'])) {
                    echo "<img src=\"" . $product['Photo'][0]['photo_path'] . $product['Photo'][0]['photo_name'] . "\"><br>";
                }
                echo h($product['Product']['id']) . "<br>";
                echo h($product['Product']['product_name']) . "<br>";
                echo h($product['Product']['retail_price']) . "<br>";
                echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id']))."<br>"."<br>";
                echo $this->Form->checkbox('Product.id'.$product['Product']['id'],array('value' => $product['Product']['id']));
                echo "</td>";
                if ($columnIndex == 3) {
                    echo "</tr>";
                }
            }
            if ($columnIndex < 3) {
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
    <?php echo $this->Form->end(__('Export')); ?>
    <p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
    <div class="pagination">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array('tag' => 'li'), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('tag'=>'li', 'separator' => '', 'currentTag'=>'a', 'currentClass'=>'active'));
		echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li'), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'next disabled'));
	?>
    </div>
</div>
<script language="JavaScript">
    function fncShow(ctrl) {
        document.getElementById(ctrl).style.display = '';
        document.getElementById('embed_button').innerHTML = '<input type="submit" name="Submit" value="Advance Search" onClick="JavaScript:fncHide(\'embed_div\');">';
    }
    function fncHide(ctrl) {
        document.getElementById(ctrl).style.display = 'none';
        document.getElementById('embed_button').innerHTML = '<input type="submit" name="Submit" value="Advance Search " onClick="JavaScript:fncShow(\'embed_div\');">';
    }

//    function division_Changed() {
//
//        var dvID = document.getElementById('ProductDivisionId').value;
//        if (dvID.length == 0) {
//            $(".get_depart").html("<option value='' selected='selected' style='width:200px'>Please Select</option>");
//            deparment_Changed();
//        } else {
//            $.post('/ProjectDr/Products/loadDepartments/' + dvID, function (data) {
//                $(".get_depart").html(data);
//                deparment_Changed();
//            });
//        }
//    }
//    function deparment_Changed() {
//        var deptID = document.getElementById('ProductDepartmentId').value;
//        if (deptID.length == 0) {
//            $(".get_klass").html("<option value='' selected='selected' style='width:200px'>Please Select</option>");
//            klass_Changed();
//        } else {
//            $.post('/ProjectDr/Products/loadKlasses/' + deptID, function (data) {
//                $(".get_klass").html(data);
//                klass_Changed();
//            });
//        }
//    }
//    function klass_Changed() {
//        var klassID = document.getElementById('ProductKlassId').value;
//        if (klassID.length == 0) {
//            $(".get_sub_klass").html("<option value='' selected='selected' style='width:200px'>Please Select</option>");
//            subklass_Changed();
//        } else {
//            $.post('/ProjectDr/Products/loadSubKlasses/' + klassID, function (data) {
//                $(".get_sub_klass").html(data);
//                subklass_Changed();
//            });
//        }
//    }
//    function subklass_Changed() {
//        var dvID = document.getElementById('ProductSubKlassId').value;
//
//    }
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


</script>


