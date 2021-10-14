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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include('components/head.php'); ?>
</head>
<body>

<?php  include('components/navbar.php'); ?>

 <div class='container'>
    <div class="shadow-lg p-1 mb-3 mt-3 bg-body rounded"><h2 class="text-center text-danger mt-3">Welcome To Our Contact Book!!!</h2></div>
 
     <div class="d-flex justify-content-around">
     <a class="btn btn-primary" href="dashboard.php">Dashboard</a>
     <a class="btn btn-primary" href="addcontact.php">Add Contact</a>
     
  
  </div>

<!-- contact list star -->
<div class="row">

<?php

   $sql="SELECT * FROM contacts" ;

   $result=$conn->query($sql);

   if($result->num_rows>0)
   {

    while($row=$result->fetch_assoc())
    {

      $marray=explode(",",$row['usermobile']);
      $earray=explode(",",$row['useremail']);

   echo '

  <div class="col-md-3 ">
  <div class="card text-white bg-primary mb-3 mt-5" style="max-width: 18rem;">
 <img src="'.$row['userprofile'].'" class="card-img-top  useprofile" alt="...">
  <div class="card-body d-flex flex-column align-items-center">
    <h5 class="card-title ">'.$row['username'].'</h5>
    <p class="card-text">'.$marray[0].'</p>

    <!-- Button trigger modal -->

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Show more
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h2><b>Name : </b>'.$row['username'].'</h2>
        
        ';
        $mcount=0;
        foreach($marray as $onemobile)
        {
           echo "<p><b>Mobile ".$mcount." : </b>
           <a  class='text-decoration-none' herf='mailto:".$onemobile."'>".$onemobile."</a>
           </p>";
           $mcount++;
        }
        $ecount=0;
        foreach($earray as $oneitem)
        {
           echo "<p><b>Email ".$ecount." : </b>
           <a  class='text-decoration-none' herf='mailto:".$oneitem."'>".$oneitem."</a>
           </p>";
           $ecount++;
        }
         echo '
        <address><b>Address :</b>'.$row['useraddress'].'</address>
        ';
        if($row['updated']!==null)
        { 
            $date1=date_create($row['updated']);
            echo " <i>contact updated on <b> ".date_format($date1,'d-M-Y h:i A')."</b></i>";
        }
        $date=date_create($row['created']);
        echo "<i> contact created on <b> ".date_format($date,'D-M-Y h:i A')."</b></i>";

      echo '</div>
      <div class="modal-footer">
        <a onclick="return confirm("Do you want to delete this contact?")" href="deletecontact.php?q='.$row['userID'].'&f='.$row['userprofile'].'" class="text-decoration-none btn btn-danger">Delete</a>
        <a href="editcontact.php" class="text-decoration-none btn btn-success">Edit</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>';
   }
  }
   else
   {
       echo '<h3 class="text-center text-danger">No contact found</h3>';
   }

?>
</div>


  
<!-- contact list end  -->
  </div>
<?php  include('components/footer.php'); ?>
<?php  include('components/script.php'); ?>
    
</body>
</html>