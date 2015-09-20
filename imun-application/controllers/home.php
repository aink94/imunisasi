<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Faisal Abdul Hamid
 * Date: 08/09/2015
 * Time: 01.29
 */
class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(!is_login())redirect('auth/login/loginfalse');
        $this->load->model('home_model');
        $set_pesan = array('required'=>'%s tidak boleh kosong',
            'valid_email'=>'Email tidak cocok',
            'matches'=>'%s tidak cocok',
            'min_length'=>'%s minimal 6 karakter',
            'max_length'=>'%s maximal 12 karakter',
            'check_email'=>'%s telah terdaftar',
            'check_email_reset'=>'Email tidak ditemukan',
            'numeric'=>'%s harus berupa number',
            'check_pass'=>'%s Tidak Cocok dengan Database');
        $this->form_validation->set_message($set_pesan);
    }
    function index(){
        $data['title']='HelloMom';
        $data['notice']=array('', '');
        $data['post'] = 'home/index';
        $id_user = $this->encrypt->decode($this->session->userdata('id_user'));
        $bunda = $this->home_model->profil_bunda(array($id_user));
        $bunda = $bunda->row_array();
        $data['buah_hati'] = $this->home_model->buah_hati(array($bunda['id_bunda']));

        $this->load->view('head', $data);
        $this->load->view('view_home', $data);
        $this->load->view('foot');
    }
    function buahhati($notice = FALSE){
        $data['title']='Buah Hati';
        $data['notice']=array('', '');
        $data['post'] = 'home/buahhati/';
        $id_user = $this->encrypt->decode($this->session->userdata('id_user'));
        $bunda = $this->home_model->profil_bunda(array($id_user));
        $bunda = $bunda->row_array();

        $this->form_validation->set_rules('nama_buah_hati', 'Nama Buah Hati', 'required');
        $this->form_validation->set_rules('tempat_lahir_buah_hati', 'Tempat Lahir Buah Hati', 'required');
        $this->form_validation->set_rules('tgl_lahir_buah_hati', 'Tanggal Lahir Buah Hati', 'required');
        $this->form_validation->set_rules('nama_rs', 'Nama Rumah Sakit', 'required');
        $this->form_validation->set_rules('agama_buah_hati', 'Agama Buah Hati', 'required');
        $this->form_validation->set_rules('golongan_darah_buah_hati', 'Golongan Darah Buah Hati', 'required');
        $this->form_validation->set_rules('resus_buah_hati', 'Resus Buah Hati', 'required');
        $this->form_validation->set_rules('persalinan_buah_hati', 'Persalinan Buah Hati', 'required');
        $this->form_validation->set_rules('berat_badan_buah_hati', 'Berat Badan Buah Hati', 'required');
        $this->form_validation->set_rules('tinggi_badan_buah_hati', 'Tinggi Badan Buah Hati', 'required');
        $this->form_validation->set_rules('foto_buah_hati', 'Foto Buah Hati', '');
        $this->form_validation->set_rules('catatan', 'Catatan', 'required');

        if($this->form_validation->run()){
            $nama = $this->input->post('nama_buah_hati', TRUE);
            $tmp_lahir = $this->input->post('tempat_lahir_buah_hati', TRUE);
            $tgl_lahir = $this->input->post('tgl_lahir_buah_hati', TRUE);
            $nama_rs = $this->input->post('nama_rs', TRUE);
            $agama = $this->input->post('agama_buah_hati', TRUE);
            $gol_darah = $this->input->post('golongan_darah_buah_hati', TRUE);
            $resus = $this->input->post('resus_buah_hati', TRUE);
            $persalinan = $this->input->post('persalinan_buah_hati', TRUE);
            $berat_bdn = $this->input->post('berat_badan_buah_hati', TRUE);
            $tinggi_bdn = $this->input->post('tinggi_badan_buah_hati', TRUE);
            $foto = $this->input->post('foto_buah_hati', TRUE);
            $catatan = $this->input->post('catatan', TRUE);

            $config['upload_path'] = './assets/foto_buah_hati/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] =  url_title($foto);
            //$config['overwrite'] = TRUE;
            //$config['max_size'] = 2048;
            //$config['max_width'] = 400;
            //$config['max_height'] = 400;

            $this->upload->initialize($config);
            $this->upload->do_upload('foto_buah_hati');
            $data = $this->upload->data();
            //echo $data['file_name'];

            $foto = $data['file_name'];

            $this->home_model->add_buah_hati(array($bunda['id_bunda'], $nama, $foto, $tmp_lahir, $tgl_lahir, $nama_rs, $agama, $gol_darah, $resus, $persalinan, $berat_bdn, $tinggi_bdn, $catatan));
            redirect('home/buahhati/addtrue');
        }else{
            if($notice == 'addtrue'){
                $data['notice'] = array('success', 'Berhasil Ditambahkan');
            }
        }
        $this->load->view('head', $data);
        $this->load->view('view_buah_hati', $data);
        $this->load->view('foot');
    }
    function profil($notice = FALSE){
        $data['title']='Profil Bunda';
        $data['notice']=array('', '');
        $data['post'] = 'home/profil/';

        $id_user = $this->encrypt->decode($this->session->userdata('id_user'));
        $bunda = $this->home_model->profil_bunda(array($id_user));
        $bunda = $bunda->row_array();

        $data['profil_bunda'] = $this->home_model->get_profil_bunda(array($bunda['id_bunda']));
        $data['profil_ayah'] = $this->home_model->get_profil_ayah(array($bunda['id_bunda']));

        $this->form_validation->set_rules('nama_bunda', 'Nama Bunda', 'required');
        $this->form_validation->set_rules('tempat_lahir_bunda', 'Tempat Lahir Bunda', 'required');
        $this->form_validation->set_rules('tgl_lahir_bunda', 'Tanggal Lahir Bunda', 'required');
        $this->form_validation->set_rules('agama_bunda', 'Agama Bunda', 'required');
        $this->form_validation->set_rules('golongan_darah_bunda', 'Golongan  Darah Bunda', 'required');
        $this->form_validation->set_rules('pekerjaan_bunda', 'Pekerjaan Bunda', 'required');
        $this->form_validation->set_rules('pendidikan_bunda', 'Pekerjaan Bunda', 'required');
        $this->form_validation->set_rules('kontak_bunda', 'Kontak Bunda', 'required');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('tempat_lahir_ayah', 'Tempat Lahir Ayah', 'required');
        $this->form_validation->set_rules('tgl_lahir_ayah', 'Tanggal Lahir Ayah', 'required');
        $this->form_validation->set_rules('agama_ayah', 'Agama Ayah', 'required');
        $this->form_validation->set_rules('golongan_darah_ayah', 'Golongan Darah Ayah', 'required');
        $this->form_validation->set_rules('pekerjaan_ayah', 'Pekerjaan Ayah', 'required');
        $this->form_validation->set_rules('pendidikan_ayah', 'Pendidikan Ayah', 'required');
        $this->form_validation->set_rules('kontak_ayah', 'Kontak Ayah', 'required');
        if($this->form_validation->run()){
            echo $b_nama = $this->input->post('nama_bunda', TRUE);
            echo $b_tmp_lhr =$this->input->post('tempat_lahir_bunda', TRUE);
            echo $b_tgl_lhr = $this->input->post('tgl_lahir_bunda', TRUE);
            echo $b_agama = $this->input->post('agama_bunda', TRUE);
            echo $b_gol_darah = $this->input->post('golongan_darah_bunda', TRUE);
            echo $b_pekerjaan = $this->input->post('pekerjaan_bunda', TRUE);
            echo $b_pendidikan = $this->input->post('pendidikan_bunda', TRUE);
            echo $b_kontak = $this->input->post('kontak_bunda', TRUE);
            echo $a_nama = $this->input->post('nama_ayah', TRUE);
            echo $a_tmp_lhr =$this->input->post('tempat_lahir_ayah', TRUE);
            echo $a_tgl_lhr = $this->input->post('tgl_lahir_ayah', TRUE);
            echo $a_agama = $this->input->post('agama_ayah', TRUE);
            echo $a_gol_darah = $this->input->post('golongan_darah_ayah', TRUE);
            echo $a_pekerjaan = $this->input->post('pekerjaan_ayah', TRUE);
            echo $a_pendidikan = $this->input->post('pendidikan_ayah', TRUE);
            echo $a_kontak = $this->input->post('kontak_ayah', TRUE);

            $this->home_model->update_profil_bunda(array($b_nama, $b_tmp_lhr, $b_tgl_lhr, $b_agama, $b_gol_darah, $b_pekerjaan, $b_pendidikan, $b_kontak, $bunda['id_bunda']));
            $this->home_model->update_profil_ayah(array($a_nama, $a_tmp_lhr, $a_tgl_lhr, $a_agama, $a_gol_darah, $a_pekerjaan, $a_pendidikan, $a_kontak, $bunda['id_bunda']));

            redirect('home/profil/updatetrue');
        }else{
            if($notice == 'updatetrue')
                $data['notice'] = array('success', 'Data Berhasil Diubah');
        }
        $this->load->view('head', $data);
        $this->load->view('view_profil', $data);
        $this->load->view('foot');
    }
    function help(){
        $data['title']='Bantuan';
        $data['notice']=array('', '');
        $data['post'] = 'home/profil/';

        $this->load->view('head', $data);
        $this->load->view('view_bantuan', $data);
        $this->load->view('foot');
    }
    function setting($notice = FALSE){
        $data['title']='Bantuan';
        $data['notice']=array('', '');
        $data['post'] = 'home/setting/';
        $id_user = $this->encrypt->decode($this->session->userdata('id_user'));

        if($this->input->post('ganti_pass')){
            $this->form_validation->set_rules('pass_old', 'Password lama', 'required|trim|xss_clean|callback_check_pass');
            $this->form_validation->set_rules('pass_new', 'Password Baru', 'required|trim|xss_clean|min_length[6]|max_length[12]');
            $this->form_validation->set_rules('re_pass_new', 'Konfirmasi Password Baru', 'required|trim|xss_clean|matches[pass_new]');
            if($this->form_validation->run()){
                $pass_new = md5($this->input->post('pass_new', TRUE));
                $this->home_model->update_pass(array($pass_new, $id_user));
                redirect('home/setting/updatepasstrue');
            }
        }
        if($this->input->post('reminder_set')){
            if($this->form_validation->run()){

            }
        }
        if($notice == 'updatepasstrue')
            $data['notice'] = array('success', 'Password Anda Berhasil Diganti');
        elseif($notice == 'updateremindertrue')
            $data['notice'] = array('success', 'Password Anda Berhasil Diganti');
        $this->load->view('head', $data);
        $this->load->view('view_setting', $data);
        $this->load->view('foot');
    }

    function check_pass($pass){
        $id_user = $this->encrypt->decode($this->session->userdata('id_user'));
        $pass_old = $this->home_model->check_pass_old(array(md5($pass), $id_user));
        if($pass_old->num_rows() == 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}