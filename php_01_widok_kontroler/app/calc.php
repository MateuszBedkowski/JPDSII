<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$kwota = $_REQUEST ['kwota'];
$miesiace = $_REQUEST ['miesiace'];
$procent = $_REQUEST ['procent'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($kwota) && isset($miesiace) && isset($procent))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $kwota == 0) {
	$messages [] = 'Nie podano kwoty';
}
if ( $miesiace == 0) {
	$messages [] = 'Nie podano liczby miesiecy';
}
if ( $procent == 0) {
	$messages [] = 'Nie podano oprocentowania';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $kwota )) {
		$messages [] = 'Kwota nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $miesiace )) {
		$messages [] = 'Ilosc miesiecy nie jest liczbą całkowitą';
	}	

	if (! is_numeric($procent)){
		$messages [] = 'Bledna wartosc oprocentowania';
	}

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$kwota = intval($kwota);
	$miesiace = intval($miesiace);
	$procent = intval($procent);
	
	//wykonanie operacji
	$result = number_format(($kwota + ($kwota * ($procent/100))) / $miesiace,2,'.','');
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';