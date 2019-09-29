<?php 
include_once 'conn.php';

class appuser{
   
    private $conn;

//loggin function for users 
    function userLogin($userName,$passWord){
        try {
            //code...
        } catch (PDOException $ex){
            echo $ex->getMessage();
            }

    }
    // 

    //sign-in, visitor Enters GRA
    function sign_in($phone,$fname,$lname,$motive){
// $conn = new Database();

try{
    $conn = new Database();
$sql="call new_visitor('".$phone."','".$fname."','".$lname."','".$motive."')";

mysqli_query($conn->getdbconnect(), $sql);
mysqli_close($conn->getdbconnect());
return"<div class='alert alert-success alert-dismissible fade show' role='alert'>
      
<strong>Welcome <img src='./images/gra.jpg'/></strong>
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
</button>
</div>
<br>";
    }
catch (PDOException $ex){
    echo $ex->getMessage();
    }
    }

    //Logout, visitor leaving GRA
    function sign_out($phone){
        try{
            
            $conn = new Database();
            $db=$conn->getdbconnect();
        $sql="call logout_visitor('".$phone."')"; 
        mysqli_query($db, $sql);
        return"<div class='alert alert-success alert-dismissible fade show' role='alert'>
              
        <strong>Leaving<img src='./images/gra.jpg'/></strong> Have a nice day
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }
        catch (PDOException $ex){
            echo $ex->getMessage();
            }
    }

    function did_log_out($phone){
        try{
            $conn = new Database();
        $db=$conn->getdbconnect();
        $sql="SELECT * FROM vistors where phone_number=".$phone." and exit_time is null";
        $results= mysqli_query($db, $sql);
        $log_out= mysqli_num_rows($results);

        if($log_out>0){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
              
            <strong>Hey!!</strong>You haven't left yet  
            <a type='button' class='btn btn-primary btn_login'  href='logout.php'>
  Logout
</a>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </div>
            <br>"; 
            // mysqli_close($conn); 
            return $log_out;
        }
    }
    catch (PDOException $ex){
        echo $ex->getMessage();
        }

    }

    function todayIn(){
        try {
            //instance of db
            $conn = new Database();
            //get connection
        $db=$conn->getdbconnect();

        //query
        $results=mysqli_query($db,"call today_in()");
        // return $results;
        // echo count($amnt);
        while($amnt=mysqli_fetch_array($results)){
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
                
                </tr>
            
                ";
                
            }
        exit();
           
        } catch (PDOException $ex){
            echo $ex->getMessage();
            }
    }

    function todayOut(){
        try {
            //instance of db
            $conn = new Database();
            //get connection
        $db=$conn->getdbconnect();
        //query
        $results=mysqli_query($db,"SELECT * FROM `vistors` WHERE Date(`entry_time`) = CURDATE() and exit_time is null ORDER BY vistors_ID desc");
        return $results;
           
        } catch (PDOException $ex){
            echo $ex->getMessage();
            }
    }

    function readVisit($visitID){

        try{
//instance of db
$conn = new Database();
//get connection
$db=$conn->getdbconnect();
//query
$results=mysqli_query($db,"SELECT * FROM `vistors` WHERE vistors_ID='$visitID'");
$result=mysqli_fetch_array($results);
return $result;

        }
        catch (PDOException $ex){
            echo $ex->getMessage();
            }
    }

    function rangeSearch($st_date,$en_date){
        try {
            //instance of db
$conn = new Database();

//get connection
$results=mysqli_query($conn->getdbconnect(),"call looking_for('$st_date','$en_date')");

if(mysqli_num_rows($results)==0){
    echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              
    <strong>Hmmmmm</strong>Nothing t show here
    <a type='button' class='btn btn-primary btn_login'  href='admin.php'>
Go back
</a>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
    </div>
    <br>"; 
}
$result=mysqli_fetch_array($results);
return $results;
        } catch (PDOException $ex){
            echo $ex->getMessage();
            }
    }

}


?>