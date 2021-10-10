<?php
       include('config.php');

      $flag=0;

      if(isset($_POST['submit']))
      {  
           $name=$_POST['fullname'];
           $email=$_POST['email'];
           $mobile=$_POST['mobile'];
           $pass=$_POST['pass'];
           $conf_pass=$_POST['conf_pass'];

            if($pass==$conf_pass)
           {

               $errlist=array();

               $errlist=signupValidation();

               $encPass=md5($pass);

               if(!count($errlist))
               {
                $sql="SELECT * FROM auth WHERE email='$email'";

                $rel=$conn->query($sql);
            
                if($rel->num_rows < 1)
                {
                    $myquery="INSERT INTO auth(photo,fullname,email,mobile,pass,created)
                    VALUES('$path','$name','$email','$mobile','$encPass',now())";

               if($conn->query($myquery))
               {
                move_uploaded_file($_FILES['profile_photo']['tmp_name'],$path);

                 $flag=1;
               }
               else
               {
                    $flag=2;
               }
            }
            else
            {
                $flag=4;
            }
        }
    }
           else
           {
                $flag=3;

           }
        }
    

    
   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include('components/head.php'); ?>
</head>
<body>

<?php

    if($flag==1)
    {
       echo '<script>
       swal("Account Created Successfully...")
       .then((value) => {
         window.location="signin.php"
       });
         </script>';
    }
    else if($flag==2)
    {
            echo '<script>
         swal(" Something Went Wrong !...")
            </script>';
    }
    else if($flag==3)
    {
         echo '<script>
         swal("Passward are not matched ")
            </script>';
    }
    else if($flag==4)
    {
         echo '<script>
         swal(" Already Registered With us...! Try new email ")
            </script>';
    }
    ?>

<?php  include('components/navbar.php'); ?>

<div class="container mt-3">
    <form class="s-form" action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
    <img src="https://img.icons8.com/ios-glyphs/30/4a90e2/user-male-circle.png" width="40px" height="40px"/>
    <label  class="form-label">Select profile photo :<sup class="text-info">*</sup> </lable>
    <input type="file" class="form-control" name="profile_photo">
    </div>

    <?php

    if(isset($errlist['filer']))
    {
        echo "
        <span class='text-danger'>".$errlist['filer']."</span>
        ";
    }


    ?>

    <div class="mb-3">
    <label  class="form-label">Full Name<sup class="text-info">*</sup></label>
    <input type="text" class="form-control"  name="fullname" >
    </div>

    <?php

    if(isset($errlist['namer']))
    {
        echo "
        <span class='text-danger'>".$errlist['namer']."</span>
        ";
    }


    ?>
    

    <div class="mb-3">
    <label  class="form-label">Email address<sup class="text-info">*</sup></label>
    <input type="email" class="form-control" name="email">
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
    <label  class="form-label">Mobile Number<sup class="text-info">*</sup></label>
    <input type="tel" class="form-control" name="mobile">
    </div>

    <?php

    if(isset($errlist['mobiler']))
    {
        echo "
        <span class='text-danger'>".$errlist['mobiler']."</span>
        ";
    }


    ?>
    
     
    <div class="mb-3">
    <label class="form-label">Passward <sup class="text-info">*</sup></label>
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
    

    <div class="mb-3">
    <label  class="form-label">Conform Passward <sup class="text-info">*</sup></label>
    <input type="passward" class="form-control" name="conf_pass" >
    </div>

    <?php

    if(isset($errlist['conf_passr']))
    {
        echo "
        <span class='text-danger'>".$errlist['conf_passr']."</span>
        ";
    }


    ?>
    

    <div class="mb-3">
       <button class="btn btn-success" type="submit" name="submit">Create Accound</button>
       <button  class="btn btn-warning" type="reset">Reset</button>
    </div>
    <a href="signin.php" class="refer-link text-decoration-none text-warning" >Already have an Account? Click Here </a>
   </form>

</div>


<?php  include('components/footer.php'); ?>

<?php  include('components/script.php'); ?>

</body>
</html> 
