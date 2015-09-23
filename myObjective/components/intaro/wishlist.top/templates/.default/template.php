<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$list = $arResult['WISHLIST_TOP'];
foreach ($list as $el) {
?>
	<div class='wishlist_top_elem'>
		
		<a href="<?=$el['URL']?>">
		<span>
			<?=$el['NAME']?>
		</span>
		<img class="wishlist_pict" src="<?=$el['IMG'])?>">
		</a>
	</div>
<?
}
?>