<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
	"GROUPS" => array(),
	"PARAMETERS" => array(
		"NUMBER_OF_ELEMS" => array(
			"PARENT" => "BASE",
			"NAME" => "Количество элементов",
			"TYPE" => "INT",
			"MULTIPLE" => "N",
			"DEFAULT" => 3,
			"REFRESH" => "Y",
		),
	),
);
?>