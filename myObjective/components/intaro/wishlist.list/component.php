<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(CModule::IncludeModule("iblock"))
{
	$countOnPage = 5;
	
	$STH = $DB->query("
						select count(userID) as cnt
						from my_wishlist
						where userID='".$DB->ForSql($USER->GetID())."'
						group by userID
					");
							
	if($row = $STH->Fetch())
	{
		$globCount = $row['cnt'];
	}

	
	$page = (intval($_GET['PAGEN_1']) > 0) ? intval($_GET['PAGEN_1']) : 1;
	$offset = ($page-1) * $countOnPage;
	$navResult = new CDBResult();
	$navResult->NavPageCount = ceil($globCount / $countOnPage);
	$navResult->NavPageNomer = $page;
	$navResult->NavNum = 1;
	$navResult->NavPageSize = $countOnPage;
	$navResult->NavRecordCount = $globCount;
	
	$STH = $DB->query("
						select itemID 
						from my_wishlist 
						where userID='".$DB->ForSql($USER->GetID())."'
						limit ".$DB->ForSql($countOnPage)."
						offset ".$DB->ForSql($offset)."
					 ");
					 
	$i = 0;
	while($row = $STH->Fetch()) {
			$idList[] = $row['itemID'];
	}
	$i=0;
		
		$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "DETAIL_PICTURE");
		$list = CIBlockElement::GetList(Array(), Array("ID"=>$idList), false, false, $arSelect);
		while($el = $list->GetNextElement())
		{
			$fields = $el->GetFields();
			$res[] = array('NAME'=>$fields['NAME'], 'URL'=>$fields['DETAIL_PAGE_URL'], 'IMG'=>CFile::GetPath($fields['DETAIL_PICTURE']));
		}
}



$arResult['NAV_STRING'] = $navResult;
$arResult['WISHLIST'] = $res;

$this->IncludeComponentTemplate();
?>