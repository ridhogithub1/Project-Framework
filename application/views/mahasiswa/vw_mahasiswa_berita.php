<!--  Main wrapper -->

<!--  Header Start -->

<!--  Header End -->
<div class="container-fluid">
	<!--  Row 1 -->


	<div class="row">
		<?php
		$no = 1;
		foreach ($berita as $row) : ?>
			<div class="col-sm-6 col-xl-3">
				<div class="card overflow-hidden rounded-2">
					<div class="position-relative">
						<a href="javascript:void(0)"><img src="../assets/images/products/<?= $row["poster"] ?>" class="card-img-top rounded-0" alt="..." width="100%" height="200px"></a>
					</div>
					<div class="card-body pt-3 p-4">
						<h6 class="fw-semibold fs-4"><b><?= $row["judul"] ?></b></h6>
						<div class="d-flex align-items-center justify-content-between">
							<ul class="list-unstyled d-flex align-items-center mb-0">
								<h6 class="fw-semibold fs-2" style="display: inline-block;
  white-space: wrap;
	height: 10rem;
  overflow: hidden;
  text-overflow: ellipsis;"><?= $row["isi"] ?></h6>
							</ul>

						</div>
						<br>
						<a href="<?= site_url('mahasiswa/') ?>">
							<center>
								<h6><b>Read More</b></h6>
							</center>
						</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>


	</div>

</div>
</div>
</div>