<?php
class HashtagPost
{
    public $id;
    public $hashtagId;
    public $postId;
    public function __construct($id, $hashtagId, $postId)
    {
        $this->id = $id;
        $this->hashtagId = $hashtagId;
        $this->postId = $postId;
    }
    public static function getAll($conn)
    {
        try {
            $query = "SELECT * FROM hashtag_post";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $hashtagPostList = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $hashtagPost = new HashtagPost("", "", "");
                $hashtagPost->id = $row['id'];
                $hashtagPost->hashtagId = $row['hashtag_id'];
                $hashtagPost->postId = $row['post_id'];
                $hashtagPostList[] = $hashtagPost;
            }
            return $hashtagPostList;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getById($conn, $id)
    {
        try {
            $query = "SELECT * FROM hashtag_post WHERE id=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $hashtagPost = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($hashtagPost) {
                $result = new HashtagPost("", "", "");
                $result->id = $hashtagPost['id'];
                $result->hashtagId = $hashtagPost['hashtag_id'];
                $result->postId = $hashtagPost['post_id'];
            }
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getByPostAndHashtagId($conn, $postId, $hashtagId)
    {
        try {
            $query = "SELECT * FROM hashtag_post WHERE post_id=:postId AND hashtag_id=:hashtagId";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":postId", $postId);
            $stmt->bindParam(":hashtagId", $hashtagId);
            $stmt->execute();
            $hashtagPost = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($hashtagPost) {
                $result = new HashtagPost("", "", "");
                $result->id = $hashtagPost['id'];
                $result->hashtagId = $hashtagPost['hashtag_id'];
                $result->postId = $hashtagPost['post_id'];
            }
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function delete($conn, $id)
    {
        try {
            $query = "DELETE FROM hashtag_post WHERE id=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getByPostId($conn, $postId)
    {
        try {
            $query = "SELECT * FROM hashtag_post WHERE post_id=:postId";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":postId", $postId);
            $stmt->execute();
            $hashtagPostList = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $hashtagPost = new HashtagPost("", "", "");
                $hashtagPost->id = $row['id'];
                $hashtagPost->hashtagId = $row['hashtag_id'];
                $hashtagPost->postId = $row['post_id'];
                $hashtagPostList[] = $hashtagPost;
            }
            return $hashtagPostList;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getByHashtagId($conn, $hashtagId)
    {
        try {
            $query = "SELECT * FROM hashtag_post WHERE hashtag_id=:hashtagId";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":hashtagId", $hashtagId);
            $stmt->execute();
            $hashtagPostList = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $hashtagPost = new HashtagPost("", "", "");
                $hashtagPost->id = $row['id'];
                $hashtagPost->hashtagId = $row['hashtag_id'];
                $hashtagPost->postId = $row['post_id'];
                $hashtagPostList[] = $hashtagPost;
            }
            return $hashtagPostList;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
