<?php
/**
 * Created by PhpStorm.
 * User: sajith
 * Date: 1/20/19
 * Time: 7:08 AM
 */
require(APPPATH . 'libraries/REST_Controller.php');
require(APPPATH . 'libraries/Format.php');

use Restserver\Libraries\REST_Controller;

class Item extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('userModel');
        $this->load->model('itemModel');
    }

    public function index_get($user_id) {
        $items = $this->itemModel->getList($user_id);
        if ($items) {
            $this->response($items, 200);
        } else {
            $this->response(array("status" => "No Items"), 404);
        }

    }

    public function index_post() {
        $item = array(
            "user_id" => $this->post("user_id"),
            "url" => $this->post("url"),
            "price" => $this->post("price"),
            "category_id" => $this->post("category_id"),
            "status_id" => $this->post("status_id"),
            "title" => $this->post("title"),
            "description" => $this->post("description")
        );
        $item_id = $this->itemModel->insertItem($item);
        $this->response(array("id" => $item_id), 200);
    }

    public function index_put() {
        $item = array(
            "id" => $this->put('id'),
            "user_id" => $this->put("user_id"),
            "url" => $this->put("url"),
            "price" => $this->put("price"),
            "category_id" => $this->put("category_id"),
            "status_id" => $this->put("status_id"),
            "title" => $this->put("title")
        );
        $this->itemModel->updateItem($item);
        $this->response(array("status" => "Item Updated"), 200);
    }

    public function index_delete($id) {
        $this->itemModel->deleteItem($id);
        $this->response(array("status" => "Item Deleted"), 204);
    }


}