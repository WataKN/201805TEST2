<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>クローラ</title>
    <link rel='canonical' href='https://no1s.biz/' />
</head>

<?php

require_once('phpQuery-onefile.php');

// Get Data Source
$html = file_get_contents("https://no1s.biz/");

// Get DOM Object
$phpQueryObj = phpQuery::newDocument($html);

$result = '';

// タグごとに取得
$titleArr = $phpQueryObj['h1'];
$ulArr = $phpQueryObj['li'];

foreach($titleArr as $val) {

	$title = pq($val)->find('a')->text();
	$url = pq($val)->find('a')->attr('href');

	$result .= $url .'　'. $title .'<br/>'. PHP_EOL;

}


foreach($ulArr as $val) {

	$title = pq($val)->find('a')->text();
	$url = pq($val)->find('a')->attr('href');

	$result .= $url .'　'. $title . PHP_EOL;

}

echo $result;
echo PHP_EOL.PHP_EOL;

?>

</html>