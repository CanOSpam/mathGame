<?php
  include("include/header.php");
  $_SESSION['loggedIn'] = false;
  $_SESSION['badLogin'] = false;
  include("include/footer.php");
  header("Location: index.php");
?>
