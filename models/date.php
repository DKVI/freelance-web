<?php
class Date
{
    public $id;
    public $startTime;
    public $endTime;
    public $isReset;

    public function __construct($id, $startTime, $endTime, $isReset)
    {
        $this->id = $id;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->isReset = $isReset;
    }

    public static function getById($conn, $id)
    {
        $query = "SELECT * FROM date WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $date = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($date) {
            return new Date($date["id"], $date["startTime"], $date["endTime"], $date["isReset"]);
        } else {
            return null;
        }
    }

    public static function setNewTime($conn, $date)
    {
        $query = "UPDATE date SET startTime = :startTime, endTime = :endTime WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $date->id);
        $stmt->bindParam(":startTime", $date->startTime);
        $stmt->bindParam(":endTime", $date->endTime);
        return $stmt->execute();
    }

    public static function setStatus($conn, $date)
    {
        $query = "UPDATE date SET isReset = :isReset WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $date->id);
        $stmt->bindParam(":isReset", $date->isReset);
        return $stmt->execute();
    }
}
