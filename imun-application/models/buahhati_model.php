<?php
/**
 * Created by PhpStorm.
 * User: Faisa Abdul Hamid
 * Date: 10/09/2015
 * Time: 14.02
 */
 class Buahhati_model extends CI_Model{
     function get_all_buah_hati($data){
         $query = "SELECT * FROM buah_hati WHERE id_bunda = ? AND id_buah_hati = ?";
         return $this->db->query($query, to_null($data));
     }
     function cek_buah_hati($data){
         $query = "SELECT id_buah_hati FROM buah_hati WHERE id_bunda = ? AND id_buah_hati = ?";
         return $this->db->query($query, to_null($data));
     }
     function gelallbulan(){
         $query = "SELECT * FROM bulan";
         return $this->db->query($query);
     }
     function getalljenisvaksin(){
         $query = "SELECT * FROM jenis_vaksin";
         return $this->db->query($query);
     }
     function cek_imun($data){
         $query = "SELECT * FROM bulan_vaksin WHERE id_vaksin  = ? AND id_bulan = ? AND id_buah_hati = ?";
         return $this->db->query($query, to_null($data));
     }
     function dis_bulan($data){
         $query = "SELECT * FROM bulan_vaksin WHERE id_bulan = ? AND id_buah_hati = ?";
         return $this->db->query($query, to_null($data));
     }
     function addimunisasi($data){
         $query = "INSERT INTO bulan_vaksin SET id_bulan = ?, id_vaksin = ?,id_buah_hati = ?, keterangan = ?";
         $query = $this->db->query($query, to_null($data));
         return $this->db->affected_rows() > 0;
     }
 }