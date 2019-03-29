<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Record extends CI_Model {

    public $recordID;
    public $email;
    public $brandID;
    public $modelID;
    public $plateNumber;
    public $year;
    public $motive;
    public $observation;
    public $image;

    function insert($recordID, $email, $brandID, $modelID, $plateNumber, $year, $motive, $observation, $image) {
        
        // Connecting to the database.
        $this->load->database();

        $data = [
            'RecordID' => $recordID,
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

    function exists($recordID) {

        // Connecting to the database.
        $this->load->database();
        
        $this->db->where('RecordID', $recordID);

        $query = $this->db->get('records');

        return $query->num_rows() > 0;
    }
}
