<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<table width="100%" cellspacing="0" cellpadding="5">
<?foreach($arResult["ITEMS"] as $arItem):?>

<?
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>

<tr id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
<tr id ="newsdate" >
<td valign="top" colspan="2">
	 <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
	</td>
		</tr>
		<tr id ="newsname">
		<td valign="top" colspan="2">
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["PREVIEW_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a><br />
			<?else:?>
				<?echo $arItem["NAME"]?><br />
			<?endif;?>
		<?endif;?>
	</td>
		</tr>
		<tr>
		<td valign="top" id ="newspic" rowspan="2">
		
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["PREVIEW_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img class="preview-picture" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="250px" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]*250/$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" alt="<?=$arItem["NAME"]?>" hspace="0" vspace="2" title="<?=$arItem["NAME"]?>" style="float:left" /></a>
			<?else:?>
				<img class="preview-picture2" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="250px" height="250px" hspace="0" vspace="2" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" style="float:left" />
			<?endif;?>
		<?endif?>
	</td>
	<td valign="top" id="newsdetail">
		
		
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?endif;?> 
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="button">Читать далее</a>
		</td>
		</tr>
<div style="clear:both"></div>
    	
		
		

		


<?endforeach;?>
</tr>
</table>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>

<style>
.button {
	padding: 10px 35px;
	background-color: #e7e7e7;
    color: black;
    width: 100px;
    font-size: 12px;
    border-radius: 12px;
    display: block;
    margin: 20px;
	text-decoration: none;}

#newsdetail img
{
	display:none;

}	







</style>
