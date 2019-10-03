<?php
session_start();
if(!isset($_SESSION['user_id'])){
  header("Location:index.php");
}

extract($_SESSION);

include 'links.php';
include_once 'includes/conn.php';
include_once 'includes/app.php';
$db = new Database();
$guest= new appuser();

if(isset($_GET['range_btn'])){
  extract($_GET);

  if(empty($stdate)&&empty($enddate)){
      header("Location:admin.php");
  }

header( "Location: range.php?st=".$stdate." &end=".$enddate);
  }
  if(isset($_GET['logout'])){
    $guest->killsession($user_id);
  }

  if(isset($_POST['new_user_btn'])){
extract($_POST);

$guest->newGuy($userName,$passWord,$rank,$fname,$lname,$dob,$tel,$address,$userName,$creator);


  }
  


  include 'header.php';
?>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</!-->

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->

<!--Modal New user -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content container">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="form-group" action="admin.php" method="POST">
      <div class="input-group mb-3">
      <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Email</label>
  </div>
    <input type="email" class="form-control" name="userName" placeholder="Username" aria-label="Example text with button addon" aria-describedby="button-addon1">
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Password</label>
  </div>
  <input type="password" class="form-control" name="passWord1" id="password" placeholder="password" aria-label="Recipient's username" aria-describedby="button-addon2">
  </div>

<div class="input-group mb-3">
<div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Confirm Password</label>
  </div>
  <input type="password" class="form-control" name="passWord" id="confirm_password" placeholder="password" aria-label="Recipient's username" aria-describedby="button-addon2">
  <span id="message"></span>
  </div>

  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Rank</label>
  </div>
  <select name="rank" class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="Custom Officer">Custom Officer</option>
    <option value="Security">Security</option>
    <option value="Admin">Administrator</option>
  </select>
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">First Name</label>
  </div>
    <input type="text" class="form-control" name="fname" placeholder="First Name" aria-label="Example text with two button addons" aria-describedby="button-addon3">
</div>
<br>
<div class="input-group">
<div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Last Name</label>
  </div>
  <input type="text" class="form-control" name="lname" placeholder="Last name" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
  </div>
  <br>
  <div class="input-group">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Date of Birth</label>
  </div>
  <input type="date" class="form-control" name="dob" placeholder="Date of birth" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
  </div>
  <br>
  <div class="input-group">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Phone</label>
  </div>
  <input type="text" class="form-control" name="tel" placeholder="Phone number" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
  </div>
  <br>

  <div class="input-group">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Address</label>
  </div>
  <textarea type="text" rows="5" cols="10" class="form-control" name="address" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
  
  </textarea>
  </div>

  <div class="input-group">
  <input type="text" class="form-control" name="creator" hidden value="<?php echo $user_id; ?>" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
  </div>
  <div class="modal-footer">
        <input type="submit" class="btn btn-primary" onclick="check()" name="new_user_btn">
      </div>
  </form>
    </div>
  </div>
</div>

</
<!--End modal new user -->

<!-- Modal range-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search Speacification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- Search specification -->
        <form action="admin.php" class="form-group" method="GET">
        <div class="row">
    <div class="col">
      <input type="date" class="form-control" placeholder=" Starting Date" name="stdate">
    </div>
    <div class="col">
      <input type="date" class="form-control" placeholder="Ending Date" name="enddate">
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name="range_btn">
      </div>
      </form>
    </div>
  </div>
</div>
<!--End modal range -->


<body style="background-color:;">


<div class="row">

  <div class="col-2 bg-dark" style="height:inherit; width:20%;">
  <div class="container">
<!--Admin details -->
<?php
echo "<h1>".$identify_id.$user_id."</h1>";
?>


</div>
  <!-- Sidebar -->
    <div class="nav flex-column nav-pills"  id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a type="button" style="color:white;" class="nav-link btn-dark " data-toggle="modal" data-target=".bd-example-modal-lg">New User </a>
    
<hr>
      <a style="color:white;" class="nav-link btn-dark " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Today</a>
      <a style="color:white;" class="nav-link btn-dark " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">All-Time</a>
      <a type="button" style="color:white;" class="nav-link btn-dark" id="v-pills-tab" data-toggle="modal" data-target="#exampleModal" >
  Range
</a>
<hr style="color:white;">
<form action="" method="GET" style="bottom:0;">
    <button type="submit" style="color:white;" class="nav-link btn-dark form-control" name="logout">Log out
    </button>
</form>
      <!-- <a class=""  data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Range</a> -->
      <!-- <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Search</a> -->
    </div>
  </div>
   <!--End Sidebar -->
  <div class="col-10" style="background-color:white;">
    <div class="tab-content" id="v-pills-tabContent">
    <!-- On the right -->
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"> 
          <!--Today -->
<div class="row">

<!--IN-->
      <div class="col-6">

      <?php
    $results=mysqli_query($db->getdbconnect(),"call today_in()");   
  ?>
      <button type="button" class="btn btn-primary">
Logged in <span class="badge badge-light"><?php echo mysqli_num_rows($results) ?></span>
</button>
      <table class="table table-striped table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
    <th scope="col">Time</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Details</th>

    </tr>
  </thead>

  <tbody>

  <?php
  while($amnt=mysqli_fetch_array($results)){
    if(empty($amnt['motive'])){
    $amnt['motive']='Nothing';
  }
      echo"
      <tr data-toggle='tooltip' data-placement='bottom' title='".$amnt['motive']."'>
      <td>".$amnt['entry_time']."</td>
      <td>".$amnt['fname']."</td>
      <td>".$amnt['lname']."</td>
      <td>".$amnt['phone_number']."</td>
      <td>
      <a class='btn btn-dark card-link' href='visit_details.php?visitId=".$amnt['vistors_ID']."'> Enter </a>
      </td>
      </tr>
      ";
      
  }
// exit();

  ?>
    
  </tbody>
</table>
</div>

<!-- OUT-->
<div class="col-6">
<?php
  // $results=mysqli_query($db->getdbconnect,"SELECT * FROM `vistors` WHERE Date(`entry_time`) = CURDATE() and exit_time is null ORDER BY vistors_ID desc");
  $out_results=mysqli_query($db->getdbconnect(),"call today_out()");   

  
  ?>
<button type="button" class="btn btn-warning">
  Logged out <span class="badge badge-light"><?php echo mysqli_num_rows($out_results) ?></span>
</button>
<table class="table table-striped table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Time</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
  <?php
  while($amnt=mysqli_fetch_array($out_results)){
  //     <button type="button" class="btn btn-secondary" >
  //   Tooltip on bottom
  // </button>
  if(empty($amnt['motive'])){
    $amnt['motive']='Nothing';
  }
      echo"
  
      <tr data-toggle='tooltip' data-placement='bottom' title='".$amnt['motive']."'>
      <td>".$amnt['entry_time']."</td>
      <td>".$amnt['fname']."</td>
      <td>".$amnt['lname']."</td>
      <td>".$amnt['phone_number']."</td>
      <td>
      <a class='btn btn-dark card-link' href='visit_details.php?visitId=".$amnt['vistors_ID']."'> Enter </a>
      </td>
      </tr>
  
      ";
      
  }
// exit();

  ?>
       
  </tbody>
</table>
</div>

      </div>
      <br>
<br>
      <!--End of today -->


      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
      <!--Search for -->
      <!-- <form method="POST">
      <div class="input-group mb-3">
  <input type="text" class="form-control" name="search_text" placeholder="Search: name, phone number" cols="3" aria-label="Recipient's username" aria-describedby="button-addon2">
  <div class="input-group-append">
    <input type="submit" name="search_btn" class="btn btn-outline-secondary" type="button" id="button-addon2"/>
  </div>
</div>
</form> -->
<hr>
<?php



$search_results=mysqli_query($db->getdbconnect(),"SELECT * FROM vistors order by vistors_ID desc");




?>
<!--Table -->
<button type="button" class="btn btn-dark">
  All-Time <span class="badge badge-dark"><?php echo mysqli_num_rows($search_results) ?></span>
</button>
<br>
<div class="table-responsive">
<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead class="thead-dark">
    <tr>
    <th scope="col">Time</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
  <?php
while($amnt=mysqli_fetch_array($search_results)){
  echo"
  
  <tr data-toggle='tooltip' data-placement='bottom' title='".$amnt['motive']."'>
  <td>".$amnt['entry_time']."</td>
  <td>".$amnt['fname']."</td>
  <td>".$amnt['lname']."</td>
  <td>".$amnt['phone_number']."</td>
  <td>
  <a class='btn btn-dark card-link' href='visit_details.php?visitId=".$amnt['vistors_ID']."'> Enter </a>
  </td>
  </tr>

  
      ";
}
  ?>



  </tbody>
</table>
  </div>




      <!--End Search for -->
      </div>

      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...
      
      
      </div>

      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...
      
      </div>
    </div>
  </div>

  <!-- <div class="col-3" style="background-color:black;">
  
  </div> -->
</div>



</body>
<script>
$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});

$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});

function check(){
  var msg=document.getElementById('message');
  if(msg.innerHTML=='Not Matching'){
    alert("Password don't match!");
  }
}
</script>
<script>
var killing = function(){
  var php_script="
  <?php 
  $guest->killsession();
  header("Location")
  ?>
  ";
  document.write(php_script);
}
</script>