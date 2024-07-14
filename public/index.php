<?php

use App\classes\Session;

require_once("../bootstrap/init.php");

$data = [
    'name' => 'John Doe',
    'age' => 1,
    'email' => 'test@gmail.com'
];
$rules = [
    'name' => ['required','string','minLength' => 5,'maxlength' => 10],
    'age' => ['integer','minLength' => 1],
    'email' => ['required', 'email']
];

$validator = new App\classes\ValidationRequest();
$validator->checkValidate($data, $rules);
if($validator->hasErrors()){
    beautify($validator->getErrors());
}else{
    echo "Validation passed";
}

