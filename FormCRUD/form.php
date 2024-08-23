<?php 
    session_start();
    include('../registration/server.php');
    if (empty($_SESSION['username'])) {
        header('location: ../registration/login.php');
    }
    $_POST['merk_mobil'] = '';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <?php require '../Rentalmobilll/parts/navbar.php' ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h4 class="text-center text-light">Form Rental</h4>
                        </div>
                        <div class="card-body">
                            <form action="insert.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="username" name="user_name" placeholder="Enter User Name" value="<?php echo $_SESSION['username']; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="useremail" name="user_email" placeholder="Enter Email Address" value="<?php echo $_SESSION['email']; ?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="usercontact" class="form-label">Contact</label>
                                            <input type="text" class="form-control" id="usercontact" name="user_contact" placeholder="Enter Contact Number" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="userprofile" class="form-label">Photo Profile</label>
                                            <input type="file" class="form-control" id="userprofile" name="user_profile" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Your Address" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="merkmobil" class="form-label">Merk Mobil</label>
                                            <select id="merkmobil" class="form-control" name="merk_mobil" placeholder="Choose a Car" autocomplete="off" required>
                                                <option value="" >Pilih Merk Mobil</option>
                                                <option value="Toyota Agya" <?php if ($_POST['merk_mobil'] == "Toyota Agya") echo "selected" ?>>Toyota Agya</option>
                                                <option value="Toyota Fortuner" <?php if ($_POST['merk_mobil'] == "Toyota Fortuner") echo "selected" ?>>Toyota Fortuner</option>
                                                <option value="Honda Brio" <?php if ($_POST['merk_mobil'] == "Honda Brio") echo "selected" ?>>Honda Brio</option>
                                                <option value="Daihatsu Terios" <?php if ($_POST['merk_mobil'] == "Daihatsu Terios") echo "selected" ?>>Daihatsu Terios</option>
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="fasilitasSopir">Fasilitas Sopir</label><br>
                                            <!-- here -->
                                            <input type="radio" id="denganSopir" name="fasilitas_sopir" value="Dengan Sopir" class="form-label" required>
                                            <label for="denganSopir">Dengan Sopir</label><br>
                                            <input type="radio" id="tanpaSopir" name="fasilitas_sopir" value="Tanpa Sopir" class="form-label" required>
                                            <label for="tanpaSopir">Tanpa Sopir</label>
                                        </div>
                                    </div>    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="index.php" class="btn bg-dark text-light submit_button">CRUD</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" name="submit_btn" class="btn bg-dark text-light submit_button"><b>Submit</b></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
    