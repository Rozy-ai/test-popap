<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Popapa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return redirect()->route('popapas.index');
    }
}
