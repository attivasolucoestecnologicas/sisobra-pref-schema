<?php

if (!function_exists('str_numbers')) {
    function str_numbers($value)
    {
        if ($value) {
            return preg_replace('/[^0-9]/', '', $value);
        }
        return null;
    }
}

if (!function_exists('check_cpf_cnpj')) {
    function check_cpf_cnpj($value)
    {
        if ($value) {
            if (strlen(str_numbers($value)) == 11) {
                return 'cpf';
            }
            if (strlen(str_numbers($value)) == 14) {
                return 'cnpj';
            }
        }
        return null;
    }
}