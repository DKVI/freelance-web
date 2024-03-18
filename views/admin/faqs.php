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
        <form class="d-flex flex-column" style="gap: 8px;" action="../controllers/handleDeleteMessage.php"
            method="post">
            <div class="w-100 d-flex justify-content-end" style="gap: 8px">
                <div class="btn btn-primary shadow select-all">Select all</div>
                <div class="btn btn-success shadow">Mark as read</div>
                <button type="button" class="btn btn-danger shadow delete-message" data-toggle="modal"
                    data-target="#exampleModal">
                    Delete message
                </button>

                <!-- Modal -->
                <div class="modal modal-delete fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">

                </div>
            </div>
            <?php
                if ($id == '') {
                    $messages = Message::getAllMessages($conn);
                    $id = 0;
                    if (count($messages) != 0) {
                        foreach ($messages as $element) {
                            $id += 1;
                            $status = $element->status == "pending" ? "opacity-100" : "opacity-50";
                            $statusFW = $element->status == "pending" ? "fw-bold" : "";
                            echo '<div class="position-relative">
                                <a href="'.BASE_URL . "/admin/faqs?id=". $element->id .'" class="p-3  message  shadow rounded-4 '.$statusFW .' row d-flex justify-content-between '. $status.' 
                                text-decoration-none
                                text-black" style="cursor: pointer;">
                                    <div class="col-2 px-3 text-center ">'.$element->name.'</div>
                                    <div class="col-3 px-3 text-center align-content-center">'.$element->email.'</div>
                                    <div class="col-4 px-3 text-center align-content-center"
                                        style="overflow:hidden;display:inline-block;text-overflow: ellipsis;white-space: nowrap;">
                                        '.$element->message.'
                                    </div>
                                    <div class="col-2 px-3 text-center align-content-center ">'.convertDate($element->date).'</div>
                                    <div class="col-1"></div>
                                    <div class="d-none message-id">'.$element->id.'</div>
                                    </a>
                                    <div class="p-3 d-flex position-absolute d-inline-block" style="top: 50%; right: 24px; flex: none; transform: translateY(-50%)">
                                        <input type="checkbox" name="checkbox[]" value="'.$element->id .'" class="checkbox form-check-input m-auto">
                                    </div>
                            </div>';
                        }
                    }
                    else {
                        echo '<h4 class="fst-italic fw-light">There are no messages yet!</h4>';
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
                <div>'.convertDate($message->date).'</div>
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

        </form>
    </div>
    <script>
    // Hiển thị cụ thể tin nhắn
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
    //xử lý chọn tất cả
    const selectAllBtn = document.querySelector(".select-all");
    const checkboxs = document.querySelectorAll(".checkbox");
    const deleteBtn = document.querySelector(".delete-message");
    const modalDelete = document.querySelector(".modal-delete");

    function handleModalDelete(anyCheck) {
        if (anyCheck) {
            modalDelete.innerHTML = `<div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" class="delete-message">Delete messages
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete all selected messages?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>`;
        } else {
            modalDelete.innerHTML = `<div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" class="delete-message">Delete messages
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                There aren't any messages currently selected!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>`;
        }
    }

    deleteBtn.onclick = () => {
        let anyCheck = false;
        checkboxs.forEach(checkbox => {
            console.log(checkbox.checked);
            if (checkbox.checked) {
                anyCheck = true;
            }
        })
        handleModalDelete(anyCheck);
    }
    selectAllBtn.onclick = (e) => {
        selectAllBtn.classList.toggle("active");
        if (selectAllBtn.classList.contains("active")) {
            checkboxs.forEach((checkbox) => {
                checkbox.checked = true;
            })
        } else {
            checkboxs.forEach((checkbox) => {
                checkbox.checked = false;
            })
        }
    }
    </script>
</div>