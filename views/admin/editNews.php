<!-- Check login admin -->
<?php
if (!isset($_SESSION["is_admin"])) {
    // return to login page for admin 
    header("Location: " . BASE_URL . "/admin/login");
} else {
}
$id = "";
$news;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $news = News::getById($conn, $id);
} else {
    echo '<script>window.location.href = "' . BASE_URL . '/admin/news"</script>';
}
$data = '';
$file_path = "./uploads/news/$id.md";
if (file_exists($file_path)) {
    $data = file_get_contents($file_path);
}
?>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="../css/admin.css" rel="stylesheet">
<?php include  __DIR__ .  "/components/adminHeader.php" ?>
<!-- Create Mode HTML -->
<div class="main container position-relative pb-5">
    <div class="" style="padding: 0 150px">
        <form class="form-news" action="../controllers/handleUpdateNews.php?id=<?php echo $news->id ?>"
            class="m-auto w-75" method="post">
            <h1 style="color: #274069">UPDATE POST id: <span><?php echo $news->id ?></span></h1>
            <div>
                <div class="form-group py-3">
                    <label class="form-label">Title:</label>
                    <input class="form-control" type="text" placeholder="Enter post's title"
                        value="<?php echo $news->title  ?>" name="title" required>
                </div>
                <div class="form-group py-3">
                    <label class="form-label">Times:</label>
                    <input class="form-control" type="number" placeholder="Enter post's read times" name="times"
                        value="<?php echo $news->readTimes ?>" required>
                </div>
                <div class="form-group py-3">
                    <label class="form-label">Content:</label>
                    <textarea id="input-file" class="form-control" name="md-file"></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-end" style="gap: 16px">
                <button type="submit" class="btn btn-primary preview-btn">Preview</button>
                <button type="submit" class=" btn btn-success submit-btn">Save</button>
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
<!-- Preview Mode Script -->
<script>
const submitBtn = document.querySelector(".submit-btn");
const form = document.querySelector("form");
submitBtn.onclick = () => {
    form.submit();
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
                                const response = await fetch("../uploads/news/test.md");
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
</script>