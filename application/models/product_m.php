<?php
class Product_m extends CI_Model{
	function __construct(){
	parent::__construct();
	}
	
	public function tampil(){ //untuk menampilkan data produk
        $sql="Select * from products ORDER BY ProductID ASC ";
        return $this->db->query($sql)->result();
    	}
	
	public function tampilcategory(){ //untuk menampilkan  data kategori pada combobox
        $sql="Select * from categories ORDER BY CategoryID ASC ";
        return $this->db->query($sql)->result();
    	}
	
	function caridata(){ //untuk mencari data produk berdasarkan kategori
	$c = $this->input->POST('cari');
	$nm=$this->input->POST('nama');
	$sql="Select * from products WHERE CategoryID='".$c."' AND ProductName LIKE '%".$nm."%'";
	return $this->db->query($sql)->result();
	}
}
