<!-- Check login admin -->
<?php
if (!isset($_SESSION["is_admin"])) {
    // return to login page for admin 
    echo '<script>location.href = "' . BASE_URL . '/admin/login"</script>';
}
function renderPost($element)
{
    return '<div class="d-flex px-4 py-2 shadow rounded-4 justify-content-around " style="height: 100px;">
                                    <div class="h-100 px-3" style="width: 20%"><div class="h-100 w-100 shadow rounded-4" style="background-image: url(' . BASE_URL . '/uploads/imgs/' . $element->fileImg . '); background-size: cover; background-position: center;"></div>
                                    </div>
                                            <div class="w-75 h-100 px-3" style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap;">
                                                <a href="' . BASE_URL . '/admin/editPost?id=' . $element->id . '"
                                    class="text-decoration-none fw-bold" style="color: #274069; font-size: 24px;">' . $element->title . '</a>
                                    <div class="mt-3">
                                    <span>' . convertDate($element->date) . ' - </span>
                                    <span>' . ($element->readTimes) . ' minues read</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="m-auto"><span class="p-2">' . $element->views . '</span><i class="fa-regular fa-eye"></i></div>
                                </div>
                            </div>';
}
function renderElement($element, $conn)
{
    $post = Post::getByHashtag($conn, $element->id);
    $html = '';
    foreach ($post as $item) {
        $html = $html . renderPost($item);
    }
    if (count($post) === 0) {
        $html = '<h5 class="fst-italic fw-light">There are no posts with this hashtag yet!</h5>';
    }

    echo '<div class="d-flex flex-column" style="gap: 32px"><div class="d-flex flex-col justify-content-between px-4 py-3 shadow-lg rounded-3">
    <form action="../controllers/handleUpdateHashtag.php?id=' . $element->id . '" class="d-flex justify-content-between" style="width: 90%;" method="POST">
        <div class="form-group w-50 d-flex" style="gap: 8px">
            <div class="d-flex"><span class="m-auto">#</span></div><input type="text" name="hashtag" class="form-control w-75" value="' . $element->nametag . '">
        </div>
        <div class="form-group w-50 d-flex justify-content-end" style="gap: 8px">
            <button type="button" class="btn btn-primary" onclick="reload()">Undo</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
    <form method="POST" action="../controllers/handleDeleteHashtag.php?id=' . $element->id . '" class="form-delete d-flex justify-content-end">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#' . $element->id . '">
                Delete
            </button>
            <div class="modal fade" id="' . $element->id . '" tabindex="-1" role="dialog" aria-labelledby="' . $element->id . 'Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="' . $element->id . 'Label">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Delete this hashtag (#' . $element->nametag . ')?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
                </div>
            </div>
            </div>
    </form>
</div>
<div class="d-none flex-column" id="container-hashtag-' . $element->id . '" style="gap: 16px">' . $html . '</div>
<div class="d-flex" style="gap: 8px">
<button onclick="hidePost(' . $element->id . ')" class="btn" style="flex: 1; color: red; border: 1px solid">Hide Posts</button><button onclick="showPost(' . $element->id . ')" style="flex: 1; color: green; border: 1px solid" class="btn">Show Posts</button>
</div></div>';
}
?>
<link href="../css/admin.css" rel="stylesheet">
<?php include  __DIR__ .  "/components/adminHeader.php" ?>
<div class="main p-5">
    <div class="px-5 py-3">
        <h1>HASHTAG</h1>
        <div class="px-5 w-100">
            <div class="px-5 d-flex flex-column" style="gap: 16px;">
                <?php
                $hashtagList = Hashtag::getAll($conn);
                foreach ($hashtagList as $hashtag) {
                    renderElement($hashtag, $conn);
                }
                if (count($hashtagList) == 0) {
                    echo '<h4 class="fst-italic fw-light">There are no hashtags yet</h4>';
                }
                ?>
            </div>
            <div class="px-5 w-100 mt-4">
                <h3>Add news</h3>
                <form class="w-100 shadow-lg d-flex p-3" action="../controllers/handleAddHashtag.php" method="POST"
                    style="gap: 8px;">
                    <div class="w-75">
                        <input class="form-control" placeholder="Enter new hashtag" name="hashtag">
                    </div>
                    <div class="w-25 d-flex justify-content-end" style="gap: 16px;"><button class="btn btn-primary"
                            type="reset">Clear</button> <button class="btn btn-success" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
const reload = () => {
    window.location.reload();
}
const hidePost = (hashtagId) => {
    const container = document.querySelector(`#container-hashtag-${hashtagId}`);
    container.classList.remove("d-flex");
    container.classList.add("d-none");
}
const showPost = (hashtagId) => {
    const container = document.querySelector(`#container-hashtag-${hashtagId}`);
    container.classList.remove("d-none");
    container.classList.add("d-flex");
}
</script>