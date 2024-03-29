<?php

class Song
{
    public ?string $name = null;
    public ?string $author = null;
    public ?int $length = null;
    public ?string $album = null;


    /**
     * return length of the song in m:ss format
     */
    public function getLengthFormatted() : string
    {
        return
            floor($this->length / 60)
            . ':'
            . ($this->length % 60 < 10 ? '0' : '')
            . $this->length % 60;
    }
}