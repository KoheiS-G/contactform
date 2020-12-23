<?php
/*
phpからDBへの情報の受け渡しはPDOというライブラリを使用して行う
このライブラリは以下の動作を含む
1,DB接続をして
2,insert文で情報を格納する
*/

mb_internal_encoding("utf-8");  
/*
DBへ情報を格納する際に、文字化けしないようにするための決まり文句
*/

$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
/*
$pdo = new PDO  はDBと接続するための決まり文句である
"mysql:dbname=lesson01; はMySQLに接続し、データベース「lesson01」を利用するという意味
host=localhost";    は通常、DB用のサーバー名を記述するが、今回はローカル環境を用いているのでlocalhostと書く
"root",""   はサーバー接続する際のIDとパスワードを記述する欄。今回はIDがrootでパスワードがないのでこのような記述になる
*/


$pdo->exec(
"insert into contactform(name,mail,age,comments)
values('".$_POST['name']."','".$_POST['mail']."','".$_POST['age']."','".$_POST['comments']."');"
);
/*
$pdo->execはDBに情報を格納するSQL文（insert文）の前に記述する
insert文は、insert into テーブル名(カラム名1、カラム名2…) values(データ1、データ2…);である
なので$_POST['XXXXX']には入力フォームで記述した内容が代入され、insert文でDB内のテーブルにデータとして格納される
また、シングルクォーテーションとダブルクォーテーションは同時には使えず、ダブルクォーテーションでないと文字列として認識されてしまうので、'"XXXX"'という書き方になる
*/

?>


<!doctype html>
<html lang="ja">

<head>
<meta charset="utf-8">
<title>送信しました</title>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
    
<body>
    <h1>お問合わせフォーム</h1>
    <div class="confirm">
        <p>お問い合わせありがとうございました。<br>3営業日以内に担当者よりご連絡差し上げます。</p>
    </div>
</body>
    
</html>