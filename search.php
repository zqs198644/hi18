<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body>
<?php
extract($_GET);

$url_ip138 = "http://www.ip138.com/ips138.asp?ip=".$ip."&action=2";
$pattern_ip138 = '/<li>(.*)<\/li><li>(.*)<\/li><\/ul><\/td>/';

$url_ipcn = 'http://www.ip.cn/index.php?ip='.$ip;
$pattern_ipcn = '/<\/code>&nbsp;(.*)<\/p><p>GeoIP/';

$url_qq = 'http://ip.qq.com/cgi-bin/searchip?searchip1='.$ip;
$pattern_qq = '/<span>(.*)<\/span><\/p>/';

function getIP($pattern,$url,$id)
{
	$content = file_get_contents($url);
	if (preg_match($pattern, $content, $match)){ 
            if ($id == 'www.ip.cn'){
		return iconv('utf-8','gb2312',$match[1])."<br>";
		//echo  $match[2];
	      }else{
		return $match[1]."<br>";
		//echo  $match[2]."<br>";
        	//var_dump($match);
              }
        }else{
                echo '没有查到相应的结果';
        }
}

$item = array('www.ip138.com'=>array('pattern'=>"$pattern_ip138",'url'=>"$url_ip138"),
	      'www.ip.cn'=>array('pattern'=>"$pattern_ipcn",'url'=>"$url_ipcn"),
	      'ip.qq.cn'=>array('pattern'=>"$pattern_qq",'url'=>"$url_qq"));
//$item = array('ip138','ipcn','qq');
echo '<table  width="600" border="1" cellspacing="0">';
foreach($item as $domain => $values){
     echo '<tr>';
     echo '<td>'.$domain .'</td>';
     echo '<td>'.getIP($values[pattern],$values[url],$domain).'</td>';
     echo '</tr>';
}
echo '</table>';
?>

</body>
</html>
