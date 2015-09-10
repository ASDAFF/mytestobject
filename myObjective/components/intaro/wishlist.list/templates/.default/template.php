<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
function renderElementsPage($elementsPage)
{
	foreach($elementsPage as $row)
	{
		
		echo '<div class="wishlist_elem">
			<a href="'.$row->Url.'">
					<img src="'.$row->Img.'">
					'.$row->Name.'
			</a>
		</div>';
		
	}
}

// Задаем количество элементов на странице
$countOnPage = 5;
// Исходный массив данных для списка
$elements = $arResult['WISHLIST'];
// Получаем номер текущей страницы из реквеста
$page = (intval($_GET['PAGEN_1']) > 0) ? intval($_GET['PAGEN_1']) : 1;
// Отбираем элементы текущей страницы
$elementsPage = array_slice($elements, ($page-1) * $countOnPage, $countOnPage);
// Вывод страницы
renderElementsPage($elementsPage);
// Подготовка параметров для пагинатора
$navResult = new CDBResult();
$navResult->NavPageCount = ceil(count($elements) / $countOnPage);
$navResult->NavPageNomer = $page;
$navResult->NavNum = 1;
$navResult->NavPageSize = $countOnPage;
$navResult->NavRecordCount = count($elements);
// Вывод пагинатора
$APPLICATION->IncludeComponent('bitrix:system.pagenavigation', '', array(
    'NAV_RESULT' => $navResult,
));

?>