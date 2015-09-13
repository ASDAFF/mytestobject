<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$obCache = new CPHPCache;
$life_time = 3600000;
$cache_id = "wishlist_top_cache";
if($obCache->InitCache($life_time, $cache_id, "/cache_dir")) {
	$arCache = $obCache->GetVars();
	$arResult = $arCache["arResult"];
} else {
		$STH = $DB->query("
							select itemID, count(itemID) as quanity
							from my_wishlist
							group by itemID
							order by quanity desc
							limit 3
						  ");
		$i=0;
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
	$arResult['WISHLIST_TOP'] = $res;
	
}

if($obCache->StartDataCache()) {
$obCache->EndDataCache(array(
"arResult" => $arResult
));
}

$this->IncludeComponentTemplate();
?>