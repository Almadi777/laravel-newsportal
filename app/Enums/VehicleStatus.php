<?php

namespace App\Enums;

enum VehicleStatus: int
{
    case Active = 1;

    case InRepair = 2;

    case Sold = 3;

    case NotUsed = 4;
}
