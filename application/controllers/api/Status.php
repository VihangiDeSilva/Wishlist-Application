<?php
/**
 * Created by PhpStorm.
 * User: sajith
 * Date: 1/24/19
 * Time: 10:55 AM
 */
require(APPPATH . 'libraries/REST_Controller.php');
require(APPPATH . 'libraries/Format.php');

use Restserver\Libraries\REST_Controller;

class Status extends REST_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('statusModel');
    }

    public function index_get(){
        $status=$this->statusModel->getStatus();
        $this->response($status,200);
    }
}