<?php 
session_start();
if(!empty($_SESSION)){
    header("Location:checkin.php");
}
include 'links.php';
include_once 'includes/conn.php';
include_once 'includes/app.php';
$db = new Database();
$guest= new appuser();

if(isset($_POST['admin_btn'])){
    //explode $_POST
    extract($_POST);
  $guest->signIn($modal_u_name,$modal_password);
    //pass it to the signout function
  
  }

?>
<!doctype html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <title>
        Time Keeper
    </title>
    <link height=100 width=100 href="images/logo.png" rel="shortcut icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <link href="style/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/fontawesome.min.css">
  <link rel="stylesheet" type="text/css" href="style/my_bio.css">

</head>

<div class="container" id="lst_coat">
<br>
<form method="post" action="" enctype="multipart/form-data">
                <div class="class=" col-md-6 offset-md-3 col-sm-12"">

                    <div class="row">
                    <div class="col-sm-4 form-group">
                            <strong><b>Username</b></strong></div>
                            <div class="col-sm-8 form-group">
                            <input required type="password" name="modal_u_name" placeholder="The Username" class="form-control" cols="30" size="10"> </div>
                  
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <strong><b>Password</b></strong></div>
                            <div class="col-sm-8 form-group">
                            <input required type="password" name="modal_password" placeholder="password" class="form-control" cols="30" size="10"> </div>
                  
                    </div>
                    <button type="submit" name="admin_btn" class="btn btn-md btn-success">Submit</button>
                </div>
            </form>
            </div>