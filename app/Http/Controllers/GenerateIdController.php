<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class GenerateIdController extends Controller
{
    public function getUniqueId(){
        return Uuid::generate()->string;
    }

}
