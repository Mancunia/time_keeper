<?php
session_start();
include 'links.php';
include_once 'includes/conn.php';
include_once 'includes/app.php';
$db = new Database();
$guest= new appuser();
//get parsed id
if(isset($_GET['visitId'])){
    $detail= $guest->readVisit($_GET['visitId']);
    $fname=$detail['fname'];
    $lname=$detail['lname'];
    $en_time=$detail['entry_time'];
    $ex_time=$detail['exit_time'];
    if(empty($ex_time)){
        $ex_time="Still Here";
    }
    $motive=$detail['motive'];
    $phone=$detail['phone_number'];

}
include 'header.php';
?>




<div class="container" id="lst_coat">
<br>
<form role="form" id="form" action="" method="POST">
  <div class="form-group login">
    <label class="label_div" for="email">First Name:</label>
    <input type="text" class="form-control" id="email" readonly disabled value="<?php echo $fname; ?>">
  </div>
  <div class="form-group login">
    <label class="label_div">Last Name:</label>
    <input type="text" class="form-control" readonly disabled value="<?php echo $lname; ?>">
  </div>
  <div class="form-group login">
    <label for="pwd">Phone:</label>
    <input type="text" class="form-control" id="pwd" name="phone" required autofill="off" readonly disabled value="<?php echo $phone; ?>">
  </div>
  <div class="form-group login">
    <div class="row"><label class="label_div col-3" for="email">Motive:</label></div>
    <textarea rows="5" cols="30" class="form-control-md col-11" name="motive" readonly disabled>
       <?php echo $motive; ?>
    </textarea>
    
  </div>
  <h3>Time</h3>
  <div class="row">
  <!-- Time -->
  <div class="col-6"> <label>IN:</label>
  <!--In time -->
  <input type="text" class="form-control" readonly disabled value="<?php echo $en_time; ?>">
  </div>

  <div class="col-6"><label>OUT:</label>
  <!--Out time -->
  <input type="text" class="form-control" readonly disabled value="<?php echo $ex_time; ?>">
  </div>
</div>
</form>
<br>
</div>