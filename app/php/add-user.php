<?php

/**
* Adds user to DB.
*/
class AddUser extends BaseConnection
{
    public function __construct($email, $userName, $userPw)
    {
        parent::__construct($email);
        $this->setHash($userPw);
        $this->userName = $this->nameCheck($userName);
        $this->addData();
    }
    /**
    * hashes PW
    */
    private function setHash($userPw)
    {
        $this->emailCheck($this->email);
        $this->pwCheck($userPw);
        $this->hashPw = password_hash($userPw, PASSWORD_DEFAULT);
    }
    /**
    * Adds data to DB.
    */
    public function addData()
    {
        $db = $this->connectToDb();
        $sql = ("SELECT * FROM users WHERE email = ?");
        $stmtEmail = $db->prepare($sql);
        $stmtEmail -> execute(array($this->email));
        $count = $stmtEmail->fetchAll(PDO::FETCH_ASSOC);

        /**
        * checks if account with given email already exists.
        */
        if (isset($count[0])) {
            $this->errorList['errorFields'] = true;
            echo json_encode($this->errorList);
        } else {
            // adds user to DB
            $stmt = $db->prepare("INSERT INTO users(name, email, password) VALUES(?,?,?)");
            $stmt -> execute(array($this->userName, $this->email, $this->hashPw));
            echo json_encode($this->errorList);
        }
    }
}
