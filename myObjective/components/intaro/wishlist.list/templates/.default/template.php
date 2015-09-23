<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$elements = $arResult['WISHLIST'];

// Вывод страницы
foreach($elements as $row) {
	?>
	<div class="wishlist_elem">
		<a href="<?=$row['URL']?>">
				<img src="<?=$row['IMG']?>">
				<?=$row['NAME']?>
		</a>
	</div>
	<?
}

// Вывод пагинатора
$APPLICATION->IncludeComponent('bitrix:system.pagenavigation', '', array(
    'NAV_RESULT' => $arResult['NAV_STRING'],
));

?>