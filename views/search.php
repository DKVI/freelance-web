<?php

//Kiểm tra xem có truyền keyword thông qua query parameter 

$keyword;
//Tồn tại thì gán giá trị
if (isset($_GET["keyword"])) {

    $keyword = $_GET["keyword"];
}
// Không tồn tại thì quay về trang 404 
else {
    echo '<script>location.href = "' . BASE_URL . '/e404"</script>';
}
//Lấy ta các bài viết theo keyword 
$postsList = Post::getByKeyWord($conn, $keyword);

?>

<div class="d-flex" style="width: 100vw; height: 100vh">
    <table class="m-auto table table-dark">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Img</th>
                <th scope="col">Title</th>
                <th scope="col">Path</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //render dữ liệu
            foreach ($postsList as $post) {
                echo '<tr>';
                echo '<th scope="row">' . $post->id . '</th>';
                echo '<td><img src="' . BASE_URL . '/uploads/imgs/' . $post->fileImg . '" alt="" style="width: 100px"></td>';
                echo '<td>' . $post->title . '</td>';
                echo '<td>' . BASE_URL . $post->path . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>