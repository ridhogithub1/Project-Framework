<!--  Main wrapper -->

<!--  Header Start -->

<!--  Header End -->
<div class="container-fluid">
	<!--  Row 1 -->


	<div class="row">

		<section id="about" class="about mb-5">
			<div class="container">
				<div class="section-title text-center">
					<h2><?= $berita['judul'] ?></h2>
				</div>
				<div class="row mt-4">
					<div class="col-lg-6">
						<img src="<?= base_url('assets/images/products/') . $berita["poster"] ?>" class="img-fluid" alt="" width="100%">
					</div>
					<div class="col-lg-6 pt-4 pt-lg-0 content">
						<p>
							<?= $berita['isi'] ?>
						</p>
					</div>
				</div>
			</div>
		</section><!-- End About Us Section -->
		<!-- ======= More Services Section ======= -->
		<section class="more-services section-bg">
			<div class="container">
				<div class="section-title">
					<h3>Berita Lainnya</h3>
				</div>
				<div class="row">
					<?php foreach ($berita_lainnya as $row) : ?>
						<div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
							<div class="card w-100">
								<img src="<?= base_url('assets/images/products/') . $row["poster"] ?>" class="card-img-top" alt="..." width="100%" height="200px">
								<div class="card-body">
									<h5 class="card-title"><a href=""><?= $row['judul'] ?></a></h5>
									<p class="card-text" style="display: inline-block;
										white-space: wrap;
											height: 4rem;
										overflow: hidden;
										text-overflow: ellipsis;"><?= $row['isi'] ?></p>
									<center>
										<a href="<?= base_url('mahasiswa/berita_detail/' . $row["id"]) ?>" class="btn">Read more</a>
									</center>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

			</div>
		</section>

	</div>

</div>
</div>
</div>