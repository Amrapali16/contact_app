<?php

function signupValidation()
{
  $error=array();
//   profile validation code start ................>here

  global $path,$dir;
 
  $dir='upload/profile/';

$path=$dir.$_FILES['profile_photo']['name'];

$ext= pathinfo($_FILES['profile_photo']['name'], PATHINFO_EXTENSION);

if($_FILES['profile_photo']['size']==null)
{
      $error['filer']="profile photo is necessary";
}
else if($ext=='png'||$ext=='jpg'||$ext=='jpeg'||$ext=='svg')
{
if(!file_exists($path))
{
if($_FILES['profile_photo']['size']<!2000000)
{
    $error['filer'] ="limit of file exit.size allowed is 2MB";
}
}
else
{
      $error['filer'] ="This type of file is already available";
}
}
else
{
     
     $error['filer']="This".$ext."file type not allowed";
}

// Code end for profile

// validation code for Name

if(!$_POST['fullname'])
{
      $error['namer']="Name could not be empty";
}
else if(!preg_match("#^[A-Za-z  ]*$#",$_POST['fullname']))
{
      $error['namer']="Name could not be valid";
}
else if(strlen($_POST['fullname'])<=2)
{
      $error['namer']="Name could not be less than 2 character";
}
else if(strlen($_POST['fullname'])>50)
{
      $error['namer']="Name could not be more than 50 character";
}
// end name validation

// email validation code start
if(!$_POST['email'])
{
      $error['emailr']="Email could not be empty";
}
else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
      $error['emailr']="Enter email not volid structure";
}
else if(strlen($_POST['email'])<=10)
{
      $error['emailr']="EMAIL could not be less than 10 character";
}
else if(strlen($_POST['email'])>100)
{
      $error['emailr']="EMAIL could not be more than 100 character";
}
// email validation code end

// mobile validation code start
if(!$_POST['mobile'])
{
      $error['mobiler']="mobile number could not be empty"; 
}
else if(!preg_match("#^[6-9]{1}[0-9]*$#",$_POST['mobile']))
{
      $error['mobiler']="could not be valid Mobile Number";
}
else if(!strlen($_POST['mobile'])==10)
{
      $error['mobiler']="mobile number should  be 10 digit";
}


// mobile validation code END

// PASSWARD validation code start

if(!$_POST['pass'])
{
      $error['passr']="Passward could not be empty"; 
}
else if(!preg_match("#[0-9]+#",$_POST['pass']))
{
      $error['passr']="could not be valid passward";
}
else if(!preg_match("#[A-Z]+#",$_POST['pass']))
{
      $error['passr']="Your Password Must Contain At Least 1 Capital Letter!";
}
else if(!preg_match("#[a-z]+#",$_POST['pass']))
{
      $error['passr']="Your Password MustContain At Least 1 LowercaseL etter!";
}
else if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$_POST['pass']))
{
      $error['passr']="Your Password Must Contain At Least 1 Special Character!"."<br>";
}
else if(strlen($_POST['pass'])<=6)
{
      $error['passr']="Password could not be less than 6 Character!";
}
else if(strlen($_POST['pass'])>=20)
{
      $error['passr']=" Password could not be more than  20 Character!";
}
// conform passward

if(!$_POST['conf_pass'])
{
      $error['conf_passr']="Password could not be empty";
}

 return $error;

} 


// end conform passward

// signin validation email

function signinValid()
{
      $error=array();

if(!$_POST['email'])
{
      $error['emailr']="Email could not be empty";
}
else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
      $error['emailr']="Enter email not volid structure";
}
else if(strlen($_POST['email'])<=10)
{
      $error['emailr']="EMAIL could not be less than 10 character";
}
else if(strlen($_POST['email'])>100)
{
      $error['emailr']="EMAIL could not be more than 100 character";
}
// email validation code end

// PASSWARD validation code start

if(!$_POST['pass'])
{
      $error['passr']="Passward could not be empty"; 
}
else if(!preg_match("#[0-9]+#",$_POST['pass']))
{
      $error['passr']="could not be valid passward";
}
else if(!preg_match("#[A-Z]+#",$_POST['pass']))
{
      $error['passr']="Your Password Must Contain At Least 1 Capital Letter!";
}
else if(!preg_match("#[a-z]+#",$_POST['pass']))
{
      $error['passr']="Your Password MustContain At Least 1 LowercaseL etter!";
}
else if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$_POST['pass']))
{
      $error['passr']="Your Password Must Contain At Least 1 Special Character!"."<br>";
}
else if(strlen($_POST['pass'])<=6)
{
      $error['passr']="Password could not be less than 6 Character!";
}
else if(strlen($_POST['pass'])>=20)
{
      $error['passr']=" Password could not be more than  20 Character!";
}

return  $error;
}

// validation code for addcontact.php
function addvalid()
{
      $error=array();

      global $path,$dir;
 
  $dir='upload/profile/';

$path=$dir.$_FILES['profile_photo']['name'];

$ext= pathinfo($_FILES['profile_photo']['name'], PATHINFO_EXTENSION);

if($_FILES['profile_photo']['size']==null)
{
      $error['filer']="profile photo is necessary";
}
else if($ext=='png'||$ext=='jpg'||$ext=='jpeg'||$ext=='svg')
{
if(!file_exists($path))
{
if($_FILES['profile_photo']['size']<!2000000)
{
    $error['filer'] ="limit of file exit.size allowed is 2MB";
}
}
else
{
      $error['filer'] ="This type of file is already available";
}
}
else
{
     
     $error['filer']="This".$ext."file type not allowed";
}

// Code end for profile

// validation code for Name

if(!$_POST['fullname'])
{
      $error['namer']="Name could not be empty";
}
else if(!preg_match("#^[A-Za-z  ]*$#",$_POST['fullname']))
{
      $error['namer']="Name could not be valid";
}
else if(strlen($_POST['fullname'])<=2)
{
      $error['namer']="Name could not be less than 2 character";
}
else if(strlen($_POST['fullname'])>50)
{
      $error['namer']="Name could not be more than 50 character";
}
// end name validation

// email validation code start
if(!$_POST['email'])
{
      $error['emailr']="Email could not be empty";
}
else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
      $error['emailr']="Enter email not volid structure";
}
else if(strlen($_POST['email'])<=10)
{
      $error['emailr']="EMAIL could not be less than 10 character";
}
else if(strlen($_POST['email'])>100)
{
      $error['emailr']="EMAIL could not be more than 100 character";
}
// email validation code end

// mobile validation code start
if(!$_POST['mobile'])
{
      $error['mobiler']="mobile number could not be empty"; 
}
else if(!preg_match("#^[6-9]{1}[0-9]*$#",$_POST['mobile']))
{
      $error['mobiler']="could not be valid Mobile Number";
}
else if(!strlen($_POST['mobile'])==10)
{
      $error['mobiler']="mobile number should  be 10 digit";
}

// mobile validation code end





}




?>