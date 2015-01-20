<?php

use Martindilling\Anagram\Anagram;

class AnagramTest extends PHPUnit_Framework_TestCase
{
    protected $anagram;

    public function setUp()
    {
        $this->anagram = new Anagram();
    }

    /** @test */
    public function empty_strings_not_anagrams()
    {
        $this->shouldFail('', '');
    }

    /** @test */
    public function different_lengths_not_anagrams()
    {
        $this->shouldFail('a', '');
    }

    /** @test */
    public function equal_strings_not_anagrams()
    {
        $this->shouldFail('a', 'a');
    }

    /** @test */
    public function different_strings_not_anagram()
    {
        $this->shouldFail('a', 'b');
    }

    /** @test */
    public function different_strings_is_anagram()
    {
        $this->shouldPass('ab', 'ba');
    }

    /** @test */
    public function ignore_case()
    {
        $this->shouldPass('aB', 'bA');
    }

    /** @test */
    public function ignore_spaces()
    {
        $this->shouldPass('Tom Marvolo Riddle', 'I am Lord Voldemort');
    }

    /** @test */
    public function more_non_anagrams()
    {
        $this->shouldFail('Silent', 'Nothin');
        $this->shouldFail('Dashed', 'Salmon');
        $this->shouldFail('idle', 'cooking');
    }

    /** @test */
    public function more_anagrams()
    {
        $this->shouldPass('Silent', 'Listen');
        $this->shouldPass('Dashed', 'Shaded');
        $this->shouldPass('idle', 'lied');
    }


    /**
     * Assert the two strings are not anagrams
     *
     * @param string $string1
     * @param string $string2
     */
    private function shouldFail($string1, $string2)
    {
        $this->assertFalse($this->anagram->check($string1, $string2));
    }

    /**
     * Assert the two strings are anagrams
     *
     * @param string $string1
     * @param string $string2
     */
    private function shouldPass($string1, $string2)
    {
        $this->assertTrue($this->anagram->check($string1, $string2));
    }
}
