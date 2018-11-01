<?php

namespace tests\unit;

use AlphabeticalSorting\AlphabeticalSorting;
use ReflectionClass;

class AlphabeticalSortingTest extends \PHPUnit\Framework\TestCase {

    protected $sortingClass;

    protected function setUp() {

        $this->sortingClass = new AlphabeticalSorting();
    }

    protected static function callMethod($obj, $name, array $args) {

        $class = new ReflectionClass($obj);
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method->invokeArgs($obj, $args);
    }

    /**
     * @dataProvider alphabeticalSortProvider
     */
    public function testAlphabeticalSort($string, $sortString) {

        $this->assertSame($this->sortingClass->alphabeticalSort($string), $sortString);
    }

    public function alphabeticalSortProvider() {

        return [
            ['lemon orange banana apple', 'elmno aegnor aaabnn aelpp'],
            ['лимон апельсин банан яблоко', 'илмно аеилнпсь аабнн бклооя'],
            ['αβγαβγ αβγαβγαβγ', 'ααββγγ αααβββγγγ']
        ];

    }

    /**
     * @dataProvider preparePatternArrProvider
     */
    public function testPreparePatternArr($arrString, $arrStringPattern) {

        $result = self::callMethod(
            $this->sortingClass,
            'preparePatternArr',
            [$arrString]
        );

        $this->assertSame($result, $arrStringPattern);
    }

    public function preparePatternArrProvider() {

        return [
            [
                ['lemon'], ['/lemon/'],
                ['апельсин'], ['/апельсин/'],
                ['αβγαβγαβγ'], ['/αβγαβγαβγ/'],
            ]
        ];

    }

    /**
     * @dataProvider replacementArrProvider
     */
    public function testReplacementArr($string, $sortString, $notSortArrString, $sortArrString) {

        $result = self::callMethod(
            $this->sortingClass,
            'replacementArr',
            [$string, $notSortArrString, $sortArrString]
        );

        $this->assertSame($result, $sortString);
    }

    public function replacementArrProvider() {

        return [
            [
                'lemon orange banana apple',
                'elmno aegnor aaabnn aelpp',
                ['/lemon/', '/orange/', '/banana/', '/apple/'],
                ['elmno', 'aegnor', 'aaabnn', 'aelpp'],
            ]
        ];

    }

    /**
     * @dataProvider sortKeywordsProvider
     */
    public function testSortKeywords($notSortArrString, $sortArrString) {

        $result = self::callMethod(
            $this->sortingClass,
            'sortKeywords',
            [$notSortArrString]
        );

        $this->assertSame($result, $sortArrString);
    }

    public function sortKeywordsProvider() {

        return [
            [
                ['lemon', 'orange', 'banana', 'apple'],
                ['elmno', 'aegnor', 'aaabnn', 'aelpp']
            ]
        ];

    }

    /**
     * @dataProvider explodeStringProvider
     */
    public function testExplodeString($string, $explodeString) {

        $result = self::callMethod(
            $this->sortingClass,
            'explodeString',
            [$string]
        );

        $this->assertSame($result, $explodeString);
    }

    public function explodeStringProvider() {

        return [
            [
                'lemon orange banana apple',
                ['lemon', 'orange', 'banana', 'apple']
            ]
        ];

    }

    /**
     * @dataProvider explodeKeywordProvider
     */
    public function testExplodeKeyword($keyword, $keywordArr) {

        $result = self::callMethod(
            $this->sortingClass,
            'explodeKeyword',
            [$keyword]
        );

        $this->assertSame($result, $keywordArr);
    }

    public function explodeKeywordProvider() {

        return [
            [
                'апельсин',
                ['а', 'п', 'е', 'л', 'ь', 'с', 'и', 'н']
            ]
        ];

    }

    /**
     * @dataProvider sortArrayProvider
     */
    public function testSortArray($arrString, $sortArrString) {

        $result = self::callMethod(
            $this->sortingClass,
            'sortArray',
            [$arrString, $sortArrString]
        );

        $this->assertSame($result, $sortArrString);
    }

    public function sortArrayProvider() {

        return [
            [
                ['б', 'а', 'н', 'а', 'н'],
                ['а', 'а', 'б', 'н', 'н']
            ]
        ];

    }

}
