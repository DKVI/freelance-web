<!-- Check login admin -->

<?php
if (!isset($_SESSION["is_admin"])) {
    // return to login page for admin 
    echo '<script>window.location.href = "' . BASE_URL . '/home"</script>';
}
$path = BASE_URL . '/views/components/popupMessage.php';
unset($path);
$mode = "";
if (isset($_GET["mode"])) {
    $mode = $_GET["mode"];
}
if (file_exists("./uploads/posts/test.md")) {
    unlink('./uploads/posts/test.md');
}
?>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="../css/admin.css" rel="stylesheet">
<?php include  __DIR__ .  "/components/adminHeader.php" ?>
<!-- Create Mode HTML -->
<div class="main container position-relative pb-5 w-100 justify-content-center">
    <div class="w-100" style="padding: 0 150px">
        <form class="form-news" action="../controllers/handleUploadPost.php" class="m-auto w-75" method="post" enctype="multipart/form-data">
            <h1 style="color: #274069">ADD NEW POST</h1>
            <div>
                <div class="form-group py-3">
                    <label class="form-label">Title:</label>
                    <input class="shadow form-control" type="text" placeholder="Enter post's title" name="title" required>
                </div>

                <div class="form-group py-3 d-flex" style="gap: 16px">
                    <div class="w-50">
                        <label class="form-label">Read Time(minues):</label>
                        <input class="shadow form-control" type="number" placeholder="Enter post's read times" name="times" required>
                    </div>
                    <div class="w-50">
                        <label class="form-label">Type:</label>
                        <select class="shadow form-select" name="type" aria-label="Default select example" required>
                            <option value="" class="text-center" selected>-- Select type of this post --</option>
                            <option value="event" class="text-center ">Event</option>
                            <option value="news" class="text-center ">News</option>
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
                                echo "<option value=" . $hashtag->id . ">$hashtag->nametag</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class=" w-50">
                        <label class="form-label">Priority</label>
                        <select class="shadow form-select" name="priority" id="priority" aria-label="Default select example" required>
                            <option selected value="" class="text-center">-- Select priority --</option>
                            <option value="false" class="text-center" selected>None</option>
                            <option value="true " class="text-center ">Pin</option>
                        </select>
                    </div>
                </div>
                <div class="form-group py-3">
                    <label class="form-label">Thumbnail:</label>
                    <div class="d-flex" style="gap: 16px;">
                        <input type="file" id="image-input" name="myfile" class="shadow w-50 form-control" onchange="displayImage()">
                        <img id="preview-image" src="<?php echo BASE_URL . '/uploads/imgs/default.png'; ?>" alt="Image Preview" class="w-50 form-control shadow">
                    </div>
                </div>
                <div class="form-group py-3">
                    <label class="form-label">Content:</label>
                    <textarea id="input-file" class="shadow form-control" name="md-file"></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-end pb-4" style="gap: 16px">
                <button type="submit" class="shadow btn btn-primary preview-btn">Preview</button>
                <button type="submit" class="shadow  btn btn-success submit-btn">Submit</button>
            </div>
        </form>
    </div>


    <!-- Preview Mode HTML -->
    <div class="preview-mode d-none position-absolute z-3" style="left: 0; right: 0; top: 0; bottom: 0;">
        <div class="p-5">
            <div class="d-flex justify-content-end"><button type="button" class="btn btn-success exit-btn">Exit Preview
                    Mode</button>
            </div>
            <div id="markdown-content" class="shadow" style="padding: 50px 150px; background-color: white;"></div>
        </div>
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
<!-- Preview Mode Script -->
<script>
    const submitBtn = document.querySelector(".submit-btn");
    const form = document.querySelector("form");
    const validateData = () => {
        const title = document.querySelector('input[name="title"]');
        const readTime = document.querySelector('input[name="times"]');
        const priority = document.querySelector('select[name="priority"]');
        const type = document.querySelector('select[name="type"]');

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
    var simplemde = new SimpleMDE({
        element: document.getElementById("input-file"),
    });
    console.log(form);
    previewBtn.onclick = async () => {
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
</style>