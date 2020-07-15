<?php

class Validator {
  private $data;
  private $errors = [];
  protected $fields = [];

  function __construct($postData) {
    $this->data = $postData; 
  }

  private function validate($field, $regex, $message) {
    $value = trim($this->data[$field]);
    
    if (empty($value)) {
      $this->pushError($field, "$field cannot be empty.");
    } elseif (!preg_match($regex, $value)) {
      $this->pushError($field, $message);
    }
  }

  private function pushError($field, $errMes) {
    $this->errors[$field] = $errMes; 
  }

  function validateForm () {
    foreach ($this->fields as $key => $value) {
      if (!array_key_exists($key, $this->data)) {
        trigger_error("$key is not present in data");
        return;
      }
    }

    foreach ($this->fields as $key => $value) {
      $this->validate($key, $value['regex'], $value['message']);
    }

    return $this->errors;
  }

  function setFields($fields) {
    $this->fields = $fields;
  }

  function addFields($fields) {
    foreach ($fields as $field) {
      $this->fields[] = $field;
    }
  }
}


class LoginValidator extends Validator {
  protected $fields = [
    'username' => [
      'regex' => '/^.+$/',
      'message' => ''
    ], 
    'password' => [
      'regex' => '/^.+$/',
      'message' => ''
    ]
  ];
}

class SignupValidator extends Validator {
  protected $fields = [
    'username' => [
      'regex' => '/^[A-Za-z0-9]{4,20}$/',
      'message' => 'password must be 4-20 characters and alphanumeric.'
    ], 
    'password' => [
      'regex' => '/^[A-Za-z0-9]{4,20}$/',
      'message' => 'password must be 4-20 characters and alphanumeric.'
    ],
    'email' => [
      'regex' => '/^\w{4,20}@\w{2,20}\.\w{2,20}$/',
      'message' => 'please enter a valid email (e.g., John_Doe@gmail.com)'
    ] 
  ];
}

class ManagerValidator extends Validator {
  protected $fields = [
    'fullname' => [
      'regex' => '/^[A-Za-z ]{1,50}$/',
      'message' => 'fullname must be alphabetic (a-z or A-Z).'
    ], 
    'username' => [
      'regex' => '/^[A-Za-z0-9]{4,20}$/',
      'message' => 'password must be 4-20 characters and alphanumeric.'
    ], 
    'password' => [
      'regex' => '/^[A-Za-z0-9]{4,20}$/',
      'message' => 'password must be 4-20 characters and alphanumeric.'
    ],
    'email' => [
      'regex' => '/^\w{4,20}@\w{2,20}\.\w{2,20}$/',
      'message' => 'please enter a valid email (e.g., John_Doe@gmail.com)'
    ] 
  ];
}

class HomeSlideshowValidator extends Validator {
  protected $fields = [
    'title' => [
      'regex' => '/^.+$/',
      'message' => ''
    ], 
    'caption' => [
      'regex' => '/^.+$/',
      'message' => ''
    ],
    'order' => [
      'regex' => '/^\d+|(auto)$/',
      'message' => 'Order must be a positive number or "auto"'
    ]
  ];
}
