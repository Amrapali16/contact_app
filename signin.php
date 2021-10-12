<?php
include('config.php');

if(isset($_COOKIE['email']))
{

    echo "
        <script>
          window.location='dashboard.php';
        </script>
    ";
}

$flag=0;

if(isset($_POST['sign']))
{
    $email=$_POST['email'];
    $pass=$_POST['pass'];

     $errlist=array();
     $errlist=signinValid();

     if(!count($errlist))
     {
    $sql="SELECT * FROM auth WHERE email='$email'";

    $rel=$conn->query($sql);

    if($rel->num_rows>0)
    {
            
          while($row=$rel->fetch_assoc())
          {
              $encPass=md5($pass);

            if($row['pass']==$encPass)
            {

                //  $flag=1;
               echo '<script>
               alert("Login successfully...!")
               window.location="dashboard.php" 
              </script>';

             $_SESSION['user']=$row;

             if(!empty($_POST['flexRadioDefault']))
             {
                 setcookie('email',$row['email'],time()+(86400*30));
             }

                
            }
            else
            {
              $flag=1;
            }
          }
        
    }
    else
    {
          $flag=2;
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
    <!-- value of flag -->
    <?php

    // if($flag==1)
    // {
    //   echo '<script>
    //     swal("Login successfully...!");
    //     .then((value) => {
    //    window.location="dashboard.php"
    //      });
    //     </script>';
    // }
    if($flag==1)
    {
            echo '<script>
         swal("Conform passward not matched")
            </script>';
    }
    else if($flag==2)
    {
         echo '<script>
         swal("Not registered ")
            </script>';
    }

    ?>

    

<?php  include('components/navbar.php'); ?>

<div class="container mt-3">

    <h3 class="text-center text-danger">Sign In At Contact Book</h3>
    <form class="s-form" action="" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
    <label  class="form-label">Email address: <sup class="text-danger">*</sup></label>
    <input type="email" class="form-control" name="email" >
    </div>
    <?php

    if(isset($errlist['emailr']))
    {
        echo "
        <span class='text-danger'>".$errlist['emailr']."</span>
        ";
    }
?>

    <div class="mb-3">
    <label class="form-label">Passward<sup class="text-danger">*</sup></label>
    <input type="passward" class="form-control" name="pass" >
    </div>

    <?php

    if(isset($errlist['passr']))
    {
        echo "
        <span class='text-danger'>".$errlist['passr']."</span>
        ";
    }
    ?>

  <div class="form-check mb-3">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Remember My Passward
   </label>
 </div>

    <div class="mb-3">
    <button class="btn btn-success" type="submit" name="sign">Sign In</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
</div>
<a href="signup.php" class="refer-link text-decoration-none text-warning" >New User? Click Here to Create account </a>
</form>
</div>
            
<?php  include('components/footer.php'); ?>

<?php  include('components/script.php'); ?>
    
</body>

</html> 