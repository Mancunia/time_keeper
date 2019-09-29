<?php
include 'links.php';
include_once 'includes/conn.php';
include_once 'includes/app.php';
$db = new Database();
$guest= new appuser();

// if(isset($_GET['st']) && !empty($_GET['st']) AND isset($_GET['end']) && !empty($_GET['end'])){
//     extract($_GET);
//     $start=$_GET['$st'];
//     $end=$_GET['$end'];
//     $search_results= $guest->rangeSearch($start,$end);
// }
if(isset($_GET['st'])&&isset($_GET['end'])){
    extract($_GET);
    if(empty($st)){
        echo "
        <script>
        alert('send');
        </script>
        ";
          $end="NOW()";
      }
    
       if(empty($end)){
        echo "
        <script>
        alert('send');
        </script>
        ";
          $start="2009%";
      }
    

  $search_results= $guest->rangeSearch($st,$end);
}
// $search_results= $guest->rangeSearch('2019%','2019-10%');


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



<button type="button" class="btn btn-dark">
  All-Time <span class="badge badge-dark"><?php echo mysqli_num_rows($search_results); ?></span>
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
      <script>
$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>