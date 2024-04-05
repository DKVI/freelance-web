<?php
echo "true";
if (isset($_POST['md-file'])) {
    $text = $_POST['md-file'];
    $myfile = fopen("../uploads/posts/test.md", "w");
    fwrite($myfile, $text);
}
