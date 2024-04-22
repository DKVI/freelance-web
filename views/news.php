<?php
$post;
if (isset($_GET["id"])) {
    $post = Post::getById($conn, $_GET["id"]);
} else {
    echo "<script>location.href='" . BASE_URL . "/e404'</script>";
}
?>
<script src="<?php echo BASE_URL . "/vendor/marked.js" ?>" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="p-5">
    <div class="p-5">
        <div class="p-5">
            <div id="markdown-content"></div>
        </div>
    </div>
</div>


<script defer>
    async function convertMarkdown() {
        const response = await fetch("<?php echo BASE_URL . "/uploads/posts/" . $post->id . ".md" ?>");
        const markdown = await response.text();
        const html = marked.parse(markdown);
        console.log(html);
        document.getElementById("markdown-content").innerHTML = html;
    }
    convertMarkdown();
</script>