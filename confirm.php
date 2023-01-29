<?php
try {
  //DB名、ユーザー名、パスワードを変数に格納
  $dsn = 'mysql:dbname=phphomework;host=localhost;charset=utf8';
  $user = 'root';
  $password = 'phphomework';

  $PDO = new PDO($dsn, $user, $password); //PDOでMySQLのデータベースに接続
  $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
 
  //input.phpの値を取得
  $yourname = $_POST['yourname'];
  $gender = $_POST['gender'];
  $Birthday = $_POST['Birthday'];
  $Postalcode = $_POST['Postalcode'];
  $address = $_POST['address'];
  $telephonenumber = $_POST['telephonenumber'];
  $mail = $_POST['mail'];
  $Inquiry = $_POST['Inquiry'];
  $Consultationcontent = $_POST['Consultationcontent'];
 
  $sql = "INSERT INTO phphomework (yourname, gender, Birthday, Postalcode, address, telephonenumber, mail, Inquiry, Consultationcontent) 
  VALUES (:yourname, :gender, :Birthday, :Postalcode, :address, :telephonenumber, :mail, :Inquiry, :Consultationcontent)"; // テーブルに登録するINSERT INTO文を変数に格納　VALUESはプレースフォルダーで空の値を入れとく
  $stmt = $PDO->prepare($sql); //値が空のままSQL文をセット
  $params = array(':yourname' => $yourname, 
                  ':gender' => $gender,
                  ':Birthday' => $Birthday,
                  ':Postalcode' => $Postalcode,
                  ':address' => $address,
                  ':telephonenumber' => $telephonenumber,
                  ':mail' => $mail,
                  ':Inquiry' => $Inquiry,
                  ':Consultationcontent' => $Consultationcontent
                  ); // 挿入する値を配列に格納
  $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行

  echo '<p>上記の内容をデータベースへ登録しました。</p>';
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP フォーム作成</title>
</head>
<body>
  <!--<form action="confirm.php" method="post">-->
    <h1>お問い合わせフォーム 送信内容</h1>
    <p>
      <!--氏名(必須・50文字以内)-->
      <label for="yourname">氏名</label>  
      <input id="yourname" type="text" maxlength="50" name="yourname" value="<?php echo $_POST['yourname']; ?>" disabled>
    </p>
    <p>
      <!--性別(選択式・必須)-->
      性別
    <?php
        $gender = $_POST['gender'];
            if($gender){
            echo $gender;
            }
    ?>
    </p>
    <p>
      <!--生年月日(必須)-->
      <label for="Birthday">生年月日</label>
      <input id="Birthday" type="date" name="Birthday" value="<?php echo $_POST['Birthday']; ?>" disabled>
    </p>
    <p>
      <!--郵便番号(必須)-->
      <label for="Postalcode">郵便番号</label>
      <input id="Postalcode" type="text" pattern="\d{3}-?\d{4}" name="Postalcode" value="<?php echo $_POST['Postalcode']; ?>" disabled>
    </p>
    <p>
      <!--住所(必須・200文字以内)-->
      <label for="address">住所</label>  
      <input id="address" type="text" maxlength="200" name="address" value="<?php echo $_POST['address']; ?>" disabled>
    </p>
    <p>
      <!--電話番号(任意)-->
      <label for="telephonenumber">電話番号</label>  
      <input id="telephonenumber" type="text" pattern="\d{2,4}-?\d{2,4}-?\d{3,4}" name="telephonenumber"value="<?php echo $_POST['telephonenumber']; ?>" disabled>
    </p>
    <p>
      <!--メールアドレス(任意・200文字以内)-->
      <label for="mail">メール</label>
      <input id="mail" type="email" name="mail" value="<?php echo $_POST['mail']; ?>" disabled>
    </p>
    <p>
      <!--問い合わせの種類(選択式・必須)-->
      <?php
        $Inquiry = $_POST['Inquiry'];
            if($Inquiry){
            echo $Inquiry;
            }
    ?>
    </p>
    <p>
      <!--相談内容(必須・1000文字以内)-->
      <label for="Consultationcontent">相談内容</label>  
      <input id="Consultationcontent" type="text" maxlength="1000" name="Consultationcontent" value="<?php echo $_POST['Consultationcontent']; ?>" disabled>
    </p>
    <p>
      <!--送信ボタン-->
      <input type="submit" value="送信する">
    </p>
  </form>
</body>
</html>
































