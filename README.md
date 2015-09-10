Данные вишлиста хранятся в БД, в двух таблицах: my_wishlist(id,int userID,int itemID) и my_wishlist_item(int id, int count, char(255) url, char(255) elem_name, char(255) img)

скидываю папки, элементы которых изменялись, конкретно, я менял:
(скопирован шаблон, расширена воркареа за счет правой колонки из футера, в шаблоне размещен компонент intaro:wishlist.list)
/wishlist/footer.php
/wishlist/header.php
(добавлена кнопка в шаблон(вроде все добавленные строки предварительно закомментированы), обработчик кнопки ajax.php, повешено событие click на кнопку(возможно стоило изменять саму кнопку при нажатии) в script.js)
.default/components/bitrix/catalog/mytemp/bitrix/catalog.element/.default/ajax.php
.default/components/bitrix/catalog/mytemp/bitrix/catalog.element/.default/template.php
.default/components/bitrix/catalog/mytemp/bitrix/catalog.element/.default/script.js
(добавлена кнопка перехода в вишлист под корзиной)
.default/components/bitrix/sale.basket.basket.line/mtp/top_template.php

(ну и собственно сами написанные компоненты)
