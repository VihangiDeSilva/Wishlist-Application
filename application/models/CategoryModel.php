<?php
/**
 * Created by PhpStorm.
 * User: sajith
 * Date: 1/24/19
 * Time: 10:52 AM
 */

class CategoryModel extends CI_Model {

    public function getCategories() {
        $query = $this->db->get("category");
        return $query->result_array();
    }
}