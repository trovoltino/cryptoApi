<?php

session_start();
/**
* Base connection class.
*/
abstract class BaseConnection
{
    protected $email;
    protected $errorList = ['errorEmail'=>false, 'errorPw'=>false, 'errorFields' =>false];

    public function __construct($email)
    {
        $this->email = $email;
    }
    /**
    * Sets connection.
    */
    protected function connectToDb()
    {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "mage_bit";
        $charSet = "utf-8";
        try {
            $db = new PDO("mysql:host=$host; dbname=$database; charset = $charSet", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOExeption $e) {
            echo "Connection failed: ".$e->getMessage();
        }
    }
    /**
    * Checks if persons name is valid.
    */
    public function nameCheck($name)
    {
        $fullName = explode(" ", $name);
        foreach ($fullName as $value) {
            if (!preg_match("/^[a-zA-Z]*$/", $value)) {
                $this->errorList['errorFields'] = true;
                echo json_encode($this->errorList);
                exit();
            } elseif (empty($value)) {
                $this->errorList['errorFields'] = true;
                echo json_encode($this->errorList);
                exit();
            }
        }
        return $name;
    }
    /**
    * Cheks if email is valid.
    */
    public function emailCheck($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errorList['errorEmail'] = true;
            echo json_encode($this->errorList);
            exit();
        } elseif (empty($email)) {
            $this->errorList['errorFields'] = true;
            echo json_encode($this->errorList);
            exit();
        }
    }
    /**
    * Checks if password is not emty.
    */
    public function pwCheck($password)
    {
        if (empty($password)) {
            $this->errorList['errorFields'] = true;
            echo json_encode($this->errorList);
            exit();
        }
    }
}
