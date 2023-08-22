<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;

class Analytics extends Controller
{
    public function index()
    {
        return view('content.dashboard.dashboards-analytics');
    }
    public function admin()
    {
        return view('admin.index');
    }

    public function home()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.dashboard.welcome', ['pageConfigs' => $pageConfigs]);
    }
}
