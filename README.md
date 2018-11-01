#Sort letters in words by alphabetical order in random string

Examples:
'lemon orange banana apple' ---> 'elmno aegnor aaabnn aelpp'
'лимон апельсин банан яблоко' ---> 'илмно аеилнпсь аабнн бклооя'
'αβγαβγ αβγαβγαβγ' ---> 'ααββγγ αααβββγγγ'

# Usage

$sort = new AlphabeticalSorting();

$result = $sort->alphabeticalSort('lemon orange banana apple');



# Tests

To run the tests in this directory, make sure you've installed the dev dependencies with this command from the top-level directory:

```
composer install
```

Then you can run all tests using `phpunit`.