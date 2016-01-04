<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	
	function cek_login(){
		if(isset($_POST['btnlogin'])){
			$user=$this->input->post('username',true);
			$pass=$this->input->post('password',true);
			if(($user=='admin')&&($pass=='bismillah'))
			{	
				$data=array('user'=>$user,'pass'=>$pass,'islogin'=>true);
				$this->session->set_userdata($data);
				redirect(site_url('backend/home'),'location');
			}
				
			 else
				{
					echo "salah"; die();
					redirect(site_url('login.php'),'location');
				}
		}
		
	}
	
	function logout(){
		$data=array('user'=>'','pass'=>'','islogin'=>false);
		$this->session->unset_userdata($data);
		$data['pesan']='Anda berhasil logout';
		$this->load->view('login',$data);
	}
}
?>