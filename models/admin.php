<?php
class Admin
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

    public static function login($conn, $admin)
    {
        $username = $admin->username;
        $password = $admin->password;
        $query = "select * from admin where admin.username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($admin && password_verify($password, $admin['password'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function changePassword($conn, $admin)
    {
        $query = "update admin set admin.password = :password where admin.username = :username";
        $username = $admin->username;
        $password = password_hash($admin->password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }
}
