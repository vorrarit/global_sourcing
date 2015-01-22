<?php
foreach ($products as $product) {
                echo __($product['Product']['id']) . ',' ;
                echo __($product['Product']['product_name']) .',';
                echo __($product['Product']['product_description_th']).','  ; 
                echo __($product['Product']['product_description_eng']). ',' ;
                echo __($product['Product']['product_specification']). ',' ;
                echo __($product['Product']['retail_price']) ."\r\n";
                }
                
 ?>


	
