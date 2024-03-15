<!-- Check login admin -->
<?php
    if (!isset($_SESSION["is_admin"])) {
        // return to login page for admin 
        header("Location: " . BASE_URL . "/admin/login");
    }
    else {
    }
    $id = "";
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }
?>
<?php include  __DIR__ .  "/components/adminHeader.php" ?>
<link href="../css/admin.css" rel="stylesheet">
<div class="main container">

    <div class="p-5">
        <h1 class="py-4" style="color: #274069">FAQS</h1>
        <div class="d-flex flex-column" style="gap: 8px;">
            <?php
                if ($id == '') {
                    $messages = Message::getAllMessages($conn);
                    $id = 0;
                    foreach ($messages as $element) {
                        $id += 1;
                        $status = $element->status == "pending" ? "opacity-100" : "opacity-50";
                        echo '<a href="'.BASE_URL . "/admin/faqs?id=". $element->id .'" class="p-3 message shadow rounded-4 row d-flex justify-content-between '. $status.' 
                                text-decoration-none
                                text-black" style="cursor: pointer;">
                                    <div class="col-2 px-3 text-center ">'.$element->name.'</div>
                                    <div class="col-3 px-3 text-center align-content-center">'.$element->email.'</div>
                                    <div class="col-4 px-3 text-center align-content-center"
                                        style="overflow:hidden;display:inline-block;text-overflow: ellipsis;white-space: nowrap;">
                                        '.$element->message.'
                                    </div>
                                    <div class="col-2 px-3 text-center align-content-center ">'.$element->date.'</div>
                                    <div class="col-1 btn btn-outline-danger delete-message">delete</div>
                                    <div class="d-none message-id">'.$element->id.'</div>
                                </a>';
                    }
                }
                else {
                        $message = Message::getById($conn, $id);
                        if (is_object($message)) {
                            echo '<div class="shadow rounded-4 p-4 d-flex flex-column justify-content-between">
                                <div class="d-flex justify-content-between">
                                    <div>From: <span class="fw-bold">'.$message->name.'</span> <span
                                            style="color: gray;">&lt;'.$message->email.'&gt;</span>
                                    </div>
                                    <div>'.$message->date.'</div>
                                </div>
                                <div>
                                    <label>Message:</label>
                                    <p class="px-5 py-2 fst-italic">'.$message->message.'</p>
                                </div>
                                <div class="d-flex justify-content-end px-5">
                                    <a href="mailto:'.$message->email.'" class="btn btn-outline-success">Reply</a>
                                </div>
                            </div>';                
                        }       
                        else {
                            header("Location: ". BASE_URL . "/admin/faqs");
                        }
                }
            ?>

        </div>
    </div>
    <script>
    const messageElements = document.querySelectorAll('a.message');
    messageElements.forEach(element => {
        element.onclick = async (e) => {
            const id = element.querySelector(".message-id").innerHTML;
            console.log(id);
            await fetch(`../controllers/handleChangeStatus.php?id=${id}`).then(res => {
                console.log(res);
            }).catch((err) => console.log(err));
        }
    })
    </script>
</div>