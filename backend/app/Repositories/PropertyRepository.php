<?php

namespace App\Repositories;

use App\Models\Property;

class PropertyRepository
{
    public function all()
    {
        return Property::all();
    }
}