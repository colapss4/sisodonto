<?php

namespace App\Services;

class CPFService
{
    private $value;

    private $blacklist = [
        '00000000000',
        '11111111111',
        '22222222222',
        '33333333333',
        '44444444444',
        '55555555555',
        '66666666666',
        '77777777777',
        '88888888888',
        '99999999999'
    ];

    public function __construct($value = null)
    {
        if ($value) $this->value = $this->setValue($value);
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = (string) preg_replace('/[^0-9]/', '', $value);
        return $this;
    }

    public function isValid()
    {
        if (strlen($this->value) != 11) return false;

        if (in_array($this->value, $this->blacklist)) return false;

        // Validate first check digit
        for ($i = 0, $j = 10, $sum = 0; $i < 9; $i++, $j--) {
            $sum += $this->value[$i] * $j;
        }

        $result = $sum % 11;

        if ($this->value[9] != ($result < 2 ? 0 : 11 - $result)) {
            return false;
        }

        // Validate first second digit
        for ($i = 0, $j = 11, $sum = 0; $i < 10; $i++, $j--) {
            $sum += $this->value[$i] * $j;
        }

        $result = $sum % 11;

        return $this->value[10] == ($result < 2 ? 0 : 11 - $result);
    }

    public function getValueFormatted()
    {
        if (!$this->isValid()) return false;

        $result  = substr($this->value, 0, 3) . '.';
        $result .= substr($this->value, 3, 3) . '.';
        $result .= substr($this->value, 6, 3) . '-';
        $result .= substr($this->value, 9, 2) . '';

        return $result;
    }
}
