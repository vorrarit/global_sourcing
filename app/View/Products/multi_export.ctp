<?php
foreach ($products as $product) {
                echo h($product['Product']['id']) . ',' ;
                echo h($product['Product']['product_name']) .',';
                echo h($product['Product']['product_description_th']).','  ; 
                echo h($product['Product']['product_description_eng']). ',' ;
                echo h($product['Product']['product_specification']). ',' ;
                echo h($product['Product']['retail_price']) ."\r\n";
                }
                
 ?>


	
