<?php
$post;
$id;
if (isset($_GET["id"])) {
    $post = Post::getById($conn, $_GET["id"]);
    $id = $post->id;
    Post::increaseViews($conn, $id);
    if (!$post) {
        echo "<script>location.href='" . BASE_URL . "/e404'</script>";
    }
} else {
    echo "<script>location.href='" . BASE_URL . "/e404'</script>";
}
$relativePosts = Post::getRelatedPost($conn, $id, 3);

?>
<script src="<?php echo BASE_URL . "/vendor/marked.js" ?>" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<main class="position-relative">
    <div class="position-fixed d-flex justify-content-end" style="left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  z-index: -1;">
        <div class="griffin" style=" width: 75%;">
        </div>
    </div>
    <div class="px-5 pt-sm-5 pt-md-5 pb-5">
        <div class="px-lg-5">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-8 pb-5 col-sm-12 col-md-12">
                    <div id="markdown-content"></div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12">
                    <div style="background-color: #274069">
                        <h3 class="p-3" style="color: white">
                            RELATIVE POSTS
                        </h3>
                        <div class="d-flex flex-column justify-content-start" style="color: white">
                            <?php
                            foreach ($relativePosts as $item) {
                                echo '
                        <a href="' . BASE_URL . $item->path . '" class="w-100 h-25 py-4 px-3" style="border-top: 1px solid white; color: white">
                            <h4 style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            white-space: nowrap;">' . $item->title . '</h4>
                            <p  style="display: -webkit-box; 
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis; font-size: 16px">
                                ' . clearSpecialSymbols($item->content) . '
                    </p>
                    <p
                        style="font-size: 14px">' . convertDate($item->date) . " - " . $item->readTimes . " minutes read" . '</p>
                </a>';
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 px-lg-5 px-md-3 px-sm-3 pt-5">
            <?php include "./views/components/popularPost.php" ?>
        </div>
    </div>
    </div>
</main>


<script defer>
    async function convertMarkdown() {
        const response = await fetch("<?php echo BASE_URL . "/uploads/posts/" . $post->id . ".md" ?>");
        const markdown = await response.text();
        const html = marked.parse(markdown);
        console.log(html);
        document.getElementById("markdown-content").innerHTML = html;
        // const iframeList = document.querySelectorAll("iframe");
        // iframeList.forEach(element => {
        //     const item =
        // });

    }
    convertMarkdown();
</script>


<style>
    #markdown-content h1 {
        font-size: 3.5rem;
        padding-bottom: 2rem;
    }

    #markdown-content ifram {
        width: 100%;
    }

    #markdown-content p {
        font-size: 1.2rem;
        display: flex;
        margin-bottom: 1.5rem;
    }

    #markdown-content p img {
        margin: auto;
        width: 75%;
    }

    #markdown-content p em {
        margin: auto;
        font-size: 14px;
    }
</style>