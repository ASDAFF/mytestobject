<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
for($i=0;$i<3;$i++)
{
?>
	<div class='wishlist_top_elem'>
		
		<a href="<?=$arResult['WISHLIST_TOP'][$i]->URL?>">
		<span>
			<?=$arResult['WISHLIST_TOP'][$i]->Name?>
		</span>
		<img class="wishlist_pict" src="<?=CFile::GetPath($arResult['WISHLIST_TOP'][$i]->Img)?>">
		</a>
	</div>
<?
}
?>