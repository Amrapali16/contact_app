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
    $ecount=1;
    $mcount=1;
    
    $id=$_GET['q']; 
   
    $file=$_GET['f'];

   if(isset($_GET['q']) && isset($_GET['f']))
   {
    if(isset($_POST['update']))
    {
      $name=$_POST['uName'];

      $address=$_POST['uAddress'];

      $emaild=implode(",",$_POST['uEmail']);
      
      $mobiles=implode(",",$_POST['uMobile']);

      if(isset($_COOKIE['email']))
      {
        unlink($file);

      $dir="upload/contacts/";

      $temp=explode(".",$_FILES['sFile']['name']);

      $newFileName="IMG-".round(microtime(true)).".".end($temp);

      $path=$dir.$newFileName;

      move_uploaded_file($_FILES['sFile']['tmp_name'],$path);

      $sql="UPDATE contacts SET username='$name', useremail='$emaild',userprofile='$path',usermobile='$mobiles',useraddress='$address',
            updated=now() WHERE userID=$id";
      }
      else
      {
        $sql="UPDATE contacts SET username='$name', useremail='$emaild',usermobile='$mobiles',useraddress='$address',
        updated=now() WHERE userID=$id";
      }

      if($conn->query($sql)===TRUE)
     {
     

     $flag=1;


    }
    else
    {
      
      $flag=2;

      echo "<script>console.log('.$conn->error.')</script>";
    }
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
<div class="mb-3 text-center">
  <img src="<?php echo $file?>" style="height:100px"/>
  <label  class="form-label">Profile Photo</label>
  <p class="text-danger">Current Profile Picture</p>
</div>


<div class="mb-3">
  <label  class="form-label">Profile Photo</label>
  <input type="file" name="sFile" class="form-control"  >
</div>

<?php
 $sql="SELECT * FROM contact WHERE userID=$id";

 $result=$conn->query($sql);

   if($result->num_rows>0)
   {

    while($row=$result->fetch_assoc())
    {

      $marray=explode(",",$row['usermobile']);
      $earray=explode(",",$row['useremail']);


?>

<div class="mb-3">
  <label  class="form-label">FullName</label>
  <input type="text" name="uName" value="<?php echo $row['uName']?>" class="form-control"  placeholder="Name">
</div>

<?php
foreach($earray as $oneitem){

?>


<div class="mb-3" id="emailBox">
<label  class="form-label">Email address</label>
<div class="input-group ">
<input type="email" name="uEmail[]" class="form-control" value="<?php echo $oneitem ?>"  placeholder="name@user.com">

<?php

if($ecount==1)
{
    echo '<button class="btn btn-info" type="button" id="addEmail">+</button>';

    $ecount++;
}
else
{
     echo '<button class="btn btn-danger" type="button" id="removeEmail">-</button>';
    
}

?>

</div>
  </div>
<?php
}
?>

 <div id="emailAll">

     
</div>

<?php
foreach($marray as $onemobile){
?>

<div class="mb-3" id="mobileBox">
  <label  class="form-label">Mobile Number</label>
  <div class="input-group">
  <input type="tel" name="uMobile[]" class="form-control" value="<?php echo $onemobile ?>" placeholder="XXXXXXXXXX">
  <?php

if($mcount==1)
{
    echo '<button class="btn btn-info" type="button" id="addMobile">+</button>';

    $mcount++;
}
else
{
     echo '<button class="btn btn-danger" type="button" id="removeMobile">-</button>';
    
}

?>
</div>
  </div>
<?php
}
?>
  <div id="mobileAll">
     
  </div>
  
  

<div class="mb-3">
  <label  class="form-label">Address</label>
  <textarea class="form-control"name="uAddress" rows="3"><?php echo $row['uAddress']?></textarea>
</div>

<?php
}
}
?>

<div class="mb-3">
<button type="submit" name="update" class="btn btn-success">Update Contact</button>
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