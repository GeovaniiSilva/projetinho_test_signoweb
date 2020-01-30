<?php

class Contact {

    private $id;
    private $name;
    private $email;
    private $phone;
    private $birth;
    private $address;

    /*
    public function __construct($id, $name, $email, $phone, $birth, $address){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->birth = $birth;
        $this->address = $address;
    }
    */

    public function get_id(){
        return $this->id;
    }

    public function get_name(){
        return $this->name;
    }

    public function get_email(){
        return $this->email;
    }

    public function get_phone(){
        return $this->phone;
    }

    public function get_birth(){
        return $this->birth;
    }

    public function get_address(){
        return $this->address;
    }

    public function set_id($id){
        $this->id = $id;
    }

    public function set_name($name){
        $this->name = $name;
    }

    public function set_email($email){
        $this->email = $email;
    }

    public function set_phone($phone){
        $this->phone = $phone;
    }

    public function set_birth($birth){
        $this->birth = $birth;
    }

    public function set_address($address){
        $this->address = $address;
    }

    

}