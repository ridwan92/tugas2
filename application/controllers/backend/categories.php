<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct()
    {
        parent::__construct();   
        $this->load->model('Categories_model','datamodel');  
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload');
		$this->load->library('image_lib');
    }
	   
	public function index()
	{
		$data['title']='List Of Categories';	
		$data['array_categories'] = $this->datamodel->get_categories();
		$this->mytemplate->loadBackend('categories',$data);
	}

	public function form($mode,$id='')
	{
		$data['title']=($mode=='insert')? 'Add Categories' : 'Update Categories';				
		$data['categories'] = ($mode=='update') ? $this->datamodel->get_categories_by_id($id) : '';
		$this->mytemplate->loadBackend('frmcategories',$data);	
	}

	public function process($mode,$id='')
	{
		
		if(($mode=='insert') || ($mode=='update'))
		{
			$this->do_upload();
			if($this->upload->file_name)
			{
			$result = ($mode=='insert') ? $this->datamodel->insert_entry($this->upload->file_name) : $this->datamodel->update_entry($this->upload->file_name);
			}
		}else if($mode=='delete'){
			$result = $this->datamodel->hapus($id);			
		}	
		if ($result) redirect(site_url('backend/categories'),'location');
	}
	
	private function dependensi($id)
	{
		return $this->datamodel->cek_dependensi($id);
	}
	
	public function do_upload()
	{
		//upload image
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '1000';
		$config['max_width']  = '1025';
		$config['max_height']  = '769';
		$config['encrypt_name']  = TRUE;
	
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$nama = $this->upload->file_name;
		
		if ( ! $this->upload->do_upload())
		{
			
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('upload_form', $error);
		}
		else
		{
			$this->resize_image();
			$this->watermark_image($this->upload->file_name);
			$this->thumb_image($this->upload->file_name);
		}
	}
	
	private function resize_image()
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'uploads/'.$this->upload->file_name;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 600;
		$config['height'] = 400;
		$this->image_lib->initialize($config);
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
		if ( ! $this->image_lib->resize())
		{
		echo $this->image_lib->display_errors();
		}
		$this->image_lib->clear();
	}
	
	private function thumb_image($nama)
	{
		//membuat thumbnail image
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = 'uploads/'.$nama;
        $config_resize['new_image'] = 'uploads/thumbs';
		$config_resize['overwrite'] = TRUE;
        $config_resize['maintain_ratio'] = TRUE;
        $config_resize['create_thumb'] = TRUE;
        $config_resize['thumb_marker'] = '_thumb';
		$config_resize['width'] = 75;
        $config_resize['height'] = 50;
        $this->load->library('image_lib',$config_resize);
		$this->image_lib->resize();
		$this->image_lib->initialize($config_resize);
		echo $nama;
        if ( !$this->image_lib->resize()){
            $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));  
			echo "resize gagal";
		}
		else
		{
			echo "resize sukses";
			echo $this->upload->upload_path.$this->upload->file_name;
		}
	}
	
	private function watermark_image($nama)
	{
		unset($config);
		$config['source_image'] = 'uploads/'.$this->upload->file_name;
		$config['image_library'] = 'gd2';
		$config['wm_text'] = 'Ridwan 12131279';
		$config['wm_type'] = 'text';
		$config['wm_font_path'] = './system/fonts/texb.ttf';
		$config['wm_font_size'] = '16';
		$config['wm_font_color'] = 'aeaeae';
		$config['wm_vrt_alignment'] = 'middle';
		$config['wm_hor_alignment'] = 'center';
		$config['wm_padding'] = '20';
		$config['overwrite'] = true;
		$this->image_lib->initialize($config);
		$this->image_lib->watermark();
		if ( !$this->image_lib->watermark()){
                $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));  
				echo "watermark gagal";
				
			}
			else
			{
				echo "watermark sukses";
			}
		
	}
	


	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

