<div class="supplierProducts popup">
 <?php echo $this->Form->Create('SupplierProducts',array('action'=>'sendMail'));?>
    <h2><?php echo __('Supplier Products'); ?></h2>

    <table>
            <?php
                
               
            ?>

            <?php
                foreach($suppliers as $supplier) {
                     $mail = ' ';
                    foreach ($supplier['SupplierContact'] as $supplierContact){
                        $mail .= $supplierContact['supplier_contact_email'].','; 
                    }
            ?>
        <tr>
        <td>
            <?php echo $this->Form->checkbox('supplier_id.' . $supplier['Supplier']['id'],array('value'=>$supplier['Supplier']['id']));?>
           
        </td>
        <td>
               <?php echo $supplier['Supplier']['supplier_name_eng']?>
            &nbsp;
            
        </td>
        <td>
                <?php echo $mail;?>
        </td>
        </tr>

               <?php 
               
                }
                ?>
         <?php echo $this->Form->input('product_id',array('value'=>$product_id,'type'=>'hidden'));?>




    </table>
    <?php echo $this->Form->Button('Conflim',array('type'=>'submit','class'=>'btn btn-primary btn-form'));?>
    <?php echo $this->Form->Button('Cancel',array('onclick'=>'cancel_click()','type'=>'button','class'=>'btn btn-default btn-form'));?>
<?php echo $this->Form->end();?>
</div>
<script>
    function cancel_click(){
        window.close();
    }
    </script>