<!DOCTYPE html>
<html>
 <head>   
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
   <title>Delete Contact  |   Contact App</title>
</head>
<body>


<?php
  include('config.php');

  if(isset($_COOKIE['email']))
    {
        if(isset($_SESSION['user']))
        {
            echo "
                <script>
                window.location='signin.php';
                </script>
            ";

        }

    }
   $id=$_GET['q']; 
   
   $file=$_GET['f'];

   if(isset($_GET['q'])&&isset($_GET['f']))
   {
      $sql="DELETE FROM contacts WHERE userID=$id";

      if($conn->query($sql)===TRUE)
      {

        // deleted files from your folder.......
            unlink($file);
            echo '<script> swal({
                  title:"Successfully",
                  text:"Contact Delete Successfully",
                  icon:"success"
            })
            .then((value) => {
                   window.location="dashboard.php"

                     });</script>';
                        
            
      }
      else
      {
            echo '<script> swal({
                  title:"Error",
                  text:"'.$conn->error.'",
                  icon:"error"
            })
            .then((value) => {
                   window.location="dashboard.php"
                   
                     });</script>';
      }
   }
   else
   {
      
   }



?>
</body>
</html>