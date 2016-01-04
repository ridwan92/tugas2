<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
    {
        parent::__construct();   
        $this->load->model('Customer_model','datamodel');     
    }
	   
	public function index()
	{
		$data['title']='List Of Customer';	
		$data['array_customer'] = $this->datamodel->get_customer();
		$this->mytemplate->loadBackend('customer',$data);
	}

	public function form($mode,$id='')
	{
		$data['title']=($mode=='insert')? 'Add Customer' : 'Update Customer';				
		$data['customer'] = ($mode=='update') ? $this->datamodel->get_customer_by_id($id) : '';
		$this->mytemplate->loadBackend('frmcustomer',$data);	
	}

	public function process($mode,$id='')
	{
		
		if(($mode=='insert') || ($mode=='update'))
		{
			$result = ($mode=='insert') ? $this->datamodel->insert_entry() : $this->datamodel->update_entry();
		}else if($mode=='delete'){
			$result = $this->datamodel->hapus($id);			
		}	
		if ($result) redirect(site_url('backend/customer'),'location');
	}
	
	private function dependensi($id)
	{
		return $this->datamodel->cek_dependensi($id);
	}
	
	

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

