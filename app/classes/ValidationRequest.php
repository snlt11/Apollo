<?php

namespace App\classes;
use Illuminate\Database\Capsule\Manager as DB;
class ValidationRequest
{
    private array $errors = [];
    private array $errorMessages = [
        'unique' => ':attribute must be unique.',
        'required' => ':attribute is required.',
        'minLength' => ':attribute must be at least :values characters long.',
        'maxLength' => ':attribute must be no more than :values characters long.',
        'email' => ':attribute must be a valid email address.',
        'string' => ':attribute must be a string.',
        'number' => ':attribute must be an number.',
        'mixed' => ':attribute must be a mixed type.',
    ];
    public function checkValidate($data, $rules): void
    {
        /*
         * $data = ["name" => "John Doe"];
         * $rules = ["name" => ["required"=>true,"minLength"=>3|"maxLength"=>25]];
         */
        foreach ($data as $key => $value) {
            if(isset($rules[$key])) {
                $this->doValidation([
                    'keys' => $key,
                    'values' => $value,
                    'rules' => $rules[$key]
                ]);
            }
        }
    }
    public function doValidation(array $data): void
    {
        $keys   = $data['keys'];
        $values = $data['values'];
        $rules  = $data['rules'];
        foreach ($rules as $ruleMethod => $ruleValue) {
            $valid = call_user_func_array([$this, $ruleMethod],[$keys,$values,$ruleValue]);
            if(!$valid){
                $this->setError([
                    str_replace(
                        [":attribute", ":values"],
                        [$keys, $ruleValue],
                        $this->errorMessages[$ruleMethod],
                    ),
                    $keys
                ]);
            }
        }
    }

    public function setError($error,$errorMessage = null): void
    {
        if($errorMessage){
            $this->errors[$error] = $error;
        }else{
            $this->errors[] = $error;
        }
    }
    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }
    public function getErrors(): array
    {
        return $this->errors;
    }
    public function unique($column,$value,$rule)
    {
        if($value != null && !empty(trim($value))){
            return !DB::table($rule)->where($column, $value)->exists();
        }
    }
    public function required($column,$value,$rule): bool
    {
        return !empty(trim($value));
    }
    public function minLength($column,$value, $length): bool
    {
        return !empty(trim($value)) && strlen($value) >= $length;
    }
    public function maxLength($column,$value, $length): bool
    {
        return !empty(trim($value)) && strlen($value) <= $length;
    }
    public function email($column,$value,$rule): bool
    {
        return !empty(trim($value)) && filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    public function string($column,$value,$rule): bool
    {
        return !empty(trim($value)) && preg_match('/^[a-zA-Z ]+$/', $value);
    }
    public function number($column,$value,$rule): bool
    {
        return !empty(trim($value)) && preg_match('/^[0-9.]+$/', $value);
    }
    public function mixed($column,$value,$rule): bool
    {
        return !empty(trim($value)) && preg_match('/^[a-zA-Z0-9 ]+$/', $value);
    }
}