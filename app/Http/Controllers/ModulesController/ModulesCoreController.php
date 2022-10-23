<?php
namespace App\Http\Controllers\ModulesController;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ModulesCoreController extends Controller
{

    public function index()
    {
        return Post::all();

    }
}
