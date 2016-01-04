<?php
class Employees_model extends CI_Model {

    var $FirstName  = '';
    var $Title = '';
    

    function __construct()
    {        
        parent::__construct();
    }
    
    function get_employees()
    {
        $query = $this->db->get('employees');
        return $query->result();
    }

    function insert_entry()
    {
        $this->CategoryName  = $this->input->post('nm_cat'); 
        $this->Description   = $this->input->post('deskripsi');         
        $this->db->insert('categories', $this);
    }

    function update_entry()
    {
        $this->CategoryName  = $this->input->post('nm_cat'); 
        $this->Description   = $this->input->post('deskripsi'); 
        
        $this->db->update('categories', $this, array('CategoryID' => $_POST['id']));
    }
}