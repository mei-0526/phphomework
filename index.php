<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP フォーム作成</title>
</head>
<body>
  <form action="confirm.php" method="post">
    <h1>お問い合わせフォーム</h1>
    <p>
      <!--氏名(必須・50文字以内)-->
      <label for="yourname">氏名</label>  
      <input id="yourname" type="text" maxlength="50" name="yourname" required>
    </p>
    <p>
      <!--性別(選択式・必須)-->
      性別
      <label for="male">男性</label><input id="male" type="radio" name="gender" value="男" required>
      <label for="female">女性</label><input id="female" type="radio" name="gender" value="女" required>
    </p>
    <p>
      <!--生年月日(必須)-->
      <label for="Birthday">生年月日</label>
      <input id="Birthday" type="date" name="Birthday" required>
    </p>
    <p>
      <!--郵便番号(必須)-->
      <label for="Postalcode">郵便番号</label>
      <input id="Postalcode" type="text" pattern="\d{3}-?\d{4}" name="Postalcode" required>
    </p>
    <p>
      <!--住所(必須・200文字以内)-->
      <label for="address">住所</label>  
      <input id="address" type="text" maxlength="200" name="address" required>
    </p>
    <p>
      <!--電話番号(任意)-->
      <label for="telephonenumber">電話番号</label>  
      <input id="telephonenumber" type="text" pattern="\d{2,4}-?\d{2,4}-?\d{3,4}" name="telephonenumber">
    </p>
    <p>
      <!--メールアドレス(任意・200文字以内)-->
      <label for="mail">メール</label>
      <input id="mail" type="email" name="mail">
    </p>
    <p>
      <!--問い合わせの種類(選択式・必須)-->
      <label for="Inquiry">問い合わせの種類</label>
      <select name="Inquiry" id="Inquiry" required>
        <option value="商品について">商品について</option>
        <option value="店舗について">店舗について</option>
        <option value="その他">その他</option>
      </select>
    </p>
    <p>
      <!--相談内容(必須・1000文字以内)-->
      <label for="Consultationcontent">相談内容</label>  
      <input id="Consultationcontent" type="text" maxlength="1000" name="Consultationcontent" required>
    </p>
    <p>
      <!--送信ボタン-->
      <input type="submit" value="送信する">
    </p>
  </form>
  <script src="jquery-3.6.3.min.js"></script>
    <script>
        $('form').submit(function() {
            alert('送信しました！');
        });
    </script>
</body>
</html>