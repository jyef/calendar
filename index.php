<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
$timestamp = time();
$y = date("Y", $timestamp);
$m = date("m", $timestamp);
$d = date("d", $timestamp);
$w = (int) date("w", $timestamp);
$t = (int) date("t", $timestamp);
if($_GET['year'] == null){
  $get_year = $y;
  $get_month = $m;
} else {
  $get_year = (int) $_GET['year'];
  $get_month = (int) $_GET['month'];
  $timestamp = strtotime("{$get_year}-{$get_month}-1");
  $y = date("Y", $timestamp);
  $m = date("m", $timestamp);
  $d = date("d", $timestamp);
  $w = (int) date("w", $timestamp);
  $t = (int) date("t", $timestamp);
}

$count_t = $t;
$count_d = 1;
$line = 1;

print "{$y}年{$m}月";
print "<table>"; echo "\n";
print " <tr>"; echo "\n";
$weeks = ["日","月","火","水","木","金","土"];
foreach($weeks as $week){
print "   <td>{$week}</td>"; echo "\n";
}
print "</tr><tr>"; echo "\n";
while($count_t > 0){
  if($w > 0){
print "   <td></td>"; echo "\n";
    $w--;
  } else {
print "  <td>{$count_d}</td>"; echo "\n";
    $count_d++;
    $count_t--;
  }
  if($line % 7 == 0){
print "</tr><tr>"; echo "\n";
  }
  $line++;
}
print " </tr>"; echo "\n";
print "</table>"; echo "\n";

print "<form action='' method='get'>"; echo "\n";
print "  <select name='year'>"; echo "\n";
for($i = $y - 5; $i <= $y + 5; $i++){
  if ($i == $get_year){
print "  <option value='{$i}' selected>{$i}年</option>"; echo "\n";    
  } else {
print "  <option value='{$i}'>{$i}年</option>"; echo "\n";
  }
}
print "  </select>"; echo "\n";
print "  <select name='month'>"; echo "\n";
for($i = 1; $i <= 12; $i++){
  if($i == $get_month){
print "  <option value='{$i}' selected>{$i}月</option>"; echo "\n";    
  } else {
    print "  <option value='{$i}'>{$i}月</option>"; echo "\n";
  }
}
print "  </select>"; echo "\n";
print "<input type ='submit' value ='送信'>"; echo "\n";
print "</form>"; echo "\n";
?>
</body>
</html>