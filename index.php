<?php
include("include/header.php");
extract($_POST);

if(isset($loginEmail) && $loginEmail == "a@a.a" && $loginPass == "aaa") {
  $_SESSION['loggedIn'] = true;
  $_SESSION['badLogin'] = false;
  header("Location: mathGame.php");
}else{
  $_SESSION['badLogin'] = true;
}
?>

  <div class="container">
    <div class="jumbotron">
      <div class="row">
          <div class="col-xs-12 text-center"><h1>Math Game</h1></div>
      </div>
    </div>
    <div  class="row">
      <div class="col-xs-4">
        <?php if(isset($loginEmail) && $_SESSION['badLogin'] == true){echo '<p class="incorrect">Invalid login information</p>';} ?>
      </div>
    </div>
    <div  class="row">
    <form name="login" action="index.php" method="post">
      <div class="col-xs-4">
        <p>Email:</p>
      </div>

      <div class="col-xs-4">
        <input type="text" name="loginEmail" size="30" placeholder="Enter your email"/>
      </div>
    </div>
    <div  class="row">
      <div class="col-xs-4">
          <p>Password:</p>
      </div>
      <div class="col-xs-4">
        <input type="password" name="loginPass" size="30" placeholder="Enter password"/>
      </div>

    </div>
    <div  class="row">
      <div class="col-xs-6">
        <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
      </div>
    </div>
    </form>
  </div>

<?php
include("include/footer.php");
?>
