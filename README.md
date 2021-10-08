# Zadanie rekrutacyjne dla Aurora Creation

## Twórca

Szymon Zwoliński

## Technologie

### Backend

* PHP 8.0.1.

* Biblioteka odpowiadająca za obsługę pliku .env - https://github.com/vlucas/phpdotenv.

* Composer.

* Routing zrealizowany z pomocą PHRoute - https://github.com/mrjgreen/phroute.

* Klasa do obsługi zapytań MySQL została zainspirowana starym autorskim projektem ORM - https://github.com/zwolinkox/orm.

* Biblioteka do walidacji formularzy - https://github.com/rakit/validation.

* Biblioteka do obsługi daty i czasu - https://github.com/briannesbitt/Carbon.

### Frontend

* Silnik szablonów Latte - https://github.com/nette/latte.

* JQuery.

* Bootstrap 5.

* Modyfikacja wizualna dla bootstrapa - https://bootswatch.com/lux/.

## Plik konfiguracyjny

Za pomocą pliku env można ustalić podstawowe parametry aplikacji.

Przykładowy plik jest również utworzorzony pod nazwą .env.example.

``` env
 HOST=localhost
 DB=aurora
 USER=root
 PASSWORD=
 CHARSET=utf8mb4
 PREFIX=aurora
```

Parametry od HOST do CHARSET są przeznaczone do konfiguracji bazy danych.

Parametr PREFIX został stworzony przez problem wynikający z Routingu na lokalnym serwerze (jako przykład XAMPP). Jest to nazwa folderu, w którym znajduje się aplikacja, żeby nie zaśmiecać głównego folderu htdocs.

## Uruchomienie aplikacji 

### Instalacja zależości

```
composer install

```

## Zrzut bazy danych

Pusta baza danych została wyeksportowana z pomocą narzędzia phpmyadmin do pliku database.sql

