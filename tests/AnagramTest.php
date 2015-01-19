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
        $this->assertFalse($this->anagram->check('',''));
    }

    /** @test */
    public function different_lengths_not_anagrams()
    {
        $this->assertFalse($this->anagram->check('a',''));
    }

    /** @test */
    public function equal_strings_not_anagrams()
    {
        $this->assertFalse($this->anagram->check('a','a'));
    }

    /** @test */
    public function different_strings_not_anagram()
    {
        $this->assertFalse($this->anagram->check('a','b'));
    }

    /** @test */
    public function different_strings_is_anagram()
    {
        $this->assertTrue($this->anagram->check('ab','ba'));
    }

    /** @test */
    public function ignore_case()
    {
        $this->assertTrue($this->anagram->check('aB','bA'));
    }

    /** @test */
    public function ignore_spaces()
    {
        $this->assertTrue($this->anagram->check('Tom Marvolo Riddle','I am Lord Voldemort'));
    }

    /** @test */
    public function more_non_anagrams()
    {
        $this->assertFalse($this->anagram->check('Silent','Nothin'));
        $this->assertFalse($this->anagram->check('Dashed','Salmon'));
        $this->assertFalse($this->anagram->check('idle','cooking'));
    }

    /** @test */
    public function more_anagrams()
    {
        $this->assertTrue($this->anagram->check('Silent','Listen'));
        $this->assertTrue($this->anagram->check('Dashed','Shaded'));
        $this->assertTrue($this->anagram->check('idle','lied'));
    }
}
