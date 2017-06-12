<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//$arGadgetParams["LIST_URL"] = ($arGadgetParams["LIST_URL"]?$arGadgetParams["LIST_URL"]:"/news/official.php");
$arGadgetParams["ACTIVE_DATE_FORMAT"] = ($arGadgetParams["ACTIVE_DATE_FORMAT"] ? $arGadgetParams["ACTIVE_DATE_FORMAT"] : $arParams["DATE_FORMAT"]);

?>




<ul class="tab">
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'official')" id="defaultOpen">Официальная информация</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'life')">Наша жизнь</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'grat')">Поздравления</a></li>
</ul>


<div id="official" class="tabcontent">
<? $arGadgetParams["LIST_URL_of"] = ($arGadgetParams["LIST_URL_of"]?$arGadgetParams["LIST_URL_of"]:"/news/official.php"); ?>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "table-ribbon", Array(
	"IBLOCK_TYPE"	=>	$arGadgetParams["IBLOCK_TYPE"],
	"IBLOCK_ID"	=>	2,
	"NEWS_COUNT"	=>	(isset($arGadgetParams["NEWS_COUNT"])?$arGadgetParams["NEWS_COUNT"]:5),
	"SORT_BY1"	=>	"ACTIVE_FROM",
	"SORT_ORDER1"	=>	"DESC",
	"SORT_BY2"	=>	"ID",
	"SORT_ORDER2"	=>	"DESC",
	"FILTER_NAME"	=>	"",
	"FIELD_CODE"	=>	array(
		0	=>	"",
		1	=>	"",
		2	=>	"",
	),
	"PROPERTY_CODE"	=>	array(
		0	=>	"DOC_TYPE",
		1	=>	"",
	),

	"DETAIL_URL"	=>	$arGadgetParams["DETAIL_URL_of"],
	"AJAX_MODE"	=>	"N",
	"AJAX_OPTION_SHADOW"	=>	"N",
	"AJAX_OPTION_JUMP"	=>	"N",
	"AJAX_OPTION_STYLE"	=>	"N",
	"AJAX_OPTION_HISTORY"	=>	"N",
	"CACHE_TYPE" => $arGadgetParams["CACHE_TYPE"],
	"CACHE_TIME" => $arGadgetParams["CACHE_TIME"],
	"CACHE_FILTER"	=>	"N",
	"PREVIEW_TRUNCATE_LEN"	=>	$arGadgetParams["PREVIEW_TRUNCATE_LEN"],
	"ACTIVE_DATE_FORMAT" => $arGadgetParams["ACTIVE_DATE_FORMAT"],
	"DISPLAY_PANEL"	=>	"N",
	"SET_TITLE"	=>	"N",
	"INCLUDE_IBLOCK_INTO_CHAIN"	=>	"N",
	"ADD_SECTIONS_CHAIN"	=>	"N",
	"HIDE_LINK_WHEN_NO_DETAIL"	=>	"N",
	"PARENT_SECTION"	=>	"",
	"DISPLAY_TOP_PAGER"	=>	"N",
	"DISPLAY_BOTTOM_PAGER"	=>	"N",
	"PAGER_TITLE"	=>	"",
	"PAGER_SHOW_ALWAYS"	=>	"N",
	"PAGER_TEMPLATE"	=>	"",
	"PAGER_DESC_NUMBERING"	=>	"N",
	"PAGER_DESC_NUMBERING_CACHE_TIME"	=>	"36000",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => $arGadgetParams["DISPLAY_PICTURE"],
	"DISPLAY_PREVIEW_TEXT"	=>	$arGadgetParams["DISPLAY_PREVIEW_TEXT"],
	"INTRANET_TOOLBAR" => "N"
	
	),
	false,
	Array("HIDE_ICONS"=>"Y")
);?>

<?if(strlen($arGadgetParams["LIST_URL_of"])>0):?>
<br />
<div align="right"><a href="<?=htmlspecialcharsbx($arGadgetParams["LIST_URL_of"])?>"><?echo GetMessage("GD_OFFICIAL_MORE")?></a> <a href="<?=htmlspecialcharsbx($arGadgetParams["LIST_URL_of"])?>"><img width="7" height="7" border="0" src="/images/icons/arrows.gif" /></a>
<br /></div>
<?endif?>
</div>


<div id="life" class="tabcontent">

<? $arGadgetParams["LIST_URL"] = ($arGadgetParams["LIST_URL"]?$arGadgetParams["LIST_URL"]:"/news/official.php");?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"table-ribbon",
	Array(
		"IBLOCK_TYPE"	=>	$arGadgetParams["IBLOCK_TYPE"],
		"IBLOCK_ID"	=>	$arGadgetParams["IBLOCK_ID"],
		"NEWS_COUNT"	=>	(isset($arGadgetParams["NEWS_COUNT"])?$arGadgetParams["NEWS_COUNT"]:5),
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"",1=>"",2=>"",),
		"PROPERTY_CODE" => array(0=>"",1=>"",2=>"",),
		"DETAIL_URL" => "/news/life.php?ELEMENT_ID=#ELEMENT_ID#",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_SHADOW" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => $arGadgetParams["CACHE_TYPE"],
		"CACHE_TIME" => $arGadgetParams["CACHE_TIME"],
		"CACHE_FILTER" => "N",
		"PREVIEW_TRUNCATE_LEN" => $arGadgetParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT" => $arGadgetParams["ACTIVE_DATE_FORMAT"],
		"DISPLAY_PANEL" => "N",
		"SET_TITLE" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"DISPLAY_DATE"	=>	$arGadgetParams["DISPLAY_DATE"],
		"DISPLAY_NAME"	=>	"Y",
		"DISPLAY_PICTURE"	=>	$arGadgetParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT"	=>	$arGadgetParams["DISPLAY_PREVIEW_TEXT"],
		"INTRANET_TOOLBAR" => "N",
		"bxpiwidth" => "693"
	),
	false,
	Array("HIDE_ICONS"=>"Y")
);?>

<?if(strlen($arGadgetParams["LIST_URL"])>0):?>
<br />
<div align="right"><a href="<?=htmlspecialcharsbx($arGadgetParams["LIST_URL"])?>"><?echo GetMessage("GD_OFFICIAL_MORE")?></a> <a href="<?=htmlspecialcharsbx($arGadgetParams["LIST_URL"])?>"><img width="7" height="7" border="0" src="/images/icons/arrows.gif" /></a>
<br /></div>
<?endif?>
</div>

<div id="grat" class="tabcontent">
<? $arGadgetParams["LIST_URL_Gr"] = ($arGadgetParams["LIST_URL_Gr"]?$arGadgetParams["LIST_URL_Gr"]:"/news/gratters.php"); ?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"table-ribbon",
	Array(
		"IBLOCK_TYPE"	=>	$arGadgetParams["IBLOCK_TYPE"],
		"IBLOCK_ID"	=>	41,
		"NEWS_COUNT"	=>	(isset($arGadgetParams["NEWS_COUNT"])?$arGadgetParams["NEWS_COUNT"]:5),
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "",
		
		"DETAIL_URL" => $arGadgetParams["DETAIL_URL_Gr"],
		"AJAX_MODE" => "N",
		"AJAX_OPTION_SHADOW" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => $arGadgetParams["CACHE_TYPE"],
		"CACHE_TIME" => $arGadgetParams["CACHE_TIME"],
		"CACHE_FILTER" => "N",
		"PREVIEW_TRUNCATE_LEN" => $arGadgetParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT" => $arGadgetParams["ACTIVE_DATE_FORMAT"],
		"DISPLAY_PANEL" => "N",
		"SET_TITLE" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"DISPLAY_DATE"	=>	$arGadgetParams["DISPLAY_DATE"],
		"DISPLAY_NAME"	=>	"Y",
		"DISPLAY_PICTURE"	=>	$arGadgetParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT"	=>	$arGadgetParams["DISPLAY_PREVIEW_TEXT"],
		"INTRANET_TOOLBAR" => "N"
		
	),
	false,
	Array("HIDE_ICONS"=>"Y")
);?>

<?if(strlen($arGadgetParams["LIST_URL_Gr"])>0):?>
<br />
<div align="right"><a href="<?=htmlspecialcharsbx($arGadgetParams["LIST_URL_Gr"])?>"><?echo GetMessage("GD_OFFICIAL_MORE")?></a> <a href="<?=htmlspecialcharsbx($arGadgetParams["LIST_URL_Gr"])?>"><img width="7" height="7" border="0" src="/images/icons/arrows.gif" /></a>
<br /></div>
<?endif?>

</div>



<script>
function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>


<style>
/* Style the list */
ul.tab {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Float the list items side by side */
ul.tab li {float: left;}

/* Style the links inside the list items */
ul.tab li a {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of links on hover */
ul.tab li a:hover {background-color: #ddd;}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {background-color: #ccc;}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>