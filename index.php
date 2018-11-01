<?php

/*
Задание на позицию Junior PHP Developer

Нужно написать функцию (или класс), которая принимает utf8-текст и возвращает текст, в котором буквы слов отсортированы в алфавитном порядке.

примеры:
'lemon orange banana apple' ---> 'elmno aegnor aaabnn aelpp'
'лимон апельсин банан яблоко' ---> 'илмно аеилнпсь аабнн бклооя'
'αβγαβγ αβγαβγαβγ' ---> 'ααββγγ αααβββγγγ'

Задание на позицию Senior PHP Developer

Сделать тоже самое с дополнительными требованиями:
1. оформить результат как готовый проект на github
2. использовать composer для автозагрузки классов и зависимостей
3. покрыть код unit-тестами
*/

namespace AlphabeticalSorting;

require_once __DIR__ . '/vendor/autoload.php';

$sort = new AlphabeticalSorting();

echo $sort->alphabeticalSort('lemon orange banana apple').'<br>';

echo $sort->alphabeticalSort('лимон апельсин банан яблоко').'<br>';

echo $sort->alphabeticalSort('αβγαβγ αβγαβγαβγ').'<br>';
