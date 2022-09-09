<?php

namespace App\Enum;

enum Status: int
{
    case PROCESS = 1;
    case REJECTED = 2;
    case APPROVED = 3;

    public function label(): string
    {
        return match($this) 
        {
            self::PROCESS => 'Diproses',   
            self::REJECTED => 'Ditolak',   
            self::APPROVED => 'Diterima',   
        };
    }

    public function action(): string
    {
        return match($this) 
        {
            self::PROCESS => 'Proses',   
            self::REJECTED => 'Terima',   
            self::APPROVED => 'Tolak',   
        };
    }

    public static function values(): array
    {
        return array_map(fn(Status $s) => $s->value, self::cases());
    }
}