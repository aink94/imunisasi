<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Faisa Abdul Hamid
 * Date: 09/09/2015
 * Time: 01.38
 */
class buahhati extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(!is_login())redirect('auth/login/loginfalse');
        $this->load->model(array('buahhati_model','home_model'));
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

    function index($id_buahhati = FALSE){
        $id_user = $this->encrypt->decode($this->session->userdata('id_user'));
        $data['bunda'] = $this->home_model->profil_bunda(array($id_user));
        $bunda = $data['bunda']->row_array();

        if(!is_son($bunda['id_bunda'], $id_buahhati)) show_404();
        $data['title']='Profil Buah Hati';
        $data['notice']=array('', '');
        $data['post'] = 'buahhati/';

        $data['buah_hati'] = $this->buahhati_model->get_all_buah_hati(array($bunda['id_bunda'],$id_buahhati));
        $data['bh'] = $data['buah_hati']->row_array();

        $this->load->view('head', $data);
        $this->load->view('view_b_home', $data);
        $this->load->view('foot');

    }
    function editbuahhati($id_buahhati = FALSE, $notice = FALSE){
        $id_user = $this->encrypt->decode($this->session->userdata('id_user'));
        $data['bunda'] = $this->home_model->profil_bunda(array($id_user));
        $bunda = $data['bunda']->row_array();

        if(!is_son($bunda['id_bunda'], $id_buahhati)) show_404();
        $data['title']='Profil Buah Hati';
        $data['notice']=array('', '');
        $data['post'] = 'buahhati/editbuahhati/'.$id_buahhati;

        $data['buah_hati'] = $this->buahhati_model->get_all_buah_hati(array($bunda['id_bunda'],$id_buahhati));
        $data['bh'] = $data['buah_hati']->row_array();

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
            redirect('buahhati/edibuahhati/'.$id_buahhati.'/editrue');
        }else{
            if($notice == 'edittrue')
                $data['notice'] = array('success', 'Berhasil diubah');
        }
        $this->load->view('head', $data);
        $this->load->view('view_b_edit_buah_hati', $data);
        $this->load->view('foot');
    }
    function imunisasi($id_buahhati = FALSE, $notice = FALSE){
        $id_user = $this->encrypt->decode($this->session->userdata('id_user'));
        $data['bunda'] = $this->home_model->profil_bunda(array($id_user));
        $bunda = $data['bunda']->row_array();

        if(!is_son($bunda['id_bunda'], $id_buahhati)) show_404();
        $data['title']='Buah Hati';
        $data['notice']=array('', '');
        $data['post'] = 'buahhati/imunisasi/'.$id_buahhati;

        $data['buah_hati'] = $this->buahhati_model->get_all_buah_hati(array($bunda['id_bunda'],$id_buahhati));
        $data['bh'] = $data['buah_hati']->row_array();
        $data['id_buahhati'] = $id_buahhati;

        $data['bulan'] = $this->buahhati_model->gelallbulan();

        if($this->input->post('btn_simpan')){
            foreach($this->input->post('jenis_vaksin') as $c) {
                $this->buahhati_model->addimunisasi(array($this->input->post('bulan'), $c, $id_buahhati, $this->input->post('keterangan')));
            }
            redirect('buahhati/imunisasi/'.$id_buahhati.'/addtrue');
        }else{
            if($notice == 'addtrue'){
                $data['notice'] = array('success', 'Berhasil Disimpan');
            }
        }
        $this->load->view('head', $data);
        $this->load->view('view_b_imunisasi', $data);
        $this->load->view('foot');
    }
    function grafikperkembangan($id_buahhati = FALSE){
        $id_user = $this->encrypt->decode($this->session->userdata('id_user'));
        $data['bunda'] = $this->home_model->profil_bunda(array($id_user));
        $bunda = $data['bunda']->row_array();

        if(!is_son($bunda['id_bunda'], $id_buahhati)) show_404();
        $data['title']='Profil Buah Hati';
        $data['notice']=array('', '');
        $data['post'] = 'buahhati/grafikperkembangan/'.$id_buahhati;


        $data['buah_hati'] = $this->buahhati_model->get_all_buah_hati(array($bunda['id_bunda'],$id_buahhati));
        $data['bh'] = $data['buah_hati']->row_array();

        $this->load->view('head', $data);
        $this->load->view('view_grafik', $data);
        $this->load->view('foot');
    }
}