<?php
class Produk extends CI_Model {
    

    function __construct()
    {        
        parent::__construct();
    }
	
	//membuat fungsi nur_db_produk dan membawa variable $a (limit) dan $b(mulai) yang nanti akan membatasi dalam pengambilan database
	public function nur_db_produk($a, $b)
    {
			//Memungkinkan untuk membatasi jumlah baris yang ingin dikembalikan oleh query dengan membawa variable $a dan $b yang bertujuan menampilkan jumlah baris dan mulai dari limit ke posisi berapa
			$this->db->limit($a, $b);
			//selanjutnya kembalikan atau hasilkan dan tampilkan database products
			return $this->db->get('products')->result();
    }

}
