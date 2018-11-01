<?php

namespace AlphabeticalSorting;

/**
 * Class AlphabeticalSorting
 * @package AlphabeticalSorting
 * @author  Roman Shipelov <theship87@gmail.com>
 */
class AlphabeticalSorting {

    /**
     * Alphabetical string sorting
     *
     * @param string $string
     *
     * @return null|string|string[]
     */
    public function alphabeticalSort(string $string) {

        $arrString = $this->explodeString($string);

        $sortStringArr = $this->sortKeywords($arrString);

        $notSortArrString = $this->preparePatternArr($arrString);

        $sortString = $this->replacementArr($string, $notSortArrString, $sortStringArr);

        return $sortString;
    }

    /**
     * Prepare an array of patterns
     *
     * @param array $arrString
     *
     * @return array
     */
    private function preparePatternArr(array $arrString) {

        $patternArr = [];
        foreach ($arrString as $value) {
            $patternArr[] = '/' . $value . '/';
        }

        return $patternArr;
    }

    /**
     * Replace with sorted words
     *
     * @param string $string
     * @param array  $notSortArrString
     * @param array  $sortStringArr
     *
     * @return null|string|string[]
     */
    private function replacementArr(string $string, array $notSortArrString, array $sortArrString) {

        return preg_replace(array_reverse($notSortArrString), array_reverse($sortArrString), $string);
    }

    /**
     * Sort letters in a word
     *
     * @param $arrString
     *
     * @return array
     */
    private function sortKeywords(array $arrString) {

        $sortStringArr = [];

        foreach ($arrString as $word) {

            $explodeKeyword = $this->explodeKeyword($word);
            $sortExplodeKeyword = $this->sortArray($explodeKeyword);
            $sortStringArr[] = implode($sortExplodeKeyword);
        }

        return $sortStringArr;
    }

    /**
     * Slice words from string
     *
     * @param string $string
     *
     * @return array[]|false|string[]
     */
    private function explodeString(string $string) {

        return preg_split("/[\s,]+/", $string);
    }

    /**
     * Slice letters from the word
     *
     * @param string $keyword
     *
     * @return array[]|false|string[]
     */
    private function explodeKeyword(string $keyword) {

        return preg_split('//u', $keyword, -1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * Sort array in alphabet order
     *
     * @param array $arrString
     *
     * @return array
     */
    private function sortArray(array $arrString) {

        sort($arrString, SORT_LOCALE_STRING);

        return $arrString;
    }

}

