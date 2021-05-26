<?php
/*
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
*/
/* 
    Created on : Dec 15, 2020, 1:18:02 PM
    Author     : Vihangi
*/


defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . 'libraries/REST_Controller.php');
require(APPPATH . 'libraries/Format.php');

use Restserver\Libraries\REST_Controller;

class User extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('userModel');
    }

    //function for get the index of user
    public function index_get($id){
        $user=$this->userModel->getUser($id);
        $this->response($user,200);
    }

    function login_post() {

        $username = $this->post("username");
        $password = $this->post("password");
        $user = array("username" => $username, "password" => $password);

        $result = $this->userModel->login($user);
        $login_status = $result["status"];
        if ($login_status == "SUCCESS") {
            $this->response(array(
                'id' => $result["user"]->id,
                'list_name' => $result["user"]->list_name,
                'list_description' => $result["user"]->description),
                200);
        } elseif ($login_status == "NOT_REGISTERED") {
            $this->response(array("status" => "NOT_REGISTERED"), 401);
        } elseif ($login_status == "PWD_INCORRECT") {
            $this->response(array("status" => "PWD_INCORRECT"), 401);
        }


    }

    public function signup_post() {
        $user = array(
            "username" => $this->post('username'),
            "password" => sha1($this->post('password')),
            "list_name" => $this->post('list_name'),
            "description" => $this->post('list_description')
        );
        $signup_status = $this->userModel->insertUser($user);
        if ($signup_status["status"] == "ALREADY_USER") {
            $this->response(array("status" => "ALREADY_USER"), 409);
        } else {
            $this->response(array(
                "status" => "USER_REGISTERED",
                "user_id" => $signup_status["user_id"],
                "user" => $user), 200);
        }
    }

}

