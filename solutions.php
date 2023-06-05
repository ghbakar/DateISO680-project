<?php

function toISO8601($in)
{
	$meseci = array(
		'Jan' => "01",
		'Feb' => "02",
	    'Mar' => "03",
		'Apr' => "04",
		'May' => "05",
		'Jun' => "06",
		'Jul' => "07",
		'Aug' => "08",
		'Sep' => "09",
		'Oct' => "10",
		'Nov' => "11",
		'Dec' => "12"
	);
		
	if (preg_match("/(\d{2})\#(\d{2})\#(\d{2})/", $in, $m)) {
		if ($m[2] <= "38") {
			$m[2] = "20".$m[2];
		} else {
			$m[2] = "19".$m[2];
		}

		return $m[2]."-".$m[1]."-".$m[3];
	} elseif (preg_match("/(\w+)\s(\d{2})\,\s(\d{2})/", $in, $m)) {
		if ($m[3] <= "38") {
			$m[3] = "20".$m[3];
		} else {
			$m[3] = "19".$m[3];
		}

		return $m[3]."-".$meseci[$m[1]]."-".$m[2];
	} elseif (preg_match("/(\d{2})\*(\d{2})\*(\d{4})/", $in, $m)) {
		return $m[3]."-".$m[2]."-".$m[1];
	} elseif (preg_match("/(\d{2})\/(\d{2})\/(\d{2})/", $in, $m)) {
		if ($m[3] <= "38") {
			$m[3] = "20".$m[3];
		} else {
			$m[3] = "19".$m[3];
		}
		return $m[3]."-".$m[1]."-".$m[2];
	}
	else {
		return date("Y-m-d", strtotime($in));
	}
}


$f = file("date-input.txt");

foreach ($f as $k) {
	file_put_contents("data-output.txt", toISO8601($k)."\n", FILE_APPEND);
}
