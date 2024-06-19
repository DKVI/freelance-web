<?php
$heading;
$content;
$thank;
$signature;
if (isset($_POST["heading"])) {
    $heading = $_POST["heading"];
}
if (isset($_POST["md-file"])) {
    $content = $_POST["md-file"];
}
if (isset($_POST["thank"])) {
    $thank = $_POST["thank"];
}
if (isset($_POST["signature"])) {
    $signature = $_POST["signature"];
}

$myfile = fopen("./template.md", "w");
fwrite($myfile, $content);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL ?>/assets/imgs/favicon.ico">
    <title>Mooting Summer School</title>
    <style type="text/css">
        a,
        a:hover,
        a:link,
        a:visited,
        a[href] {
            text-decoration: none !important;
        }

        .link {
            text-decoration: underline !important;
        }

        li,
        p {
            margin-top: 0.5rem;
            font-size: 0.9375rem;
            line-height: 1.4rem;
            font-family: Helvetica, Arial, sans-serif;
            text-align: justify;
            font-weight: 400;
            text-decoration: none;
            color: #274069;
        }

        h1 {
            font-size: 1.375rem;
            line-height: 1.5rem;
            font-family: "Times New Roman", Times, serif;
            font-weight: 400;
            text-decoration: none;
            color: #274069;
        }

        li {
            margin-top: 0.3rem;
        }
    </style>
</head>

<body style="
      text-align: center;
      margin: 0;
      padding: 0.625rem 0;
      -webkit-text-size-adjust: 100%;
      color: #274069;
    " align="center">
    <div style="text-align: center">
        <table align="center" style="
          text-align: center;
          vertical-align: top;
          width: 600px;
          max-width: 600px;
          background-image: url(https://lh3.googleusercontent.com/pw/AP1GczPt3hcWVzijFIkB8_BEHHSjrzaUxE9TWYOsuU5r--EZ8nU_qrh81TuLaSpq_h5AiYxE81XdQ4IEZ52x6yUSJc9cFL05X58xyduA10t3-cipaNRHgg=w2400);
        " width="600">
            <tbody>
                <tr>
                    <td style="width: 596px; vertical-align: top; padding: 15px 0 0" width="596">
                        <a href="https://mootingsummerschool.com" target="_blank"><img style="
                    width: 180px;
                    max-width: 220px;
                    height: 160px;
                    max-height: 200px;
                    text-align: center;
                    color: #fff;
                    background-image: url(https://lh3.googleusercontent.com/pw/AP1GczPt3hcWVzijFIkB8_BEHHSjrzaUxE9TWYOsuU5r--EZ8nU_qrh81TuLaSpq_h5AiYxE81XdQ4IEZ52x6yUSJc9cFL05X58xyduA10t3-cipaNRHgg=w2400);
                  " alt="Logo" src="https://lh3.googleusercontent.com/pw/AP1GczM96g3a1h9iIFJDJ_sW1ITbwNa-B4lD3XvwtlSw1C2cc8hjU-dQirT3uEIMGol3tGgAbGtSf5DeQyoBR1Y5_9uq8ndKgdFL330B1N5wHDqTZ_ySxA=w2400" align="center" width="180" height="160" /></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <table align="center" style="
          text-align: center;
          vertical-align: top;
          width: 600px;
          max-width: 600px;
          padding: 0 auto;
          background-image: url(https://lh3.googleusercontent.com/pw/AP1GczPt3hcWVzijFIkB8_BEHHSjrzaUxE9TWYOsuU5r--EZ8nU_qrh81TuLaSpq_h5AiYxE81XdQ4IEZ52x6yUSJc9cFL05X58xyduA10t3-cipaNRHgg=w2400);
        " width="600">
            <tbody>
                <tr>
                    <td style="width: 596px; vertical-align: top; padding: 0" width="596">
                        <h1 style="
                  font-size: 1.25rem;
                  line-height: 1.5rem;
                  font-weight: 600;
                  text-decoration: none;
                ">
                            <?php echo $heading ?>
                        </h1>
                        <img src="https://lh3.googleusercontent.com/pw/AP1GczOFs9AMp7WnFDs4_KHha-4m-koaNOuFW2Sz_lh_mR0Vt4N-TuKJXQOaUmCoq1B5RAMeI8GzMrCIESgCHFQ2WYGKqqsvX6q-R9SeolJ-w6yFDPwAmg=w600-h45-p-k" style="width: 100%" />
                    </td>
                </tr>
            </tbody>
        </table>
        <table align="center" style="
          text-align: center;
          vertical-align: top;
          width: 600px;
          max-width: 600px;
          background-image: url(https://lh3.googleusercontent.com/pw/AP1GczPt3hcWVzijFIkB8_BEHHSjrzaUxE9TWYOsuU5r--EZ8nU_qrh81TuLaSpq_h5AiYxE81XdQ4IEZ52x6yUSJc9cFL05X58xyduA10t3-cipaNRHgg=w2400);
        " width="600">
            <tbody>
                <tr>
                    <td style="
                width: 596px;
                vertical-align: top;
                padding: 0 1.2rem;
                text-align: left;
              " width="596">
                        <div id="markdown-content">
                        </div>
                        <p style="text-align: right; margin-right: 50px"><?php echo $thank ?>, </p>
                        <h1 style="
                  font-size: 1.5rem;
                  font-weight: 600;
                  text-align: right;
                  padding: 0 2rem 1rem;
                ">
                            <?php echo $signature ?>
                        </h1>
                    </td>
                </tr>
            </tbody>
        </table>
        <table align="center" style="
          background-image: url(https://lh3.googleusercontent.com/pw/AP1GczPt3hcWVzijFIkB8_BEHHSjrzaUxE9TWYOsuU5r--EZ8nU_qrh81TuLaSpq_h5AiYxE81XdQ4IEZ52x6yUSJc9cFL05X58xyduA10t3-cipaNRHgg=w2400);
          text-align: center;
          vertical-align: top;
          width: 600px;
          max-width: 600px;
        " width="600">
            <tbody>
                <tr>
                    <td style="
                text-align: center;
                vertical-align: top;
                width: 600px;
                max-width: 600px;
                padding: 0;
              " width="600">
                        <img src="https://lh3.googleusercontent.com/pw/AP1GczP1upD9PC0GoqzOXH3zwCzHRdUxKfVsaVIJAy9ayuB6JMK6nhhPnnRN_zef0cm-FkvTOb8dTlxrEXTKFzpkcaRN-E825j45ElpnAQISwDBm3KONOA=w600-h45-p-k" style="width: 100%" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

<script defer>
    async function convertMarkdown() {
        const response = await fetch("./template.md");
        const markdown = await response.text();
        const html = marked.parse(markdown);
        console.log(html);
        document.getElementById("markdown-content").innerHTML = html;
    }
    convertMarkdown();
</script>

</html>