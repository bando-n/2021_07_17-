<!-- <input type="radio" id="s-option" name="hope_outdoor">
<label for="s-option">アウトドア</label>
<input type="radio" id="s-option" name="hope_lifestyle">
<label for="s-option">ライフスタイル</label> -->
<?php
session_start();
include("functions.php");
check_session_id();
// $pdo = connect_to_db();
if (
  !isset($_POST['name']) || $_POST['name'] == '' ||
  !isset($_POST['pass']) || $_POST['pass'] == '' ||
  !isset($_POST['age']) || $_POST['age'] == '' ||
  !isset($_POST['gender']) || $_POST['gender'] == '' ||
  !isset($_POST['company']) || $_POST['company'] == '' ||
  !isset($_POST['hope_outdoor']) || $_POST['hope_outdoor'] == '' ||
  !isset($_POST['hope_lifestyle']) || $_POST['hope_lifestyle'] == '' ||
  !isset($_POST['hope_career']) || $_POST['hope_career'] == '' ||
  !isset($_POST['hope_fitness']) || $_POST['hope_fitness'] == '' ||
  !isset($_POST['hope_food']) || $_POST['hope_food'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}
// var_dump($_POST);
// exit();

$name = $_POST['name'];
$pass = $_POST['pass'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$company = $_POST['company'];
$hope_outdoor = $_POST['hope_outdoor'];
$hope_lifestye = $_POST['hope_lifestye'];
$hope_career = $_POST['hope_career'];
$hope_fitness = $_POST['hope_fitness'];
$hope_food = $_POST['hope_food'];



$sql = "INSERT INTO input_table(id, name, pass, age, gender, company, hope_outdor,hope_lifestyle,hope_career,hope_fitness,hope_food) 
VALUES (NULL,:name,:pass,:age,:gender,:company,:hope_outdoor,:hope_lifestyle,:hope_career,:hope_fitness,:hope_food)";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
$stmt->bindValue(':company', $company, PDO::PARAM_STR);
$stmt->bindValue(':hope_outdoor', $hope_outdoor, PDO::PARAM_STR);
$stmt->bindValue(':hope_lifestyle', $hope_lifestyle, PDO::PARAM_STR);
$stmt->bindValue(':hope_career', $hope_career, PDO::PARAM_STR);
$stmt->bindValue(':hope_fitness ', $hope_fitness, PDO::PARAM_STR);
$stmt->bindValue(':hope_food', $hope_food, PDO::PARAM_STR);

$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:todo_read.php");
  exit();
}
