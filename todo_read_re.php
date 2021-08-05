 <?php
    var_dump($_POST);
    exit();
    //データベースへ接続
    session_start();
    include("functions.php");
    check_session_id();
    $user_id = $_SESSION['id'];
    $pdo = connect_to_db();
    $hope = $_POST['hope'];
    $sql = "SELECT * FROM input_table WHERE hope LIKE '$hope'";

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
            $output .= "<td>{$record["pass"]}</td>";
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
     <form action="todo_read_re.php" method="POST">
         <select name="hope">

             <option value="ライフスタイル" <?php if (!empty($_POST['hope'])) {
                                            if ('ライフスタイル' === $_POST['hope']) {
                                                echo 'selected';
                                            }
                                        } ?>>ライフスタイル</option>
             <option value="アウトドア" <?php if (!empty($_POST['hope'])) {
                                        if ('アウトドア' === $_POST['hope']) {
                                            echo 'selected';
                                        }
                                    } ?>>アウトドア</option>
             <option value="キャリア" <?php if (!empty($_POST['hope'])) {
                                        if ('キャリア' === $_POST['hope']) {
                                            echo 'selected';
                                        }
                                    } ?>>キャリア</option>
             <option value="フィットネス・スポーツ" <?php if (!empty($_POST['hope'])) {
                                                if ('フィットネス・スポーツ' === $_POST['hope']) {
                                                    echo 'selected';
                                                }
                                            } ?>>フィットネス・スポーツ</option>
             <option value="食べ物" <?php if (!empty($_POST['hope'])) {
                                        if ('食べ物' === $_POST['hope']) {
                                            echo 'selected';
                                        }
                                    } ?>>食べ物</option>

         </select>


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