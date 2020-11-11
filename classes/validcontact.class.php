<?php

class Validcontact extends Dbh {
    private $errors = [];
    private $data;
    private static $fields = ['username','user-email','user-phone','user-msg'];

    public function __construct($post_data) {
        $this->data = $post_data;
    }

    public function validatecont() {
        foreach(self::$fields as $field)
        {
            if(!array_key_exists($field, $this->data))
            {
                trigger_error("$field in not present in data");
            }
        }

        $this->validateUsername();
        $this->validateUserEmail();
        $this->validateUserPhone();
        $this->validateUserMsg();

        return $this->errors;
    }

    private function validateUsername() {
        $val = trim($this->data['username']);

        if(empty($val)) {
            $this->addError('username', 'Name can not be empty');
        }
        else {
            if(!preg_match("/^[a-zA-Z-' ]*$/",$val)) {
                $this->addError('firstname', 'Name must be 4-12 chars & alphanumeric');
            }
        }
    }
    private function validateUserEmail() {
        $val = trim($this->data['user-email']);

        if(empty($val)) {
            $this->addError('user-email', 'Email can not be empty');
        }
        else {
            if(!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('user-email', 'Email must be a valid email');
            }
        }
    }
    private function validateUserPhone() {
        $val = trim($this->data['user-phone']);

        if(empty($val)) {
            $this->addError('user-phone', 'Phone number can not be empty!');
        }
        elseif(preg_match("/^[a-zA-Z-']*$/",$val)) {
            $this->addError('user-phone', 'Incorrect Phone Number.');
        }
    }
    private function validateUserMsg() {
        $val = trim($this->data['user-msg']);

        if(empty($val))
        {
            $this->addError('user-msg', 'Text Field can not be empty!');
        }
        elseif(strlen($val) < 20 || strlen($val) > 200)
        {
            $this->addError('user-msg', 'The text must contain at least 5 words.');
        }
    }

    private function addError($key, $val) {
        $this->errors[$key] = $val;
    }
}