<?php

namespace App\classes;

use Illuminate\Database\Capsule\Manager as DB;

class ValidationRequest
{
    /**
     * @param $table' Table name
    * @param $column' Column name
     * @param string $column
     * @param $value Column's Value
     * @return bool
     */
    private array $errors = [];
    private array $error_messages = [
        'unique' => ':attribute already exists',
        'required' => ':attribute is required',
        'minLength' => ':attribute must be at least :min characters long',
        'maxlength' => ':attribute must be at most :max characters long',
        'email' => ':attribute must be a valid email address',
        'string' => ':attribute must be a string',
        'integer' => ':attribute must be an integer',
        'mixed' => ':attribute must contain alphanumeric characters and special symbols (@$)',
    ];

    public function checkValidate($data,$rules): void
    {
        foreach ($data as $column => $value) {
            if(isset($rules[$column])){
                $this->doValidation([
                    'column' => $column,
                    'value' => $value,
                    'rules' => $rules[$column]
                ]);
            }
        }
    }
    /*
        ruleMethod == 'unique' || 'email' || 'integer'...
        inputValue == null || inputValue == '' || inputValue == []...
    */
    public function doValidation(array $data): void
    {
        $column = $data['column'];
        $value = $data['value'];
        $rules = $data['rules'];

        foreach ($rules as $ruleKey => $ruleValue) {

            $ruleMethod = is_int($ruleKey) ? $ruleValue : $ruleKey;
            $inputValue = is_int($ruleKey) ? null : $ruleValue;

            if (method_exists($this, $ruleMethod) && !$this->$ruleMethod($value, $inputValue)) {
                $errorMessage = str_replace(
                    [':attribute', ':min', ':max'],
                    [$column, $inputValue, $inputValue],
                    $this->error_messages[$ruleMethod]
                );
                $this->setError($errorMessage, $column);
            }
        }
    }

    /*
        $errorMethod = 'unique' || 'email' || 'integer'...
        $errorMessage = 'already exists' || ' is required' || ' must be at least :min'...
     */
    public function setError($errorMethod, $errorMessage = null): void
    {
        $this->errors[$errorMessage?? count($this->errors)] = $errorMethod;
    }
    public function getErrors(): array
    {
        return $this->errors;
    }
    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    public function unique(string $table, string $column, $value): bool
    {
        return !empty(trim($value)) && DB::table($table)->where($column, $value)->exists();
    }
    public function required($value): bool
    {
        return!empty(trim($value));
    }
    public function minLength($value, $length): bool
    {
        return !empty(trim($value)) && strlen($value) >= $length;
    }
    public function maxlength($value, $length): bool
    {
        return !empty(trim($value)) && strlen($value) <= $length;
    }
    public function email($value): bool
    {
        return !empty(trim($value)) && filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    public function string($value): bool
    {
        return !empty(trim($value)) && preg_match('/^[a-zA-Z ]+$/', $value);
    }
    public function integer($value): bool
    {
        return !empty(trim($value)) && preg_match('/^[0-9.]/',$value);
    }
    public function mixed($value): bool
    {
        return !empty(trim($value)) && preg_match('/^[a-zA-Z0-9 $@]+$/', $value);
    }

}