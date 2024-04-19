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
    public $content;
    public $path;
    public $pin;

    public function __construct($id, $readTimes, $title, $fileText, $fileImg, $date, $views, $type, $content, $path, $pin)
    {
        $this->id = $id;
        $this->readTimes = $readTimes;
        $this->title = $title;
        $this->fileText = $fileText;
        $this->fileImg = $fileImg;
        $this->date = $date;
        $this->views = $views;
        $this->type = $type;
        $this->content = $content;
        $this->path = $path;
        $this->pin = $pin;
    }

    public static function getAll($conn)
    {
        try {
            $query = "SELECT * FROM post ORDER BY date DESC";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $postList = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $post = new Post("", "", "", "", "", "", "", "", "", "", "");
                $post->id = $row['id'];
                $post->readTimes = $row['readTimes'];
                $post->title = $row['title'];
                $post->fileText = $row['fileText'];
                $post->fileImg = $row['fileImg'];
                $post->date = $row['date'];
                $post->views = $row['views'];
                $post->type = $row['type'];
                $post->content = $row['content'];
                $post->path = $row['path'];
                $post->pin = $row['pin'];
                $postList[] = $post;
            }

            return $postList;
        } catch (PDOException $e) {
            echo "Error fetching messages: " . $e->getMessage();
            return [];
        }
    }
    public static function getAllSortByViews($conn)
    {
        try {
            $query = "SELECT * FROM post ORDER BY views DESC";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $postList = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $post = new Post("", "", "", "", "", "", "", "", "", "", "");
                $post->id = $row['id'];
                $post->readTimes = $row['readTimes'];
                $post->title = $row['title'];
                $post->fileText = $row['fileText'];
                $post->fileImg = $row['fileImg'];
                $post->date = $row['date'];
                $post->views = $row['views'];
                $post->type = $row['type'];
                $post->content = $row['content'];
                $post->path = $row['path'];
                $post->pin = $row['pin'];
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
                $post = new Post("", "", "", "", "", "", "", "", "", "", "");
                $post->id = $row['id'];
                $post->readTimes = $row['readTimes'];
                $post->title = $row['title'];
                $post->fileText = $row['fileText'];
                $post->fileImg = $row['fileImg'];
                $post->date = $row['date'];
                $post->views = $row['views'];
                $post->type = $row['type'];
                $post->content = $row['content'];
                $post->path = $row['path'];
                $post->pin = $row['pin'];
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
            return new Post($post["id"], $post["readTimes"], $post["title"], $post["fileText"], $post["fileImg"], $post["date"], $post["views"], $post["type"], $post["content"], $post["path"], $post["pin"]);
        } else {
            return null;
        }
    }

    public static function add($conn, $post)
    {
        $query = "INSERT INTO post (id,readTimes, title, fileText, fileImg, date, views, type, content, path, pin) VALUES (:id, :readTimes, :title, :fileText, :fileImg, :date, :views, :type, :content, :path, :pin)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $post->id);
        $stmt->bindParam(":readTimes", $post->readTimes);
        $stmt->bindParam(":title", $post->title);
        $stmt->bindParam(":fileText", $post->fileText);
        $stmt->bindParam(":fileImg", $post->fileImg);
        $stmt->bindParam(":date", $post->date);
        $stmt->bindParam(":views", $post->views);
        $stmt->bindParam(":type", $post->type);
        $stmt->bindParam(":content", $post->content);
        $stmt->bindParam(":path", $post->path);
        $stmt->bindParam(":pin", $post->pin);
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
        $query = "UPDATE post SET readTimes=:readTimes, title=:title, fileText=:fileText, fileImg = :fileImg, type = :type, content = :content, pin = :pin WHERE id=:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":readTimes", $post->readTimes);
        $stmt->bindParam(":title", $post->title);
        $stmt->bindParam(":fileText", $post->fileText);
        $stmt->bindParam(":fileImg", $post->fileImg);
        $stmt->bindParam(":type", $post->type);
        $stmt->bindParam(":content", $post->content);
        $stmt->bindParam(":pin", $post->pin);
        return $stmt->execute();
    }

    public static function resetViews($conn, $views)
    {
        $query = "UPDATE post SET views = :views";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":views", $views);
        return $stmt->execute();
    }
    public static function totalViews($conn)
    {
        $stmt = $conn->prepare("SELECT SUM(views) AS totalViews FROM post");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalViews = $result["totalViews"];
        return $totalViews;
    }
    public static function totalPosts($conn)
    {
        try {
            $stmt = $conn->prepare("SELECT COUNT(id) AS totalPosts FROM post WHERE type = 'news' OR type='event'");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $totalPosts = $result["totalPosts"];
            return $totalPosts;
        } catch (\Throwable $e) {
            return null;
        }
    }

    public static function getPopularPost($conn)
    {
        try {
            $stmt = "SELECT *
            FROM post
            WHERE pin = 1 OR pin = 0
            ORDER BY (CASE WHEN pin = 1 THEN 0 ELSE 1 END), views DESC
            LIMIT 9";
            $stmt = $conn->prepare($stmt);
            $stmt->execute();
            $postList = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $post = new Post("", "", "", "", "", "", "", "", "", "", "");
                $post->id = $row['id'];
                $post->readTimes = $row['readTimes'];
                $post->title = $row['title'];
                $post->fileText = $row['fileText'];
                $post->fileImg = $row['fileImg'];
                $post->date = $row['date'];
                $post->views = $row['views'];
                $post->type = $row['type'];
                $post->content = $row['content'];
                $post->path = $row['path'];
                $post->pin = $row['pin'];
                $postList[] = $post;
            }
            return $postList;
        } catch (\Throwable $e) {
            return null;
        }
    }

    public static function getRelatedPost($conn, $postId)
    {
        try {
            $stmt = "SELECT DISTINCT post.*
            FROM post
            INNER JOIN (
              SELECT DISTINCT post_id
              FROM hashtag_post
              INNER JOIN (
                SELECT hashtag_id
                FROM hashtag_post
                WHERE post_id = :post_id
              ) AS hashtagIdList
            ) AS postIdList
            ON post.id = postIdList.post_id LIMIT 9";
            $stmt = $conn->prepare($stmt);
            $stmt->bindParam(":post_id", $postId);
            $stmt->execute();
            $postList = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $post = new Post("", "", "", "", "", "", "", "", "", "", "");
                $post->id = $row['id'];
                $post->readTimes = $row['readTimes'];
                $post->title = $row['title'];
                $post->fileText = $row['fileText'];
                $post->fileImg = $row['fileImg'];
                $post->date = $row['date'];
                $post->views = $row['views'];
                $post->type = $row['type'];
                $post->content = $row['content'];
                $post->path = $row['path'];
                $post->pin = $row['pin'];
                $postList[] = $post;
            }
            return $postList;
        } catch (\Throwable $e) {
            return null;
        }
    }
}
