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
        return !empty(trim($value)) && preg_match('/^[a-zA-Z]+$/', $value);
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