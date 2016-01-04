<?php
class Customers_model extends CI_Model {

    var $CompanyName  = '';
    var $ContactName = '';
    

    function __construct()
    {        
        parent::__construct();
    }
    
    function get_customers()
    {
        $query = $this->db->get('customers');
        return $query->result();
    }

    function get_customers_by_id($id)
    {
        $this->db->where('CustomerID',$id);
        $query = $this->db->get('customers');
        return $query->row();
    }

    function insert_entry()
    {
        $this->CompanyName  = $this->input->post('CompanyName',true); 
		$this->ContactName  = $this->input->post('ContactName',true);        
        return $this->db->insert('customers', $this);
    }

    function update_entry()
    {
        $this->CompanyName  = $this->input->post('CompanyName',true); 
        $this->ContactName   = $this->input->post('ContactName',true);         
        return $this->db->update('customers', $this, array('CustomerID' => $this->input->post('id',true)));
    }

    function hapus($id)
    {
        $this->db->where('CustomerID',$id);
        return $this->db->delete('customers');
    }

    function cek_dependensi($id)
    {
        $this->db->where('CustomerID',$id);
        $query = $this->db->count_all('customers');
        return ($query==0) ? true : false;
    }
}