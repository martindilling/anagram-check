<?php namespace Martindilling\Anagram;

class Anagram
{

    /**
     * Check if two strings are anagrams.
     *
     * @param string $s1
     * @param string $s2
     * @return bool
     */
    public function check($s1, $s2)
    {
        $s1 = $this->sanitize($s1);
        $s2 = $this->sanitize($s2);

        if ($s1 === $s2) {
            return false;
        }

        if (!$this->containsExactlySameCharacters($s1, $s2)) {
            return false;
        }

        return true;
    }

    /**
     * Sanitize a string.
     *  - to lowercase
     *  - strip all spaces
     *
     * @param string $string
     * @return string
     */
    private function sanitize($string)
    {
        $lowercase = mb_strtolower($string);
        $noSpaces = str_replace(' ', '', $lowercase);

        return $noSpaces;
    }

    /**
     * Does two strings contain exactly the same characters.
     * Not necessary in the same order.
     *
     * @param string $string1
     * @param string $string2
     * @return bool
     */
    private function containsExactlySameCharacters($string1, $string2)
    {
        $array1 = $this->stringToSortedArray($string1);
        $array2 = $this->stringToSortedArray($string2);

        return $array1 === $array2;
    }

    /**
     * Split characters in a string into a sorted array.
     *
     * @param string $string
     * @return array
     */
    private function stringToSortedArray($string)
    {
        $array = str_split($string);
        sort($array);

        return $array;
    }

}
