File Name :- update.php 

    <?php
    require('conn.php'); 
    if(isset($_POST['update_btn'])) {
        $user_id = $_POST['user_id'];
        $name = $_POST['user_name'];
        $email = $_POST['user_email'];
        $contact = $_POST['user_contact'];
        $profile = $_FILES['user_profile']['name'];
        $profile_tmp = $_FILES['user_profile']['tmp_name'];
        $profile_location = 'profiles/'.$profile;
        $address = $_POST['address'];
        $merk_mobil = $_POST['merk_mobil'];
        $fasilitas_sopir = $_POST['fasilitas_sopir'];

        if(isset($user_id)) {
            if($profile != '') {
                $update_date = "UPDATE `simple_table` SET `name`='$name',`email`='$email',`contact`='$contact',`profile`='$profile',`address`='$address',`merk_mobil`='$merk_mobil',`fasilitas_sopir`='$fasilitas_sopir'  WHERE id = $user_id";
                $update_date_query = mysqli_query($conn ,$update_date) ;
                if($update_date_query) {
                    move_uploaded_file($profile_tmp, $profile_location);
                    header('location: index.php');
                }
                else {
                    echo "<script>alert('Data Not update Successfully'); window.history.back();</script>";
                }
            }
            else {
                $update_date = "UPDATE `simple_table` SET `name`='$name',`email`='$email',`contact`='$contact',`address`='$address',`merk_mobil`='$merk_mobil',`fasilitas_sopir`='$fasilitas_sopir'  WHERE id = $user_id";
                $update_date_query = mysqli_query($conn ,$update_date) ;
                if($update_date_query) {
                    move_uploaded_file($profile_tmp, $profile_location);
                    header('location: index.php');
                }
                else {
                    echo "<script>alert('Data Not update Successfully'); window.history.back();</script>";
                }
            }
        }
    }
    ?>