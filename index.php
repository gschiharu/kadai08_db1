<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>メンバー登録</title>
  <link rel="stylesheet" href="css/style.css"> <!-- スタイルシートをリンク -->
</head>
<body>
  <!-- ヘッダー部分 -->
  <header>
    <nav>
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="select.php">メンバー一覧</a>
        </div>
      </div>
    </nav>
  </header>

  <!-- メイン部分 -->
  <main>
    <section class="registration-form">
      <h1>メンバー登録フォーム</h1>
      <form method="POST" action="insert.php">
        <div class="form-group">
          <label for="name">名前：</label>
          <input type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email：</label>
          <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
          <label for="skill">専門分野：</label>
          <select name="skill" id="skill">
            <option value="プロジェクトマネージメント">プロジェクトマネージメント</option>
            <option value="通訳">通訳</option>
            <option value="翻訳">翻訳</option>
          </select>
        </div>
        <div class="form-group">
          <label for="experience">経験年数：</label>
          <input type="number" name="experience" id="experience" min="0" required>
        </div>
        <div class="form-group">
          <label for="appeal">スキルアピール文章をご記入下さい。：</label>
          <textarea name="appeal" id="appeal" rows="4" cols="50" required></textarea>
        </div>
        <button type="submit">登録</button>
      </form>
    </section>
  </main>

  <!-- フッター部分 -->
  <footer>
    <p>© 2024 COOPRO. All rights reserved.</p>
  </footer>
</body>
</html>
