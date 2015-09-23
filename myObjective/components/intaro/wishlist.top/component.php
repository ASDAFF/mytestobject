<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(this->StartResutCache()) {
    $q = $DB->query("
        select itemID, count(itemID) as quanity
        from my_wishlist
        group by itemID
        order by quanity desc
        limit 3
    ");
	
    while($row = $q->Fetch()) {
        $idList[] = $row['itemID'];
    }
	$arFilter = Array("ID"=>$idList);
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "DETAIL_PICTURE");
    $list = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	
    while($el = $list->GetNextElement()) {
        $fields = $el->GetFields();
        $res[] = array('NAME'=>$fields['NAME'], 'URL'=>$fields['DETAIL_PAGE_URL'], 'IMG'=>CFile::GetPath($fields['DETAIL_PICTURE']));
    }
	$arResult['WISHLIST_TOP'] = $res;
	
}
$this->IncludeComponentTemplate();
