<?php
echo "Project team regis\n";
echo "======================\n";
$reff = "Z87FB4";
$header[] = "Host: www.getrich06.com";
$header[] = "Connection: keep-alive";
$header[] = "Accept: */*";
$header[] = "X-Requested-With: XMLHttpRequest";
$header[] = "User-Agent: Mozilla/5.0 (Linux; Android 10; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36";
$header[] = "Content-Type: application/x-www-form-urlencoded;";
$header[] = "Referer: https://www.getrich06.com/index/user/register/invite_code/".$reff.".html";
$header[] = "Accept-Language: en-US,en;q=0.9,id;q=0.8";
$url = "https://www.getrich06.com/index/user/do_register.html";
echo "======================\n";
echo "REGISTER => OK ✔\n";
echo "======================\n";
$na = explode(" ", nama());
$nana = strtolower(trim($na[0]));
$uname = $nana.random(4,0);
$tel = "838".random(8,0);
$pwd = "projectteam";
$data = "user_name=".$uname."&tel=".$tel."&pwd=".$pwd."&deposit_pwd=".$pwd."&invite_code=".$reff;
$res = curl($url,$header,"post",$data);
$a = explode("set-cookie: ",$res);
$b = explode(" path=/;",$a[1]);
$cookie = $b[0];
$c = explode('"info":"',$res);
$d = explode('"}',$c[1]);
echo "[<>]STATUS => ".$d[0]."\n";
$header[] = "Host: www.getrich06.com";
$header[] = "Connection: keep-alive";
$header[] = "Accept: */*";
$header[] = "X-Requested-With: XMLHttpRequest";
$header[] = "User-Agent: Mozilla/5.0 (Linux; Android 10; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36";
$header[] = "Content-Type: application/x-www-form-urlencoded;";
$header[] = "Referer: https://www.getrich06.com/index/user/login.html";
$header[] = "Accept-Language: en-US,en;q=0.9,id;q=0.8";
$header[] = "Cookie: ".$cookie." think_var=in";
$url = "https://www.getrich06.com/index/user/do_login.html";
$data = "tel=".$tel."&pwd=".$pwd."&jizhu=1";
$res = curl($url,$header,"post",$data);
$c = explode('"info":"',$res);
$d = explode('"}',$c[1]);
echo "[<>]STATUS => ".$d[0]."\n";
for($i = 1; $i <= 5; $i++){
$header[] = "Host: www.getrich06.com";
$header[] = "Connection: keep-alive";
$header[] = "Accept: */*";
$header[] = "X-Requested-With: XMLHttpRequest";
$header[] = "User-Agent: Mozilla/5.0 (Linux; Android 10; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36";
$header[] = "Content-Type: application/x-www-form-urlencoded;";
$header[] = "Referer: https://www.getrich06.com/index/rot_order/index.html?type=2";
$header[] = "Accept-Language: en-US,en;q=0.9,id;q=0.8";
$header[] = "Cookie: ".$cookie." think_var=in; "."tel=".$tel."; pwd=".$pwd;
$url = "https://www.getrich06.com/index/rot_order/submit_order.html?cid=2&m=0.30839191297583457";
$data = "";
$res = curl($url,$header,"post",$data);
$c = explode('"info":"',$res);
$d = explode('","',$c[1]);
echo "[<>]STATUS ORDER => ".$d[0]."\n";
$e = explode('"oid":"',$res);
$f = explode('"}',$e[1]);
$url = "https://www.getrich06.com/index/order/order_info";
$data = "id=".$f[0];
$res = curl($url,$header,"post",$data);
$url = "https://www.getrich06.com/index/order/do_order";
$data = "oid=".$f[0];
$res = curl($url,$header,"post",$data);
$c = explode('"info":"',$res);
$d = explode('"}',$c[1]);
echo "[<>]STATUS ORDER => ".$d[0]."\n";
$url = "https://www.getrich06.com/index/my/index?lang=in";
$res = curl($url,$header,"get");
$ez = explode('Setor tunai</button></div><p data-v-d5f15326=""><em data-v-d5f15326=""><small data-v-d5f15326="">',$res);
$ep = explode('</small>',$ez[1]);
echo "[<>]SALDO => ".$ep[0]."\n";
}
$myFile = "project.txt";
$fh = fopen($myFile, 'a') or die("can’t open file");
$stringData = $tel." | ".$pwd."\n";
fwrite($fh, $stringData);
fclose($fh);

system ('php regis1.php');

function nama()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://ninjaname.horseridersupply.com/indonesian_name.php");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$ex = curl_exec($ch);
		preg_match_all('~(&bull; (.*?)<br/>&bull; )~', $ex, $name);
		return $name[2][mt_rand(0, 14) ];
	}
function random($length,$a)
	{
		$str = "";
		if ($a == 0) {
			$characters = array_merge(range('0','9'));
		}elseif ($a == 1) {
			$characters = array_merge(range('0','9'),range('a','z'));
		}
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}
function curl($url, $header, $mode="get", $data=0)
	{
	if ($mode == "get" || $mode == "Get" || $mode == "GET")
		{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_HEADER, true);
		$result = curl_exec($ch);
		}
	elseif ($mode == "post" || $mode == "Post" || $mode == "POST")
		{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_HEADER, true);
		$result = curl_exec($ch);
		}
	else
		{
		$result = "Not define";
		}
	return $result;
	}


