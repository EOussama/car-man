<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Record extends CI_Model {

    public $recordID;
    public $name;
    public $email;
    public $brandID;
    public $modelID;
    public $plateNumber;
    public $year;
    public $motive;
    public $observation;
    public $image;

    function insert($name, $email, $brandID, $modelID, $plateNumber, $year, $motive, $observation, $image) {
        
        // Connecting to the database.
        $this->load->database();

        $data = [
            'Name' => $name,
            'Email' => $email,
            'BrandID' => $brandID,
            'ModelID' => $modelID,
            'PlateNumber' => $plateNumber,
            'Year' => $year,
            'Motive' => $motive,
            'Observation' => $observation,
            'Image' => $image
        ];

        // Inserting the data.
        $this->db->insert('Records', $data);
    }
}
