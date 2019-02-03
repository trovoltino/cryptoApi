<?php
/**
* Forgot password manager.
*/
class ForgotPassword extends BaseConnection
{
    public function __construct($email)
    {
        parent::__construct($email);
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
        $this->validateUser($this->usersRow);
    }
    /**
    * Sends new password to user.
    */
    public function validateUser($users)
    {
        if (isset($users[0])) {
            // Here I would send email with link to new password
            $address = $users[0]{'email'};
            $subject = "Job";
            $message = "Here is your reset password link...etc";
            //mail($address, $subject, $message);
            echo json_encode($this->errorList);
        } else {
            $this->errorList['errorEmail'] = true;
            echo json_encode($this->errorList);
            exit();
        }
    }
}
