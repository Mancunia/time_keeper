<!doctype html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <title>
        Avatar_name
    </title>
    <link href="icon/logo.png" rel="shortcut icon" />
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
        <h1 class="modal-title" id="exampleModalCenterTitle">Registration Form</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- new user form modal  -->

        <div id="_signup" class="container">
    <!-- <h1 class="well">Registration Form</h1> -->
    <div class="row">
        <div class="col-lg-12 well">
            <form method="post" action="signup.php" enctype="multipart/form-data">
                <div class="class=" col-md-6 offset-md-3 col-sm-12"">

                    <div class="row">
            
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Phone</label>
                            <input type="text" name="companyPhone" placeholder="eg: +233245052365" class="form-control"> </div>
                        <div class="col-sm-4 form-group">
                            <label>Email</label>
                            <input type="email" name="companyEmail" placeholder="eg: example@email.com" class="form-control" required> </div>
        
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>First Name</label>
                            <input type="text" name="firstName" placeholder="eg: John" class="form-control" required> </div>
                        <div class="col-sm-6 form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastName" placeholder="eg: Doe" class="form-control" required> </div>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="eg: example@email.com" class="form-control" required> </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pssword" placeholder="eg: Enter Password Here.." class="form-control" required> </div>
                    <div class="form-group">
                        <label>Comfirm Password</label>
                        <input type="password" name="c_pssword" placeholder="eg: Confirm Password Here.." class="form-control" required> </div>
                    <button type="submit" name="signup_btn" class="btn btn-md btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<div class="container" id="lst_coat">
<br>
<form role="form" id="form" action="" method="POST">
  <div class="form-group login">
    <label class="label_div" for="email">First Name:</label>
    <input type="text" class="form-control" id="email" name="fName" placeholder="Like: Emma, Akwasi" required>
  </div>
  <div class="form-group login">
    <label class="label_div" for="email">Last Name:</label>
    <input type="text" class="form-control" id="email" name="lName" placeholder="Like: Osei, Mensah"required>
  </div>
  <div class="form-group login">
    <label for="pwd">Phone:</label>
    <input type="password" class="form-control" id="pwd" name="pssword" required>
  </div>
  <div class="form-group login">
    <label class="label_div" for="email">Motive:</label>
    <textarea rows="5" cols="40" class="form-control-md" name="topic_Desc_update">
       
    </textarea>
  </div>
  <div>
  <button name="go_btn" type="submit" class="btn btn-success btn_login">Login</button>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn_login" data-toggle="modal" data-target="#exampleModalCenter">
  Logout
</button>
</div>
</form>
<br>
</div>



</body>