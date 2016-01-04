<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Produk_model extends CI_Model {
 
    public $table = 'categories'; //inisiasi tabel categories
    public $primary_key = 'CategoryID'; //inisiasi  primary_key CategoryID
 
    public function __construct() {
        parent::__construct();
    }
    
    public function get_dropdown() { //fungsi get_dropdown		
        $categories = $this->db->select('CategoryID, CategoryName') //menghasilkan query select kolom CategoryID dan CategoryName
          ->order_by('CategoryID', 'ASC') //diurutkan berdasarkan CategoryID secara ascending
          ->get($this->table) //mengambil isi tabel
          ->result(); //hasil
		$dropdown = array('' => 'Pilih Kategori'); //inisiasi array. nilai awal text : Pilih Kategori
        if( !empty($categories) ) { //cek isi variabel categories apakah tidak kosong?
            foreach( $categories as $c ) { //jika variabel categories ada isinya. tampilkan nilai array categories. dengan nama variabel c untuk menyimpan nilai indeks array
                $dropdown[$c->CategoryID] = $c->CategoryName; //menampilkan  CategoryName dengan value sesuai CategoryID
            }
            return $dropdown; //mengembalikan nilai variabel
        }
        return array('' => 'Tidak ada kategori'); //jika variabel categories kosong. mengembalikan nilai array dengan isi Tidak ada kategori 
    }
	
	function caridata(){ //fungsi caridata
		$kategori = $this->input->POST ('kategori'); //menyimpan value kiriman kategori dengan nama variabel $kategori
		$produk = $this->input->POST ('produk'); //menyimpan value kiriman produk dengan nama variabel $produk
		$this->db->select('*'); //query select *
		$this->db->from('products'); //query from tabel products
		$this->db->join('categories','products.CategoryID = categories.CategoryID'); //query FROM categories INNER JOIN products ON categories.CategoryID = products.ProductID
		$this->db->where('categories.CategoryID', $kategori); //query WHERE categories.CategoryID = $kategori
		$this->db->like('products.ProductName', $produk); //query WHERE products.ProductName like $produk
		$query = $this->db->get(); //mengambil isi tabel
		return $query->result(); //mengembalikan nilai variabel
	}
 
}
