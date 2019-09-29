<?php
include 'links.php';
include_once 'includes/conn.php';
include_once 'includes/app.php';
$db = new Database();
$guest= new appuser();

if(isset($_POST['range_btn'])){
  echo"
  <script>
  alert('Wooow');
  </script>
  ";
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
  
  </script>

</head>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</!-->

<!-- Modal -->
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
        <form action="" class="form-group" method="POST">
        <div class="row">
    <div class="col">
      <input type="date" class="form-control" placeholder=" Starting Date" name="st_date">
    </div>
    <div class="col">
      <input type="date" class="form-control" placeholder="Ending Date" name="end_date">
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="range_btn">Search</button>
      </div>
      </form>
    </div>
  </div>
</div>


<body style="background-color:;">


<div class="row">
  <div class="col-2 bg-dark" style="height:inherit; width:20%;">
  <!-- Sidebar -->
    <div class="nav flex-column nav-pills"  id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Today</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">All-Time</a>
      <a type="button" class="nav-link btn-dark" id="v-pills-tab" data-toggle="modal" data-target="#exampleModal" >
  Range
</a>
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
</script>