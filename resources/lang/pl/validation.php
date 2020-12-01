<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	'accepted' => 'Należy zaakceptować :attribute.',
	'active_url' => ':attribute nie jest prawidłowym adresem URL.',
	'after' => ':attribute musi być datą następującą po: data.',
	'after_or_equal' => ':attribute musi być datą następującą po lub równą dacie: data.',
	'alpha' => ':attribute może zawierać tylko litery.',
	'alpha_dash' => ':attribute może zawierać tylko litery, cyfry, myślniki i podkreślenia.',
	'alpha_num' => ':attribute może zawierać tylko litery i cyfry.',
	'array' => ':attribute musi być tablicą.',
	'before' => ':attribute musi być datą wcześniejszą niż: data.',
	'before_or_equal' => ':attribute musi być datą wcześniejszą lub równą: data.',
	'between' => [
		'numeric' => ':attribute musi znajdować się między :min a :max.',
		'file' => ':attribute musi znajdować się między :min a :max kilobajtami.',
		'string' => ':attribute musi mieć od :min do :max znaków.',
		'array' => ':attribute musi zawierać elementy od :min do :max.',
	],
	'boolean' => 'Pole :attribute musi mieć wartość prawda lub fałsz.',
	'confirmed' => 'Potwierdzenie :attribute nie pasuje.',
	'date' => ':attribute nie jest prawidłową datą.',
	'date_equals' => ':attribute musi być datą równą: data.',
	'date_format' => ':attribute nie pasuje do formatu: format.',
	'different' => ':attribute i :other muszą być różne.',
	'digits' => ':attribute musi składać się z: cyfr cyfry.',
	'digits_between' => ':attribute musi zawierać się między cyframi :min i :max.',
	'dimensions' => ':attribute ma nieprawidłowe wymiary obrazu.',
	'distinct' => 'Pole :attribute ma zduplikowaną wartość.',
	'email' => ':attribute musi być prawidłowym adresem e-mail.',
	'ends_with' => ':attribute musi kończyć się jednym z następujących: :value.',
	'exists' => 'Wybrany :attribute jest nieprawidłowy.',
	'file' => ':attribute musi być plikiem.',
	'filled' => 'Pole :attribute musi mieć wartość.',
	'gt' => [
		'numeric' => ':attribute musi być większy niż :value.',
		'file' => 'Wartość :attribute musi być większa niż :value w kilobajtach.',
		'string' => ':attribute musi być większy niż :value znaków.',
		'array' => ':attribute musi mieć więcej elementów niż :value.',
	],
	'gte' => [
		'numeric' => ':attribute musi być większy lub równy :value.',
		'file' => ':attribute musi być większy lub równy :value w kilobajtach.',
		'string' => ':attribute musi być większy lub równy znakom :value.',
		'array' => ':attribute musi zawierać elementy :value lub więcej.',
	],
	'image' => ':attribute musi być obrazem.',
	'in' => 'Wybrany :attribute jest nieprawidłowy.',
	'in_array' => 'Pole :attribute nie istnieje w :other.',
	'integer' => ':attribute musi być liczbą całkowitą.',
	'ip' => ':attribute musi być prawidłowym adresem IP.',
	'ipv4' => ':attribute musi być prawidłowym adresem IPv4.',
	'ipv6' => ':attribute musi być prawidłowym adresem IPv6.',
	'json' => ':attribute musi być prawidłowym ciągiem JSON.',
	'lt' => [
		'numeric' => ':attribute musi być mniejszy niż :value.',
		'file' => 'Wartość :attribute musi być mniejsza niż :value kilobajtów.',
		'string' => ':attribute musi mieć mniej niż :value znaków.',
		'array' => ':attribute musi mieć mniej elementów niż :value.',
	],
	'lte' => [
		'numeric' => ':attribute musi być mniejszy lub równy :value.',
		'file' => ':attribute musi być mniejszy lub równy :value w kilobajtach.',
		'string' => ':attribute musi mieć mniej lub równą liczbę znaków :value.',
		'array' => ':attribute nie może mieć więcej elementów niż :value.',
	],
	'max' => [
		'numeric' => 'Wartość :attribute nie może być większa niż :max.',
		'file' => 'Wartość :attribute nie może być większa niż :max w kilobajtach.',
		'string' => 'Wartość :attribute nie może być większa niż :max znaków.',
		'array' => ':attribute nie może zawierać więcej elementów niż :max.',
	],
	'mimes' => ':attribute musi być plikiem typu: :value.',
	'mimetypes' => ':attribute musi być plikiem typu: :value.',
	'min' => [
		'numeric' => 'Wartość :attribute musi wynosić co najmniej :min.',
		'file' => 'Wartość :attribute musi wynosić co najmniej :min kilobajtów.',
		'string' => ':attribute musi zawierać co najmniej :min znaków.',
		'array' => ':attribute musi zawierać co najmniej :min elementów.',
	],
	'multiple_of' => ':attribute musi być wielokrotnością :value',
	'not_in' => 'Wybrany :attribute jest nieprawidłowy.',
	'not_regex' => 'Format :attribute jest nieprawidłowy.',
	'numeric' => ':attribute musi być liczbą.',
	'password' => 'Hasło jest błędne.',
	'present' => 'Pole :attribute musi być obecne.',
	'regex' => 'Format :attribute jest nieprawidłowy.',
	'required' => 'Pole :attribute jest wymagane.',
	'required_if' => 'Pole :attribute jest wymagane, gdy :other to :value.',
	'required_unless' => 'Pole :attribute jest wymagane, chyba że :other znajduje się w :value.',
	'required_with' => 'Pole :attribute jest wymagane, gdy występuje :value.',
	'required_with_all' => 'Pole :attribute jest wymagane, gdy obecne są wartości :value.',
	'required_without' => 'Pole :attribute jest wymagane, gdy nie ma :value.',
	'required_without_all' => 'Pole :attribute jest wymagane, gdy nie ma żadnej z wartości :value.',
	'same' => ':attribute i :other muszą być zgodne.',
	'size' => [
		'numeric' => ':attribute musi mieć wartość: rozmiar.',
		'file' => ':attribute musi mieć: rozmiar w kilobajtach.',
		'string' => ':attribute musi zawierać: rozmiar znaków.',
		'array' => ':attribute musi zawierać: rozmiar elementów.',
	],
	'starts_with' => ':attribute musi zaczynać się od jednego z następujących elementów: :value.',
	'string' => ':attribute musi być ciągiem znaków.',
	'timezone' => ':attribute musi być prawidłową strefą.',
	'unique' => ':attribute jest już zajęty.',
	'uploaded' => 'Nie udało się przesłać :attribute.',
	'url' => 'Format :attribute jest nieprawidłowy.',
	'uuid' => ':attribute musi być prawidłowym identyfikatorem UUID.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap our attribute placeholder
	| with something more reader friendly such as "E-Mail Address" instead
	| of "email". This simply helps us make our message more expressive.
	|
	*/

	'attributes' => [],

];
