<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$phone = "";
$name_suraname = "";
$errors = array(); 
$conn = oci_connect('test', '123', "localhost/ORCL12C");

        
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($phone)) { array_push($errors, "Phone nuumber is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // // first check the database to make sure 
  // // a user does not already exist with the same username and/or email
  // $user_check_query = "SELECT * FROM artists WHERE username='$username' OR email='$email' LIMIT 1";
  // $result = mysqli_query($db, $user_check_query);
  // $user = mysqli_fetch_assoc($result);
  

  // if ($user) { // if user exists
  //   if ($user['username'] === $username) {
  //     array_push($errors, "Username already exists");
  //   }

  //   if ($user['email'] === $email) {
  //     array_push($errors, "email already exists");
  //   }
  // }

  // // Finally, register user if there are no errors in the form
  // if (count($errors) == 0) {
  // 	$password = md5($password_1);//encrypt the password before saving in the database

  	// $query = "INSERT INTO artists (username, email, password, phone) 
  	// 		  VALUES('$username', '$email', '$password', '$phone')";
  	// mysqli_query($db, $query);
  	// $_SESSION['username'] = $username;
   //  $_SESSION['email'] = $email;
   //  $_SESSION['phone'] = $phone;
  	// $_SESSION['success'] = "You are now logged in";
  	// header('location: login.php');

    $insertQuery = oci_parse($conn, 'INSERT INTO artists (username, email, password, phone) VALUES (:username, :email, :password, :phone)');
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['password'] = $password;
    $_SESSION['success'] = "You are now logged in";
    oci_bind_by_name($insertQuery, ':username', $username);
    oci_bind_by_name($insertQuery, ':email', $email);
    oci_bind_by_name($insertQuery, ':password', $password);
    oci_bind_by_name($insertQuery, ':phone', $phone);
    oci_execute($insertQuery);
    header("location: index.php");

//     oci_free_statement($insertQuery);
// oci_close($conn);
    }

// // LOGIN USER
if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password =  $_POST['password'];

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

//   if (count($errors) == 0) {
//     $password = md5($password);
    $findUserQuery = oci_parse($conn, 'SELECT * FROM artists WHERE username = :email');
oci_bind_by_name($findUserQuery, ':email', $email);

      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      $_SESSION['phone'] = $phone;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
//     }else {
//       array_push($errors, "Wrong username or password combination");
//     }
   }

//   $insertQuery = oci_parse($conn, 'INSERT INTO users (userid, email, name, password) VALUES (userid_sequence.nextval, :email, :name, :password)');
// oci_bind_by_name($insertQuery, ':email', $email);
// oci_bind_by_name($insertQuery, ':name', $name);
// oci_bind_by_name($insertQuery, ':password', $passwordHash);



?>