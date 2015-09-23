<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


if(this->StartResutCache()) {
		$STH = $DB->query("
							select itemID, count(itemID) as quanity
							from my_wishlist
							group by itemID
							order by quanity desc
							limit 3
						  ");
		$i=0;
		while($row = $STH->Fetch()) {
			$idList[$i++] = $row['itemID'];
		}
		$i=0;
		$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "DETAIL_PICTURE");
		$list = CIBlockElement::GetList(Array(), Array("ID"=>$idList), false, false, $arSelect);
		while($el = $list->GetNextElement())
		{
			$fields = $el->GetFields();
			$res[$i]->Name = $fields['NAME']; 
			$res[$i]->URL = $fields['DETAIL_PAGE_URL'];
			$res[$i++]->Img = $fields['DETAIL_PICTURE'];
		}
	$arResult['WISHLIST_TOP'] = $res;
	
}

$this->IncludeComponentTemplate();
?>