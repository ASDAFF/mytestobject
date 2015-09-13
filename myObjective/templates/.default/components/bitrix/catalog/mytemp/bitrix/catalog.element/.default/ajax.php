<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if($USER->IsAuthorized())
{
	if(isset($_GET["item"]))
	{
		$qqq = $DB->query("insert into my_wishlist(userID, itemID) values(".$DB->ForSql($USER->GetID()).",".$DB->ForSql($_GET['item']).")");
	}
}
?>