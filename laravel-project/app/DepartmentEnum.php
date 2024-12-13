<?php

namespace App;

enum DepartmentEnum: string
{
    case SIPIL = '1';
    case INDUSTRI = '2';
    case INFORMATIKA = '3';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SIPIL => 'Teknik Sipil',
            self::INDUSTRI => 'Teknik Industri',
            self::INFORMATIKA => 'Teknik Informatika',
        };
    }

    public function getAlias(): ?string
    {
        return match ($this) {
            self::SIPIL => 'SI',
            self::INDUSTRI => 'TI',
            self::INFORMATIKA => 'IF',
        };
    }
}
