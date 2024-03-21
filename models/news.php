<?php
class News
{
    public $id;
    public $readTimes;
    public $title;
    public $fileText;
    public $fileImg;
    public $date;
    public function __construct($id, $readTimes, $title, $fileText, $fileImg, $date)
    {
        $this->id = $id;
        $this->readTimes = $readTimes;
        $this->title = $title;
        $this->fileText = $fileText;
        $this->fileImg = $fileImg;
        $this->date = $date;
    }

    public static function getAll($conn)
    {
        try {
            $query = "SELECT * FROM news ORDER BY date DESC";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $newsList = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $news = new News("", "", "", "", "", "");
                $news->id = $row['id'];
                $news->readTimes = $row['readTimes'];
                $news->title = $row['title'];
                $news->fileText = $row['fileText'];
                $news->fileImg = $row['fileImg'];
                $news->date = $row['date'];
                $newsList[] = $news;
            }

            return $newsList;
        } catch (PDOException $e) {
            echo "Error fetching messages: " . $e->getMessage();
            return [];
        }
    }

    public static function getById($conn, $id)
    {
        $query = "SELECT * FROM news WHERE id=:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $message = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($message) {
            return new Message($message["id"], $message["readTimes"], $message["title"], $message["fileText"], $message["fileImg"], $message["date"]);
        } else {
            return null;
        }
    }

    public static function add($conn, $news)
    {
        $query = "INSERT INTO news (readTime, title, fileText, fileImg) VALUES (:readTime, :title, :fileText, :fileImg)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":readTime", $news->readTime);
        $stmt->bindParam(":title", $news->title);
        $stmt->bindParam(":fileText", $news->fileText);
        $stmt->bindParam(":fileImg", $news->fileImg);
        return $stmt->execute();
    }

    public static function delete($conn, $id)
    {
        $query = "DELETE FROM news WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public static function update($conn, $news, $id)
    {
        $query = "UPDATE news SET readTime=:readTime, title=:title, fileText=:fileText, fileImg = :fileImg WHERE id=:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":readTime", $news->readTime);
        $stmt->bindParam(":title", $news->title);
        $stmt->bindParam(":fileText", $news->fileText);
        $stmt->bindParam(":fileImg", $news->fileImg);
        return $stmt->execute();
    }
}
