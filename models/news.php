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
        $news = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($news) {
            return new News($news["id"], $news["readTimes"], $news["title"], $news["fileText"], $news["fileImg"], $news["date"]);
        } else {
            return null;
        }
    }

    public static function add($conn, $news)
    {
        $query = "INSERT INTO news (id,readTimes, title, fileText, fileImg, date) VALUES (:id, :readTimes, :title, :fileText, :fileImg, :date)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $news->id);
        $stmt->bindParam(":readTimes", $news->readTimes);
        $stmt->bindParam(":title", $news->title);
        $stmt->bindParam(":fileText", $news->fileText);
        $stmt->bindParam(":fileImg", $news->fileImg);
        $stmt->bindParam(":date", $news->date);
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
        $query = "UPDATE news SET readTimes=:readTimes, title=:title, fileText=:fileText, fileImg = :fileImg WHERE id=:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":readTimes", $news->readTimes);
        $stmt->bindParam(":title", $news->title);
        $stmt->bindParam(":fileText", $news->fileText);
        $stmt->bindParam(":fileImg", $news->fileImg);
        return $stmt->execute();
    }
}
