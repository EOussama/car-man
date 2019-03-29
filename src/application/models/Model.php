<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

    public $modelID;
    public $brandID;
    public $modelName;

    function getBrandModels($brandID) {
        
        // Connecting to the database.
        $this->load->database();

        $this->db->select('*');
        $this->db->from('Models');
        $this->db->where('BrandID', $brandID);

        $query = $this->db->get();
        return $query->result_array();
    }
}
