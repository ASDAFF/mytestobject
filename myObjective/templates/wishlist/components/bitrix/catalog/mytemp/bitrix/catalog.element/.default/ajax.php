<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if($USER->IsAuthorized())
{
	$STH = $DB->query("select count from my_wishlist_items where id=".$_GET[item]);
	$r = $STH->Fetch();
	if($r['count'] == 0)
		$DB->query("insert into my_wishlist_items(id, count, url, elem_name,img) values(".$_GET[item].",1,\"".$_GET[urli]."\",\"".$_GET[name]."\",\"".$_GET[img]."\")");
	else 
		$DB->query("update my_wishlist_items set count=".($r['count']+1) ." where id=".$_GET[item]);
	//возможно здесь стоит проверить наличие идентичной записи, для избежания ее дублирования, но здесь предполагается, что на сервере прописан триггер запрещающий дублирование записи
	$qqq = $DB->query("insert into my_wishlist(userID, itemID) values(".$USER->GetID().",".$_GET[item].")");
}
?>