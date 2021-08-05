<?php
// var_dump($_FILES);
// exit();
session_start();
include("functions.php");
check_session_id();
$pdo = connect_to_db();
if (
  !isset($_POST['todo']) || $_POST['todo'] == '' ||
  !isset($_POST['deadline']) || $_POST['deadline'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}
$todo = $_POST['todo'];
$deadline = $_POST['deadline'];
// ここからファイルアップロード&DB登録の処理を追加しよう！！！
if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
  $uploaded_file_name = $_FILES['upfile']['name'];
  $temp_path = $_FILES['upfile']['tmp_name'];
  $directory_path = 'upload/';
  $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
  $unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
  $filename_to_save = $directory_path . $unique_name;
  // var_dump($uploaded_file_name);
  // exit();
  if (is_uploaded_file($temp_path)) {
    if (move_uploaded_file($temp_path, $filename_to_save)) {
      chmod($filename_to_save, 0644);
      $sql = 'INSERT INTO
todo_table(id, todo, deadline, image, created_at, updated_at)
VALUES(NULL, :todo, :deadline, :image, sysdate(),sysdate())';
    } else {
      exit('Error:アップロードできませんでした');
    }
  } else {
    exit('Error:画像がありません');
  }
} else {
  // exit('Error: 画像が送信されていません');
  $sql = 'INSERT INTO
todo_table(id, todo, deadline, image, created_at, updated_at)
VALUES(NULL, :todo, :deadline, NULL, sysdate(),sysdate())';
  // $stmt = $pdo->prepare($sql);
  // $stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
  // $stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
  // $status = $stmt->execute();
  // if ($status == false) {
  // $error = $stmt->errorInfo();
  // echo json_encode(["error_msg" => "{$error[2]}"]);
  // exit();
  // } else {
  // header("Location:todo_read.php");
  // exit();
  // }
}
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
if ($filename_to_save) {
  $stmt->bindValue(':image', $filename_to_save, PDO::PARAM_STR);
}
$status = $stmt->execute();
if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:todo_read.php");
  exit();
}
