<?php


class TextInput
{
    protected string $value = '';

    public function add($text): void
    {
        $this->value .= $text;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

class NumericInput extends TextInput
{
    public function add($text): void
    {
        if (ctype_digit($text)) {
            parent::add($text);
        }
    }
}

$input = new NumericInput();
$input->add('1');
$input->add('a');
$input->add('0');
echo $input->getValue();