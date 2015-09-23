<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if ($USER->IsAuthorized()) {
    if (isset($_POST['item']) && is_int($_POST['item']) && $_POST['item']>0) {
	    while (1) {
		    $check = $DB->query("
                SELECT *
                FROM my_wihslist
                WHERE userID=".$DB->ForSql($USER->GetID())." AND itemID=".$DB->ForSql($_POST['item'])."
		    ");
			//if query result is empty - it means line wasn't added at previous iteration or that line not existed
            if ($check->Fetch()) {
		        break;
		    } else {
		        $qqq = $DB->query("insert into my_wishlist(userID, itemID) values(".$DB->ForSql($USER->GetID()).",".$DB->ForSql($_POST['item']).")");
		    }
		}
    }
}
