<?php

namespace App\Enum;

enum Jabatan: int
{
    case SUPERVISOR_PERENCANAAN = 1;
    case SUPERVISOR_USAHA = 2;
    case MANAGER_PROPERTI = 3;
    case MANAGER_KOMERSIAL = 4;
    case MANAGER_ADM = 5;
    case MANAGER_SI = 6;
    case MANAGER_PERBENDAHARAAN = 7;

    public function label(): string
    {
        return match($this) 
        {
            self::SUPERVISOR_PERENCANAAN => 'Supervisor Perencanaan Pemanduan & Penundaan',
            self::SUPERVISOR_USAHA => 'Supervisor Aneka Usaha',
            self::MANAGER_PROPERTI => 'Manager Properti',
            self::MANAGER_KOMERSIAL => 'Manager Komersial',
            self::MANAGER_ADM => 'Manager Adm. Kepanduan, Komunikasi & Prasarana Pemanduan',
            self::MANAGER_SI => 'Manager Sistem Infomasi',
            self::MANAGER_PERBENDAHARAAN => 'Manager Perbendaharaan',
        };
    }

    public static function values(): array
    {
        return array_map(fn(Jabatan $s) => $s->value, self::cases());
    }
}