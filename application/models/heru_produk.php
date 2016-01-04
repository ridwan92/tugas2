<?php
class Heru_produk extends CI_Model {
    

    function __construct()
    {        
        parent::__construct();
    }
	//membuat fungsi db dan membawa variable $total (limit) dan $mulai(mulai)
	public function db($total, $mulai)
    {
	//membuat sql syntaq dengan metode limit $total, $mulai artinya mulai dari berapa dan jumlahnya berapa baris
			$this->db->limit($total, $mulai);
	//selanjutnya kembalikan atau hasilkan dan tampilkan database products
			return $this->db->get('products')->result();
    }

}
