<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shippers extends CI_Controller {

	public function __construct()
    {
        parent::__construct();   
        $this->load->model('Shippers_model','datamodel');     
    }
	   
	public function index()
	{
		$data['title']='List Of Shippers';	
		$data['array_shippers'] = $this->datamodel->get_shippers();
		$this->mytemplate->loadBackend('shippers',$data);
	}
	
	
	

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

