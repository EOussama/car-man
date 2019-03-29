<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Model {

    public $brandID;
    public $brandName;

    function getAll() {

        // Connecting to the database.
        $this->load->database();

        $this->db->select('*');
        $this->db->from('Brands');

        $query = $this->db->get();
        return $query->result_array();
    }
}
