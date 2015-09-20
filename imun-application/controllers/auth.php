<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Faisal Abdul Hamid
 * Date: 07/09/2015
 * Time: 21.41
 */
class Auth extends CI_Controller{
    function __construct(){
        parent::__construct();
        $set_pesan = array('required'=>'%s tidak boleh kosong',
            'valid_email'=>'Email tidak cocok',
            'matches'=>'%s tidak cocok',
            'min_length'=>'%s minimal 6 karakter',
            'max_length'=>'%s maximal 12 karakter',
            'check_email'=>'%s telah terdaftar',
            'check_email_reset'=>'Email tidak ditemukan',
            'numeric'=>'%s harus berupa number');
        $this->form_validation->set_message($set_pesan);
        $this->load->model('auth_model');

    }
    function index(){
        if(is_login())redirect('home');
        $data['title'] = 'Hello Mom';
        $this->load->view('head', $data);
        $this->load->view('view_choice');
        $this->load->view('foot');
    }
    function login($notice=FALSE){
        if(is_login())redirect('home');
        $data['title']='Login HelloMom';
        $data['notice']=array('', '');
        $data['post'] = 'auth/login/'.$notice;

        $this->form_validation->set_rules('email_signin', 'Email', 'trim|required|max_length[128]|xss_clean|valid_email');
        $this->form_validation->set_rules('pass_signin', 'Password', 'trim|required|max_length[12]|min_length[6]|xss_clean');

        if($this->form_validation->run()){
            $email_signin = $this->input->post('email_signin', TRUE);
            $pass_signin = md5($this->input->post('pass_signin', TRUE));
            $cek_status = $this->auth_model->cek_status(array($email_signin, $pass_signin));

            if($cek_status->num_rows() == 1){
                $cek_status = $cek_status->row_array();
                if($cek_status['status'] == "Aktif"){//Status Akun Aktif
                    if(login($email_signin, $pass_signin)){
                        redirect('home');//Login Berhasil
                    }else{
                        redirect('auth/login/passfalse');//Login Tidak Berhasil
                    }
                }else{//Status Akun Tidak Aktif
                    redirect('auth/login/cekaktifasi');//Belum Di aktifasi
                }
            }else{
                redirect('auth/login/passfalse');//Login Tidak Berhasil
            }
        }else {
            if ($notice == 'passfalse') {
                $data['notice'] = array('error', 'Email Atau Password yang anda masukkan salah');
            } elseif ($notice == 'cekaktifasi') {
                $data['notice'] = array('warning', 'Silahkan cek Email Untuk Aktifasi <br/>'.anchor('auth/aktifasi', 'AKTIFASI AKUN'));
            }elseif($notice == 'aktiftrue'){
                $data['notice'] = array('success', 'Akun Anda Berhasil Di Aktifkan Silahkan Login');
            }elseif($notice == 'forgot'){
                $data['notice'] = array('success', 'Silahkan Cek Email Untuk Ganti Password');
            }elseif($notice == 'loginfalse'){
                $data['notice'] = array('warning', 'Anda Belum Login Silahkan Login Terlebih dahulu');
            }
        }
        $this->load->view('head', $data);
        $this->load->view('view_login', $data);
        $this->load->view('foot');
    }
    function daftar($notice = FALSE){
        if(is_login())redirect('home');
        $data['title']='Daftar HelloMom';
        $data['notice']=array('', '');
        $data['post'] = 'auth/daftar/'.$notice;

        $this->form_validation->set_rules('email_signup', 'Email', 'trim|required|max_length[128]|xss_clean|valid_email|callback_check_email');
        $this->form_validation->set_rules('pass_signup', 'Password', 'trim|required|max_length[12]|min_length[6]|xss_clean');
        $this->form_validation->set_rules('conf_pass_signup', 'Konfirmasi Password', 'trim|required|matches[pass_signup]|xss_clean');
        $this->form_validation->set_rules('nama_bunda', 'Nama Bunda', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pekerjaan_bunda', 'Pekerjaan Bunda', 'trim|required|xss_clean');
        $this->form_validation->set_rules('no_tlp_bunda', 'No Telepon Bunda', 'trim|required|xss_clean|numeric');
        if($this->form_validation->run()){
            $email = $this->input->post('email_signup', TRUE);
            $pass = md5($this->input->post('pass_signup', TRUE));
            $nama = $this->input->post('nama_bunda', TRUE);
            $pekerjaan = $this->input->post('pekerjaan_bunda', TRUE);
            $tlp = $this->input->post('no_tlp_bunda', TRUE);

            $user = $this->auth_model->daftar_akun(array($email, $pass));
            $id_user = $this->db->insert_id();

            $this->auth_model->daftar_bunda(array($id_user, $nama, $pekerjaan, $tlp));
            $id_bunda = $this->db->insert_id();
            $this->auth_model->daftar_ayah(array($id_bunda));

            $kode_aktifasi = rand(000000, 999999);
            $aktifasi_input = date('Y-m-d H:i:s', time());
            $aktifasi_expired = date('Y-m-d H:i:s', time()+(1*24*60*60));
            $this->auth_model->add_kode_aktifasi(array($id_user, $kode_aktifasi, $aktifasi_input, $aktifasi_expired));

            $this->load->library('email');
            $this->email->from('info@indihealth.com', 'Indihealth');
            $this->email->to($user['email']);
            $this->email->subject('KODE AKTIFASI');
            $msg = 'Kode Aktifasi :'.$kode_aktifasi.'<br/> link aktifasi: '.base_url().'auth/aktifasi/'.$this->encrypt->encode($kode_aktifasi);
            $this->email->message($msg);
            $this->email->send($email);
            redirect('auth/aktifasi/daftartrue');

        }
        $this->load->view('head', $data);
        $this->load->view('view_daftar', $data);
        $this->load->view('foot');
    }
    function aktifasi($notice = FALSE){
        if(is_login())redirect('home');
        $data['title']='Aktifasi Akun HelloMom';
        $data['notice']=array('', '');
        $data['post'] = 'auth/aktifasi/'.$notice;

        $this->form_validation->set_rules('kode_aktifasi', 'Kode Aktifasi', 'trim|xss_clean|required|max_length[6]|min_length[6]');

        if($this->form_validation->run()){
            $kode_aktifasi = $this->input->post('kode_aktifasi', TRUE);
            $query = $this->auth_model->cek_aktifasi(array($kode_aktifasi));
            if($query->num_rows() == 1){
                $query = $query->row_array();
                $aktifasi_input = strtotime($query['aktifasi_input']);
                $aktifasi_now = time();
                $aktifasi_expired = strtotime($query['aktifasi_expired']);
                if($aktifasi_input <= $aktifasi_now AND $aktifasi_now <= $aktifasi_expired){
                    $this->auth_model->update_status_akun(array($query['aktifasi_user']));
                    $this->auth_model->delete_kode_aktifasi(array($kode_aktifasi));
                    redirect('auth/login/aktiftrue');
                }
            }else{
                redirect('auth/aktifasi/aktiffalse');
            }
        }else{
            if($notice == 'aktiffalse')
                $data['notice'] = array('error', 'Kode Aktifasi yang anda masukkan salah');
        }

        $this->load->view('head', $data);
        $this->load->view('view_aktifasi', $data);
        $this->load->view('foot');
    }
    function forgot($notice = FALSE){
        if(is_login())redirect('home');
        $data['title']='Lupa Password HelloMom';
        $data['notice']=array('', '');
        $data['post'] = 'auth/forgot/'.$notice;

        $this->form_validation->set_rules('email_forgot', 'Email', 'trim|required|valid_email|xss_clean|callback_check_email_reset');

        if($this->form_validation->run()){
            $email = $this->input->post('email_forgot', TRUE);
            $query = $this->auth_model->cek_email(array($email));
            $query = $query->row_array();
            $reset_user = $query['id_user'];
            $reset_link = encode(encode(sha1(encode(md5(encode($query['id_user'].'-'.time()))))));
            $reset_input = date('Y-m-d H:i:s', time()); //hari ini
            $reset_expired = date('Y-m-d H:i:s', time() + (1 * 24 * 60 * 60)); //1hari
            $add_reset_pass = $this->auth_model->add_reset_pass(array($reset_user, $reset_link, $reset_input, $reset_expired));
            //
            $this->load->library('email');
            $this->email->from('indihealth@gmail.com');
            $this->email->to($query['email']);
            $this->email->subject('Reset Password');
            $this->email->message('reset Pass : '.base_url().'/auth/reset/'.$reset_link);
            $this->email->send();
            redirect('auth/login/forgot');
        }
        $this->load->view('head', $data);
        $this->load->view('view_forgot', $data);
        $this->load->view('foot');
    }
    function reset($id = FALSE){
        if(is_login())redirect('home');
        $data['title']='Update Password HelloMom';
        $data['notice']=array('', '');
        $data['post'] = 'auth/reset/'.$id;

        $query = $this->auth_model->cek_reset_pass(array($id));
        $query = $query->row_array();
        if(count($query)==0)
            show_404();
        else{
            $reset_input = strtotime($query['reset_input']);
            $reset_now = time();
            $reset_expired = strtotime($query['reset_expired']);
            if($reset_input <= $reset_now AND $reset_now <= $reset_expired)
                $data['link'] = TRUE;
            else
                $data['link'] = FALSE;
        }

        $this->form_validation->set_rules('pass_forget', 'Password Baru', 'trim|required|min_length[6]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('conf_pass_forget', 'Konfirmasi Password Baru', 'trim|required|matches[pass_forget]|xss_clean');

        if($this->form_validation->run() AND $data['link']){
            $user_pass = md5($this->input->post('pass_forget', TRUE));
            $this->auth_model->edit_reset(array($user_pass, $query['reset_user']));
            $this->auth_model->delete_reset(array($query['reset_user']));
            redirect('auth/login/resettrue');
        }
        $this->load->view('head', $data);
        $this->load->view('view_reset', $data);
        $this->load->view('foot');
    }
    function logout(){
        if(!is_login()) redirect('auth/login/loginfalse');
        if(logout()) redirect('auth/login/logouttrue');
    }

    function check_email($masuk_email){
        $email = $this->auth_model->cek_email($masuk_email);
        if($email->num_rows() == 1){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    function check_email_reset($masuk_email){
        $email = $this->auth_model->cek_email($masuk_email);
        if($email->num_rows() == 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}