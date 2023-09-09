<?php

namespace App\Http\Controllers\AdminPanel\Piepz;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PiepzController extends Controller
{
    //

    public function index()
    {
        return view('admin.piepz.index');
    } // End Method

    public function packages()
    {
        $packages = Package::get();
        $pack = Package::whereNot('package_title', "Free")->get();
        return view('admin.piepz.packages', ['packages' => $packages, 'pack' => $pack]);
    } // End Method

    public function updatepackage($id)
    {
        $package = Package::find($id);
        return view('admin.piepz.update-package', ['package' => $package]);
    }

    public function updatePackage1(Request $request)
    {

        $id = $request->id;
        $package = Package::find($id);
        $package->package_title = $request->name;
        $package->package_price = $request->price;
        $package->package_description = $request->description;
        $package->duration_price = $request->discount_price;
        $package->save();

        return response()->json(['success' => 'Successfully']);
    }
    public function addons()
    {
        return view('admin.piepz.addons');
    } // End Method

    public function marketplaces()
    {
        return view('admin.piepz.marketplaces');
    } // End Method

    public function functionalities()
    {
        return view('admin.piepz.functionalities');
    } // End Method

    public function store()
    {
        return view('admin.piepz.store');
    } // End Method
}
