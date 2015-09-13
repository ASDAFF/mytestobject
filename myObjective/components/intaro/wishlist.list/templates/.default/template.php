<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?

$countOnPage = $arResult['WISHLIST_COUNT_ON_PAGE'];
$page = $arResult['WISHLIST_CURRENT_PAGE'];
$elements = $arResult['WISHLIST'];
$globCount = $arResult['WISHLIST_GLOBAL_COUNT'];


// Вывод страницы
foreach($elements as $row)
{
	?>
	<div class="wishlist_elem">
		<a href="<?=$row->URL?>">
				<img src="<?=CFile::GetPath($row->Img)?>">
				<?=$row->Name?>
		</a>
	</div>
	<?
}

// Подготовка параметров для пагинатора
$navResult = new CDBResult();
$navResult->NavPageCount = ceil($globCount / $countOnPage);
$navResult->NavPageNomer = $page;
$navResult->NavNum = 1;
$navResult->NavPageSize = $countOnPage;
$navResult->NavRecordCount = $globCount;
// Вывод пагинатора
$APPLICATION->IncludeComponent('bitrix:system.pagenavigation', '', array(
    'NAV_RESULT' => $navResult,
));

?>