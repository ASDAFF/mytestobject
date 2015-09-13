<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");



if(CModule::IncludeModule("iblock"))
{
	$countOnPage = 5;
	
	$globCount = $DB->query("
							select count(userID) as cnt
						    from my_wishlist
							where userID='".$DB->ForSql($USER->GetID())."'
							group by userID
							");
							
	if($row = $globCount->Fetch())
	{
		$arResult['WISHLIST_GLOBAL_COUNT'] = $row['cnt'];
	}
	
	
	$page = (intval($_GET['PAGEN_1']) > 0) ? intval($_GET['PAGEN_1']) : 1;
	$offset = ($page-1) * $countOnPage;
	
	$STH = $DB->query("
						select itemID 
						from my_wishlist 
						where userID='".$DB->ForSql($USER->GetID())."'
						limit ".$DB->ForSql($countOnPage)."
						offset ".$DB->ForSql($offset)."
					 ");
					 
	$i = 0;
	while($row = $STH->Fetch())
	{
		$el = CIBlockElement::GetByID($row['itemID']);
		if($ar_res = $el->GetNext())
		{
			$res[$i]->Name = $ar_res['NAME']; 
			$res[$i]->URL = $ar_res['DETAIL_PAGE_URL'];
			$res[$i++]->Img = $ar_res['DETAIL_PICTURE'];
		}
	}
}
$arResult['WISHLIST_CURRENT_PAGE'] = $page;
$arResult['WISHLIST_COUNT_ON_PAGE'] = $countOnPage;
$arResult['WISHLIST'] = $res;
$arResult['WISHLIST_LIM'] = --$i;
$this->IncludeComponentTemplate();
?>