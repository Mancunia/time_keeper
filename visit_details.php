<?php
include 'links.php';
include_once 'includes/conn.php';
include_once 'includes/app.php';
$db = new Database();
$guest= new appuser();

?>




<div class="container" id="lst_coat">
<br>
<form role="form" id="form" action="" method="POST">
  <div class="form-group login">
    <label class="label_div" for="email">First Name:</label>
    <input type="text" class="form-control" id="email" readonly disabled>
  </div>
  <div class="form-group login">
    <label class="label_div">Last Name:</label>
    <input type="text" class="form-control" readonly disabled>
  </div>
  <div class="form-group login">
    <label for="pwd">Phone:</label>
    <input type="text" class="form-control" id="pwd" name="phone" required autofill="off" readonly disabled>
  </div>
  <div class="form-group login">
    <div class="row"><label class="label_div col-3" for="email">Motive:</label></div>
    <textarea rows="5" cols="30" class="form-control-md col-11" name="motive" readonly disabled>
       
    </textarea>
    
  </div>
  <h3>Time</h3>
  <div class="row">
  <!-- Time -->
  <div class="col-6"> <label>IN:</label>
  <!--In time -->
  <textarea type="text" class="form-control" rows="1" readonly disabled>


  </textarea>
  </div>

  <div class="col-6"><label>OUT:</label>
  <!--Out time -->
  <textarea type="text" class="form-control" rows="1" readonly disabled>


  </textarea>
  </div>
</div>
</form>
<br>
</div>