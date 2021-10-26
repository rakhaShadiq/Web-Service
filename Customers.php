<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// hanya boleh menggunakan request method GET
header('Access-Control-Allow-Methods: GET');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Customers extends REST_Controller {

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    // mengambil data customer dengan request method GET
    public function index_get()
    {
        $id = $this->get('id');

        if(!empty($id))
        {
            $this->db->where('CustomerID', $id);
        } 
        $data = $this->db->get('customers')->result();

        $result = [
            'took' => $_SERVER['REQUEST_TIME_FLOAT'],
            'code' => 200,
            'message' => 'Response successfully!',
            'data' => $data
        ];

        $this->response($result, $result['code']);
    }

}