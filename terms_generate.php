<?php

define('IS_CLI', PHP_SAPI === 'cli');
define('FILE_TERMS', 'terms-list.txt');
define('FILE_SAVE_TERMS', 'terms-list-new.txt');

if (IS_CLI) {
 $terms = array();
 if($read_handle = fopen(FILE_TERMS, 'r') && $write_handle = fopen(FILE_SAVE_TERMS, 'a+')) {
   while(($line = fgets($read_handle)) !== FALSE) {
     $terms = explode(',', $argv[1]);
     if(is_array($terms) && count($terms) > 0) {
       foreach($terms as $term) {
         $new_line = $term . "\n";
         fwrite($write_handle, $new_line);
       }
     }
   }
   fclose($read_handle);
   fclose($write_handle);
  }
}
  