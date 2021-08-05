 <?php
  // var_dump($_POST);
  // exit();
  //データベースへ接続
  session_start();
  include("functions.php");
  check_session_id();
  $user_id = $_SESSION['id'];
  $pdo = connect_to_db();
  $company = $_POST['company'];
  $sql = "SELECT * FROM input_table WHERE company LIKE '$company'";

  $stmt = $pdo->prepare($sql);
  $status = $stmt->execute();
  if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
  } else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($result as $record) {
      $output .= "<tr>";
      $output .= "<td>{$record["name"]}</td>";
      $output .= "<td>{$record["age"]}</td>";
      $output .= "<td>{$record["gender"]}</td>";
      $output .= "<td>{$record["company"]}</td>";
      $output .= "<td>{$record["hope"]}</td>";
      $output .= "</tr>";
    }
    unset($value);
  }
  ?>
 <!DOCTYPE html>
 <html lang="ja">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>DB連携型todoリスト（一覧画面）</title>
 </head>

 <body>
   <form action="todo_read.php" method="POST">
     <select name="age">

       <option value="" <?php if (!empty($_POST['age'])) {
                          if ('' === $_POST['canpany']) {
                            echo 'selected';
                          }
                        } ?>>選択してください</option>

       <option value="" <?php if (!empty($_POST['gender'])) {
                          if ('' === $_POST['gender']) {
                            echo 'selected';
                          }
                        } ?>>40代</option>
       <option value="女" <?php if (!empty($_POST['gender'])) {
                            if ('女' === $_POST['gender']) {
                              echo 'selected';
                            }
                          } ?>>女</option>
     </select>

     <form action="todo_read.php" method="POST">
       <select name="gender">

         <option value="" <?php if (!empty($_POST['company'])) {
                            if ('' === $_POST['canpany']) {
                              echo 'selected';
                            }
                          } ?>>選択してください</option>

         <option value="男" <?php if (!empty($_POST['gender'])) {
                              if ('男' === $_POST['gender']) {
                                echo 'selected';
                              }
                            } ?>>男</option>
         <option value="女" <?php if (!empty($_POST['gender'])) {
                              if ('女' === $_POST['gender']) {
                                echo 'selected';
                              }
                            } ?>>女</option>
       </select>

       <form action="todo_read.php" method="POST">
         <select name="company">
           <option value="" <?php if (!empty($_POST['company'])) {
                              if ('' === $_POST['canpany']) {
                                echo 'selected';
                              }
                            } ?>>選択してください</option>

           <option value="SGES" <?php if (!empty($_POST['company'])) {
                                  if ('SGES' === $_POST['canpany']) {
                                    echo 'selected';
                                  }
                                } ?>>SGES</option>
           <option value="SGE" <?php if (!empty($_POST['company'])) {
                                  if ('SGE' === $_POST['company']) {
                                    echo 'selected';
                                  }
                                } ?>>SGE</option>
           <option value="SG" <?php if (!empty($_POST['company'])) {
                                if ('SG' === $_POST['company']) {
                                  echo 'selected';
                                }
                              } ?>>SG</option>

         </select>
         <div>
           <button>submit</button>
         </div>
       </form>
       <fieldset>
         <legend>DB連携型todoリスト（一覧画面）</legend>
         <a href="todo_input.php">入力画面</a>
         <a href="todo_logout.php">logout</a>
         <table>
           <thead>
             <tr>
               <th>name</th>
               <th>age</th>
               <th>gender</th>
               <th>company</th>
               <th>hope</th>
               <th></th>
               <th></th>
             </tr>
           </thead>
           <tbody>
             <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
             <?= $output ?>
           </tbody>
         </table>
       </fieldset>
 </body>

 </html>