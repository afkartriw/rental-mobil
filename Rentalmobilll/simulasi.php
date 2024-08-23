<!DOCTYPE html>
<html>

<head>
  <title>Simulasi</title>
  <link rel="stylesheet" href="template.css">
  <?php require 'parts/head.php' ?>
</head>
  <body>
    <?php require 'parts/navbar.php'?>
    
    <section
      class="hero-wrap hero-wrap-2 js-fullheight"
      style="background-image: url('images/atm.png')"
      data-stellar-background-ratio="0.5"
    >
      <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
              <p class="breadcrumbs">
                <span class="mr-2">
                  <a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a>
                </span>
                <span>Simulasi <i class="ion-ios-arrow-forward"></i></span>
              </p>
              <h1 class="mb-3 bread">Simulasi </h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="container">
      <form id="contact" action="simulasi.php" method="post">
        <h3>Simulasi Kredit Pinjaman</h3>
        <h4>Input tanpa menggunakan simbol dan keterangan</h4>
        <fieldset>
          <label>Jumlah Pinjaman</label>
          <input placeholder="Minimal Rp 10.000.000" type="text" name="HargaPinjaman" required autofocus />
        </fieldset>
        <fieldset>
          <label>Bunga / Margin Flat (tahun)</label>
          <input placeholder="(5 s.d 10) %" type="text" name="BungaPinjaman" required />
        </fieldset>
        <fieldset>
          <label>Uang Muka / DP</label>
          <input placeholder="(30 s.d 100) %" type="text" name="DpPinjaman" required />
        </fieldset>
        <fieldset>
          <label>Jangka Waktu (tahun)</label>
          <input placeholder="(5 s.d 10) tahun" type="text" name="WaktuPinjaman" required />
        </fieldset>
        <fieldset>
          <button type="submit" name="submit" id="contact-submit" data-submit="...Sending">
            Submit
          </button>
        </fieldset>
      </form>
    </div>
    <?php
      if (isset($_POST["submit"])) {

        //Inputan Global Variabel
        $PinjamanPokok = intval($_POST["HargaPinjaman"]); //Pijaman atau Kredit
        $BungaDecimalTahun = intval($_POST["BungaPinjaman"]) / 100; //Bunga per tahun (decimal)
        $DepositDecimal = intval($_POST["DpPinjaman"]) / 100; //Uang Muka (decimal) dari Pinjaman Pokok
        $TenorTahun = intval($_POST["WaktuPinjaman"]); //Tenor dalam tahun

        if (($PinjamanPokok >= 10000000) && (($BungaDecimalTahun * 100 >= 5) && ($BungaDecimalTahun * 100 <= 10)) &&
          ($DepositDecimal * 100 >= 30) && ($DepositDecimal * 100 <= 100) && ($TenorTahun >= 5) && ($TenorTahun <= 10)
        ) {

          $TenorBulan = $TenorTahun * 12; //Tenor dalam Bulan
          $Deposit = $DepositDecimal * $PinjamanPokok;
          $BungaDecimalBulan = $BungaDecimalTahun / 12; //Bunga per bulan (decimal)

          //associative array
          $DataInputan = array(
            "Total Pinjaman" => "Rp " . number_format($PinjamanPokok, 2, ',', '.'),
            "Bunga/Margin" => ($BungaDecimalTahun * 100) . " % / Tahun (" . ($BungaDecimalBulan * 100) . " % / Bulan)",
            "Uang Muka/DP" => ($DepositDecimal * 100) . " % Rp " . number_format($Deposit, 2, ',', '.'),
            "Periode" => $TenorTahun . " Tahun (" . $TenorBulan . " Bulan)",
          );

          $PinjamanPlafon = $PinjamanPokok - $Deposit; //(Pinjaman - Uang Muka)
          $BungaBulan = $PinjamanPlafon * $BungaDecimalBulan; //Angsuran Margin per bulan
          $BungaTahun = $BungaBulan * 12; //Angsuran Margin per tahun
          $AngsuranPokok = $PinjamanPlafon / $TenorBulan; //Angsuran Pokok per bulan
          $AngsuranPokokTahun = $AngsuranPokok * 12; //Angsuran Pokok per tahun
          $AngsuranBulan = $AngsuranPokok + $BungaBulan; //Angsuran per bulan
          $AngsuranTahun = $AngsuranBulan * 12; //Angsuran per tahun
          $BungaTotal = $BungaBulan * $TenorBulan; //Total Bunga

          //associative array
          $InfoKredit = array(
            "Plafon Pinjaman (Pinjaman - Uang Muka)" => "Rp " . number_format($PinjamanPlafon, 2, ',', '.'),
            "Angsuran" => "Rp " . number_format($AngsuranBulan, 2, ',', '.') . "/ bulan (Rp " . number_format($AngsuranTahun, 2, ',', '.') . "/ tahun)",
            "Angsuran Pokok" => "Rp " . number_format($AngsuranPokok, 2, ',', '.') . "/ bulan (Rp " . number_format($AngsuranPokokTahun, 2, ',', '.') . "/ tahun)",
            "Angsuran Margin/Bunga" => "Rp " . number_format($BungaBulan, 2, ',', '.') . "/ bulan (Rp " . number_format($BungaTahun, 2, ',', '.') . "/ tahun)",
            "Total Bunga" => "Rp " . number_format($BungaTotal, 2, ',', '.'),
          );
          echo "<div class='container-fluid' id='contact'>
                <table class='table table-striped table-hover'>
                <th colspan='3'>Data Inputan</th>";
          foreach ($DataInputan as $key => $value) {
            echo "<tr>
                    <td> {$key} </td>
                    <td> = </td>
                    <td> {$value} </td>
                  </tr>";
          }
          echo "</table>";
          echo "<table class='table table-striped table-hover'>
                <th colspan='3'>Data Kredit Pinjaman</th>";
          foreach ($InfoKredit as $key => $value) {
            echo "<tr>
                    <td> {$key} </td>
                    <td> = </td>
                    <td> {$value} </td>
                  </tr>";
          }
          echo "</table>
                </div>";
        } else {
          echo "<div class='alert alert-primary' role='alert' align='center'>
                inputan anda ada yang tidak sesuai !
                </div>";
        }
      }
    ?>
    <?php require 'parts/footer.php' ?>
    <?php require 'parts/loader.php' ?>
  </body>
</html>

