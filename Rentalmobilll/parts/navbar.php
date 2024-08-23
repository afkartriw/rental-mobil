<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
	    <a class="navbar-brand" href="../Rentalmobilll/home.php">Rental<span>Mobil</span></a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	    </button>

	    <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li 
			  	<?php 
					$currentFile = $_SERVER['PHP_SELF'];
					$pageName = basename($currentFile);
					if ($pageName === '../Rentalmobilll/home.php' || $pageName === 'home.php') {
						echo " class='nav-item active'";
					} else {
						echo " class='nav-item'";
					}
				?>
			  ><a href="../Rentalmobilll/home.php" class="nav-link">Home</a></li>

			  <li 
			  	<?php 
					$currentFile = $_SERVER['PHP_SELF'];
					$pageName = basename($currentFile);
					if ($pageName === '../Rentalmobilll/pricing.php' || $pageName === "pricing.php") {
						echo " class='nav-item active'";
					} else {
						echo " class='nav-item'";
					}
				?>
			  ><a href="../Rentalmobilll/pricing.php" class="nav-link">Pricing</a></li>

			<li 
				<?php 
				$currentFile = $_SERVER['PHP_SELF'];
				$pageName = basename($currentFile);
				if ($pageName === '../Rentalmobilll/car.php' || $pageName === "car.php" || $pageName === 'car-single1.php' || $pageName === 'car-single2.php' || $pageName === 'car-single3.php' || $pageName === 'car-single4.php' || $pageName === 'car-single5.php' || $pageName === 'car-single6.php') {
					echo " class='nav-item active'";
				} else {
					echo " class='nav-item'";
				}
			?>
			><a href="../Rentalmobilll/car.php" class="nav-link">Cars</a></li>

			  <li 
			  	<?php 
					$currentFile = $_SERVER['PHP_SELF'];
					$pageName = basename($currentFile);
					if ($pageName === '../Rentalmobilll/simulasi.php' || $pageName === "simulasi.php") {
						echo " class='nav-item active'";
					} else {
						echo " class='nav-item'";
					}
				?>
			  ><a href="../Rentalmobilll/simulasi.php" class="nav-link">Simulasi</a></li>

			  <li 
			  	<?php 
					$currentFile = $_SERVER['PHP_SELF'];
					$pageName = basename($currentFile);
					if ($pageName === '../FormCRUD/form.php' || $pageName === "form.php") {
						echo " class='nav-item active'";
					} else {
						echo " class='nav-item'";	
					}
				?>
			  ><a href="../FormCRUD/form.php" class="nav-link">Pesan</a></li>

	        </ul>
	    </div>
	</div>
</nav>

<!-- END nav -->