<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Faisal Abdul Hamid
 * Date: 07/09/2015
 * Time: 22.02
 */
class Auth_model extends CI_Model{
    function login($data){
        $query = 'SELECT * FROM users WHERE email = ? AND password = ? AND status = "Aktif"';
        return $this->db->query($query, to_null($data));
    }
    function cek_status($data){
        $query = "SELECT * FROM users WHERE email = ? AND password = ?";
        return $this->db->query($query, to_null($data));
    }
    function cek_email($data){
        $query = "SELECT * FROM users WHERE email = ?";
        return $this->db->query($query, to_null($data));
    }
    function daftar_akun($data){
        $query = "INSERT INTO users SET email = ?, password = ?, tanggal_user = now()";
        $query = $this->db->query($query, to_null($data));
        return $this->db->affected_rows() > 0;
    }
    function daftar_bunda($data){
        $query = "INSERT INTO profil_bunda SET id_user = ?, nama = ?, pekerjaan = ?, kontak = ?";
        $query = $this->db->query($query, to_null($data));
        return $this->db->affected_rows() > 0;
    }
    function daftar_ayah($data){
        $query = "INSERT INTO profil_ayah SET id_bunda = ?";
        $query = $this->db->query($query, to_null($data));
        return $this->db->affected_rows() > 0;
    }
    function add_kode_aktifasi($data){
        $query = "INSERT INTO aktifasi SET aktifasi_user = ?, kode_aktifasi = ?, aktifasi_input =?, aktifasi_expired =?";
        $query = $this->db->query($query, to_null($data));
        return $this->db->affected_rows() > 0;
    }
    function cek_aktifasi($data){
        $query = "SELECT * FROM aktifasi WHERE kode_aktifasi = ?";
        return $this->db->query($query, to_null($data));
    }
    function update_status_akun($data){
        $query = "UPDATE users SET status = 'Aktif' WHERE id_user = ?";
        $query = $this->db->query($query, to_null($data));
        return $this->db->affected_rows() > 0;
    }
    function delete_kode_aktifasi($data){
        $query = "DELETE FROM aktifasi WHERE kode_aktifasi = ?";
        $query = $this->db->query($query, to_null($data));
        return $this->db->affected_rows() > 0;
    }
    function add_reset_pass($data){
        $query = "INSERT INTO reset_pass SET reset_user=?, reset_link=?, reset_input=?, reset_expired=?";
        $query = $this->db->query($query, to_null($data));
        return $this->db->affected_rows() > 0;
    }
    function cek_reset_pass($data){
        $query = 'SELECT * FROM reset_pass WHERE reset_link = ?';
        return $this->db->query($query, to_null($data));
    }
    function edit_reset($data){
        $query = "UPDATE users SET password = ? WHERE id_user = ?";
        $query = $this->db->query($query, to_null($data));
        return $this->db->affected_rows() > 0;
    }
    function delete_reset($data){
        $query = 'DELETE FROM reset_pass WHERE reset_user = ?';
        $query = $this->db->query($query, to_null($data));
        return $this->db->affected_rows() > 0;
    }
    function cek_id_user($data){
        $query = "SELECT * FROM Users WHERE id_user = ?";
        return $this->db->query($query, to_null($data));
    }
}