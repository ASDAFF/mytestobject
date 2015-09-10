<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$STH = $DB->query("select url, elem_name, img from my_wishlist_items where id IN 
						(select itemID from my_wishlist where userID=".$USER->GetID().")");

$i = 0;
while($row = $STH ->Fetch())
{
	$res[$i]->URL = $row['url'];
	$res[$i]->Name = $row['elem_name'];
	$res[$i++]->Img = $row['img'];
}
$arResult['WISHLIST'] = $res;
$arResult['WISHLIST_LIM'] = --$i;
$this->IncludeComponentTemplate();
?>