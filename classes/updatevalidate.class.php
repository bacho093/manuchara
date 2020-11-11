<?php

class Updatevalidate extends Dbh {

    private $data;
    private $errors = [];
    private static $fields = ['firstname', 'lastname', 'email', 'phone'];

    public function __construct($post_data) 
    {
        $this->data = $post_data;
    }

    public function validateForm() {
        foreach(self::$fields as $field) {
            if(!array_key_exists($field, $this->data)){
                trigger_error("$field is not present in data");
                return;
            }
        }

        $this->validateFirstname();
        $this->validateLastname();
        $this->validateEmail();
        $this->validatePhone();

        return $this->errors;
    }

    private function validateFirstname() {
        $val = trim($this->data['firstname']);

        if(empty($val)) {
            $this->addError('firstname', 'Firstname can not be empty');
        }
        else {
            if(!preg_match("/^[a-zA-Z-' ]*$/",$val)) {
                $this->addError('firstname', 'Firstname must be 6-12 chars & alphanumeric');
            }
        }
    }

    private function validateLastname() {
        $val = trim($this->data['lastname']);

        if(empty($val)) {
            $this->addError('lastname', 'Lastname can not be empty');
        }
        else {
            if(!preg_match("/^[a-zA-Z-' ]*$/",$val)) {
                $this->addError('lastname', 'Lastname must be 6-12 chars & alphanumeric');
            }
        }
    }

    private function validateEmail() {
        $val = trim($this->data['email']);

        $sql = "SELECT email FROM users";
        $stmt = $this->connect()->query($sql);
        while($row=$stmt->fetch()) {
            if($val == $row['email'] && $val != $_SESSION['email']) {
                $this->addError('email', 'Email already exists');
            }
        }

        if(empty($val)) {
            $this->addError('email', 'Email can not be empty');
        }
        else {
            if(!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'Email must be a valid email');
            }
        }
    }

    private function validatePhone() {
        $val = trim($this->data['phone']);

        if(empty($val)) {
            $this->addError('phone', 'Phone number can not be empty!');
        }
        elseif(preg_match("/^[a-zA-Z-']*$/",$val)) {
            $this->addError('phone', 'Incorrect Phone Number.');
        }
    }

    private function addError($key, $val) {
        $this->errors[$key] = $val;
    }

}
