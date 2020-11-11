<?php

class Validator extends Dbh {

    private $data;
    private $errors = [];
    private static $fields = ['firstname', 'lastname', 'email', 'phone', 'password', 're-password'];

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
        $this->validatePassword();

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
            if($val == $row['email']) {
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

    private function validatePassword() {
        $val = trim($this->data['password']);
        $reVal = trim($this->data['re-password']);
        
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $val);
        $lowercase = preg_match('@[a-z]@', $val);
        $number    = preg_match('@[0-9]@', $val);
        $specialChars = preg_match('@[^\w]@', $val);

        if(empty($val)) {
            $this->addError('password', 'Password can not be empty');
        }
        if(empty($reVal) || !($val == $reVal))
        {
            $this->addError('re-password', 'The password must be the same.');
        }
        else {
            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($val) < 8) {
                $this->addError('password', 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
            }
        }

    }

    private function addError($key, $val) {
        $this->errors[$key] = $val;
    }

}
