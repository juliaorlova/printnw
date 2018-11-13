<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
define("PATH_TO_404", "/404/index.php");
?>
<!--DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"-->
<!DOCTYPE html>
<html>
	<head>
		<title><?$APPLICATION->ShowTitle()?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/> <!--Отключение режима совместимости в IE 8-->
<meta name="yandex-verification" content="9158e150024aebfc" />
		<link rel="shortcut icon" href="/favicon.ico" />
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/fonts/font-awesome/css/font-awesome.css');?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/vendor/flexslider/flexslider.css');?>
		<?$APPLICATION->ShowHead();?>
		<?CJSCore::Init(array("jquery"));?>
		<?
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/general.js");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/authorize.js");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/maintenance-online.js");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/registration.js");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/search-form.js");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/catalog-sections.js");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/file-icons.js");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/catalog-filter-price.js");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/catalog-item.js");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/vendor/flexslider/jquery.flexslider.js");
		?>
		<!--[if IE 7]><script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/ie7-catalog-fix.js"></script><![endif]-->
		<!--script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script-->
		<!--script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.mask.min.js"></script-->
	</head>
	<!--[if IE 7]><body id="ie" class="ie-lt9 ie-7"><![endif]-->
	<!--[if (gt IE 7) & (lt IE 9)]><body id="ie" class="ie-lt9"><![endif]-->
	<!--[if gte IE 9]><body id="ie"><![endif]-->
	<!--[if !IE]><!--><body><!--<![endif]-->
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>
	<? $index_page = ($APPLICATION->GetCurDir() === "/") ? true : false; ?>
	<div class="header <?=$index_page?"index":""?>">
		<div class="header-top gray-bg">
			<div class="blockInner">
				<div class="top-block">
					<div class="inline-block">
					<?$APPLICATION->IncludeComponent("bitrix:main.include", "site_logo", Array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => "/includes/site_logo.php",
						"EDIT_TEMPLATE" => "",
						),
						false
					);?>
						</div>
					<div class="inline-block">
					<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small", "smallbasket", Array(
						"PATH_TO_BASKET" => "/personal/cart/",
						"PATH_TO_ORDER" => "/personal/order/make/",
						"SHOW_DELAY" => "N",
						"SHOW_NOTAVAIL" => "N",
						"SHOW_SUBSCRIBE" => "N"
						),
						false
					);?>
					</div>
					<div class="inline-block">
						<div class="block-maintenance">
							<script id="bx24_form_button" data-skip-moving="true">
        (function(w,d,u,b){w['Bitrix24FormObject']=b;w[b] = w[b] || function(){arguments[0].ref=u;
                (w[b].forms=w[b].forms||[]).push(arguments[0])};
                if(w[b]['forms']) return;
                var s=d.createElement('script');s.async=1;s.src=u+'?'+(1*new Date());
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://printnw.bitrix24.ru/bitrix/js/crm/form_loader.js','b24form');

        b24form({"id":"1","lang":"ru","sec":"nor600","type":"button","click":""});
</script>

<h2 class="block-title block-title-small request">
    <span class="pseudo-link has-icon b24-web-form-popup-btn-1"><span class="link-text">Заявка <span class="accent">on-line</span></span><i class="icon"></i></span>
</h2>
									<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "", array(
	"SEF_MODE" => "N",
		"WEB_FORM_ID" => "3",
		"LIST_URL" => "",
		"EDIT_URL" => "",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"SUCCESS_URL" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "N",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "3600",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>
									<div class="opera-10-fix"></div>
								</div>
							</div>
					<div class="inline-block">
						<div class="lang-switch">
							<span class="lang-switch-button rus current">РУС</span>
							<a class="lang-switch-button eng" href="/en/">ENG</a>
						</div>	
						<div class="header-right-search">
						<?$APPLICATION->IncludeComponent("bitrix:search.form", "szprint_search", Array(
						      "PAGE" => "#SITE_DIR#search/index.php",
						      "USE_SUGGEST" => "N"),
						false
					);?>
						</div>
					</div>
					<!--<div class="inline-block"><?$APPLICATION->IncludeComponent("bitrix:main.include", "site_map", Array("AREA_FILE_SHOW" => "file", "PATH" => "/includes/site_map.php", "EDIT_TEMPLATE" => "", ), false);?></div>-->
					<table class="header-right">
						<tr>
							<td rowspan="3"><?$APPLICATION->IncludeComponent("bitrix:main.include", "contact_tel_code", Array("AREA_FILE_SHOW" => "file", "PATH" => "/includes/contact_tel_code.php", "EDIT_TEMPLATE" => "", ), false);?></td>
							<td><?$APPLICATION->IncludeComponent("bitrix:main.include", "contact_tel_number", Array("AREA_FILE_SHOW" => "file", "PATH" => "/includes/contact_tel_number.php", "EDIT_TEMPLATE" => "", ), false);?></td>
						</tr>
						<tr>
							<td colspan="2"><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", Array("AREA_FILE_SHOW" => "file", "PATH" => "/includes/contact_address.php", "EDIT_TEMPLATE" => "", ), false);?></td>
						</tr>
						<tr>
							<td>
								<div class="bx-system-auth-form">
								<? if ($USER && $USER->IsAuthorized()) { ?>
									<a href="/personal/"><?=$USER->GetLogin();?></a>
									<span class="circle">•</span>
									<a href="?logout=yes" class="logout-button">Выйти</a>
								<?} else {?>
									<?
									// START блок авторизации и регистрации
									?>
									<noindex>	
									<span class="authorize-link pseudo-link">Авторизация</span>
									<span class="circle">•</span>
									<span class="registration-link pseudo-link">Регистрация</span>	
									<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "authorize", Array(
										"REGISTER_URL" => "",
										"FORGOT_PASSWORD_URL" => "/personal/",
										"PROFILE_URL" => "/personal/",
										"SHOW_ERRORS" => "Y"
										),
										false
									);?>	
									<div class="registration-area">
										<div class="registration-error-block">
											<div class="error-icon"></div>
											<p class="block-title block-title-small">Внимание!</p>
											<div class="errors"></div>
										</div>
										<div class="registration-block">
											<div class="button-close"></div>
											<p class="block-title block-title-small">Регистрация на сайте</p>
											<form method="post" action="/bitrix/templates/standard/registration.php">
												<label class='names'>Фамилия:<span class='required'>*</span><br/><input type="text" name="LAST_NAME" class="text-input" /></label>
												<label class='names'>Имя:<span class='required'>*</span><br/><input type="text" name="NAME" class="text-input" /></label>
												<label class='names'>Отчество:<br/><input type="text" name="SECOND_NAME" class="text-input" /></label>
												<div class="label">Тип пользователя:<br/>
													<label><input type="radio" name="PERSON_TYPE_ID" value="1" checked/>Физическое лицо</label>
													<label><input type="radio" name="PERSON_TYPE_ID" value="2" />Юридическое лицо</label>
												</div>
	
<?
CModule::IncludeModule("sale");
$ORDER_PROPS = Array();
$ORDER_PROPS_LIST = CSaleOrderProps::GetList(Array("SORT" => "ASC"), Array("USER_PROPS" => "Y"), false, false, Array());
while ($ORDER_PROP = $ORDER_PROPS_LIST->Fetch()) {
	$ORDER_PROPS[$ORDER_PROP["PERSON_TYPE_ID"]][] = $ORDER_PROP;
}
foreach ($ORDER_PROPS as $PERSON_TYPE_ID => $PROPS) {?>
	<div style="clear: both;" class="PERSON_TYPE_<?=$PERSON_TYPE_ID?>">
	<?foreach ($PROPS as $PROP) {?>
		<div class='label prop_<?=$PROP["CODE"]?>'><?=$PROP["NAME"]?>:<span class='required'>*</span><br/><?
		switch ($PROP["TYPE"]) {
			case "TEXT": {?>
				<input type="text" name="ORDER_PROP_<?=$PROP["ID"]?>" class="text-input"/><?
				break;
			}
			case "LOCATION": {?>
				<select name="ORDER_PROP_<?=$PROP["ID"]?>[]" class="LOCATION_COUNTRY_LIST"><option value=''>(выберите страну)</option><?
				$COUNTRY_LIST = CSaleLocation::GetList(Array("SORT" => "ASC", "COUNTRY_NAME_LANG" => "ASC", "REGION_NAME_LANG" => "ASC", "CITY_NAME_LANG" => "ASC"), Array("LID" => LANGUAGE_ID, "!COUNTRY_ID" => false, "REGION_ID" => false, "CITY_ID" => false), false, false, Array());
				while ($COUNTRY = $COUNTRY_LIST->Fetch()) {?>
					<option _value="<?=$COUNTRY["COUNTRY_ID"]?>" value="<?=$COUNTRY["ID"]?>"><?=htmlspecialchars($COUNTRY["COUNTRY_NAME"])?></option><?
				}?>
				</select><select name="ORDER_PROP_<?=$PROP["ID"]?>[]" class="LOCATION_REGION_LIST"></select><select name="ORDER_PROP_<?=$PROP["ID"]?>[]" class="LOCATION_CITY_LIST"></select><?
				break;
			}
		} ?>
		</div>
	<? } ?>
	</div>
<? } ?>
												<label>Адрес электронной почты:<span class='required'>*</span><br/><input type="text" name="EMAIL" class="text-input"/></label>
												<label>Телефон:<span class='required'>*</span><br/><input type="text" name="PERSONAL_PHONE" class="text-input"/></label>
												<label>Логин:<span class='required'>*</span><br/><input type="text" name="LOGIN" class="text-input"/></label>
												<label>Пароль:<span class='required'>*</span><br/><input type="password" name="PASSWORD" class="text-input"/></label>
												<label>Повтор пароля:<span class='required'>*</span><br/><input type="password" name="PASSWORD_CONFIRM" class="text-input"/></label>
												<div style="clear: both;"></div>
												<label><input type="checkbox" name="RULES_CONFIRM"/>Согласен с <a class="site-rules-label" href="#">правилами сайта</a></label>
												<label><input type="checkbox" name="SUBSCRIBE_CONFIRM" checked/>Согласен получать новостную рассылку</a></label>
												<input type="submit" class="submit-button blue-button" value="Регистрация">
											</form>
										</div>	
										<div class="registration-success-block">
											<div class="success-icon"></div>
											<p class="block-title block-title-small">Спасибо за успешную регистрацию</p>
										</div>
									</div>	
									</noindex>
									<?
									// END блок авторизации и регистрации
									?>
								<? } ?>
								</div>
							</td>
						</tr>
					</table>
					<span class="vertical"></span>
				</div>
			</div> <? // end blockInner ?>
		</div> <? // end header-top gray-bg ?>
		<?if($index_page) {?>
			<?
			// START блока главного слайдера
			?>
			<div class="blockInner">
			<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"main_slider", 
	array(
		"IBLOCK_TYPE" => "media_content",
		"IBLOCK_ID" => "23",
		"NEWS_COUNT" => "15",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "PREVIEW_TEXT",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_TEXT",
			3 => "DETAIL_PICTURE",
			4 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "BANNER_LINK",
			1 => "BANNER_LINK_OPEN_NW",
			2 => "BUTTON_TEXT",
			3 => "BUTTON_LINK",
			4 => "BUTTON_LINK_OPEN_NW",
			5 => "TEXT_BLOCK_ALIGN",
			6 => "TEXT_BLOCK_VPOSITION",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "3600000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SLIDES_SHOW_SPEED" => "5000",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y"
	),
	false
);?>
			</div>
			<div class="horizontal-line top-index">
				<div class="top-line"></div>
				<div class="bottom-line"></div>
			</div>
		<? } ?>
		<?
		// START блока под синей линией
		?>
		<div class="blockInner">
		<?$APPLICATION->IncludeComponent("bitrix:menu", "szprint_horizontal_multilevel", array(
			"ROOT_MENU_TYPE" => "top",
			"MENU_CACHE_TYPE" => "A",
			"MENU_CACHE_TIME" => "3600",
			"MENU_CACHE_USE_GROUPS" => "N",
			"MENU_CACHE_GET_VARS" => array(
			),
			"MAX_LEVEL" => "2",
			"CHILD_MENU_TYPE" => "left",
			"USE_EXT" => "Y",
			"DELAY" => "N",
			"ALLOW_MULTI_SELECT" => "N"
			),
			false
		);?>
		</div>
		<?if(!$index_page) {?>
			<div class="horizontal-line">
				<div class="top-line"></div>
				<div class="bottom-line"></div>
			</div>
		<? } ?>
	</div>
	<?if($index_page) {?>
	<div class="main index">
		<div class="special-line gray-bg">
			<div class="blockInner">
				<?$APPLICATION->IncludeComponent("bitrix:news.list", "main_offers", array(
					"IBLOCK_TYPE" => "catalog",
					"IBLOCK_ID" => "17",
					"NEWS_COUNT" => "2",
					"SORT_BY1" => "ACTIVE_FROM",
					"SORT_ORDER1" => "DESC",
					"SORT_BY2" => "SORT",
					"SORT_ORDER2" => "ASC",
					"FILTER_NAME" => "",
					"FIELD_CODE" => array(
						0 => "DETAIL_PICTURE",
						1 => "",
					),
					"PROPERTY_CODE" => array(
						0 => "",
						1 => "",
					),
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_FILTER" => "Y",
					"CACHE_GROUPS" => "N",
					"PREVIEW_TRUNCATE_LEN" => "",
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"SET_TITLE" => "N",
					"SET_STATUS_404" => "N",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "N",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"INCLUDE_SUBSECTIONS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"PAGER_TITLE" => "Новости",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"AJAX_OPTION_ADDITIONAL" => ""
					),
					false
				);?>
				<div class="block-expendables">
				<h2 class="block-title block-title-small">Сервисное техническое обслуживание</h2>
				<p class="text"><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", Array("AREA_FILE_SHOW" => "file", "PATH" => "/includes/servicetext.php", "EDIT_TEMPLATE" => "", ), false);?></p>
				
				<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", Array("AREA_FILE_SHOW" => "file", "PATH" => "/includes/servicelink.php", "EDIT_TEMPLATE" => "", ), false);?>
					<?/*>
					<h2 class="block-title block-title-small"><a href="#">Расходные материалы</a></h2>
					<div class="block-expendables-body">
						<i class="expendables-icon"></i>
						<p class="expendables-text">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", Array("AREA_FILE_SHOW" => "file", "PATH" => "/includes/main_expendables.php", "EDIT_TEMPLATE" => "", ), false);?>
							<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", Array("AREA_FILE_SHOW" => "file", "PATH" => "/includes/main_expendables_link.php", "EDIT_TEMPLATE" => "", ), false);?>
						</p>
					</div>
					<*/?>
				</div>
			</div>
		</div>
		<?
		global $arrMainPopular;
		$arrMainPopular = Array("!PROPERTY_POPULAR" => false);
		?>
		<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"main_popular", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "16",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"ELEMENT_SORT_FIELD" => "shows",
		"ELEMENT_SORT_ORDER" => "desc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "arrMainPopular",
		"INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_ALL_WO_SECTION" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"PAGE_ELEMENT_COUNT" => "10",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "DISABLED",
			2 => "",
		),
		"OFFERS_LIMIT" => "5",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "N",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"ADD_SECTIONS_CHAIN" => "N",
		"DISPLAY_COMPARE" => "N",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"CACHE_FILTER" => "N",
		"PRICE_CODE" => array(
			0 => "ЦЕНА Сайта",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_PROPERTIES" => array(
		),
		"USE_PRODUCT_QUANTITY" => "N",
		"CONVERT_CURRENCY" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PARTIAL_PRODUCT_PROPERTIES" => "N"
	),
	false
);?>
		<div class="news-service blockInner">
			<?$APPLICATION->IncludeComponent("bitrix:news.list", "main_news", array(
	"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => "3",
		"NEWS_COUNT" => "1",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "DETAIL_PICTURE",
			1 => "DATE_CREATE",
			2 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);?>
			<div class="block-service">
				<h2 class="block-title"><a href="#">Услуги</a></h2>
				<div class="block-service-body">
					<div class="block-service-item">
						<i class="icon rent"></i>
						<h3 class="service-item-title"><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", Array("AREA_FILE_SHOW" => "file", "PATH" => "/includes/main_rent_leasing_link.php", "EDIT_TEMPLATE" => "", ), false);?></h3>
						<div class="service-item-text"><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", Array("AREA_FILE_SHOW" => "file", "PATH" => "/includes/main_rent_leasing.php", "EDIT_TEMPLATE" => "", ), false);?></div>
					</div>
					<div class="block-service-item">
						<i class="icon installation"></i>
						<h3 class="service-item-title"><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", Array("AREA_FILE_SHOW" => "file", "PATH" => "/includes/main_install_link.php", "EDIT_TEMPLATE" => "", ), false);?></h3>
						<div class="service-item-text"><?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", Array("AREA_FILE_SHOW" => "file", "PATH" => "/includes/main_install.php", "EDIT_TEMPLATE" => "", ), false);?></div>
					</div>
				</div>
			</div>
		</div>
		<?
		global $arrMainVendors;
		$arrMainVendors = Array("PROPERTY_NOT_ON_MAIN" => false);
		?>
		<?$APPLICATION->IncludeComponent("bitrix:news.list", "main_vendors", array(
			"IBLOCK_TYPE" => "catalog",
			"IBLOCK_ID" => "18",
			"NEWS_COUNT" => "50",
			"SORT_BY1" => "SORT",
			"SORT_ORDER1" => "ASC",
			"SORT_BY2" => "SORT",
			"SORT_ORDER2" => "ASC",
			"FILTER_NAME" => "arrMainVendors",
			"FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"PROPERTY_CODE" => array(
				0 => "",
				1 => "",
			),
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_FILTER" => "Y",
			"CACHE_GROUPS" => "N",
			"PREVIEW_TRUNCATE_LEN" => "",
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"SET_TITLE" => "N",
			"SET_STATUS_404" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"INCLUDE_SUBSECTIONS" => "Y",
			"PAGER_TEMPLATE" => ".default",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"PAGER_TITLE" => "Новости",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"AJAX_OPTION_ADDITIONAL" => ""
			),
			false
		);?>
	</div>
	<?} else {?>
	<div class="main">
		<div class="blockInner">
			<div class="aside">
				<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array("AREA_FILE_SHOW" => "sect", "AREA_FILE_SUFFIX" => "aside1", "AREA_FILE_RECURSIVE" => "Y", "EDIT_TEMPLATE" => ""), false);?>
				<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array("AREA_FILE_SHOW" => "sect", "AREA_FILE_SUFFIX" => "aside2", "AREA_FILE_RECURSIVE" => "Y", "EDIT_TEMPLATE" => ""), false);?>
				<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array("AREA_FILE_SHOW" => "sect", "AREA_FILE_SUFFIX" => "aside3", "AREA_FILE_RECURSIVE" => "Y", "EDIT_TEMPLATE" => ""), false);?>
				<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array("AREA_FILE_SHOW" => "sect", "AREA_FILE_SUFFIX" => "aside4", "AREA_FILE_RECURSIVE" => "Y", "EDIT_TEMPLATE" => ""), false);?>
				<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array("AREA_FILE_SHOW" => "sect", "AREA_FILE_SUFFIX" => "aside5", "AREA_FILE_RECURSIVE" => "Y", "EDIT_TEMPLATE" => ""), false);?>
				<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array("AREA_FILE_SHOW" => "sect", "AREA_FILE_SUFFIX" => "aside6", "AREA_FILE_RECURSIVE" => "Y", "EDIT_TEMPLATE" => ""), false);?>				
			</div>
			<div class="content">
				<!-- content begin -->
				<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "szprint_breadcrumbs", Array(
					"START_FROM" => "0", // Номер пункта, начиная с которого будет построена навигационная цепочка
					"PATH" => "", // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
					"SITE_ID" => "-", // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
					),
					false
				);?>
				<?if(!substr_count($APPLICATION->GetCurDir(), '/catalog/')) {?>
					<h1><?$APPLICATION->ShowTitle(false)?></h1>
				<? } ?>
	<? } ?>#WORK_AREA#				<!-- content end -->
			</div>
		</div>
		<?
			$arrVendorDirs = Array("/about/", "/offers/", "/service/", "/office/");
			$showVendorLine = false;
			foreach ($arrVendorDirs as $dir)
			{
				if (substr_count($APPLICATION->GetCurDir(), $dir))
				{
					$showVendorLine = true;
					break;
				}
			}
			
			if ($showVendorLine && !substr_count($APPLICATION->GetCurDir(), "/about/vendors/"))
			{
			
			global $arrMainVendors;
			$arrMainVendors = Array("PROPERTY_NOT_ON_MAIN" => false);
		?>
		<br/>
		<br/>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"main_vendors",
	Array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "18",
		"NEWS_COUNT" => "50",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arrMainVendors",
		"FIELD_CODE" => array(),
		"PROPERTY_CODE" => array(),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N"
	),
false
);?>
	<?
			}
	?>
	</div>
	<div class="footer">
		<div class="blockInner">
<?$APPLICATION->IncludeComponent("bitrix:menu", "szprint_horizontal_multilevel", array(
	"ROOT_MENU_TYPE" => "top",
	"MENU_CACHE_TYPE" => "A",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "N",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "2",
	"CHILD_MENU_TYPE" => "left",
	"USE_EXT" => "Y",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
		</div>
		<div class="footer-bottom gray-bg">
			<div class="blockInner">
				<div class="footer-left">
<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => "/includes/copywrite.php",
	"EDIT_TEMPLATE" => ""
	),
	false
);?>
				</div>
				<div class="footer-right">
<?$APPLICATION->IncludeComponent("bitrix:main.include", "developers", Array(
	"AREA_FILE_SHOW" => "file",	// Показывать включаемую область
	"PATH" => "/includes/developers.php",	// Путь к файлу области
	"EDIT_TEMPLATE" => "",	// Шаблон области по умолчанию
	),
	false
);?>
				</div>
				<div class="footer-contacts">
					<div class="address">
<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => "/includes/contact_address.php",
	"EDIT_TEMPLATE" => ""
	),
	false
);?>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "address_map_link", array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => "/includes/address_map_link.php",
	"EDIT_TEMPLATE" => ""
	),
	false
);?>
					</div>
					<div class="footer-tel">
<?$APPLICATION->IncludeComponent("bitrix:main.include", "contact_tel_code", Array(
	"AREA_FILE_SHOW" => "file",	// Показывать включаемую область
	"PATH" => "/includes/contact_tel_code.php",	// Путь к файлу области
	"EDIT_TEMPLATE" => "",	// Шаблон области по умолчанию
	),
	false
);?>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "contact_tel_number", Array(
	"AREA_FILE_SHOW" => "file",	// Показывать включаемую область
	"PATH" => "/includes/contact_tel_number.php",	// Путь к файлу области
	"EDIT_TEMPLATE" => "",	// Шаблон области по умолчанию
	),
	false
);?>
					</div>				
					<div class="inline-block">
<?$APPLICATION->IncludeComponent("bitrix:main.include", "site_map", Array(
	"AREA_FILE_SHOW" => "file",	// Показывать включаемую область
	"PATH" => "/includes/site_map.php",	// Путь к файлу области
	"EDIT_TEMPLATE" => "",	// Шаблон области по умолчанию
	),
	false
);?>
					</div>
				</div>
			</div>
		</div>
	</div>
<script data-skip-moving="true">
        (function(w,d,u){
                var s=d.createElement('script');s.async=1;s.src=u+'?'+(Date.now()/60000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn.bitrix24.ru/b8497745/crm/site_button/loader_3_ag39aw.js');
</script>
</body>
</html>
