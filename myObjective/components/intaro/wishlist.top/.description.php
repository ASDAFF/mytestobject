<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); 

$arComponentDescription = array(
	"NAME" => GetMessage("Wishlist top"),
	"DESCRIPTION" => GetMessage("showing top of items in wishlists"),
	"PATH" => array(
		"ID" => "intaro_components",
		"CHILD" => array(
			"ID" => "elemsTOP",
			"NAME" => "top in wishlist"
		)
	),
	"ICON" => "/images/icon.gif",
);
?>