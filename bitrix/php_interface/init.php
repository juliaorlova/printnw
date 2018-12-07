<?
	AddEventHandler("main", "OnEpilog", "Redirect404");
	function Redirect404()
	{
		if(!defined('ADMIN_SECTION') && defined("ERROR_404") && defined("PATH_TO_404") && file_exists($_SERVER["DOCUMENT_ROOT"].PATH_TO_404))
		{
			global $APPLICATION;
			$APPLICATION->RestartBuffer();
			CHTTP::SetStatus("404 Not Found");
			include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/header.php");
			include($_SERVER["DOCUMENT_ROOT"].PATH_TO_404);
			include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/footer.php");
		}
	}
	function Suffix($value = 0, $options = Array("", "а", "ов"))
	{
		//$value - число
		//$options - массив с окончаниями: Array("", "а", "ов")

		$value %= 100;
		if (($value >=5 && $value <=20) || ($value%10>=5 && $value%10<=9) || $value%10 == 0) return $options[2];
		else if ($value%10==2 || $value%10==3 || $value%10==4) return $options[1];
		else return $options[0];
	}
?>
