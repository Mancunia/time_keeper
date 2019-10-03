<?php
session_start();
if(empty($_SESSION)){
    header("Location:index.php");
}
error_reporting(0);
include 'links.php';
include_once 'includes/conn.php';
include 'includes/app.php';

//Instance of appuser class
$app = new appuser();

if(isset($_POST['signout_btn'])){

$phone=$_POST['phone'];

$feed= $app->sign_out($phone,$_SESSION['user_id']);
echo $feed;
header("Location:index.php");


}

include 'header.php';
?>


<body>
<div class="container" id="lst_coat">
<div class="" style="width: 18rem;">
  <img src="images/logo.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">CheckOut</h5>
    <form method="post" action="logout.php" enctype="multipart/form-data">
                <div class="class=" col-md-6 offset-md-3 col-sm-12"">

                    <div class="row">
            
                    </div>
                    <div class="row">
                        
                            <div class="col-sm-12 form-group">
                            <input type="text" name="phone" placeholder="Enter Phone number eg: +233245052365" class="form-control"> 
                        </div>
                  
                    </div>
                    <button type="submit" name="signout_btn" class="btn btn-md btn-dark">CheckOut</button>
                </div>
            </form>
    
  </div>
</div>
</div>
</body>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>