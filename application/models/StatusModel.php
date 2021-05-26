<?php
/**
 * Created by PhpStorm.
 * User: sajith
 * Date: 1/24/19
 * Time: 10:54 AM
 */

class StatusModel extends CI_Model {

    public function getStatus() {
        $query = $this->db->get("status");
        return $query->result_array();
    }
}