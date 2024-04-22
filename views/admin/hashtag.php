<!-- Check login admin -->
<?php
if (!isset($_SESSION["is_admin"])) {
    // return to login page for admin 
    echo '<script>location.href = "' . BASE_URL . '/admin/login"</script>';
}
function renderElement($element)
{
    echo '<div class="d-flex justify-content-between px-4 py-3 shadow-lg rounded-3">
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
        </div>';
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
                    renderElement($hashtag);
                }
                ?>
            </div>
            <div class="px-5 w-100 mt-4">
                <h3>Add news</h3>
                <form class="w-100 shadow-lg d-flex p-3" action="../controllers/handleAddHashtag.php" method="POST" style="gap: 8px;">
                    <div class="w-75">
                        <input class="form-control" placeholder="Enter new hashtag" name="hashtag">
                    </div>
                    <div class="w-25 d-flex justify-content-end" style="gap: 16px;"><button class="btn btn-primary" type="reset">Clear</button> <button class="btn btn-success" type="submit">Create</button>
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
</script>