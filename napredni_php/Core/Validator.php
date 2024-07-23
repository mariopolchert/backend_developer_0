<?php

namespace Core;

class Validator
{
    private Database $db;
    private array $data = [];
    private array $errors = [];

    public function __construct(
        private array $rules,
        private array $form
    )
    {
        $this->db = new Database();
        $this->validate();
    }

    public function notValid()
    {
        return !empty($this->errors);
    }

    public function getData(): array
    {
        return $this->form;
    }

    public function errors(): array
    {
        return $this->errors;
    }

    private function addError(string $key, string $error)
    {
        $this->errors[$key] = $error;
    }

    private function validate()
    {
        foreach ($this->rules as $field => $rules) {
            $userInput = $this->form[$field] ?? null;

            foreach ($rules as $rule) {

                $additional = null;
                if (str_contains($rule, ':')) {
                    $pieces = explode(':', $rule);
                    $rule = $pieces[0];
                    $additional = $pieces[1];
                }

                call_user_func([$this, $rule], $userInput, $field, $additional);
            }
        }
    }

    private function exists($userInput, $field, $table)
    {
        $sql = "SELECT COUNT(id) AS count from $table WHERE $field = :val";
        $result = $this->db->query($sql, [
            'val' => $userInput
        ])->find();

        if ($result['count'] > 0)
            $this->addError($field, "Podatak za $field {$userInput} vec postoji u nasoj bazi.");
    }

    private function unique($userInput, $field, $table)
    {
        $sql = "SELECT COUNT(id) AS count from $table WHERE $field = :val AND id != :id";
        $result = $this->db->query($sql, [
            'val' => $userInput,
            'id' => $_POST['id']
        ])->find();

        if ($result['count'] > 0)
            $this->addError($field, "Podatak za $field {$userInput} vec postoji u nasoj bazi.");
    }


    private function required($userInput, $field)
    {
        if(empty($userInput)){
            $this->addError($field, "Polje $field je obavezno!");
        }
    }

    private function string($userInput, $field)
    {
        if(!is_string($userInput)){
            $this->addError($field, "Polje $field mora biti tekst!");
        }
    }

    private function numeric($userInput, $field)
    {
        if(!is_numeric($userInput)){
            $this->addError($field, "Polje $field mora brojcana vrijednost!");
        }
    }

    private function email($userInput, $field)
    {
        if(!filter_var($userInput, FILTER_VALIDATE_EMAIL)){
            $this->addError($field, "Polje $field mora valjana e-mail adresa!");
        }
    }

    private function phone($userInput, $field)
    {
        // if(!preg_match('/+[0-9]/', $userInput)){
        //     $this->addError($field, "Polje $field mora valjana e-mail adresa!");
        // }
    }

    private function max($userInput, $field, $length)
    {
        if(strlen($userInput) > $length){
            $this->addError($field, "Polje $field ne smije biti duze od $length znakova.");
        }
    }
}