<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" type="text/css" href=".css/index.css" />
<link rel="stylesheet" type="text/css" href=".css/main.css" />
<?php
  if (!isset($access_control)){
    include 'scripts/access_control.php';
  }
?>

<head>
  <title>GameLibrary.com</title>
</head>
<body class = "main">
  <?php 
    include 'navbar.php';
    if (session_control()){
      echo 'Hy '. $_SESSION["fistname"] .' !';
    }
  ?>
  <p class="title"> Welcome to GameLibrary.com Your Ultimate Game Collection Hub!</p>
  <p class="gentext"> At GameLibrary.com, we're dedicated to celebrating your passion for video games. We understand that your game collection is more than just a stack of discs or a digital library; it's a reflection of your gaming journey, memories, and achievements.</p>
  <div>
    <p class="paratitle"> Discover, Organize, and Share: </p>
    <ul>
      <li class="gentext">Explore your extensive game library with ease.</li>
      <li class="gentext">Organize your games the way you want, from classic titles to the latest releases.</li>
      <li class="gentext">Connect with fellow gamers who share your interests.</li>
    </ul>
  </div>
  <div>
    <p class="paratitle"> Why Choose Us: </p>
    <ul>
      <li class="gentext">Personalized collections that tell your unique gaming story.</li>
      <li class="gentext">Tools to make managing your game library a breeze.</li>
      <li class="gentext">Join a community of like-minded gamers who appreciate the art of gaming.</li>
    </ul>
  </div>
  <div style="margin-bottom:100px;">
    <p class="paratitle">Start Your Journey:</p>
    <p class="gentext"> <span> <a class="link" href="registration.php"> Sign up</a> </span> today and unlock the potential of your gaming collection. Whether you're a casual player, a completionist, or a die-hard fan, Gamelibrary.com is here to make your gaming experience even more exciting.</p>
  </div>

<?php 
  include 'footer.php';
?>
</body>
</html>