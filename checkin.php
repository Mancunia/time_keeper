<?php 
session_start();
if(empty($_SESSION)){
  header("Location:index.php");
}

extract($_SESSION);
include 'links.php';
include_once 'includes/conn.php';
include_once 'includes/app.php';
$db = new Database();
$guest= new appuser();

if(isset($_POST['signin_btn'])){
  //get values from form tag
  $phone = $_POST['phone'];

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$motive = $_POST['motive'];

$log_out=$guest->did_log_out($phone);

if($log_out){

  return $log_out;
}

if(!isset($motive)){
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      
  <strong>You missed something, all fields are required</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
  </div>
  <br>";
  header("Location:index.php");

}



$feed=$guest->check_in($phone,$fname,$lname,$motive);
echo $feed;
mysqli_close($db->getdbconnect());
}

if(isset($_POST['admin_btn'])){
  session_reset();
  //explode $_POST
  extract($_POST);
$guest->signIn($modal_u_name,$modal_password);
  //pass it to the signout function

}
echo $user_id;

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

<body>




<!-- new user Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalCenterTitle">SWITCH</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- new user form modal  -->

        <div id="login" class="container">
    <!-- <h1 class="well">Registration Form</h1> -->
    <div class="row">
        <div class="col-lg-12 well">
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
                            <input required type="password" name="modal_password" placeholder="eg: +233245052365" class="form-control" cols="30" size="10"> </div>
                  
                    </div>
                    <button type="submit" name="admin_btn" class="btn btn-md btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<br><br><br>
<div class="container" id="lst_coat">
<br>
<form role="form" id="form" action="" method="POST">
  <div class="form-group login">
    <label class="label_div" for="email">First Name:</label>
    <input type="text" class="form-control" id="email" name="fname" placeholder="Like: Emma, Akwasi" required autofill="off">
  </div>
  <div class="form-group login">
    <label class="label_div">Last Name:</label>
    <input type="text" class="form-control" id="email" name="lname" placeholder="Like: Osei, Mensah"required autofill="off">
  </div>
  <div class="form-group login">
    <label for="pwd">Phone:</label>
    <input type="text" class="form-control" id="pwd" name="phone" required autofill="off" placeholder="Like: 0245365478">
  </div>
  <div class="form-group login">
    <div class="row"><label class="label_div col-3" for="email">Motive:</label></div>
    <textarea required rows="5" cols="30" class="form-control-md col-11" name="motive" required>
       
    </textarea>
    
  </div>
  <div>
  <button name="signin_btn" type="submit" class="btn btn-success btn_login">Login</button>

  <!-- Button trigger modal -->
  <a type="button" href="logout.php" class="btn btn-primary btn_login" >
  Logout
</a>
<button class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter">
Switch
</button>
<a type="button" href="admin.php" class="btn btn-primary btn_login" >
  
</a>
</div>
</form>
<br>
</div>



</body>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>