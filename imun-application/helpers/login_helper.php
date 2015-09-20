<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Hamid
 * Date: 23/08/2015
 * Time: 7:09
 */
if(!function_exists('login')) {
    function login($user = FALSE, $pass = FALSE)
    {
        $CI =& get_instance();
        $CI->load->model('auth_model');
        $query = $CI->auth_model->login(array($user, $pass));
        if ($query->num_rows() == 1) {
            $query = $query->row_array();
            $CI->session->set_userdata('login', $CI->encrypt->encode(md5($query['id_user'] . $query['email'])));
            $CI->session->set_userdata('id_user', $CI->encrypt->encode($query['id_user']));
            return TRUE;
        } else {
            logout();
            return FALSE;
        }
    }
}
if(!function_exists('logout')){
    function logout(){
        $CI =& get_instance();
        $CI->session->unset_userdata('login');
        $CI->session->unset_userdata('id_user');
        $CI->session->sess_destroy();
        return TRUE;
    }
}
if(!function_exists('is_login')){
    function is_login(){
        $CI =& get_instance();
        if($CI->session->userdata('login')){
            $CI->load->model('auth_model');
            $id_user = $CI->encrypt->decode($CI->session->userdata('id_user'));
            $query = $CI->auth_model->cek_id_user(array($id_user));
            if($query->num_rows() == 1)
                return TRUE;
            else
                return FALSE;
        }
    }
}
if(!function_exists('is_son')){
    function is_son($id_bunda = FALSE, $id_buah_hati = FALSE){
        $CI =& get_instance();
        $CI->load->model('buahhati_model');
        $cek_son = $CI->buahhati_model->cek_buah_hati(array($id_bunda, $id_buah_hati));
        if($cek_son->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}