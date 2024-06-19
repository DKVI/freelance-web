<link rel="stylesheet" href="./css/base.css">
<footer class="p-3 text-light">
    <div class="row pt-3">
        <div class="col-lg-4">
            <img src="./assets/imgs/footer-logo.png" alt="">
        </div>
        <div class="col-lg-2 text-center">
            <div class="eng">
                <h3 class="text-center">Resources</h3>
                <p><a href="#" class="text-light" data-toggle="modal" data-target="#termofuse">Term of Uses</a></p>
                <p><a href="<?php echo $form->link ?>" target="_blank" class="text-light">Enrollment link</a></p>
            </div>
            <div class="vn">
                <h3 class="text-center">Chi tiết</h3>
                <p><a href="#" class="text-light" data-toggle="modal" data-target="#termofuse">Điều khoản sử dụng</a>
                </p>
                <p><a href="<?php echo $form->link ?>" target="_blank" class="text-light">Link đăng ký</a></p>
            </div>

        </div>
        <div class="contact col-lg-6 ">
            <h3 class="text-center eng">Contact us</h3>
            <h3 class="text-center vn">Liên hệ</h3>


            <div class="row text-center">

                <div class="col-lg-6">

                    <p>
                        <i class="fa-brands fa-linkedin"></i> &nbsp;<a href="<?php echo $linkedin->link ?>" target="_blank" class="text-light">Mooting Summer School</a>
                    </p>
                    <p>
                        <i class="fa-regular fa-envelope"></i> &nbsp;<a href="mailto:<?php echo $mail->link ?>" class="text-light"><?php echo $mail->link ?></a>
                    </p>

                </div>
                <div class="col-lg-6">
                    <p>
                        <i class="fa-brands fa-square-facebook"></i>&nbsp;<a href="<?php echo $facebook->link ?>" target="_blank" class="text-light">Mooting Summer School</a>
                    </p>
                    <p>
                        <i class="fa-brands fa-instagram"></i>&nbsp;<a href="<?php echo $instagram->link ?>" target="_blank" class="text-light">Mooting Summer School</a>
                    </p>

                </div>

            </div>
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="termofuse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <img src="./assets/imgs/termofuse-eng.png" alt="" class="w-100 h-100 eng">
                    <img src="./assets/imgs/termofuse-vn.png" alt="" class="w-100 h-100 vn">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
</footer>