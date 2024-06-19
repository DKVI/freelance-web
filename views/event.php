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

<main class="position-relative" style="margin-top: 10rem">
    <div class="position-fixed d-flex justify-content-end" style="left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  z-index: -1;">
        <div class="griffin" style=" width: 75%;">
        </div>
    </div>
    <div class="px-lg-5 px-sm-4 px-md-4 pt-sm-5 pt-md-5 pb-5">
        <div class="px-lg-5">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-8 pb-5 col-sm-12 col-md-12">
                    <div id="markdown-content" class="shadow"></div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12">
                    <div style="background-color: #274069">
                        <h3 class="p-3" style="color: white">
                            RELATED POSTS
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
        document.getElementById("markdown-content").innerHTML =
            "<h1><?php echo $post->title ?></h1><div class='fst-italic' style='text-align: left;'><span><?php echo convertDate($post->date) ?></span> | <span><?php echo 'Reading time: ' . $post->readTimes . " minutes" ?></span></div><br></br>" +
            html;
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
        // const iframeList = document.querySelectorAll("iframe");
        // iframeList.forEach(element => {
        // const item =
        // });

    }
    convertMarkdown();
</script>


<style>
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

    #markdown-content ifram {
        width: 100%;
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

    iframe {
        width: 75%;
    }
</style>