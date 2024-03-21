<?php
if (!isset($_SESSION["is_admin"])) {
    // return to login page for admin 
    header("Location: " . BASE_URL . "/admin/login");
} else {
}
?>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js" defer></script>
<link href="../css/admin.css" rel="stylesheet">
<?php include  __DIR__ .  "/components/adminHeader.php" ?>
<div class="main container">
    <div class="p-5">
        <div id="markdown-content" style="padding: 0 100px;"></div>
    </div>
    <script defer>
        async function render() {
            async function convertMarkdown() {
                const response = await fetch('../uploads/news/test.md');
                const markdown = await response.text();
                const html = marked.parse(markdown);
                document.getElementById('markdown-content').innerHTML = html;
            }

            await convertMarkdown().then(() => {
                const p = document.querySelectorAll('p');
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
            });
        }
        render();
    </script>
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