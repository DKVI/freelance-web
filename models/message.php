<?php
class Message
{
    public $id;
    public $name;
    public $email;
    public $message;
    public $status;
    public $date;
    public $phone;
    public function __construct($id, $name, $email, $message, $status, $date, $phone)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->status = $status;
        $this->date = $date;
        $this->phone = $phone;
    }

    public static function addMessages($conn, $message)
    {
        $query = "INSERT INTO message(name, email, message, status, date) VALUES(:name,:email, :message, :status, :date)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $message->name);
        $stmt->bindParam(":email", $message->email);
        $stmt->bindParam(":message", $message->message);
        $stmt->bindParam(":status", $message->status);
        $stmt->bindParam(":date", $message->date);
        return $stmt->execute();
    }

    public static function getAllMessages($conn)
    {
        try {
            $query = "SELECT * FROM message ORDER BY time DESC";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $messages = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $message = new Message(1, "", "", "", "", "", "");
                $message->id = $row['id'];
                $message->name = $row['name'];
                $message->email = $row['email'];
                $message->message = $row['message'];
                $message->status = $row['status'];
                $message->date = $row['date'];
                $message->phone = $row['phone'];
                $messages[] = $message;
            }

            return $messages;
        } catch (PDOException $e) {
            echo "Error fetching messages: " . $e->getMessage();
            return [];
        }
    }
    public static function changeStatusAsRead($conn, $id)
    {
        $query = "UPDATE message SET status='done' WHERE id=:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
    public static function changeStatusAsUnRead($conn, $id)
    {
        $query = "UPDATE message SET status='pending' WHERE id=:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public static function getById($conn, $id)
    {
        $query = "SELECT * FROM message WHERE id=:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $message = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($message) {
            return new Message($message["id"], $message["name"], $message["email"], $message["message"], $message["status"], $message["date"], $message["phone"]);
        } else {
            return null;
        }
    }
    public static function deleteById($conn, $id)
    {
        $query = "DELETE FROM message WHERE id=:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public static function totalMessages($conn)
    {
        $query = "SELECT COUNT(*) AS totalQuestions FROM message";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['totalQuestions'];
    }
}
