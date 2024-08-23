    <?php
        require('conn.php');
        $get_id =  $_GET['id'];
        $select_data_of_user= "SELECT * FROM `simple_table` WHERE id = $get_id";
        $select_data_query = mysqli_query($conn, $select_data_of_user);
        $selected_fetch_data = mysqli_fetch_array($select_data_query);
        $_POST['merk_mobil'] = '';
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit CRUD</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        
    </head>
    <body>
        <?php require '../Rentalmobilll/parts/navbar.php' ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-dark d-flex justify-content-between">
                            <h4 class="text-center text-light">PHP CRUD Operation</h4>
                            <a href="index.php" class="btn bg-warning text-dark"><b>Data List</b></a>
                        </div>
                        <div class="card-body">
                            <form action="update.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="user_id" id="" value="<?php echo $selected_fetch_data['id']?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="username" name="user_name" placeholder="Enter User Name" autocomplete="off" value="<?php echo $selected_fetch_data['name']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="useremail" name="user_email" placeholder="Enter Email Address" autocomplete="off" value="<?php echo $selected_fetch_data['email']?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="usercontact" class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" id="usercontact" name="user_contact" placeholder="Enter Contact Number" autocomplete="off" value="<?php echo $selected_fetch_data['contact']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="userprofile" class="form-label">Profile</label>
                                            <input type="file" class="form-control" id="userprofile" name="user_profile" autocomplete="off" value="">
                                            <img src='profiles/<?php echo $selected_fetch_data['profile']?> '>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="userpassword" name="address" placeholder="Your Address" autocomplete="off" value="<?php echo $selected_fetch_data['address']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="merkmobil" class="form-label">Merk Mobil</label>
                                            <select id="merkmobil" class="form-control" name="merk_mobil" placeholder="Choose a Car" autocomplete="off" required>
                                                <option value="<?php echo $selected_fetch_data['merk_mobil']?>" ><?php echo $selected_fetch_data['merk_mobil']?></option>
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
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <button type="submit" name="update_btn" class="btn bg-dark text-light submit_button"><b>Update</b></button>
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