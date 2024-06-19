<!-- Check login admin -->
<?php
if (!isset($_SESSION["is_admin"])) {
    // return to login page for admin 
    echo '<script>window.location.href = "' . BASE_URL . '/admin/login"</script>';
}
?>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="../css/admin.css" rel="stylesheet">
<?php include  __DIR__ .  "/components/adminHeader.php" ?>
<div class="main px-5 justify-content-center">
    <div class="p-5 w-100">
        <div class="px-5 d-flex row mb-3">
            <div class="col-8 align-content-between d-flex flex-column">
                <h1 class="py-4" style="color: #274069">TEMPLATE EMAIL</h1>
            </div>
        </div>
        <form class="template-container d-flex position-relative"
            action="<?php echo BASE_URL . '/views/admin/resources/emailTemplate.php' ?>" method="POST">

            <div style="text-align: center; margin: auto">
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
                  " alt="Logo" src="https://lh3.googleusercontent.com/pw/AP1GczM96g3a1h9iIFJDJ_sW1ITbwNa-B4lD3XvwtlSw1C2cc8hjU-dQirT3uEIMGol3tGgAbGtSf5DeQyoBR1Y5_9uq8ndKgdFL330B1N5wHDqTZ_ySxA=w2400"
                                        align="center" width="180" height="160" /></a>
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
                                <div class="d-flex m-2">
                                    <input class="w-full form-control m-auto" name="heading" style="width: 500px"
                                        placeholder="Example: Thư Mời Viết Đánh Giá">
                                </div>
                                <img src="https://lh3.googleusercontent.com/pw/AP1GczOFs9AMp7WnFDs4_KHha-4m-koaNOuFW2Sz_lh_mR0Vt4N-TuKJXQOaUmCoq1B5RAMeI8GzMrCIESgCHFQ2WYGKqqsvX6q-R9SeolJ-w6yFDPwAmg=w600-h45-p-k"
                                    style="width: 100%" />
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
                                <textarea id="input-file" class="form-control" name="md-file"></textarea>
                                <div class="d-flex">
                                    <div class="w-50"></div>
                                    <div class="w-50">
                                        <input type="text" class="form-control m-2" name="thank"
                                            placeholder="Example: Trân trọng,">
                                        <input type="text" class="form-control m-2" name="signature"
                                            placeholder="Example: Anh Hoàng">
                                    </div>
                                </div>
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
                                <img src="https://lh3.googleusercontent.com/pw/AP1GczP1upD9PC0GoqzOXH3zwCzHRdUxKfVsaVIJAy9ayuB6JMK6nhhPnnRN_zef0cm-FkvTOb8dTlxrEXTKFzpkcaRN-E825j45ElpnAQISwDBm3KONOA=w600-h45-p-k"
                                    style="width: 100%" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-success position-fixed"
                style="flex: none; right: 10%; top: 50%">Generate</button>
        </form>
    </div>
</div>

<style>
li,
p {
    margin-top: 0.5rem !important;
    font-size: 0.9375rem !important;
    line-height: 1.4rem !important;
    font-family: Helvetica, Arial, sans-serif !important;
    text-align: justify !important;
    font-weight: 400 !important;
    text-decoration: none !important;
    color: #274069 !important;
}

h1 {
    font-size: 1.375rem !important;
    line-height: 1.5rem !important;
    font-family: "Times New Roman", Times, serif !important;
    font-weight: 400 !important;
    text-decoration: none !important;
    color: #274069 !important;
    display: block !important;
    font-size: 2em !important;
    margin-block-start: 0.67em !important;
    margin-block-end: 0.67em !important;
    margin-inline-start: 0px !important;
    margin-inline-end: 0px !important;
    font-weight: bold !important;
    unicode-bidi: isolate !important;
}
</style>
<script defer>
var simplemde = new SimpleMDE({
    element: document.getElementById("input-file"),
});
</script>

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

body {
    margin: auto;
    margin: 0;
    padding: 0.625rem 0;
    -webkit-text-size-adjust: 100%;
    color: #274069;
}
</style>