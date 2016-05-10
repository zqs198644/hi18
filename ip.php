<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="Keywords" content="www.hiadmin.cn代理服务器,网页代理IP,网站代理服务器,ip代理,qq代理,最新代理,免费代理服务器IP地址,youtube代理地址,http代理,免费代理服务器地址,翻墙代理,在线代理服务器" />
<meta name="Description" content="www.hiadmin.cn代理服务器,网页代理IP,网站代理服务器,ip代理,qq代理,最新代理,免费代理服务器IP地址,youtube代理地址,http代理,免费代理服务器地址,翻墙代理,在线代理服务器" />
<title>快捷搜索</title>
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<script language="javascript">
//if(window.top!=window.self)window.top.location.href='http://www.hiadmin.cn/';
function checkIP()
{
	var ipArray,ip,j;
	ip = document.ipform.ip.value;

	if (ip.indexOf(" ")>=0){
		ip = ip.replace(/ /g,"");
		document.ipform.ip.value = ip;
	}
	if (ip.toLowerCase().indexOf("http://")==0){
		ip = ip.slice(7);
		document.ipform.ip.value = ip;
	}
	if (ip.toLowerCase().indexOf("https://")==0){
		ip = ip.slice(8);
		document.ipform.ip.value = ip;
	}
	if (ip.slice(ip.length-1)=="/"){
		ip = ip.slice(0,ip.length-1);
		document.ipform.ip.value = ip;
	}

	if(/[A-Za-z_-]/.test(ip)){
		if(!/^([\w-]+\.)+((com)|(net)|(org)|(gov\.cn)|(info)|(cc)|(com\.cn)|(net\.cn)|(org\.cn)|(name)|(biz)|(tv)|(cn)|(mobi)|(name)|(sh)|(ac)|(io)|(tw)|(com\.tw)|(hk)|(com\.hk)|(ws)|(travel)|(us)|(tm)|(la)|(me\.uk)|(org\.uk)|(ltd\.uk)|(plc\.uk)|(in)|(eu)|(it)|(jp)|(co)|(me)|(mx)|(ca)|(ag)|(com\.co)|(net\.co)|(nom\.co)|(com\.ag)|(net\.ag)|(fr)|(org\.ag)|(am)|(asia)|(at)|(be)|(bz)|(com\.bz)|(net\.bz)|(net\.br)|(com\.br)|(de)|(es)|(com\.es)|(nom\.es)|(org\.es)|(fm)|(gs)|(co\.in)|(firm\.in)|(gen\.in)|(ind\.in)|(net\.in)|(org\.in)|(jobs)|(ms)|(com\.mx)|(nl)|(nu)|(co\.nz)|(net\.nz)|(org\.nz)|(tc)|(tk)|(org\.tw)|(idv\.tw)|(co\.uk)|(vg)|(ad)|(ae)|(af)|(ai)|(al)|(an)|(ao)|(aq)|(ar)|(as)|(au)|(aw)|(az)|(ba)|(bb)|(bd)|(bf)|(bg)|(bh)|(bi)|(bj)|(bm)|(bn)|(bo)|(br)|(bs)|(bt)|(bv)|(bw)|(by)|(cd)|(cf)|(cg)|(ch)|(ci)|(ck)|(cl)|(cm)|(cr)|(cu)|(cv)|(cx)|(cy)|(cz)|(dj)|(dk)|(dm)|(do)|(dz)|(ec)|(ee)|(eg)|(er)|(et)|(fi)|(fj)|(fk)|(fo)|(ga)|(gd)|(ge)|(gf)|(gg)|(gh)|(gi)|(gl)|(gm)|(gn)|(gp)|(gq)|(gr)|(gt)|(gu)|(gw)|(gy)|(hm)|(hn)|(hr)|(ht)|(hu)|(id)|(ie)|(il)|(im)|(iq)|(ir)|(is)|(je)|(jm)|(jo)|(ke)|(kg)|(kh)|(ki)|(km)|(kn)|(kr)|(kw)|(ky)|(kz)|(lb)|(lc)|(li)|(lk)|(lr)|(ls)|(lt)|(lu)|(lv)|(ly)|(ma)|(mc)|(md)|(mg)|(mh)|(mk)|(ml)|(mm)|(mn)|(mo)|(mp)|(mq)|(mr)|(mt)|(mu)|(mv)|(mw)|(my)|(mz)|(na)|(nc)|(ne)|(nf)|(ng)|(ni)|(no)|(np)|(nr)|(nz)|(om)|(pa)|(pe)|(pf)|(pg)|(ph)|(pk)|(pl)|(pm)|(pn)|(pr)|(ps)|(pt)|(pw)|(py)|(qa)|(re)|(ro)|(ru)|(rw)|(sa)|(sb)|(sc)|(sd)|(se)|(sg)|(si)|(sk)|(sl)|(sm)|(sn)|(sr)|(st)|(sv)|(sy)|(sz)|(td)|(tf)|(tg)|(th)|(tj)|(tl)|(tn)|(to)|(tr)|(tt)|(tz)|(ua)|(ug)|(uk)|(uy)|(uz)|(va)|(vc)|(ve)|(vi)|(vn)|(vu)|(wf)|(ye)|(yt)|(yu)|(za)|(zm)|(zw))$/i.test(ip)){
			alert("不是正确的域名");
			document.ipform.ip.focus();
			return false;
		}
	}
	else{
		ipArray = ip.split(".");
		j = ipArray.length
		if(j!=4)
		{
			alert("不是正确的IP");
			document.ipform.ip.focus();
			return false;
		}

		for(var i=0;i<4;i++)
		{
			if(isNaN(ipArray[i]) || ipArray[i].length<0 || ipArray[i]>255)
			{
				alert("不是正确的IP");
				document.ipform.ip.focus();
				return false;
			}
		}
	}
}

function checkMobile(){
	var sMobile = document.mobileform.mobile.value
	if(!(/^1[3|4|5|7|8][0-9]\d{4,8}$/.test(sMobile))){
		alert("不是完整的11位手机号或者正确的手机号前七位");
		document.mobileform.mobile.focus();
		return false;
	}
}

function checkZip(){
	var sZip = document.zipform.zip.value
	if(!(/^\d{4,6}$/.test(sZip))){
		alert("请输入邮政编码前4-6位");
		return false;
	}
}

function checkZone(){
	var sZone = document.zoneform.zone.value
	if(!(/^0\d{2,6}$/.test(sZone))){
		alert("请输入以“0”开头的3-7位区号");
		return false;
	}
}

function checkArea2Zip(){
	var sArea = document.area2zipForm.area.value
	if(sArea==""){
		alert("请输入地址");
		document.area2zipForm.area.focus();
		return false;
	}
	if(sArea.length<2){
		alert("地址至少要有2个字");
		document.area2zipForm.area.focus();
		return false;
	}
}

function checkArea2Zone(){
	var sArea = document.area2zoneForm.area.value
	if(sArea==""){
		alert("请输入地址");
		document.area2zoneForm.area.focus();
		return false;
	}
	if(sArea.length<2){
		alert("地址至少要有2个字");
		document.area2zoneForm.area.focus();
		return false;
	}
}

function checkID(){
	var sID = document.IDform.userid.value
	if(!(/^\d{15}$|^\d{18}$|^\d{17}[xX]$/.test(sID))){
		alert("请输入15位或18位身份证号");
		document.IDform.userid.focus();
		return false;
	}
}
</script>
<p>
<p>
<table width="50%"  border="0" align="center" cellpadding="0" cellspacing="0"> 
<tr>
<td><a href="http://hi18.cn">访问Google</a></td>
<td><a href="http://t.hi18.cn">访问Twitter</a></td>
<td><a href="http://f.hi18.cn">访问Facebook</<a><td>
<td><a href="http://y.hi18.cn">访问Youtube</<a><td>
<td><a href="/agent">代理IP地址</a></li</td>
</tr>
</table>

<hr>
<table width="80%"  border="0" align="center" cellpadding="0" cellspacing="0">
	<tr><td align="center"><h4>搜索IP地址的地理位置</h4></td></tr>
	<tr>
		<td height="30" align="center" valign="top"><iframe src="http://1111.ip138.com/ic.asp" rel="nofollow" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></td>
	</tr>
	<tr>
	</tr>
      <form method="GET" ACTION="index.php" name="ipform" onSubmit="return checkIP();">
	<tr>
		<td align="center"><div align="center">
			<p>IP地址或者域名：<input type="text" name="ip" size="16"> <input type="submit" value="查询"></p>
		</div></td>
	</tr>
	</FORM>
</table>	

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
            if ($id != 'www.ip.cn'){
                return iconv('gb2312','utf-8',$match[1])."<br>";
               }else{
                return $match[1]."<br>";
               }
        }else{
	        return "没有查找到相应的结果";
        }
}

$item = array('www.ip138.com'=>array('pattern'=>"$pattern_ip138",'url'=>"$url_ip138"),
	      'www.ip.cn'=>array('pattern'=>"$pattern_ipcn",'url'=>"$url_ipcn"),
	      'ip.qq.cn'=>array('pattern'=>"$pattern_qq",'url'=>"$url_qq"));

if ( $ip != ''){
	echo '<table  width="40%" border="1" align="center" cellspacing="0">';
	ob_end_clean();
	//ob_implicit_flush(true);
	echo str_pad(" ",512);
	foreach($item as $domain => $values){
     		echo '<tr>';
     		echo '<td align="center">'.$domain .'</td>';
     		echo '<td>'.getIP($values[pattern],$values[url],$domain).'</td>';
     		echo '</tr>';
     		ob_flush();
     		flush();
	}
	echo '</table>';
}else{
   ;
}
?>
<div style="position:absolute;bottom:0; margin:20px 0 0; padding:10px 0; text-align:center;">
<script src="http://s4.cnzz.com/stat.php?id=1000526447&web_id=1000526447&show=pic" language="JavaScript"></script>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F9cc3f943902e2c2f96987bb1e30507b0' type='text/javascript'%3E%3C/script%3E"));
</script>
</script>
</div>
</body>
</html>
