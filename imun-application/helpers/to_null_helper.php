<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Hamid
 * Date: 23/08/2015
 * Time: 8:14
 */
if(!function_exists('to_null')){
    function to_null($data = array('')){
        for($i=0; $i<count($data); $i++){
            if(strlen($data[$i]) == 0) $data[$i] =NULL;
        }
        return $data;
    }
}