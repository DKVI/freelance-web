<?php
class Email
{
    public $id;
    public $username;
    public $password;

    public function __construct($id, $username, $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
    public static function getEmail($conn, $id)
    {
        $query = "SELECT * FROM email WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $email = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($email) {
            return new Email($email['id'], $email['username'], $email['password']);
        } else {
            return null;
        }
    }
}
