Bitcoin-currency-rate-updater-for-opencart
====

Модуль для автоматического обновления курса Bitcoin к USD на вашем интернет-магазине использующим openCart.

Шаг 1: Добавляем валюту Bitcoin в список валют.
----
Для этого Необходимо авторизоваться в административной панели и затем перейти: Система - Локализации - Валюты.
Вам откроется таблица со списком уже имеющихся валют на вашем интернет-магазине. 
Нажимаем кнопку "Добавить" и вносим в поля следующие значения:

- Название валюты: Bitcoin
- Код: BTC (обязательно указывайте код именно BTC, так как именно на код валюты будет смотреть скрипт обновления курса)
- Символ слева: оставляем пустым
- Символ справа: BTC
- Количество знаков после запятой: 8
- Значение: оставляем пустым
- Статус: включено

Нажимаем кнопку "Сохранить". Теперь наша новая валюта добавлена в список валют.

Обратите внимание: у вас обязательно должна быть валюта USD, так как курс смотрится для пары BTC/USD.

Шаг 2: Устанавливаем скрипт обновлений.
----
У вас есть два варианта выполения этого шага.

Вариант первый: если установлен модуль "vqmod", то используем через данный модуль файл "bitfork-rate.xml"

Вариант второй: если данный модуль не установлен нужно заменить файл admin\model\localisation\currency.php файлом currency.php
 
Шаг 3: запускаем скрипт в кроне
---
Заливаем в корень сайта файл "currency-up.php"
Затем для того чтобы в браузере нельзя было запустить этот файл, в файле .htaccess нужно добавить 
```sh
# запрет доступа к файлу всем кроме local
<Files "currency-up.php">
Order deny,allow
Deny from all
Allow from local.
</Files>
```

Далее в панели вашего хостинга создаем задачу 
например раз в час запустить команду
php путь_до_скрипта/currency-up.php



Если у вас возникнут любые вопросы по работе модуля пишите на почту: welcome@bitfork-develop.com 
