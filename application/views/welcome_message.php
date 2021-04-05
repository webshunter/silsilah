<?php
$this->load->view("template/header");
$this->load->view("template/navbar");


?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

	<div class="container">
		<div class="row">
			<div class="col-lg-7 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
				<h1>SILSILAH KELUARGA ANDA</h1>
				<h2>Abadikan garis keturunan Anda menggunakan pohon silsilah. Ideal untuk reuni keluarga, dibagikan dengan kakak-adik, atau dicetak untuk dipajang di dinding.</h2>

			</div>
			<div class="col-lg-5 order-1 order-lg-2 hero-img">
				<h3 class="text-center">Daftar</h3>
				<form action="<?=  site_url('login/daftar')?>" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<input type="text" class="form-control" name="nama" id="subject" placeholder="Nama" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
						<div class="validate"></div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="hp" id="subject" placeholder="Nomor HP" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
						<div class="validate"></div>
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="email" id="subject" placeholder="Email" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
						<div class="validate"></div>
					</div>
					<div class="form-row">
						<div class="col-md-6 form-group">
							<input type="username" name="username" class="form-control" id="username" placeholder="Username" data-rule="minlen:8" data-msg="Please enter at least 8 chars" />
							<div class="validate"></div>
						</div>
						<div class="col-md-6 form-group">
							<input type="password" class="form-control" name="password" id="password" placeholder="Password" data-rule="minlen:8" data-msg="Please enter at least 8 chars" />
							<div class="validate"></div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 form-group">
							<input type="text" name="namaayah" class="form-control" id="namaayah" placeholder="Nama Ayah" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
							<div class="validate"></div>
						</div>
						<div class="col-md-6 form-group">
							<input type="text" class="form-control" name="namaibu" id="namaibu" placeholder="Nama Ibu" data-rule="email" data-msg="Please enter a valid email" />
							<div class="validate"></div>
						</div>
					</div>
					<div class="text-center"><button type="submit" class="btn-get-started ">Daftar</button></div>
				</form>
			</div>
		</div>
	</div>

</section><!-- End Hero -->

<main id="main">

	<!-- ======= About Section ======= -->
	<section id="about" class="about">
		<div class="container">

			<div class="row">
				<div class="col-xl-5 col-lg-6 d-flex justify-content-center video-box align-items-stretch">
					<a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
				</div>

				<div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
					<h3>Mulai Buat Silsilah Keluarga</h3>
					<p>Cerita Keluarga anda bermulai dari sebuah silsilah. Mulai cerita itu dengan mengisi nama, tanggal lahir, foto dan keterangan tentang Keluarga anda . Arsipkan sekarang juga silsilah Keluarga anda, karena kalau bukan sekarang, kapan lagi ?</p>
					<div class="icon-box">
						<div class="icon"><i class="bx bx-fingerprint"></i></div>
						<h4 class="title"><a href="">Lihat silsilah anda</a></h4>
						<p class="description">Biarkan kami menemukan leluhur dan silsilah keluarga anda. Kami akan mengirimkan informasi yang menjelaskan hubungan keluarga, foto kerabat Anda, dan fakta sejarah tentang leluhur anda.</p>
					</div>

					<div class="icon-box">
						<div class="icon"><i class="bx bx-gift"></i></div>
						<h4 class="title"><a href="">Cari miliyaran informasi</a></h4>
						<p class="description">Silsilah keluarga memungkinkan untuk mencari catatan kelahiran, berita kematian, akta pernikahan, dan sumber silsilah lainnya yang dapat mengungkapan sejarah keluarga anda.</p>
					</div>

					<div class="icon-box">
						<div class="icon"><i class="bx bx-atom"></i></div>
						<h4 class="title"><a href="">Event khusus keluarga</a></h4>
						<p class="description">Kami berkomitmen membantu dalam memberikan informasi yang akurat serta eksklusif dalam menyatukan setiap keluarga yang ada, anda juga dapat membuat event khusus untuk reuni atau temu keluarga.</p>
					</div>

				</div>
			</div>

		</div>
	</section><!-- End About Section -->

	<!-- ======= Counts Section ======= -->
	<section id="counts" class="counts">
		<div class="container">

			<div class="text-center title">
				<h3>Lebih dari 120 orang telah membuat silsilah mereka</h3>
				<p>Buat sekarang silsilah khusus Keluarga anda</p>
			</div>

			<div class="row counters">

				<div class="col-lg-4 col-6 text-center">
					<span data-toggle="counter-up"><?= $this->db->query("SELECT * FROM user")->num_rows(); ?></span>
					<p>Profile</p>
				</div>

				<div class="col-lg-4 col-6 text-center">
					<span data-toggle="counter-up"><?= $this->db->query("SELECT * FROM user_kel")->num_rows(); ?></span>
					<p>User</p>
				</div>

				<div class="col-lg-4 col-6 text-center">
					<span data-toggle="counter-up"><?= $this->db->query("SELECT * FROM user")->num_rows(); ?></span>
					<p>Pohon Keluarga</p>
				</div>

			</div>

		</div>
	</section><!-- End Counts Section -->

	<!-- ======= Services Section ======= -->
	<section id="services" class="services section-bg">
		<div class="container">

			<div class="section-title">
				<h2>Layanan</h2>
				<p>Kami melayani anda dengan sepenuh hati.</p>
			</div>

			<div class="row">
			<?php foreach ($this->db->query("SELECT * FROM service")->result() as $key => $srv) : ?>
				<div class="col-lg-4 col-md-6">
					<div class="icon-box">
						<div class="icon"><i class="<?= $srv->icon ?>" style="color: #ff689b;"></i></div>
						<h4 class="title"><a href=""><?= $srv->title ?></a></h4>
						<p class="description"><?= $srv->link ?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

		</div>
	</section>
	<!-- End Services Section -->

	<!-- ======= Portfolio Section ======= -->
	<!-- <section id="portfolio" class="portfolio">
		<div class="container">

			<div class="section-title">
				<h2>Portfolio</h2>
				<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
			</div>

			<div class="row">
				<div class="col-lg-12 d-flex justify-content-center">
					<ul id="portfolio-flters">
						<li data-filter="*" class="filter-active">All</li>
						<li data-filter=".filter-app">App</li>
						<li data-filter=".filter-card">Card</li>
						<li data-filter=".filter-web">Web</li>
					</ul>
				</div>
			</div>

			<div class="row portfolio-container">

				<div class="col-lg-4 col-md-6 portfolio-item filter-app">
					<div class="portfolio-wrap">
						<img src="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>App 1</h4>
							<p>App</p>
							<div class="portfolio-links">
								<a href="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-web">
					<div class="portfolio-wrap">
						<img src="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>Web 3</h4>
							<p>Web</p>
							<div class="portfolio-links">
								<a href="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-app">
					<div class="portfolio-wrap">
						<img src="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>App 2</h4>
							<p>App</p>
							<div class="portfolio-links">
								<a href="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-card">
					<div class="portfolio-wrap">
						<img src="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>Card 2</h4>
							<p>Card</p>
							<div class="portfolio-links">
								<a href="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-4.jpg" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-web">
					<div class="portfolio-wrap">
						<img src="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>Web 2</h4>
							<p>Web</p>
							<div class="portfolio-links">
								<a href="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-5.jpg" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-app">
					<div class="portfolio-wrap">
						<img src="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>App 3</h4>
							<p>App</p>
							<div class="portfolio-links">
								<a href="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-6.jpg" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-card">
					<div class="portfolio-wrap">
						<img src="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>Card 1</h4>
							<p>Card</p>
							<div class="portfolio-links">
								<a href="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-7.jpg" data-gall="portfolioGallery" class="venobox" title="Card 1"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-card">
					<div class="portfolio-wrap">
						<img src="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>Card 3</h4>
							<p>Card</p>
							<div class="portfolio-links">
								<a href="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-8.jpg" data-gall="portfolioGallery" class="venobox" title="Card 3"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 portfolio-item filter-web">
					<div class="portfolio-wrap">
						<img src="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
						<div class="portfolio-info">
							<h4>Web 3</h4>
							<p>Web</p>
							<div class="portfolio-links">
								<a href="<?= base_url('assets/front/') ?>assets/img/portfolio/portfolio-9.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</section> -->
	<!-- End Portfolio Section -->

	<!-- ======= Clients Section ======= -->
	<section id="clients" class="clients">
		<div class="container">
			<div class="row no-gutters clients-wrap clearfix wow fadeInUp">
				<?php foreach ($this->db->query("SELECT * FROM support")->result() as $key => $value) : ?>
					<div class="col-lg-3 col-md-4 col-6">
						<div class="client-logo">
							<img src="<?= base_url('assets/gambar/support/'.$value->foto) ?>" class="img-fluid" alt="<?= $value->nama; ?>">
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<!-- End Clients Section -->

	<!-- ======= Testimonials Section ======= -->
	<section id="testimonials" class="testimonials">
		<div class="container">

			<div class="owl-carousel testimonials-carousel">
				<?php foreach ($this->db->query("SELECT * FROM testimony")->result() as $key => $srv) : ?>
					<div class="testimonial-item">
						<img src="<?= base_url('assets/gambar/testimony/'.$srv->foto) ?>" class="testimonial-img" alt="">
						<h3><?= $srv->nama ?></h3>
						<p>
							<i class="bx bxs-quote-alt-left quote-icon-left"></i>
							<?= $srv->deskripsi ?>
							<i class="bx bxs-quote-alt-right quote-icon-right"></i>
						</p>
					</div>
				<?php endforeach; ?>
			</div>

		</div>
	</section>
	<!-- End Testimonials Section -->

	<!-- ======= Team Section ======= -->
	<!-- <section id="team" class="team section-bg">
		<div class="container">

			<div class="section-title">
				<h2>Team</h2>
				<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
			</div>

			<div class="row">

				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('assets/front/') ?>assets/img/team/team-1.jpg" class="img-fluid" alt="">
							<div class="social">
								<a href=""><i class="icofont-twitter"></i></a>
								<a href=""><i class="icofont-facebook"></i></a>
								<a href=""><i class="icofont-instagram"></i></a>
								<a href=""><i class="icofont-linkedin"></i></a>
							</div>
						</div>
						<div class="member-info">
							<h4>Walter White</h4>
							<span>Chief Executive Officer</span>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('assets/front/') ?>assets/img/team/team-2.jpg" class="img-fluid" alt="">
							<div class="social">
								<a href=""><i class="icofont-twitter"></i></a>
								<a href=""><i class="icofont-facebook"></i></a>
								<a href=""><i class="icofont-instagram"></i></a>
								<a href=""><i class="icofont-linkedin"></i></a>
							</div>
						</div>
						<div class="member-info">
							<h4>Sarah Jhonson</h4>
							<span>Product Manager</span>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('assets/front/') ?>assets/img/team/team-3.jpg" class="img-fluid" alt="">
							<div class="social">
								<a href=""><i class="icofont-twitter"></i></a>
								<a href=""><i class="icofont-facebook"></i></a>
								<a href=""><i class="icofont-instagram"></i></a>
								<a href=""><i class="icofont-linkedin"></i></a>
							</div>
						</div>
						<div class="member-info">
							<h4>William Anderson</h4>
							<span>CTO</span>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('assets/front/') ?>assets/img/team/team-4.jpg" class="img-fluid" alt="">
							<div class="social">
								<a href=""><i class="icofont-twitter"></i></a>
								<a href=""><i class="icofont-facebook"></i></a>
								<a href=""><i class="icofont-instagram"></i></a>
								<a href=""><i class="icofont-linkedin"></i></a>
							</div>
						</div>
						<div class="member-info">
							<h4>Amanda Jepson</h4>
							<span>Accountant</span>
						</div>
					</div>
				</div>

			</div>

		</div>
	</section> -->
	<!-- End Team Section -->

	<!-- ======= Gallery Section ======= -->
	<!-- <section id="gallery" class="gallery">
		<div class="container">

			<div class="section-title">
				<h2>Gallery</h2>
				<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
			</div>

			<div class="row no-gutters">

				<div class="col-lg-3 col-md-4">
					<div class="gallery-item">
						<a href="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-1.jpg" class="venobox" data-gall="gallery-item">
							<img src="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
						</a>
					</div>
				</div>

				<div class="col-lg-3 col-md-4">
					<div class="gallery-item">
						<a href="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-2.jpg" class="venobox" data-gall="gallery-item">
							<img src="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
						</a>
					</div>
				</div>

				<div class="col-lg-3 col-md-4">
					<div class="gallery-item">
						<a href="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-3.jpg" class="venobox" data-gall="gallery-item">
							<img src="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
						</a>
					</div>
				</div>

				<div class="col-lg-3 col-md-4">
					<div class="gallery-item">
						<a href="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-4.jpg" class="venobox" data-gall="gallery-item">
							<img src="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
						</a>
					</div>
				</div>

				<div class="col-lg-3 col-md-4">
					<div class="gallery-item">
						<a href="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-5.jpg" class="venobox" data-gall="gallery-item">
							<img src="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
						</a>
					</div>
				</div>

				<div class="col-lg-3 col-md-4">
					<div class="gallery-item">
						<a href="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-6.jpg" class="venobox" data-gall="gallery-item">
							<img src="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
						</a>
					</div>
				</div>

				<div class="col-lg-3 col-md-4">
					<div class="gallery-item">
						<a href="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-7.jpg" class="venobox" data-gall="gallery-item">
							<img src="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
						</a>
					</div>
				</div>

				<div class="col-lg-3 col-md-4">
					<div class="gallery-item">
						<a href="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-8.jpg" class="venobox" data-gall="gallery-item">
							<img src="<?= base_url('assets/front/') ?>assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
						</a>
					</div>
				</div>

			</div>

		</div>
	</section> -->
	<!-- End Gallery Section -->

	<!-- ======= Contact Section ======= -->
	<!-- <section id="contact" class="contact">
		<div class="container">

			<div class="section-title">
				<h2>Contact</h2>
				<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
			</div>

			<div>
				<iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
			</div>

			<div class="row mt-5">

				<div class="col-lg-4">
					<div class="info">
						<div class="address">
							<i class="icofont-google-map"></i>
							<h4>Location:</h4>
							<p>A108 Adam Street, New York, NY 535022</p>
						</div>

						<div class="email">
							<i class="icofont-envelope"></i>
							<h4>Email:</h4>
							<p>info@example.com</p>
						</div>

						<div class="phone">
							<i class="icofont-phone"></i>
							<h4>Call:</h4>
							<p>+1 5589 55488 55s</p>
						</div>

					</div>

				</div>

				<div class="col-lg-8 mt-5 mt-lg-0">

					<form action="forms/contact.php" method="post" role="form" class="php-email-form">
						<div class="form-row">
							<div class="col-md-6 form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validate"></div>
							</div>
							<div class="col-md-6 form-group">
								<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
								<div class="validate"></div>
							</div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
							<div class="validate"></div>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
							<div class="validate"></div>
						</div>
						<div class="mb-3">
							<div class="loading">Loading</div>
							<div class="error-message"></div>
							<div class="sent-message">Your message has been sent. Thank you!</div>
						</div>
						<div class="text-center"><button type="submit">Send Message</button></div>
					</form>

				</div>

			</div>

		</div>
	</section> -->
	<!-- End Contact Section -->

</main><!-- End #main -->


<div id="modalku" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Silahkan cek email anda</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<?php
$this->load->view("template/footer.php")
?>
