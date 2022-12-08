<html>
<head>
    <meta charset="utf-8">
    <title>read.php</title>
    <link rel="stylesheet" href="read.css">
</head>
<h1>回答結果</h1>
<?php
//アンケート結果が保存するたテキストファイルを指定
$textfile = './data/log.txt';
//ファイルを開く
$fp = fopen($textfile, 'rb');   //rで読み込みモード、bで互換性維持 
 
if(!$fp){  //fopen()関数の戻り値を検証
  exit('ファイルがないか異常があります。');
}
 
//テキストを排他的にロックし、その戻り値を検証
if(!flock($fp, LOCK_EX)){
  exit('ファイルをロックできませんでした。');
}
 
//ファイルポインタが EOF（最後）に達するまで、テキストの各行を読み出し、trim()関数で文字列の先頭および末尾にあるホワイトスペースを取り除き配列に格納
while(!feof($fp)){
  $results[] = trim(fgets($fp));
}
 
if($results[30] != 0){  //アンケート結果が0でなければ集計
  echo '<p class="result">クイズの集計結果：合計 ' . $results[30] . ' 件</p>';
 
?>
 
<table>
  <thead>
  <tr>
  <th>質問の内容</th>
  <th>人数</th>
  <th>比率</th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <td>性別</td>
<?php

  // 男女の比率計算
  $male_rate   = round($results[0] / $results[30] * 100);
  $female_rate = round($results[1] / $results[30] * 100);
 
  echo '  <td>男性：' . $results[0] . '人 女性：' . $results[1] . '人</td>';
  echo '  <td>男性：' . $male_rate . '% 女性：' . $female_rate . '%</td>';
?>
  </tr>

  <tr>
  <td>年齢</td>
<?php
  $age10_rate = round($results[2] / $results[30] * 100);
  $age20_rate = round($results[3] / $results[30] * 100);
  $age30_rate = round($results[4] / $results[30] * 100);
  $age40_rate = round($results[5] / $results[30] * 100);
  $age50_rate = round($results[6] / $results[30] * 100);
  $age60_rate = round($results[7] / $results[30] * 100);
  $age70_rate = round($results[8] / $results[30] * 100);
  $age80_rate = round($results[9] / $results[30] * 100);
 
  echo '  <td>10代：' . $results[2] . '人<br>' .
             '20代：' . $results[3] . '人<br>' .
             '30代：' . $results[4] . '人<br>' .
             '40代：' . $results[5] . '人<br>' .
             '50代：' . $results[6] . '人<br>' .
             '60代：' . $results[7] . '人<br>' .
             '70代：' . $results[8] . '人<br>' .
         '80代以上：' . $results[9] . '人</td>';
  echo '  <td>10代：' . $age10_rate . '%<br>' .
             '20代：' . $age20_rate . '%<br>' .
             '30代：' . $age30_rate . '%<br>' .
             '40代：' . $age40_rate . '%<br>' .
             '50代：' . $age50_rate . '%<br>' .
             '60代：' . $age60_rate . '%<br>' .
             '70代：' . $age70_rate . '%<br>' .
         '80代以上：' . $age80_rate . '%</td>';
?>
  </tr>

  <!-- 質問１のコード -->
  <tr>
  <td>Q1. 山崎先生のYouTubeで解説しているプログラミング言語は？<br>正解：HTML, JavaScript, PHP（山崎先生が好きなのはPHP）
  </td> 
  
<?php
  $language1_rate = round($results[10] / $results[30] * 100);
  $language2_rate = round($results[11] / $results[30] * 100);
  $language3_rate = round($results[12] / $results[30] * 100);
  $language4_rate = round($results[13] / $results[30] * 100);
 
  echo '  <td>HTML：' . $results[10] . '人<br>' .
         'JavaScript：' . $results[11] . '人<br>' .
               'PHP：' . $results[12] . '人<br>' .
           'Python：' . $results[13] . '人<br>' ;
  echo '  <td>HTML：' . $language1_rate . '%<br>' .
         'JavaScript：' . $language2_rate . '%<br>' .
               'PHP：' . $language3_rate . '%<br>' .
           'Python：' . $language4_rate . '%<br>' ;
?>
  </tr>

  <!-- 質問２のコード -->
  <tr>
  <td>Q2. 山崎先生の座右の銘は？<br>正解：量をこなして、質を得る
  </td> 
  
<?php
  $motto1_rate = round($results[14] / $results[30] * 100);
  $motto2_rate = round($results[15] / $results[30] * 100);
  $motto3_rate = round($results[16] / $results[30] * 100);
  $motto4_rate = round($results[17] / $results[30] * 100);
 
  echo '  <td>継続は力なり：' . $results[14] . '人<br>' .
         '量をこなして、質を得る：' . $results[15] . '人<br>' .
               '習うより慣れろ：' . $results[16] . '人<br>' .
           '変わることを恐れるな：' . $results[17] . '人<br>' ;
  echo '  <td>継続は力なり：' . $motto1_rate . '%<br>' .
         '量をこなして、質を得る：' . $motto2_rate . '%<br>' .
               '習うより慣れろ：' . $motto3_rate . '%<br>' .
           '変わることを恐れるな：' . $motto4_rate . '%<br>' ;
?>
  </tr>

  <!-- 質問３のコード -->
  <tr>
  <td>Q3. 山崎先生オススメのプログラミング勉強方法は？<br>50%くらいの理解度で進める, 1回の学習時間を長くする</td> 
  
<?php
  $study1_rate = round($results[18] / $results[30] * 100);
  $study2_rate = round($results[19] / $results[30] * 100);
  $study3_rate = round($results[20] / $results[30] * 100);
  $study4_rate = round($results[21] / $results[30] * 100);
 
  echo '  <td>最初に一通り本で勉強する：' . $results[18] . '人<br>' .
         '50%くらいの理解度で進める：' . $results[19] . '人<br>' .
               '1回の学習時間を長くする：' . $results[20] . '人<br>' .
           '短時間の学習時間を何度も作る：' . $results[21] . '人<br>' ;
  echo '  <td>最初に一通り本で勉強する：' . $study1_rate . '%<br>' .
         '50%くらいの理解度で進める：' . $study2_rate . '%<br>' .
               '1回の学習時間を長くする：' . $study3_rate . '%<br>' .
           '短時間の学習時間を何度も作る：' . $study4_rate . '%<br>' ;
?>
  </tr>

    <!-- 質問4のコード -->
    <tr>
  <td>Q4. 山崎先生が開発したフリーソフトの名前は？<br>正解：Air Note</td> 
  
<?php
  $note1_rate = round($results[22] / $results[30] * 100);
  $note2_rate = round($results[23] / $results[30] * 100);
  $note3_rate = round($results[24] / $results[30] * 100);
  $note4_rate = round($results[25] / $results[30] * 100);
 
  echo '  <td>Air Note：' . $results[22] . '人<br>' .
         'Cloud Note：' . $results[23] . '人<br>' .
               'Sky Note：' . $results[24] . '人<br>' .
           'Death Note：' . $results[25] . '人<br>' ;
  echo '  <td>Air Note：' . $note1_rate . '%<br>' .
         'Cloud Note：' . $note2_rate . '%<br>' .
               'Sky Note：' . $note3_rate . '%<br>' .
           'Death Note：' . $note4_rate . '%<br>' ;
?>
  </tr>

    <!-- 質問5のコード -->
    <tr>
  <td>Q5. 山崎先生がよく行くカフェは？<br>スタバ(たぶん), ドトール</td> 
  
<?php
  $cafe1_rate = round($results[26] / $results[30] * 100);
  $cafe2_rate = round($results[27] / $results[30] * 100);
  $cafe3_rate = round($results[28] / $results[30] * 100);
  $cafe4_rate = round($results[29] / $results[30] * 100);
 
  echo '  <td>スタバ' . $results[26] . '人<br>' .
         'タリーズ：' . $results[27] . '人<br>' .
               'コメダ：' . $results[28] . '人<br>' .
           'ドトール：' . $results[29] . '人<br>' ;
  echo '  <td>スタバ：' . $cafe1_rate . '%<br>' .
         'タリーズ：' . $cafe2_rate . '%<br>' .
               'コメダ：' . $cafe3_rate . '%<br>' .
           'ドトール：' . $cafe4_rate . '%<br>' ;
?>
  </tr>

  </tbody>
  </table>
<?php
} else {
  // アンケートデータがない場合
  echo '  <p class="msg">表示できるようなアンケートデータがありません。</p>';
}
fclose($fp);
echo '<p class="link"><a href="input1.php">アンケートページへ戻る</a></p>';
?>

</html>