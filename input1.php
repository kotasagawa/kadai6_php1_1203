<html>
<head>
    <meta charset="utf-8">
    <title>input.php</title>
    <link rel="stylesheet" href="input.css">
</head>

<!-- タイトル部分 -->
<div class="title">
  <h1>知ってて当然!?山崎先生クイズ</h1>
  <img src="img/god.jpeg" alt="">
</div>
<p class="comment">１問につき正解が２つ以上の場合もあるよ！</p>
<!-- フォームタグ -->
<form action="write2.php" method="post">

<!-- 性別の入力 -->
<div class=sec>
<p>性別</p>

<!-- 男性ラジオボタン -->
  <input type="radio" name="gender" id="male" value="1">
    <label for="male"> 男性 </label> 
<!-- 女性ラジオボタン --> 
  <input type="radio" name="gender" id="female"  value="2">
    <label for="female"> 女性 </label>  
</div>

<div class=sec>
  <!-- 年齢の入力 -->
<label for="age"> 年齢 </label>
<select name="age" id="age">
<option value="0" selected>選択してください。</option>
<?php
for($num = 1; $num <= 7; $num++) {
  echo '<option value="' . $num . '">' . $num . '0代</option>' . "\n";
}
?>
<option value="8">80代以上</option>
</select>
</div>

<!-- 質問１ -->
<div class="sec">
<p>Q1. 山崎先生のYouTubeで解説しているプログラミング言語は？</p>
<?php
// 配列にする
$language = array(0 => "HTML",
               1 => "JavaScript",
               2 => "PHP",
               3 => "Python");
$ids = array('html', 'javascript', 'php', 'python');
foreach($language as $key => $value) {
  echo '<label for="' . $ids[$key] .'"><input type="checkbox" name="language[]" value="' 
  .$key . '" id="' . $ids[$key] . '">' . $value . '</label>' . "\n";
}
 
?>
</div>

<!-- 質問2 -->
<div class="sec">
<p>Q2. 山崎先生の座右の銘は？（ひとつ選んでね）</p>
<?php
$motto = array(0 => "継続は力なり",
               1 => "量をこなして、質を得る",
               2 => "習うより慣れろ",
               3 => "変わることを恐れるな");
$ids = array('continue', 'quantity', 'accustomed', 'fear');
foreach($motto as $key => $value) {
  echo '<label for="' . $ids[$key] .'"><input type="checkbox" name="motto[]" value="' 
  .$key . '" id="' . $ids[$key] . '">' . $value . '</label>' . "\n";
}
 
?>
</div>

<!-- 質問3 -->
<div class="sec">
<p>Q3. 山崎先生オススメのプログラミング勉強方法は？</p>
<?php
$study = array(0 => "最初に一通り本で勉強する",
               1 => "50%くらいの理解度で進める",
               2 => "1回の学習時間を長くする",
               3 => "短時間の学習時間を何度も作る");
$ids = array('continue', 'quantity', 'accustomed', 'fear');
foreach($study as $key => $value) {
  echo '<label for="' . $ids[$key] .'"><input type="checkbox" name="study[]" value="' 
  .$key . '" id="' . $ids[$key] . '">' . $value . '</label>' . "\n";
}
 
?>
</div>

<!-- 質問4 -->
<div class="sec">
<p>Q4. 山崎先生が開発したフリーソフトの名前は？（ひとつ選んでね）</p>
<?php
$note = array(0 => "Air Note",
               1 => "Cloud Note",
               2 => "Sky Note",
               3 => "Death Note");
$ids = array('air', 'cloud', 'sky', 'death');
foreach($note as $key => $value) {
  echo '<label for="' . $ids[$key] .'"><input type="checkbox" name="note[]" value="' 
  .$key . '" id="' . $ids[$key] . '">' . $value . '</label>' . "\n";
}
 
?>
</div>

<!-- 質問5 -->
<div class="sec">
<p>Q5. 山崎先生がよく行くカフェは？</p>
<?php
$cafe = array(0 => "スタバ",
               1 => "タリーズ",
               2 => "コメダ",
               3 => "ドトール");
$ids = array('starbucks', 'tullys', 'komeda', 'doutor');
foreach($cafe as $key => $value) {
  echo '<label for="' . $ids[$key] .'"><input type="checkbox" name="cafe[]" value="' 
  .$key . '" id="' . $ids[$key] . '">' . $value . '</label>' . "\n";
}
 
?>
</div>


<div class="btn">
<input class="btn-inner" type="submit" >
</div>
</form>

<audio src="audio/All the Fixings - Zachariah Hickman.mp3" autoplay loop></audio>
</html>