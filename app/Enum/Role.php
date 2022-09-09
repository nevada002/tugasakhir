<?php

namespace App\Enum;

enum Role: int
{
    case AGEN = 1;
    case CUSTOMER_SERVICE = 2;
    case SIGNER = 3;
    case VERIFICATOR = 4;
}