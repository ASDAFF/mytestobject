<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); 

$arComponentDescription = array(
	"NAME" => GetMessage("Wishlist"),
	"DESCRIPTION" => GetMessage("showing items in wishlist"),
	"PATH" => array(
		"ID" => "intaro_components",
		"CHILD" => array(
			"ID" => "elemsLIST",
			"NAME" => "elemsLIST"
		)
	),
	"ICON" => "/images/icon.gif",
);
?>