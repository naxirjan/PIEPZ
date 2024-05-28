<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PurchasePackageAddon;
use App\Models\PurchasePackageFunctionality;
use App\Models\PurchasePackageMarketplace;
use Illuminate\Http\Request;

class PiepzController extends Controller
{
    //

    public function index()
    {
        return view("admin.piepz.index");
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

// All addons functions below

    public function addons()
    {
        return view('admin.piepz.addons');
    } // End Method

    // function for change addon status 0 or 1
    public function addonStatus(Request $request)
    {
        $id = $request["checkboxValue"];
        $function = PurchasePackageAddon::where('id', $id)->first();
        $function->toggleIsActive()->save();
        return response()->json(['success' => 'Successfully']);
    }

    // function for add new addon for package

    public function addAddon(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'price' => 'required',
        ]);

        $addon = new PurchasePackageAddon;
        $addon->title = $request->title;
        $addon->price = $request->price;
        $addon->save();

        return redirect()->back()->with('added', 'New addon added successfully...');

    }
    // edit addon page riderct
    public function editAddon(Request $request)
    {
        $id = $request->id;
        $data = PurchasePackageAddon::find($id);

        return view('admin.piepz.edit-addon', ["data" => $data]);
    } // End Method

    // update addon function
    public function updateAddon(Request $request)
    {

        $validated = $request->validate([
            'addon_name' => 'required',
            'addon_price' => 'required',
        ]);

        $addon = PurchasePackageAddon::find($request->id);
        $addon->title = $request->addon_name;
        $addon->price = $request->addon_price;
        $addon->save();

        return redirect()->back()->with('added', 'addon update successfully...');

    } // End Method

    // All marketplace function below

    public function marketplaces()
    {
        return view('admin.piepz.marketplaces');
    } // End Method

    // function for add new addon for package

    public function addMarketplace(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'price' => 'required',
        ]);

        $addon = new PurchasePackageMarketplace;
        $addon->title = $request->title;
        $addon->price = $request->price;
        $addon->type = "Single Payment";
        $addon->save();

        return redirect()->back()->with('added', 'New Market added successfully...');

    }
    // edit marketplace page
    public function editMarketplace(Request $request)
    {
        $id = $request->id;
        $data = PurchasePackageMarketplace::find($id);

        return view('admin.piepz.edit-marketplace', ["data" => $data]);
    } // End Method

    // update marketplace
    public function updateMarketplace(Request $request)
    {

        $validated = $request->validate([
            'marketplace_name' => 'required',
            'marketplace_price' => 'required',
        ]);

        $marketplace = PurchasePackageMarketplace::find($request->id);
        $marketplace->title = $request->marketplace_name;
        $marketplace->price = $request->marketplace_price;
        $marketplace->save();

        return redirect()->back()->with('added', 'marketplace update successfully...');

    } // End Method

    // function for change marketplace status 0 or 1
    public function marketplaceStatus(Request $request)
    {
        $id = $request["checkboxValue"];
        $function = PurchasePackageMarketplace::where('id', $id)->first();
        $function->toggleIsActiveM()->save();
        return response()->json(['success' => 'Successfully']);
    }

    // Functionality functions start

    public function functionalities()
    {
        return view('admin.piepz.functionalities');
    } // End Method

    // add new functionality
    public function addFunctionality(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'price' => 'required',
        ]);

        $addon = new PurchasePackageFunctionality;
        $addon->title = $request->title;
        $addon->price = $request->price;
        $addon->type = "Single Payment";
        $addon->save();

        return redirect()->back()->with('added', 'New Functionality added successfully...');

    }

    // edit functionality page
    public function editFunctionality(Request $request)
    {
        $id = $request->id;
        $data = PurchasePackageFunctionality::find($id);

        return view('admin.piepz.edit-functionality', ["data" => $data]);
    } // End Method

    //update addFunctionality function
    public function updateFunctionality(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
            'price' => 'required',
        ]);

        $Fnc = PurchasePackageFunctionality::find($request->id);
        $Fnc->title = $request->title;
        $Fnc->price = $request->price;
        $Fnc->save();

        return redirect()->back()->with('added', 'Functionality update successfully...');

    } // End Method

    // function for change marketplace status 0 or 1
    public function fncStatus(Request $request)
    {
        $id = $request["checkboxValue"];
        $function = PurchasePackageFunctionality::where('id', $id)->first();
        $function->toggleIsActiveF()->save();
        return response()->json(['success' => 'Successfully']);
    }

    public function store()
    {
        return view('admin.piepz.store');
    } // End Method
}
