/*AddEventHandler("sale", "OnOrderNewSendEmail", "modifySendingSaleData");
function modifySendingSaleData($orderID, &$eventName, &$arFields) {
    // инициализируем переменные
    $name = '';
    $lastName = '';
    $fullName = '';
    $phone = '';
    $zip = '';
    $countryName = '';
    $obl = '';
    $cityName = '';
    $address = '';
    $deliveryName = '';
    $paySystemName = '';
 
    // получаем параметры заказа по ID
    $arOrder = CSaleOrder::GetByID($orderID);
 
    // получаем свойства заказа
    $orderProps = CSaleOrderPropsValue::GetOrderProps($orderID);
 
    // проходим циклом по всем свойствам и вытаскиваем нужные нам
    while ($arProps = $orderProps->Fetch()) {
        // телефон
        if ($arProps['CODE'] == 'PHONE') {
            $phone = htmlspecialchars($arProps['VALUE']);
        }
        // страну, область, город,
        if ($arProps['CODE'] == 'LOCATION') {
            // если не перешли на местоположения 2.0
            $arLocs = CSaleLocation::GetByID($arProps['VALUE']);
            // если перешли на местоположения 2.0 раскомментируйте следующую строку
            //  и закомментируйте строчку выше
            //$arLocs = CSaleLocation::GetByID(CSaleLocation::getLocationIDbyCODE($arProps['VALUE']));
            $countryName = $arLocs['COUNTRY_NAME_LANG'];
            $obl = $arLocs['REGION_NAME_LANG'];
            $cityName = $arLocs['CITY_NAME_LANG'];
        }
        // индекс
        if ($arProps['CODE'] == 'ZIP'){
            $zip = $arProps['VALUE'];
        }
        // адрес
        if ($arProps['CODE'] == 'ADDRESS') {
            $address = $arProps['VALUE'];
        }
        // имя
        if ($arProps['CODE'] == 'FIRSTNAME') {
            $name = $arProps['VALUE'];
        }
        // фамилия
        if ($arProps['CODE'] == 'LASTNAME') {
            $lastName = $arProps['VALUE'];
        }
    }
     
    $fullName = $lastName .' ' . $name;
    $fullAddress = $zip . ', ' . $countryName . ', ' . $obl . ', ' . $cityName . ', ' . $address;
 
    // получаем название службы доставки
    $arDeliv = CSaleDelivery::GetByID($arOrder['DELIVERY_ID']);
    if ($arDeliv) {
        $deliveryName = $arDeliv['NAME'];
    }
 
    // получаем название платежной системы
    $arPaySystem = CSalePaySystem::GetByID($arOrder['PAY_SYSTEM_ID']);
    if ($arPaySystem) {
        $paySystemName = $arPaySystem['NAME'];
    }
 
    // добавляем полученные значения в результирующий массив
    $arFields['ORDER_DESCRIPTION'] = $arOrder['USER_DESCRIPTION'];
    $arFields['USER_FULL_NAME'] = $fullName;
    $arFields['PHONE'] = $phone;
    $arFields['DELIVERY_NAME'] = $deliveryName;
    $arFields['PAY_SYSTEM_NAME'] = $paySystemName;
    $arFields['FULL_ADDRESS'] = $fullAddress;
