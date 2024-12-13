<?php

namespace App;

enum ActiveStatusEnum: string
{
    case AKTIF = '1';
    case TIDAKAKTIF = '0';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::AKTIF => 'Aktif',
            self::TIDAKAKTIF => 'Tidak Aktif',
        };
    }
}
