<?php
/**
* User login system.
*/
class LoginUser extends BaseConnection
{
    public function __construct($email, $userPw)
    {
        parent::__construct($email);
        $this->userPw = $userPw;
        $this->collectRow();
        $this->connectToDb();
    }
    /**
    * Checks if user account exists.
    */
    public function collectRow()
    {
        $stmt = $this->connectToDb()->prepare("SELECT * FROM users WHERE email = ?");
        $stmt -> execute(array($this->email));
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->usersRow = $users;
        $this->validatePassword($this->usersRow);
    }
    /**
    * Validates password.
    */ 
    public function validatePassword($users)
    {
        if (isset($users[0])) {
            if (password_verify($this->userPw, $users[0]{'password'})) {
                $_SESSION['id'] = $users[0]{'id'};
                echo json_encode($this->errorList);
            } else {
                $this->errorList['errorPw'] = true;
                echo json_encode($this->errorList);
            }
        } else {
            $this->errorList['errorEmail'] = true;
            $this->errorList['errorPw'] = true;
            echo json_encode($this->errorList);
        }
    }
}
