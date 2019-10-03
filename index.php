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

  include 'header.php';
?>


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
                    <button type="submit" name="admin_btn" class="btn btn-md btn-success">Login</button>
                </div>
            </form>
            </div>