<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$obCache = new CPHPCache;
$life_time = 3600000;
$cache_id = "wishlist_top_cache";
if($obCache->InitCache($life_time, $cache_id, "/cache_dir")) {
	$arCache = $obCache->GetVars();
	$arResult = $arCache["arResult"];
	?>
	<script>
		console.log("<?=$arCache["arResult"]?>");
	</script>
	<?
} else {
	$STH = $DB->query("
						select url, elem_name, img 
						from my_wishlist_items 
						order by count desc
						limit 3
					");
	$i=0;
	while($row = $STH ->Fetch())
	{
		$res[$i]->URL = $row['url'];
		$res[$i]->Name = $row['elem_name'];
		$res[$i++]->Img = $row['img'];
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