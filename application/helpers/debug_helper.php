<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('out')) {
    function out($item,$dump=false) {
        if($dump){
        	echo "<pre>";
            	return var_dump($item);
        	echo "</pre>";
        }
        	echo "<pre>";
            	return print_r($item);
        	echo "</pre>";
    }
}