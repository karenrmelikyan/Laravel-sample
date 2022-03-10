<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UrlResource;
use App\Models\URL;

class UrlController extends Controller
{
    public function index() {
        return UrlResource::collection(Url::all());
    }
}
