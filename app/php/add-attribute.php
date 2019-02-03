<?php

/**
* Create attribute table for user, only when loged in.
*/
class AddAttribute extends BaseConnection
{
    public function __construct($attribute, $attributeValue)
    {
        $this->attributeValue = $attributeValue;
        $this->attribute = $this->nameCheck($attribute);
        $this->addData();
    }
    /**
    * Adds attribute data to user.
    */
    public function addData()
    {
        $db = $this->connectToDb();
        
        $sql = "CREATE TABLE IF NOT EXISTS $this->attribute (
            id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            userId int NOT NULL,
            $this->attribute varchar(35),
            FOREIGN KEY (userId) REFERENCES users(id))";

        $db->query($sql);
        
        $sqlInsert = "INSERT INTO $this->attribute (userId, $this->attribute) VALUES (?,?)";
        $stmt = $db->prepare($sqlInsert);
        $stmt->execute(array($_SESSION['id'], $this->attributeValue));
        echo json_encode($this->errorList);
    }
}
