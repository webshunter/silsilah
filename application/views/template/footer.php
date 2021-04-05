<!-- ======= Footer ======= -->

<footer id="footer">

    <!-- <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4>Join Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <div class="footer-top ">
        <div class="container ">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-contact">
                    <h3><?= Perusahaans::get()->nama; ?></h3>
                    <p>
                        <?= Perusahaans::get()->alamat; ?>
                        <strong>Phone:</strong> <?= Perusahaans::get()->hp; ?><br>
                        <strong>Email:</strong> <?= Perusahaans::get()->email; ?><br>
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Link</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= site_url('/'); ?>">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= site_url('artikel'); ?>">Artikel</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= site_url('login'); ?>">Login</a></li>
                        <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li> -->
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Sosial Media</h4>
                    <p>Kunjungi Sosial Media Kami</p>
                    <div class="social-links mt-3">
                        <?php foreach ($this->db->query("SELECT * FROM sosmed")->result() as $key => $value): ?>
                          <a href="<?= $value->link; ?>" class="<?= $value->title; ?>"><i class="bx bxl-<?= $value->icon; ?>"></i></a>
                        <?php endforeach; ?>
                        <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="copyright">
            &copy; Copyright <strong><span><?= Perusahaans::get()->nama; ?></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/butterfly-free-bootstrap-theme/ -->
            <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url('assets/front/') ?>assets/vendor/jquery/jquery.min.js"></script>

<script type="text/javascript">

	$(document).ready(function(){

    <?php if(generate_session('pesan') != "") : ?>

		    $("#modalku").modal('show');

        <?php destroy_session('pesan'); ?>


    <?php endif; ?>

	})

</script>

<script src="<?= base_url('assets/front/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/front/') ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/front/') ?>assets/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url('assets/front/') ?>assets/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url('assets/front/') ?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/front/') ?>assets/vendor/counterup/counterup.min.js"></script>
<script src="<?= base_url('assets/front/') ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url('assets/front/') ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('assets/front/') ?>assets/js/main.js"></script>

</body>

</html>
