<?php
session_start();
include("functions.php");
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（入力画面）</title>
</head>

<body>

  <form method="post" action="todo_create.php" enctype="multipart/form-data">
    <fieldset>
      <legend>DB連携型todoリスト（入力画面）</legend>
      <a href="todo_read.php">一覧画面</a>
      <a href="todo_logout.php">logout</a>
      <div>
        name: <input type="text" name="name">
      </div>
      <div>
        pass: <input type="text" name="pass">
      </div>
      <div>
        age: <input type="text" name="age">
      </div>
      <div>
        gender: <input type="text" name="gender">
      </div>
      <div>
        company: <input type="text" name="company">
      </div>
      <div>

        <li>
          hope:
          <input type="radio" id="s-option" name="hope_outdoor">
          <label for="s-option">アウトドア</label>
          <input type="radio" id="s-option" name="hope_lifestyle">
          <label for="s-option">ライフスタイル</label>
          <input type="radio" id="s-option" name="hope_career">
          <label for="s-option">キャリア</label>
          <input type="radio" id="s-option" name="hope_fitness">
          <label for="s-option">フィットネス</label>
          <input type="radio" id="s-option" name="hope_food">
          <label for="s-option">フード</label>

        </li>
        <!-- <option value="">選択してくだい</option>
          <option value="ライフスタイル">ライフスタイル</option>
          <option value="アウトドア">アウトドア</option>
          <option value="キャリア">キャリア</option>
          <option value="フィットネス・スポーツ">フィットネス・スポーツ</option>
          <option value="食べ物">食べ物</option> -->

        <!-- </select> -->
      </div>
      <div>
        <!-- <input type="file" name="upfile" accept="image/*" capture="camera"> -->
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>