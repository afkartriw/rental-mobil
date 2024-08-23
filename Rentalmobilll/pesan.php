<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rentalmobil</title>
    <?php require 'parts/head.php' ?>
  </head>
  <body>
    <?php require 'parts/navbar.php'?>

    <section
      class="hero-wrap hero-wrap-2 js-fullheight"
      style="
        background-image: url('images/shutterstock_335320880-wavebreakmedia-min.webp');
      "
      data-stellar-background-ratio="0.5"
    >
      <div class="overlay"></div>
      <div class="container">
        <div
          class="row no-gutters slider-text js-fullheight align-items-end justify-content-start"
        >
          <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs">
              <span class="mr-2"
                ><a href="index.html"
                  >Home <i class="ion-ios-arrow-forward"></i></a
              ></span>
              <span>Pesan Sekarang <i class="ion-ios-arrow-forward"></i></span>
            </p>
            <h1 class="mb-3 bread">Pesan Sekarang</h1>
          </div>
        </div>
      </div>
    </section>


  <form action="#" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="nama">Nama Penyewa</label>
      <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" required>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <textarea id="alamat" name="alamat" placeholder="Alamat Lengkap" required></textarea>
    </div>
    <div class="form-group">
      <label for="merkMobil">Merk Mobil</label>
      <select id="merkMobil" name="merkMobil" required>
        <option value="" disabled selected hidden>Pilih Merk Mobil</option>
        <option>Toyota Agya</option>
        <option>Toyota Fortuner</option>
        <option>Honda Brio</option>
        <option>Daihatsu Terios</option>
      </select>  
    </div>
    <div class="form-group">
      <label for="tanggalMulai">Tanggal Mulai Penyewaan</label>
      <input type="date" id="tanggalMulai" name="tanggalMulai" required>
    </div>
    <div class="form-group">
      <label for="waktuMulai">Waktu Mulai Penyewaan</label>
      <input type="time" id="waktuMulai" name="waktuMulai" required>
    </div>
    <div class="form-group">
      <label for="tanggalPenyerahan">Tanggal Penyerahan</label>
      <input type="date" id="tanggalPenyerahan" name="tanggalPenyerahan" required>
    </div>
    <div class="form-group">
      <label for="waktuPenyerahan">Waktu Penyerahan</label>
      <input type="time" id="waktuPenyerahan" name="waktuPenyerahan" required>
    </div>
    <div class="form-group">
      <label for="fasilitasSopir">Fasilitas Sopir</label><br>
      <input type="radio" id="denganSopir" name="fasilitasSopir" value="Dengan Sopir" required>
      <label for="denganSopir">Dengan Sopir</label><br>
      <input type="radio" id="tanpaSopir" name="fasilitasSopir" value="Tanpa Sopir" required>
      <label for="tanpaSopir">Tanpa Sopir</label>
    </div>
    <div class="form-group">
      <label for="fotoIdentitas">Foto/Bukti Identitas Diri</label>
      <input type="file" id="fotoIdentitas" name="fotoIdentitas" required>
    </div>
    <div class="form-group">
      <input type="submit" name="submit" value="SEWA SEKARANG">
    </div>
  </form>

    
    <?php require 'loader.php' ?>
  </body>
</html>
