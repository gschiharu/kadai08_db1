<?php
// 1. DB接続
try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DB_CONNECT:' . $e->getMessage());
}

// 2. データ取得SQL作成
$sql = "SELECT * FROM gs_profile_table ORDER BY indate DESC";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// 3. データ表示部分
$view = "";
if ($status === false) {
    // SQL実行時にエラーがある場合
    $error = $stmt->errorInfo();
    exit("SQL_ERROR:" . $error[2]);
} else {
    // 取得したデータを表示
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<div class="profile-card">';
        $view .= '<h2>' . htmlspecialchars($result['name']) . '</h2>';
        $view .= '<p><strong>Email:</strong> ' . htmlspecialchars($result['email']) . '</p>';
        $view .= '<p><strong>専門分野:</strong> ' . htmlspecialchars($result['skill']) . '</p>';
        $view .= '<p><strong>経験年数:</strong> ' . htmlspecialchars($result['experience']) . '年</p>';
        $view .= '<p><strong>スキル:</strong><br>' . htmlspecialchars($result['appeal']) . '</p>';
        $view .= '<p><em>登録日: ' . htmlspecialchars($result['indate']) . '</em></p>';
        $view .= '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>メンバー一覧</title>
    <link rel="stylesheet" href="css/style.css"> <!-- スタイルシートのリンク -->
</head>
<body>
    <!-- ヘッダー部分 -->
    <header>
        <nav>
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">メンバー登録</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- メイン部分 -->
    <main>
        <section class="member-list">
            <h1>メンバー一覧</h1>
            <div class="profiles">
                <?= $view ?> <!-- メンバーのリストを表示 -->
            </div>
        </section>
    </main>

    <!-- フッター部分 -->
    <footer>
        <p>© 2024 COOPRO. All rights reserved.</p>
    </footer>
</body>
</html>
