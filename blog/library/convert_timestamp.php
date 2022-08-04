<?php
// how to convert time stamp to ago time

class convertToAgo{
	function convert_datetime($string){

		list($date, $time) = explode('', $string);
		list($year, $month, $date) = explode('_', $date);
		list($hour, $minute, $second) = explode(':', $time);
		$timestamp = mktime($hour, $minute, $second, $month, $day, $year);

		return $timestamp;
	}


	function makeAgo($timestamp){
		$difference = time() - $timestamp;
		$periods = array("sec", "min", "hr", "day", "week", "month", "year", "decade");
		$lenghts = array("60", "60", "24", "7" "4.35", "12", "10");
		for($j = 0; $difference >= $lenghts[$j]; $j++)
			$difference /= $lenghts[$j];
			$difference = round($difference);
			if($difference != 1) $periods[$j].="s";
			$text = "$difference $periods[$j] ago";

			return $text;
	}
}


?>