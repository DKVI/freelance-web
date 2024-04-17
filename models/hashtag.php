<?php
class Hashtag
{
    public $id;
    public $nametag;

    public function __construct($id, $nametag)
    {
        $this->id = $id;
        $this->nametag = $nametag;
    }

    public static function getAll($conn)
    {
        try {
            $query = "SELECT * FROM hashtag";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $hashtagList = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $hashtag = new Hashtag("", "");
                $hashtag->id = $row['id'];
                $hashtag->nametag = $row['nametag'];
                $hashtagList[] = $hashtag;
            }
            return $hashtagList;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updateById($conn, $hashtag)
    {
        try {
            $query = "UPDATE hashtag SET nametag=:nametag WHERE id=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":nametag", $hashtag->nametag);
            $stmt->bindParam(":id", $hashtag->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getById($conn, $id)
    {
        try {
            $query = "SELECT * FROM hashtag WHERE id=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $hashtag = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($hashtag) {
                return new Hashtag($hashtag["id"], $hashtag["nametag"]);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteById($conn, $id)
    {
        try {
            $query = "DELETE FROM hashtag WHERE id=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function add($conn, $hashtag)
    {
        try {
            $query = "INSERT INTO hashtag (nametag) VALUES (:nametag)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":nametag", $hashtag->nametag);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
