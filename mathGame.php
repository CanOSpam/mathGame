<?php
include("include/header.php");



if($_SESSION['loggedIn'] != true) {
  header("Location: index.php");
}

extract($_POST);
if(!isset($Answer)){
  $_SESSION['rightAnswers'] = 0;
  $_SESSION['counter'] = 0;
}
if(isset($Answer) && $_SESSION['sol'] == $Answer) {
  $getAnswer = "True";
} else if(isset($Answer)){
  $getAnswer = "False";
}else{
  $getAnswer = "null";
}

if(isset($Answer) && $Answer == "reset"){
  $_SESSION['rightAnswers'] = 0;
  $_SESSION['counter'] = 0;
}

$add1 = rand(0,20);
$add2 = rand(0,20);
$plusOrMinus = rand(0,1);
if($plusOrMinus == 0){
  $mathChar = "-";
  $_SESSION['sol'] = $add1 - $add2;
} else {
  $mathChar = "+";
  $_SESSION['sol'] = $add1 + $add2;
}
?>


<div class="container">
  <div class="jumbotron">
    <div class="row">
      <div class="col-xs-12 text-center"><h1>Math Game</h1></div>
    </div>
  </div>



  <div  class="row">
    <div class="col-xs-4 text-center">
      <?php echo $add1; ?>
    </div>
    <div class="col-xs-4 text-center">
      <?php echo $mathChar; ?>
    </div>
    <div class="col-xs-4 text-center">
      <?php echo $add2; ?>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 text-center">
      <form name="mathGame" action="mathGame.php" method="post">
        <input type="text" name="Answer" size="30" placeholder="Enter the answer"/>
        <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 text-center">
      <p>Amount of right guesses of total guesses: <?php echo $_SESSION['rightAnswers']." of ".$_SESSION['counter']; ?>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 text-center">
      <?php
        if($getAnswer == "True" && $getAnswer != "null") {
          echo '<p class="correct">Correct!</p>';
          $_SESSION['rightAnswers']++;
        }else if ($getAnswer == "False" && $getAnswer != "null"){
          echo '<p class="incorrect">Incorrect</p>';
        }
        ?>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 text-center">
      <form name="logOut" action="logOut.php" method="post">
        <input class="btn btn-primary" type="submit" name="logOut" value="Log Out" />
      </form>
    </div>
  </div>
</div>
<?php
$_SESSION['counter']++;
include("include/footer.php");
?>
