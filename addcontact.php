<?php
    include('config.php');

    if(!isset($_COOKIE['email']))
    {
        if(!isset($_SESSION['user']))
        {
            echo "
                <script>
                window.location='signin.php';
                </script>
            ";

        }

    }

    $flag=0;

    if(isset($_POST['submit']))
    {
      $name=$_POST['uName'];

      $address=$_POST['uAddress'];

      $emaild=implode(",",$_POST['uEmail']);
      
      $mobiles=implode(",",$_POST['uMobile']);

      if(isset($_COOKIE['email']))
      {
        $addemail=$_COOKIE['email'];

      }
      else
      {
        $addemail=$_SESSION['user']['email'];
      }

      $dir="upload/contacts/";

      $temp=explode(".",$_FILES['sFile']['name']);

      $newFileName="IMG-".round(microtime(true)).".".end($temp);

      $path=$dir.$newFileName;

      $sql="INSERT INTO contacts(username,useremail,userprofile,usermobile,useraddress,addemail,created)
            VALUES('$name','$emaild','$path','$mobiles','$address','$addemail',now());";

      if($conn->query($sql))
     {
     move_uploaded_file($_FILES['sFile']['tmp_name'],$path);

     $flag=1;


    }
    else
    {
      echo "Error is".$conn->error;

      $flag=2;
    }
  }
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <?php  include('components/head.php'); ?>
</head>

<body>

<?php  include('components/navbar.php'); ?>

<?php
      if($flag==1)
      {
        echo "<script>swal('contact save successfully')</script>";
            
      }
      elseif($flag==2)
      {
        echo "<script>swal('Something went wrong...')</script>";
             
      }
?>
    <div class="container mt-3">
    <div class="shadow-lg p-1 mb-3 mt-3 bg-body rounded"><h2 class="text-center text-danger mt-3">Add Contact...!!!</h2></div>
 
 <div class="d-flex justify-content-around">
 <a class="btn btn-primary" href="dashboard.php">Dashboard</a>
 <a class="btn btn-primary" href="addcontact.php">Add Contact</a>
 
 
   
</div>  
<form class="s-form" action="" method="POST" enctype="multipart/form-data">
<div class="mb-3">
  <label  class="form-label">Profile Photo</label>
  <input type="file" name="sFile" class="form-control"  >
</div>
<div class="mb-3">
  <label  class="form-label">FullName</label>
  <input type="text" name="uName" class="form-control"  placeholder="Name">
</div>


<div class="mb-3">
<label  class="form-label">Email address</label>
<div class="input-group mb">
<input type="email" name="uEmail[]" class="form-control"  placeholder="name@user.com">
<button class="btn btn-info" type="button" id="addEmail">+</button>
</div>
  </div>
 <div class="mb-3" id="emailAll">

     
</div>

<div class="mb-3" id="mobileAll">
  <label  class="form-label">Mobile Number</label>
  <div class="input-group mb">
  <input type="tel" name="uMobile[]" class="form-control"  placeholder="XXXXXXXXXX">
  <button class="btn btn-info" type="button" id="addMobile">+</button>
</div>
  </div>

  <div class="mb-3" id="mobileAll">
     
  </div>
  
  

<div class="mb-3">
  <label  class="form-label">Address</label>
  <textarea class="form-control"name="uAddress" rows="3"></textarea>
</div>

<div class="mb-3">
<button type="submit" name="submit" class="btn btn-success">Add Contact</button>
<button type="reset" class="btn btn-danger">Clear</button>
</div>
</form>
</div>
<?php  include('components/footer.php'); ?>

<?php  include('components/script.php'); ?>

<!-- this is a custom script for multiple email -->
<script src="js/addMoreEmail.js"></script>

<!-- this is a custom script for multiple mobile -->

<script src="js/addMoreMobile.js"></script>

    
</body>
</html>