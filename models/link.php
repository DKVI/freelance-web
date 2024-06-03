<?php
class Link
{
    public $id;
    public $name;
    public $link;
    public $titleEng;
    public $titleVn;

    public function __construct($id, $name, $link, $titleEng, $titleVn)
    {
        $this->id = $id;
        $this->name = $name;
        $this->link = $link;
        $this->titleEng = $titleEng;
        $this->titleVn = $titleVn;
    }

    public static function getByName($conn, $name)
    {
        $query = "SELECT * FROM externallink WHERE name = :name";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->execute();
        $link = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($link) {
            return new Link($link['id'], $link['name'], $link['link'], $link['title-eng'], $link['title-vn']);
        }
        return null;
    }



    public static function updateByName($conn, $name, $link)
    {
        $query = "UPDATE externallink SET link = :link WHERE name = :name";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":link", $link);
        return $stmt->execute();
    }

    public static function updateForm($conn, $form)
    {
        $query = "UPDATE externallink SET `title-vn` = :titleVn, `title-eng` = :titleEng, `link` = :link WHERE `name` = :name";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":titleVn", $form->titleVn);
        $stmt->bindParam(":titleEng", $form->titleEng);
        $stmt->bindParam(":link", $form->link);
        $stmt->bindParam(":name", $form->name);
        return $stmt->execute();
    }
}