<?php
class Message
{
    public $id;
    public $name;
    public $email;
    public $message;
    public $status;
    public $date;
    public function __construct($id, $name, $email, $message, $status, $date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->status = $status;
        $this->date = $date;
    }
    public static function getAllMessages($conn)
    {
        try {
            $query = "SELECT * FROM message ORDER BY date DESC";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $messages = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $message = new Message(1, "", "", "", "", "");
                $message->id = $row['id'];
                $message->name = $row['name'];
                $message->email = $row['email'];
                $message->message = $row['message'];
                $message->status = $row['status'];
                $message->date = $row['date'];
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
            return new Message($message["id"], $message["name"], $message["email"], $message["message"], $message["status"], $message["date"]);
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
}
