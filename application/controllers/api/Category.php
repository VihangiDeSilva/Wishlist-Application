<?php
/**
 * Created by PhpStorm.
 * User: sajith
 * Date: 1/24/19
 * Time: 10:54 AM
 */
require(APPPATH . 'libraries/REST_Controller.php');
require(APPPATH . 'libraries/Format.php');

use Restserver\Libraries\REST_Controller;

class Category extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('categoryModel');
    }

    public function index_get() {
        $categories = $this->categoryModel->getCategories() ;
        $this->response($categories, 200);
    }
}