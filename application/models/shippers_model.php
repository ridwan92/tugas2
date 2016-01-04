<?php
class Shippers_model extends CI_Model {

    var $CompanyName  = '';
    var $Phone = '';
    

    function __construct()
    {        
        parent::__construct();
    }
    
    function get_shippers()
    {
        $query = $this->db->get('shippers');
        return $query->result();
    }

    function insert_entry()
    {
        $this->CompanyName  = $this->input->post('nm_com'); 
        $this->Phone   = $this->input->post('telpon');         
        $this->db->insert('shippers', $this);
    }

    function update_entry()
    {
        $this->Companyname  = $this->input->post('nm_com'); 
        $this->Phone   = $this->input->post('telpon'); 
        
        $this->db->update('shippers', $this, array('ShipperID' => $_POST['id']));
    }
}