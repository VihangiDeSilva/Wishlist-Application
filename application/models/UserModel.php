<?php
/**
 * Created by PhpStorm.
 * User: sajith
 * Date: 1/17/19
 * Time: 12:35 PM
 */

class UserModel extends CI_Model {

    public function insertUser($user) {
        $return = array();
        $this->db->where('username', $user['username']);
        $res = $this->db->get('user');
        if ($res->num_rows() == 1) {
            $return["status"] = "ALREADY_USER";
        } else {
            $this->db->insert('user', $user);
            $return["status"] = "SUCCESS";
            $return["user_id"] = $this->db->insert_id();
        }
        return $return;
    }

    public function login($user) {
        $response = array();
        $this->db->where('username', $user['username']);
        $res = $this->db->get('user');
        if ($res->num_rows() != 1) {
            $response["status"] = "NOT_REGISTERED";
        } else {
            $row = $res->row();
            $has_password = $row->password;
            if (sha1($user['password']) == $has_password) {
                $response["status"] = "SUCCESS";
                $response["user"] = $row;
            } else {
                $response["status"] = "PWD_INCORRECT";
            }
        }
        return $response;
    }

    public function getUser($id){
        $this->db->select('list_name,description');
        $this->db->where('id',$id);
        $query = $this->db->get('user');
        return $query->row();
    }
}