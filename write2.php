<html>
<head>
    <meta charset="utf-8">
    <title>write.php</title>
    <link rel="stylesheet" href="write.css">
</head>
<h1>回答結果</h1>
<?php
//入力値に不正なデータがないかなどをチェックする関数
function checkInput($var){
  if(is_array($var)){
    //$var が配列の場合、checkInput()関数をそれぞれの要素について呼び出す
    return array_map('checkInput', $var);
  }else{
    //PHP 7.4.x で get_magic_quotes_gpc() は非推奨になりました
    //php.iniでmagic_quotes_gpcが「on」の場合の対策
    /*if(get_magic_quotes_gpc()){  
      $var = stripslashes($var);
    }*/
    //NULLバイト攻撃対策
    if(preg_match('/\0/', $var)){  
      die('不正な入力（NULLバイト）です。');
    }
    //文字エンコードのチェック
    if(!mb_check_encoding($var, 'UTF-8')){ 
      die('不正な文字エンコードです。');
    }
    //数値かどうかのチェック 
    if(!ctype_digit($var)) {  
      die('不正な入力です。');
    }
    return (int)$var;
  }
}
 
//POSTされたデータをチェック
$_POST = checkInput($_POST);
 
$error = 0;  //変数の初期化
 
//性別の入力の検証
if(isset($_POST['gender'])) {
  $gender = $_POST['gender'];
  if($gender == 1) {
    $gendername = '男性';
  }elseif($gender == 2) {
    $gendername = '女性';
  }else{
    $error = 1;  //入力エラー（値が 1 または 2 以外）
  }
}else{
  $error = 1;  //入力エラー（値が未定義）
}
 
//年齢の入力の検証
if(isset($_POST['age'])) {
  $age = $_POST['age'];
  if($age < 1 || $age > 8 ) {
    $error = 1;  //入力エラー（値が1-8以外）
  }
}else{
   $error = 1;  //入力エラー（値が未定義）
}
 
//Q1.languageの入力の検証
if(isset($_POST['language'])) {
  $language = $_POST['language'];
  if(is_array($language)) {
    foreach($language as $value) {
      if($value < 0 || $value > 3) {
        $error = 1;  //入力エラー（値が0-7以外）
      }
    }
  }else{
    $error = 1;  //入力エラー（値が配列ではない）
  }
}else{
  $error = 1;  //入力エラー（値が未定義）
}

//Q2.mottoの入力の検証
if(isset($_POST['motto'])) {
  $motto = $_POST['motto'];
  if(is_array($motto)) {
    foreach($motto as $value) {
      if($value < 0 || $value > 3) {
        $error = 1;  //入力エラー（値が0-7以外）
      }
    }
  }else{
    $error = 1;  //入力エラー（値が配列ではない）
  }
}else{
  $error = 1;  //入力エラー（値が未定義）
}

//Q3.studyの入力の検証
if(isset($_POST['study'])) {
  $study = $_POST['study'];
  if(is_array($study)) {
    foreach($study as $value) {
      if($value < 0 || $value > 3) {
        $error = 1;  //入力エラー（値が0-7以外）
      }
    }
  }else{
    $error = 1;  //入力エラー（値が配列ではない）
  }
}else{
  $error = 1;  //入力エラー（値が未定義）
}

//Q4.noteの入力の検証
if(isset($_POST['note'])) {
  $note = $_POST['note'];
  if(is_array($note)) {
    foreach($note as $value) {
      if($value < 0 || $value > 3) {
        $error = 1;  //入力エラー（値が0-7以外）
      }
    }
  }else{
    $error = 1;  //入力エラー（値が配列ではない）
  }
}else{
  $error = 1;  //入力エラー（値が未定義）
}

//Q5.cafeの入力の検証
if(isset($_POST['cafe'])) {
  $cafe = $_POST['cafe'];
  if(is_array($cafe)) {
    foreach($cafe as $value) {
      if($value < 0 || $value > 3) {
        $error = 1;  //入力エラー（値が0-7以外）
      }
    }
  }else{
    $error = 1;  //入力エラー（値が配列ではない）
  }
}else{
  $error = 1;  //入力エラー（値が未定義）
}
 
//エラーがない場合の処理（結果の表示）
if($error == 0) {
  echo '<dl>';
  echo '<dt>性別：</dt><dd>' . $gendername . '</dd>';  
  
  //年齢の値で分岐
  if($age != 8) {
    echo '<dt>年齢：</dt><dd>' . $age . '0代</dd>';
  }else{
    echo '<dt>年齢：</dt><dd>80代以上</dd>';
  }
  
  //foreach で配列の数だけ繰り返し処理
  echo '<dt>Q1. 山崎先生のYouTubeで解説しているプログラミング言語は？：</dt>';
  echo '<dd>';
  foreach($language as $value) {
    switch($value) {
      case 0:
        echo 'HTML<br>';
        break;
      case 1:
        echo 'JavaScript<br>';
        break;
      case 2:
        echo 'PHP<br>';
        break;
      case 3:
        echo 'Python<br>';
        break;
    }
  }
  echo '</dd></dl>';

    //foreach で配列の数だけ繰り返し処理
    echo '<dt>Q2. 山崎先生の座右の銘は？：</dt>';
    echo '<dd>';
    foreach($motto as $value) {
      switch($value) {
        case 0:
          echo '継続は力なり<br>';
          break;
        case 1:
          echo '量をこなして、質を得る<br>';
          break;
        case 2:
          echo '習うより慣れろ<br>';
          break;
        case 3:
          echo '変わることを恐れるな<br>';
          break;
      }
    }
    echo '</dd></dl>';

      //foreach で配列の数だけ繰り返し処理
      echo '<dt>Q3. 山崎先生オススメのプログラミング勉強方法は？：</dt>';
      echo '<dd>';
      foreach($motto as $value) {
        switch($value) {
          case 0:
            echo '最初に一通り本で勉強する<br>';
            break;
          case 1:
            echo '50%くらいの理解度で進める<br>';
            break;
          case 2:
            echo '1回の学習時間を長くする<br>';
            break;
          case 3:
            echo '短時間の学習時間を何度も作る<br>';
            break;
        }
      }
      echo '</dd></dl>';

      //foreach で配列の数だけ繰り返し処理
      echo '<dt>Q4. 山崎先生が開発したフリーソフトの名前は？：</dt>';
      echo '<dd>';
      foreach($note as $value) {
        switch($value) {
          case 0:
            echo 'Air Note<br>';
            break;
          case 1:
            echo 'Cloud Note<br>';
            break;
          case 2:
            echo 'Sky Note<br>';
            break;
          case 3:
            echo 'Death Note<br>';
            break;
        }
      }
      echo '</dd></dl>';

      //foreach で配列の数だけ繰り返し処理
      echo '<dt>Q5. 山崎先生がよく行くカフェは？：</dt>';
      echo '<dd>';
      foreach($cafe as $value) {
        switch($value) {
          case 0:
            echo 'スタバ<br>';
            break;
          case 1:
            echo 'タリーズ<br>';
            break;
          case 2:
            echo 'コメダ<br>';
            break;
          case 3:
            echo 'ドトール<br>';
            break;
        }
      }
      echo '</dd></dl>';

  
  //アンケート結果を保存するテキストファイルを指定
  $textfile = './data/log.txt';
  
  //読み込み／書き出し用にオープン (r+) 'b' フラグを指定
  $fp = fopen($textfile, 'r+b');
  if(!$fp) {
    exit('ファイルが存在しないか異常があります');
  }
  if(!flock($fp, LOCK_EX)){
    exit('ファイルをロックできませんでした');
  }
  while(!feof($fp)) {
    $results[] = trim(fgets($fp));
  }
  
  if($gender == 1) $results[0] ++;
  if($gender == 2) $results[1] ++;
  
  $results[$age + 1] ++;
  
  foreach($language as $value) {
    $results[$value + 10] ++;
  }

  foreach($motto as $value) {
    $results[$value + 14] ++;
  }

  foreach($study as $value) {
    $results[$value + 18] ++;
  }

  foreach($note as $value) {
    $results[$value + 22] ++;
  }

  foreach($cafe as $value) {
    $results[$value + 26] ++;
  }
  
  $results[30] ++;
  
  rewind($fp);
 
  foreach($results as $value) {
    fwrite($fp, $value . "\n");
  }
  
  fclose($fp);
  
  echo '<p class="message sucess">答えてくれてありがとう！<br>集計結果を見てみましょう！</p>';
  echo '<p class="message"><a href="read3.php">集計結果ページへ</a></p>';
}else{
  echo '<p class="message error">全部に答えてないよ！<a href="input1.php">トップページ</a>に戻り、クイズに全て答えてね。</p>';
}
 
?>
</html>