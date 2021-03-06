<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nErr = "";
$n = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["n"])) {
    $nErr = "n is required";
  } else {
    $n = test_input($_POST["n"]);
    // check if name only number
    if (!is_numeric($n)) {
      $nErr = "Only numbers allowed";
    }
  }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>PHP Sum, Factorial</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  N: <input type="text" name="n" value="<?php echo $n;?>">
  <span class="error">* <?php echo $nErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
$sum = 0;
$prod = 1;

echo "<h2>Your Input:</h2>";
  for($i=1;$i<=$n;$i++) {
    $sum += $i;
    $prod *= $i;
  }
  echo "1부터 ",$n,"까지의 합과 곱<br>";
  echo "합 : ", $sum,"<br>";
  echo "곱 : ", $prod;
?>

</body>
</html>