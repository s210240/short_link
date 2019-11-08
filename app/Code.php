<?php


namespace App;


class Code
{
    protected $length = 6;

    public function setLength(int $length): self
    {
        $this->length = $length;
        return $this;
    }

    public function generate(): string
    {
        $characters = str_repeat('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', $this->length);
        return substr(str_shuffle($characters), 0, $this->length);
    }
}
