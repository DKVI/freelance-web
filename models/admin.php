<?php
class Admin
{
    public $id;
    public $username;
    public $password;
    public $email;
    public function __construct($id, $username, $password, $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
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

    public static function verifyEmail($conn, $email)
    {
        $query = "SELECT * FROM admin WHERE admin.email = :email";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($admin) {
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

    public static function changePasswordAfterVerify($conn, $admin)
    {
        $query = "update admin set admin.password = :password where admin.email = :email";
        $email = $admin->email;
        $password = password_hash($admin->password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }
}
