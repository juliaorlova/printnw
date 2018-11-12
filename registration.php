<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?
	$DATA = $_POST;
	$ERRORS = Array();

	if (strlen($DATA["LAST_NAME"]) < 1) $ERRORS[] = "Неправильно заполнено поле 'Фамилия'";
	if (strlen($DATA["NAME"]) < 1) $ERRORS[] = "Неправильно заполнено поле 'Имя'";
	
	if ($DATA["PERSON_TYPE_ID"] == 1)
	{
		//физическое лицо
		
		if (!$DATA["ORDER_PROP_2"][0]) $ERRORS[] = "Неправильно заполнено поле 'Местоположение'";
		if (strlen($DATA["ORDER_PROP_5"]) < 1) $ERRORS[] = "Неправильно заполнено поле 'Адрес доставки'";
	}
	else if ($DATA["PERSON_TYPE_ID"] == 2)
	{
		//юридическое лицо
		
		if (strlen($DATA["ORDER_PROP_10"]) < 1) $ERRORS[] = "Неправильно заполнено поле 'Название компании'";
		if (strlen($DATA["ORDER_PROP_8"]) < 1) $ERRORS[] = "Неправильно заполнено поле 'Юридический адрес'";
		if (strlen($DATA["ORDER_PROP_15"]) < 1) $ERRORS[] = "Неправильно заполнено поле 'ИНН'";
		if (strlen($DATA["ORDER_PROP_16"]) < 1) $ERRORS[] = "Неправильно заполнено поле 'КПП'";
		if (strlen($DATA["ORDER_PROP_17"]) < 1) $ERRORS[] = "Неправильно заполнено поле 'ОГРН'";
		if (strlen($DATA["ORDER_PROP_18"]) < 1) $ERRORS[] = "Неправильно заполнено поле 'ОКПО'";
		if (!$DATA["ORDER_PROP_3"][0]) $ERRORS[] = "Неправильно заполнено поле 'Местоположение'";
		if (strlen($DATA["ORDER_PROP_14"]) < 1) $ERRORS[] = "Неправильно заполнено поле 'Адрес доставки'";
	}
	
	if (strlen($DATA["EMAIL"]) < 1) $ERRORS[] = "Неправильно заполнено поле 'Адрес электронной почты'";
	if (strlen($DATA["PERSONAL_PHONE"]) < 1) $ERRORS[] = "Неправильно заполнено поле 'Телефон'";
	if (strlen($DATA["LOGIN"]) < 3) $ERRORS[] = "Логин должен быть не меньше 3 символов";
	if (strlen($DATA["PASSWORD"]) < 6) $ERRORS[] = "Пароль должен быть не меньше 6 символов";
	//if (strlen($DATA["PASSWORD_CONFIRM"]) < 6) $ERRORS[] = "Неправильно заполнено поле 'Повтор пароля'";
	if (!$DATA["RULES_CONFIRM"]) $ERRORS[] = "Нужно принять правила сайта";
	
	if (count($ERRORS)) die("errors#".json_encode($ERRORS));
	
	//ищем пользователей с таким же логином или почтой
	$USER_BY_LOGIN = CUser::GetByLogin($DATA["LOGIN"]);
	if ($USER_BY_LOGIN = $USER_BY_LOGIN->Fetch())
	{
		$ERRORS[] = "Пользователь с таким логином уже зарегистрирован";
	}
	
	if (count($ERRORS)) die("errors#".json_encode($ERRORS));
	
	$USER_BY_EMAIL = CUser::GetList(($by="ID"), ($order="ASC"), Array("=EMAIL" => $DATA["EMAIL"]));
	if ($USER_BY_EMAIL = $USER_BY_EMAIL->Fetch())
	{
		$ERRORS[] = "Пользователь с таким адресом электронной почты уже зарегистрирован";
	}
	
	if (count($ERRORS)) die("errors#".json_encode($ERRORS));
	
	if ($DATA["PASSWORD"] !== $DATA["PASSWORD_CONFIRM"]) $ERRORS[] = "Пароли не совпадают";
	
	if (count($ERRORS)) die("errors#".json_encode($ERRORS));
	
	$DATA["ACTIVE"] = "Y";
	$DATA["GROUP_ID"] = Array(5);
	
	$user = new CUser;
	$USER_ID = $user->Add($DATA);
	
	if (intval($USER_ID) > 0)
	{
		//отправляем письмо пользователю...
		CUser::SendUserInfo($USER_ID, SITE_ID, "Приветствуем Вас как нового пользователя нашего сайта!");
		
		//... и администратору
		CEvent::Send("NEW_USER", SITE_ID, Array("USER_ID" => $USER_ID, "LOGIN" => $DATA["LOGIN"], "EMAIL" => $DATA["EMAIL"], "NAME" => $DATA["NAME"], "LAST_NAME" => $DATA["LAST_NAME"]));
		
		//логиним
		global $USER;
		if (!is_object($USER)) $USER = new CUser;
		$arAuthResult = $USER->Login($DATA["LOGIN"], $DATA["PASSWORD"], "Y");
		$APPLICATION->arAuthResult = $arAuthResult;
		
		//подписываем на рассылку
		if ($DATA["SUBSCRIBE_CONFIRM"])
		{
			CModule::IncludeModule("subscribe");
			$arFields = Array("USER_ID" => ($USER->IsAuthorized()? $USER->GetID():false), "FORMAT" => "html", "SEND_CONFIRM" => "N", "CONFIRMED" => "Y", "EMAIL" => $DATA["EMAIL"], "ACTIVE" => "Y", "RUB_ID" => Array(1));
			$subscr = new CSubscription;
			$subscr->Add($arFields);
			//if ($ID > 0) CSubscription::Authorize($ID);
			//else $strWarning .= "Error adding subscription: ".$subscr->LAST_ERROR."<br>";
		}
		
		//создаем профиль покупателя
		CModule::IncludeModule("sale");
		$PROFILE_ID = CSaleOrderUserProps::Add(Array("NAME" => "Профиль покупателя (".$DATA['LOGIN'].')', "USER_ID" => $USER_ID, "PERSON_TYPE_ID" => $DATA["PERSON_TYPE_ID"]));
		if ($PROFILE_ID)
		{
			$ORDER_PROPS_LIST = CSaleOrderProps::GetList(Array("SORT" => "ASC"), Array("USER_PROPS" => "Y", "PERSON_TYPE_ID" => $DATA["PERSON_TYPE_ID"]), false, false, Array());
			while ($ORDER_PROP = $ORDER_PROPS_LIST->Fetch())
			{
				if (is_array($DATA["ORDER_PROP_".$ORDER_PROP["ID"]]))
				{
					$arr = $DATA["ORDER_PROP_".$ORDER_PROP["ID"]];
					foreach ($arr as $ar)
					{
						if ($ar) $DATA["ORDER_PROP_".$ORDER_PROP["ID"]] = $ar;
					}
				}
				CSaleOrderUserPropsValue::Add(Array("USER_PROPS_ID" => $PROFILE_ID, "ORDER_PROPS_ID" => $ORDER_PROP["ID"], "NAME" => $ORDER_PROP["NAME"], "VALUE" => $DATA["ORDER_PROP_".$ORDER_PROP["ID"]]));
			}
		}
		
		die("success#");
	}
	else die("errors#".$user->LAST_ERROR);
?>
