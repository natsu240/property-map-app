<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PropertyRepository;

class PropertyController extends Controller
{
    protected $property_repository;

    public function __construct(PropertyRepository $property_repository)
    {
        $this->property_repository = $property_repository;
    }

    public function getProperties()
    {
        $properties = $this->property_repository->all();
        return response()->json($properties);
    }
}