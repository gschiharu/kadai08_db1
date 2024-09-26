<?php 
// 1. POSTデータ取得
$name = $_POST["name"];
$email = $_POST["email"];
$skill = $_POST["skill"];
$experience = $_POST["experience"];
$appeal = $_POST["appeal"];

// 2. DB接続
try {
  // PDOを使ってデータベースに接続
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
  // 接続エラー時はメッセージを表示して終了
  exit('DB_CONNECT:' . $e->getMessage());
}

// 3. データ登録SQL作成
// INSERT文を作成
$sql = "INSERT INTO gs_profile_table(name, email, skill, experience, appeal, indate)
        VALUES(:name, :email, :skill, :experience, :appeal, sysdate())";
$stmt = $pdo->prepare($sql);

// 4. バインド変数に値をセット
$stmt->bindValue(':name', $name, PDO::PARAM_STR); // 文字列として:nameに$nameをバインド
$stmt->bindValue(':email', $email, PDO::PARAM_STR); // 文字列として:emailに$emailをバインド
$stmt->bindValue(':skill', $skill, PDO::PARAM_STR); // 文字列として:skillに$skillをバインド
$stmt->bindValue(':experience', $experience, PDO::PARAM_INT); // 数値として:experienceに$experienceをバインド
$stmt->bindValue(':appeal', $appeal, PDO::PARAM_STR); // 文字列として:appealに$appealをバインド

// 5. 実行
$status = $stmt->execute();

// 6. データ登録後の処理
if ($status === false) {
  // SQL実行時にエラーがある場合
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:" . $error[2]);
} else {
  // 登録成功時はindex.phpにリダイレクト
  header("Location: index.php");
  exit();
}
?>

