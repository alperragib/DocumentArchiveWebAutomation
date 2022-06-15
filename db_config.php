<?php
	
	define ('DB_USER',"root");
	define ('DB_PASSWORD',"");
	define ('DB_DATABASE',"database");
	define ('DB_SERVER',"localhost");
	
	function getDatetimeNow()
	{
		$tz_object = new DateTimeZone('Europe/Istanbul');
		$datetime = new DateTime();
		$datetime->setTimezone($tz_object);
		return $datetime->format('Y\-m\-d\ H:i:s');
	}

	function getDateNow()
	{
		$tz_object = new DateTimeZone('Europe/Istanbul');
		$datetime = new DateTime();
		$datetime->setTimezone($tz_object);
		return $datetime->format('Y-m-d');
	}
	
?>
