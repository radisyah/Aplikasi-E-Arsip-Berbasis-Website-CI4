<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelHome extends Model{

  public function jumlahArsip(){
    return $this->db->table('tbl_arsip')->countAll();
  }

  public function jumlahDepartemen(){
    return $this->db->table('tbl_dep')->countAll();
  }

  public function jumlahUser(){
    return $this->db->table('tbl_user')->countAll();
  }

  public function jumlahKategori(){
    return $this->db->table('tbl_kategori')->countAll();
  }

 

}
