 <nav class="navbar navbar-expand-lg navbar-light bg-back">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="images/logoc.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
        ContactBook@
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="contactus.php">Features</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Resourses
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="blog.php">Blog</a></li>
            <li><a class="dropdown-item" href="faqs.php">FAQs</a></li>
            
          </ul>
        </li>
       </ul>
       
    
       <div class="btn-group">
  <button type="button" class="btn btn-primary">Login/SignUP</button>
  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button> 
  <ul class="dropdown-menu">
    
     <?php  
    echo !isset($_COOKIE['email']) && !isset($_SESSION['user']) ?
  
     '<li><a class="dropdown-item" href="signin.php">Sign-IN</a></li>
     <li><a class="dropdown-item" href="signup.php">Sign-UP</a></li>'
     : '<li><a class="dropdown-item" href="dashboard.php">Sign-UP</a></li>
     <li><a class="dropdown-item" href="logout.php">Log-Out</a></li>';
      
    ?>

  </ul>
</div>
    </div>
  </div>
</nav>
