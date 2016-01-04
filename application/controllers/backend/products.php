<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
    {
        parent::__construct();   
        $this->load->model('products_model','data_model'); 
    }
	   
	public function index()
	{
		$data['title']='List Data Products';	
		$data['array_products'] = $this->data_model->get_products();
		$this->mytemplate->loadBackend('products',$data);
	}	
}
?>

