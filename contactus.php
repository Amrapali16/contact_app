<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include('components/head.php'); ?>
</head>
<body>

<?php  include('components/navbar.php'); ?>

<div class="shadow-lg p-5 mb-5 bg-secondary rounded text-center text-danger"><h3>Feature</h3></div>

<div class="container">

<h2 class="card-title">@contactBook</h2>
    <p class="card-text text-white">Contact Book helps to organize your business contacts and keep it shared,
        so relevant people always have acess to them. If contacts are modified,it will be reflected to all shared users.
        Contact Book makes contact sharing extremely simple and hassle-free.</p>
    <h1 class="card-text text-center">*****</h1>

    <p>
  <button class="btn btn-outline-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
  Contact Group
  
  </button>
</p>
<div style="min-height: 170px;">
  <div class="collapse collapse-horizontal" id="collapseWidthExample">
    <div class="card card-body" style="width: 800px;">
    <h2 class="cardm text-danger">Manage and Share Contacts</h2>
    Easily create and manage contacts in user-friendly interface of ContactBook. Organize contacts in relevant Groups so that you can share them with your coworkers. Shared contacts will be available to your team members instantly.
    Shared Contacts for Gmail® brings contact information to you — wherever you are. Never search for your contacts' details again: Your team can now access a centralized contact base from anywhere. When you enter a new customer to your contact list, your team members will have it in their address book instantly.

  </div>
  </div>
</div>

<p class="collp  mt-5">
  <a class="btn btn-success" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Share Workspace</a>
  <button class="btn btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Existing Contacts</button>
</p>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
        <h2>Create and Share Workspace</h2>
        You can create multiple Spaces in ContactBook to manage multiple company contacts. Of course, you can access all the contacts together when needed. You can give Space access to relevant people so they can collaborate on contacts within the space.
        <img src="images/f1.png" class="rounded float-start" alt="...">
      </div>
    </div>
  </div>
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
        <h2>Import Existing Contacts</h2>
        This is particularly helpful when you have existing contacts. To get your existing contacts on ContactBook, connect your Google/Microsoft Account or you can export from there and import the CSV or VCF file back to ContactBook.You can add all your contacts to a Google Account. 
        <img src="images/f4.png" class="rounded float-start" alt="...">
      </div>
    </div>
  </div>
</div>
</div>


<?php  include('components/footer.php'); ?>
<?php  include('components/script.php'); ?>
    
</body>
</html>