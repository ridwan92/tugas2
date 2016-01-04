<?php
class Products_model extends CI_Model {
   function __construct()
    {        
        parent::__construct();
    }
	
	function kategori()
    {
        $query = $this->db->get('categories');
        return $query->result();
    }
	function get_products()
    {
		
		$kategori = $this->input->POST ('kategori');
		$produk = $this->input->POST ('nama_prod');
		
		$this->db->like('products.CategoryID', $kategori);
		$this->db->like('products.ProductName', $produk);
		
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('suppliers','products.supplierID=suppliers.supplierID');
		$this->db->join('categories','products.CategoryID=categories.CategoryID');
		$query = $this->db->get();
        return $query->result();
    }

}
?>
