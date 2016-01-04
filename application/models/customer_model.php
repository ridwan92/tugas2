<?php
class Customer_model extends CI_Model {

    var $CustomerName  = '';
    var $Description = '';
    

    function __construct()
    {        
        parent::__construct();
    }
    
    function get_Custome()
    {
        $query = $this->db->get('Customer');
        return $query->result();
    }

    function get_Customer_by_id($id)
    {
        $this->db->where('CustomerID',$id);
        $query = $this->db->get('Customer');
        return $query->row();
    }

    function insert_entry()
    {
        $this->CustomerName  = $this->input->post('CustomerName',true); 
        $this->Description   = $this->input->post('Description',true);         
        return $this->db->insert('Customer', $this);
    }

    function update_entry()
    {
        $this->CustomerName  = $this->input->post('CustomerName',true); 
        $this->   = $this->input->post('Description',true);         
        return $this->db->update('Customer', $this, array('CustomerID' => $this->input->post('id',true)));
    }

    function hapus($id)
    {
        $this->db->where('CustomerID',$id);
        return $this->db->delete('Customer');
    }

    function cek_dependensi($id)
    {
        $this->db->where('CustomerID',$id);
        $query = $this->db->count_all('Customer');
        return ($query==0) ? true : false;
    }
}