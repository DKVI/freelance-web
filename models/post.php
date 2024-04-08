<?php
class Post
{
    public $id;
    public $readTimes;
    public $title;
    public $fileText;
    public $fileImg;
    public $date;
    public $views;
    public $type;
    public function __construct($id, $readTimes, $title, $fileText, $fileImg, $date, $views, $type)
    {
        $this->id = $id;
        $this->readTimes = $readTimes;
        $this->title = $title;
        $this->fileText = $fileText;
        $this->fileImg = $fileImg;
        $this->date = $date;
        $this->views = $views;
        $this->type = $type;
    }

    public static function getAll($conn)
    {
        try {
            $query = "SELECT * FROM post ORDER BY date DESC";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $postList = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $post = new Post("", "", "", "", "", "", "", "");
                $post->id = $row['id'];
                $post->readTimes = $row['readTimes'];
                $post->title = $row['title'];
                $post->fileText = $row['fileText'];
                $post->fileImg = $row['fileImg'];
                $post->date = $row['date'];
                $post->views = $row['views'];
                $post->type = $row['type'];
                $postList[] = $post;
            }

            return $postList;
        } catch (PDOException $e) {
            echo "Error fetching messages: " . $e->getMessage();
            return [];
        }
    }

    public static function getByKeyWord($conn, $keyword)
    {
        try {
            $query = "SELECT * FROM post WHERE title LIKE :keyword";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(":keyword", '%' . $keyword . '%');
            $stmt->execute();
            $postList = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $post = new Post("", "", "", "", "", "", "", "");
                $post->id = $row['id'];
                $post->readTimes = $row['readTimes'];
                $post->title = $row['title'];
                $post->fileText = $row['fileText'];
                $post->fileImg = $row['fileImg'];
                $post->date = $row['date'];
                $post->views = $row['views'];
                $post->type = $row['type'];
                $postList[] = $post;
            }

            return $postList;
        } catch (PDOException $e) {
            echo "Error fetching messages: " . $e->getMessage();
            return [];
        }
    }

    public static function getById($conn, $id)
    {
        $query = "SELECT * FROM post WHERE id=:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($post) {
            return new Post($post["id"], $post["readTimes"], $post["title"], $post["fileText"], $post["fileImg"], $post["date"], $post["views"], $post["type"]);
        } else {
            return null;
        }
    }

    public static function add($conn, $post)
    {
        $query = "INSERT INTO post (id,readTimes, title, fileText, fileImg, date, type) VALUES (:id, :readTimes, :title, :fileText, :fileImg, :date, :type)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $post->id);
        $stmt->bindParam(":readTimes", $post->readTimes);
        $stmt->bindParam(":title", $post->title);
        $stmt->bindParam(":fileText", $post->fileText);
        $stmt->bindParam(":fileImg", $post->fileImg);
        $stmt->bindParam(":date", $post->date);
        $stmt->bindParam(":type", $post->type);
        return $stmt->execute();
    }

    public static function delete($conn, $id)
    {
        $query = "DELETE FROM post WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public static function update($conn, $post, $id)
    {
        $query = "UPDATE post SET readTimes=:readTimes, title=:title, fileText=:fileText, fileImg = :fileImg, type = :type WHERE id=:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":readTimes", $post->readTimes);
        $stmt->bindParam(":title", $post->title);
        $stmt->bindParam(":fileText", $post->fileText);
        $stmt->bindParam(":fileImg", $post->fileImg);
        $stmt->bindParam(":type", $post->type);
        return $stmt->execute();
    }

    public static function resetViews($conn, $views)
    {
        $query = "UPDATE post SET views = :views";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":views", $views);
        return $stmt->execute();
    }
}
