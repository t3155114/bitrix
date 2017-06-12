<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Кадровые изменения");
?>

<!-- I've looked at Infoblock and found out value of statuses. -->
<div class="tabs">
<ul>
<li><a href="/company/events.php?STATE=">все</a></li>
<li><a href="/company/events.php?STATE=15">принят</a></li>
<li><a href="/company/events.php?STATE=16">переведен</a></li>
<li><a href="/company/events.php?STATE=17">уволен</a></li>
</ul>

</div> 



<?$APPLICATION->IncludeComponent("OUR_DIR:intranet.structure.events", ".default", Array(
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_TYPE" => "N",	// Тип кеширования
		"COMPONENT_TEMPLATE" => "empl_events",
		"DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"DATE_FORMAT_NO_YEAR" => "d.m",	// Формат показа даты без года
		"DATE_TIME_FORMAT" => "d.m.Y H:i:s",	// Формат показа даты и времени
		"NAME_TEMPLATE" => "",	// Отображение имени
		"NAV_TITLE" => "Сотрудники",	// Подпись постраничной навигации
		"NUM_USERS" => "25",	// Количество выводимых на странице записей
		"PATH_TO_CONPANY_DEPARTMENT" => "/company/structure.php?set_filter_structure=Y&structure_UF_DEPARTMENT=#ID#",	// Шаблон пути к странице подразделения
		"PATH_TO_VIDEO_CALL" => "/company/personal/video/#USER_ID#/",	// Страница видеозвонка
		"PM_URL" => "/company/personal/messages/chat/#USER_ID#/",	// Страница отправки личного сообщения
		"SHOW_FILTER" => "Y",	// Отображать фильтр
		"SHOW_LOGIN" => "Y",	// Показывать логин, если не задано имя
		"SHOW_NAV_BOTTOM" => "Y",	// Выводить постраничную навигацию под списком
		"SHOW_NAV_TOP" => "N",	// Выводить постраничную навигацию над списком
		"SHOW_YEAR" => "Y",	// Показывать год рождения
		"STRUCTURE_FILTER" => "structure",	// Имя фильтра страницы структуры компании
		"STRUCTURE_PAGE" => "/company/structure.php",	// Страница структуры компании
		"USER_PROPERTY" => array(	// Пользовательские поля для вывода
			0 => "PERSONAL_PHONE",
			1 => "UF_DEPARTMENT",
			2 => "UF_PHONE_INNER",
			3 => "UF_SKYPE",
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

<style>
.tabs{
    display:inline-block;
}
.bx-events-layout
{
	clear:left;
}
.tabs > div{
    padding-top:10px;
}
.tabs ul{
    margin:0px;
    padding:0px;
}
.tabs ul:after{
    content:"";
    display:block;
    clear:both;
    height:5px;
    background:#C6F3FB;  //down line
}
.tabs ul li{
    margin:0px;
    padding:0px;
    cursor:pointer;
    display:block;
    float:left;
    padding:10px 15px;
    background:#e9eaeb;
    color:#707070;
}

.tabs ul li:hover{
    background:#d6d6d7;
}
</style>