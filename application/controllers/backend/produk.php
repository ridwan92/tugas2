<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->model('produk_model'); //untuk fungsi ke database
        $this->load->helper('form'); //untuk menampilkan dropdown
		$this->load->helper('html'); //untuk site_url
    }
 
    public function index() { //fungsi index
		$data['category'] = $this->produk_model->get_dropdown(); //menjalankan fungsi get_dropdown di model
        $this->load->view('backend/produk',$data); //menampilkan view produk dengan parameter $data
    }
	public function cari() { //fungsi cari
		$data['hasil']=$this->produk_model->caridata(); //menjalankan fungsi caridata di model
		if($data['hasil']== null) { //cek isi array hasil apakah kosong?
			echo 'maaf data yang anda cari tidak ada'; //jika array kosong akan menampilkan text : maaf data yang anda cari tidak ada
			echo br(2); //mencetak baris kosong sebanyak 2 baris
			echo anchor('backend/produk','kembali'); //menampilkan link kembali ke produk
		}
		else { //jika tidak kosong
			$this->load->view('backend/produk',$data); //menampilkan view paroduk dengan parameter $data
		}
	}
}
	
	