<!-- Check login admin -->
<?php
if (!isset($_SESSION["is_admin"])) {
    // return to login page for admin 
    header("Location: " . BASE_URL . "/admin/login");
} else {
}
$id = "";
$post;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $post = Post::getById($conn, $id);
} else {
    echo '<script>window.location.href = "' . BASE_URL . '/admin/posts"</script>';
}
$data = '';
$file_path = "./uploads/posts/$id.md";
if (file_exists($file_path)) {
    $data = file_get_contents($file_path);
}
?>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="../css/admin.css" rel="stylesheet">
<?php include  __DIR__ .  "/components/adminHeader.php" ?>
<!-- Create Mode HTML -->
<div class="main container position-relative pb-5">
    <div class="" style="padding: 0 150px">
        <form class="form-post" action="../controllers/handleUpdatePost.php?id=<?php echo $post->id ?>" class="m-auto w-75" method="post" enctype="multipart/form-data">
            <h1 style="color: #274069">UPDATE POST id: <span><?php echo $post->id ?></span></h1>
            <div>
                <div class="form-group py-3">
                    <label class="form-label">Title:</label>
                    <input class="shadow form-control" type="text" placeholder="Enter post's title" value="<?php echo $post->title  ?>" name="title" required>
                </div>
                <div class="form-group py-3 d-flex" style="gap: 16px">
                    <div class="w-50">
                        <label class="form-label">Read Time(minutes):</label>
                        <input class="shadow form-control" value="<?php echo $post->readTimes ?>" type="number" placeholder="Enter post's read times" name="times" required>
                    </div>
                    <div class="w-50">
                        <label class="form-label">Type:</label>
                        <?php echo $post->type === "static" ? '<select disabled class="shadow form-select" name="type" aria-label="Default select example">' : '<select class="shadow form-select" name="type" aria-label="Default select example">' ?>
                        <option selected class="text-center">-- Select type of this post --</option>
                        <?php
                        if ($post->type == "static") {
                            echo '<option value="static" class="text-center" selected>Static page</option><option value="event" class="text-center">Event</option>
                                <option value="news" class="text-center">News</option>';
                        } else {
                            echo ($post->type == 'event') ? '<option value="event" class="text-center" selected>Event</option>
                                <option value="news" class="text-center">News</option>' : '<option value="event" class="text-center">Event</option>
                                <option value="news" class="text-center" selected>News</option>';
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group py-3 d-flex" style="gap: 16px">
                    <div class="w-50">
                        <label class="form-label">Hashtag:</label>
                        <select id="mySelect" name="hashtag[]" multiple="multiple" class="form-control">
                            <?php
                            $hashtagList = Hashtag::getAll($conn);
                            foreach ($hashtagList as $hashtag) {
                                $isvalid = HashtagPost::getByPostAndHashtagId($conn, $id, $hashtag->id);
                                if ($isvalid) {
                                    echo "<option value=" . $hashtag->id . " selected>$hashtag->nametag</option>";
                                } else {
                                    echo "<option value=" . $hashtag->id . ">$hashtag->nametag</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class=" w-50">
                        <label class="form-label">Priority</label>
                        <select class="shadow form-select" name="priority" id="priority" aria-label="Default select example" required>
                            <option selected value="" class="text-center">-- Select priority --</option>
                            <?php
                            echo $post->pin == 1 ? '<option value="false" class="text-center">None</option>
                                <option value="true" class="text-center" selected>Pin</option>' : '<option value="false" class="text-center" selected>None</option>
                                <option value="true" class="text-center">Pin</option>';
                            ?>
                        </select>
                    </div>
                </div>
                <?php echo $post->type === "static" ? '<div class="form-group py-3">
                    <label class="form-label">Thumbnail:</label>
                    <div class="d-flex" style="gap: 16px;">
                        <input type="file" id="image-input" name="myfile" class="w-50 form-control shadow d-none" onchange="displayImage()">
                        <img id="preview-image" src="' . BASE_URL . "/uploads/imgs/" . $post->fileImg . '"
                alt="Image Preview" class="shadow w-50 form-control">
            </div>
    </div>' : '<div class="form-group py-3">
        <label class="form-label">Thumbnail:</label>
        <div class="d-flex" style="gap: 16px;">
            <input type="file" id="image-input" name="myfile" class="w-50 form-control shadow"
                onchange="displayImage()">
            <img id="preview-image" src="' . BASE_URL . "/uploads/imgs/" . $post->fileImg . '"
                alt="Image Preview" class="shadow w-50 form-control">
            </div>
    </div>' ?>

                <?php echo $post->type === "static" ? '<div class="form-group py-3 d-none">
                    <label class="form-label">Content:</label>
                    <textarea id="input-file" class="form-control" name="md-file"></textarea>
                </div>' : '<div class="form-group py-3">
                    <label class="form-label">Content:</label>
                    <textarea id="input-file" class="form-control" name="md-file"></textarea>
                </div>' ?>
            </div>
            <div class="d-flex justify-content-end pb-4" style="gap: 16px">
                <button type="button" class="btn btn-danger <?php echo $post->type === "static" ? "d-none" : null ?>" data-toggle="modal" data-target="#exampleModal">
                    Delete
                </button>


                <button type="submit" class="btn btn-primary preview-btn <?php echo $post->type === "static" ? 'd-none' : null ?>">Preview</button>
                <button type="submit" class=" btn btn-success submit-btn">Save</button>
            </div>
        </form>
    </div>


    <!-- Preview Mode HTML -->
    <div class="preview-mode d-none position-absolute z-3" style="left: 0; right: 0; top: 0; bottom: 0;">
        <div class="p-5">
            <div id="markdown-content" class="shadow" style="padding: 50px 150px; background-color: white;"></div>
            <div class="d-flex justify-content-end"><button type="button" class="btn btn-success exit-btn">Exit Preview
                    Mode</button>
            </div>
        </div>

        <!-- Preview Mode CSS -->
        <style>
            html {
                font-size: 18px;
            }

            h1 {
                padding: 30px 0;
            }

            p>em {
                font-size: 14px;
            }


            code {
                max-width: 100%;
            }
        </style>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure to delete this post?
            </div>
            <div class="modal-footer pb-4">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form method="post" action="../controllers/handleDeletePost.php?id=<?php echo $id ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Preview Mode Script -->
<script>
    const submitBtn = document.querySelector(".submit-btn");
    const form = document.querySelector("form");
    const validateData = () => {
        const title = document.querySelector('input[name="title"]');
        const readTime = document.querySelector('input[name="times"]');
        const priority = document.querySelector('select[name="priority"]');
        const type = document.querySelector('select[name="type"]');
        const hashtag = document.querySelector('select[name="hashtag[]"]');


        if (title.value.length === 0) {
            alert("Please enter title");
            title.focus();
            $(".gototop-component").click();
            return false;
        }
        if (readTime.value.length === 0) {
            alert("Please enter read time");
            readTime.focus();
            $(".gototop-component").click();
            return false;
        }
        if (type.value.length === 0) {
            alert("Please choose type");
            type.focus();
            $(".gototop-component").click();
            return false;
        }

        if (priority.value.length === 0) {
            alert("Please choose priority");
            priority.focus();
            $(".gototop-component").click();
            return false;
        }
        console.log(hashtag.value);
        if (hashtag.value.length === 0) {
            alert("Please choose at least one hashtag");
            hashtag.focus();
            $(".gototop-component").click();
            return false;
        }
        return true;
    }
    submitBtn.onclick = (e) => {
        const isValid = validateData();
        if (isValid) {
            form.submit();
        } else {
            e.preventDefault();
        }
    }
    const previewBtn = document.querySelector(".preview-btn");
    const previewMode = document.querySelector(".preview-mode");
    window.addEventListener('beforeunload', function(e) {
        e.preventDefault();
        e.returnValue = '';
    });
    const data = `<?php echo $data ?>`;
    console.log(data);
    var simplemde = new SimpleMDE({
        element: document.getElementById("input-file"),
        initialValue: `${data}`
    });
    console.log(form);
    previewBtn.onclick = async (e) => {
        validateData();
        $(".gototop-component").click();

        await $('form').submit(function(event) {
            console.log(true);
            event.preventDefault(); // Prevent default form submission
            $.ajax({
                url: '../controllers/handlePreview.php',
                type: 'POST', // Specify POST method for sending data
                data: $(this).serialize(), // Serialize form data using jQuery
                success: function(data) {
                    <?php
                    echo '
                        async function render() {
                            async function convertMarkdown() {
                                const response = await fetch("../uploads/posts/test.md");
                                const markdown = await response.text();
                                const html = marked.parse(markdown);
                                document.getElementById("markdown-content").innerHTML = html;
                            }
                    
                            await convertMarkdown().then(() => {
                                const p = document.querySelectorAll("p");
                                const code = document.querySelectorAll("a");
                                p.forEach(element => {
                                    if (element.querySelector("img")) {
                                        element.style.textAlign = "center";
                                        element.querySelector("img").style.maxWidth = "75%";
                                        element.querySelector("img").style.display = "inline-block";
                                    }
                                    if (element.querySelector("em")) {
                                        element.style.textAlign = "center";
                                        element.querySelector("em").style.display = "inline-block";
                                    }
                                });
                                previewMode.classList.remove("d-none");
                            });
                            
                        }
                        render();
                        const exitPreviewBtn = document.querySelector(".exit-btn");
                        exitPreviewBtn.onclick = () => {
                            previewMode.classList.add("d-none");
                        }';
                    ?>

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle errors during request
                    console.error(textStatus, errorThrown);
                }
            });
        });
    }

    function displayImage() {
        const imageInput = document.getElementById('image-input');
        const previewImage = document.getElementById('preview-image');

        // Check if a file is selected
        if (imageInput.files && imageInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };

            reader.readAsDataURL(imageInput.files[0]);
        } else {
            previewImage.src = "#";
            previewImage.style.display = 'none';
        }
    }
    $(document).ready(function() {
        $('#mySelect').select2({
            multiple: true,
            width: "100%"
        });
    });
</script>

<style>
    .select2-selection.select2-selection--multiple {
        height: 50px;
        overflow-y: auto;
        box-shadow: 2px 2px 5px #cccc !important;
    }

    .select2-selection__choice {
        background-color: rgb(39 64 105) !important;
        color: white;
        box-shadow: 2px 2px 10px #cccc !important;
        padding: 5px;
    }

    #markdown-content {
        padding: 32px;
        border-radius: 16px;
        text-align: center;
    }

    #markdown-content h1 {
        font-size: 3.5rem;
        padding-bottom: 2rem;
        text-align: left;
    }


    #markdown-content p {
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
        text-align: left;
    }

    #markdown-content p a {
        text-decoration: underline;
    }

    #markdown-content p img {
        display: inline-block;
        width: 75%;
    }

    #markdown-content p em {
        margin: auto;
        font-size: 14px;

    }

    #markdown-content li {
        text-align: left !important;
        font-size: 1.2rem;
    }

    iframe {
        width: 75%;
    }
</style>