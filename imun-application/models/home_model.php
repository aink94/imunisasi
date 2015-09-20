<?php
/**
 * Created by PhpStorm.
 * User: Faisal Abdul Hamid
 * Date: 08/09/2015
 * Time: 01.37
 */
class Home_model extends CI_Model{
    function profil_bunda($data){
        $query = "SELECT * FROM profil_bunda WHERE id_user = ?";
        return $this->db->query($query, to_null($data));
    }
    function buah_hati($data){
        $query = "SELECT * FROM buah_hati WHERE id_bunda = ?";
        return $this->db->query($query, to_null($data));
    }
    function add_buah_hati($data){
        $query = "INSERT INTO buah_hati SET id_bunda = ?, nama = ?, foto = ?, tempat_lahir = ?, tanggal_lahir = ?, nama_rumah_sakit = ?, agama = ?, golongan_darah = ?, resus = ?, persalinan = ?, berat_badan = ?, tinggi_badan = ?, catatan = ?";
        $query = $this->db->query($query, to_null($data));
        return $this->db->affected_rows() > 0;
    }
    function get_profil_bunda($data){
        $query = "SELECT * FROM profil_bunda WHERE id_bunda = ?";
        return $this->db->query($query, to_null($data));
    }
    function get_profil_ayah($data){
        $query = "SELECT * FROM profil_ayah WHERE id_bunda = ?";
        return $this->db->query($query, to_null($data));
    }
    function update_profil_bunda($data){
        $query = "UPDATE profil_bunda SET nama = ?, tempat_lahir = ?, tanggal_lahir = ?, agama = ?, golongan_darah = ?, pekerjaan = ?, pendidikan =? , kontak = ? WHERE id_bunda = ?";
        $query = $this->db->query($query, to_null($data));
        return $this->db->affected_rows() > 0;
    }
    function update_profil_ayah($data){
        $query = "UPDATE profil_ayah SET nama = ?, tempat_lahir = ?, tanggal_lahir = ?, agama = ?, golongan_darah = ?, pekerjaan = ?, pendidikan =? , kontak = ? WHERE id_bunda = ?";
        $query = $this->db->query($query, to_null($data));
        return $this->db->affected_rows() > 0;
    }
    function update_pass($data){
        $query = "UPDATE users SET password = ? WHERE id_user = ?";
        $query = $this->db->query($query, to_null($data));
        return $this->db->affected_rows() > 0;
    }
    function check_pass_old($data){
        $query = "SELECT * FROM users WHERE password = ? AND id_user = ?";
        return $this->db->query($query, to_null($data));
    }
}