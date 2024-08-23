<?php
//here where the session are made and start
//FOR register.php Page
    $username = '';
    $email = '';
    $errors = array();

    //connect to database
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'registration';
    $conn = mysqli_connect($host,$user,$pass,$db);

    //if the register is clicked
    if(isset($_POST['register'])){

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        //ensure that form fields are filled properly
        if(empty($username)) {
             array_push($errors,"Username is required");
        }
        if(empty($email)) {
             array_push($errors,"Email is required");
        }
        if(empty($password_1)) {
             array_push($errors,"Password is required");
        }
        if($password_1 != $password_2) {
             array_push($errors,"The two passwords do not match");
        }

        // if there are no errors, save user to database
        if(count($errors) == 0){
          session_start();
          $password = md5($password_1); //encrypt password before storing in database (security)
          $sql = "INSERT INTO users (username, email, password) 
                  VALUES ('$username', '$email', '$password')";
          mysqli_query($conn,$sql);
          $query2 = "SELECT username FROM users WHERE username='$username' or email='$username' AND password='$password'";
          $_SESSION['username'] = mysqli_fetch_column(mysqli_query($conn,$query2)); //session made
          $_SESSION['success'] = 'You are now logged in';
          $query_2 = "SELECT email FROM users WHERE username='$username' or email='$username' AND password='$password'";
          $_SESSION['email'] = mysqli_fetch_column(mysqli_query($conn,$query_2));
          header('location: index.php');//redirect to home page
        }

    }


//FOR Login.php Page
    // log user in from login page
     if(isset($_POST['login'])){  //if login button clicked
          $username = mysqli_real_escape_string($conn, $_POST['username']);
          $password = mysqli_real_escape_string($conn, $_POST['password']);

          //ensure that form fields are filled properly
          if(empty($username)) {
               array_push($errors,"Username is required");
          }
          if(empty($password)) {
               array_push($errors,"Password is required");
          }

          if (count($errors) == 0) {
               session_start();
               $password = md5($password); //encrypt password before comparing with that form database
               $query = "SELECT * FROM users WHERE username='$username' or email='$username' AND password='$password'";
               $result = mysqli_query($conn,$query); //mengambil 1 baris yang sesuai dengan informasi diatas
               if (mysqli_num_rows($result) == 1) {
                    //log user in
                    $query3 = "SELECT username FROM users WHERE username='$username' or email='$username' AND password='$password'";
                    $_SESSION['username'] = mysqli_fetch_column(mysqli_query($conn,$query3)); //session made
                    $_SESSION['success'] = 'You are now logged in';
                    $query_3 = "SELECT email FROM users WHERE username='$username' or email='$username' AND password='$password'";
                    $_SESSION['email'] = mysqli_fetch_column(mysqli_query($conn,$query_3));
                    header('location: index.php');//redirect to form CRUD page
               } else {
                    array_push($errors, "wrong username/password combination");
               }
          }
     }


    //logout
    if(isset($_GET['logout'])) {
     session_destroy();
     unset($_SESSION['success']); 
     unset($_SESSION['username']);
     unset($_SESSION['email']);
     header('location: ../Rentalmobilll/home.php');
    }

?>