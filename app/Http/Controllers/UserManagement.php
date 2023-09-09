<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Redirect;

class UserManagement extends Controller
{
    /**
     * Redirect to user-management view.
     *
     */
    public function UserManagement()
    {
        $users = User::all();
        $userCount = $users->count();
        $verified = User::whereNotNull('email_verified_at')
            ->get()
            ->count();
        $notVerified = User::whereNull('email_verified_at')
            ->get()
            ->count();
        $usersUnique = $users->unique(['email']);
        $userDuplicates = $users->diff($usersUnique)->count();

        return view('content.laravel-example.user-management', [
            'totalUser' => $userCount,
            'verified' => $verified,
            'notVerified' => $notVerified,
            'userDuplicates' => $userDuplicates,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $columns = [
            1 => 'id',
            2 => 'name',
            3 => 'email',
            4 => 'email_verified_at',
        ];

        $search = [];

        $totalData = User::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $users = User::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $users = User::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = User::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($users)) {
            // providing a dummy id instead of database ids
            $ids = $start;

            foreach ($users as $user) {
                $nestedData['id'] = $user->id;
                $nestedData['fake_id'] = ++$ids;
                $nestedData['name'] = $user->name;
                $nestedData['email'] = $user->email;
                $nestedData['email_verified_at'] = $user->email_verified_at;

                $data[] = $nestedData;
            }
        }

        if ($data) {
            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => intval($totalData),
                'recordsFiltered' => intval($totalFiltered),
                'code' => 200,
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'message' => 'Internal Server Error',
                'code' => 500,
                'data' => [],
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userID = $request->id;

        if ($userID) {
            // update the value
            $users = User::updateOrCreate(['id' => $userID], ['name' => $request->name, 'email' => $request->email]);

            // user updated
            return response()->json('Updated');
        } else {
            // create new one if email is unique
            $userEmail = User::where('email', $request->email)->first();

            if (empty($userEmail)) {
                $users = User::updateOrCreate(
                    ['id' => $userID],
                    ['name' => $request->name, 'email' => $request->email, 'password' => bcrypt(Str::random(10))]
                );

                // user created
                return response()->json('Created');
            } else {
                // user already exist
                return response()->json(['message' => 'already exits'], 422);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = ['id' => $id];

        $users = User::where($where)->first();

        return response()->json($users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::where('id', $id)->delete();
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.logout', ['pageConfigs' => $pageConfigs]);

    }

    public function LoginBasic()
    {

        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.auth-login-basic', ['pageConfigs' => $pageConfigs]);
    }

    public function loginPost(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user_id = auth::user()->id;

            $user = User::find($user_id);

            if ($user->role == "vendor") {
                if ($user->status == 2) {
                    return redirect()->route('vendor.dashboard');
                } else {
                    return redirect()->route('vendor.confirmation', ["id" => $user->id]);
                }

            }
            if ($user->role == "partner") {
                if ($user->status == 2) {
                    return redirect()->route('partner.dashboard');
                } else {

                    return redirect()->route('partner.confirmation', ["id" => $user->id]);
                }
            }
            if ($user->role == "admin") {
                return redirect()->intended('admin')
                    ->withSuccess('Signed in');
            }

        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function userApprove($id)
    {
        $user = User::find($id);
        $user->status = 2;
        $user->save();
        return redirect()->back()->with('message', $user->first_name . " " . 'approved successfully');

    }

    public function productsDatatable()
    {

        $products = Product::all();
        $data = ["data" => $products];

        $encoded_data = json_encode($data);

        Storage::disk('tmp')->put('products-list.json', $encoded_data);

        return view('content.tables.products-advanced');

    }

    public function CheckEmailExists(Request $request)
    {
        $objUser = User::where('email', $request->email)->first();

        if ($objUser->id ?? 0) {
            return response()->json(['bReturn' => true, "sMessage" => "Email Already Exists !..."]);
        } else {
            return response()->json(['bReturn' => false, "sMessage" => "Email not exists !..."]);
        }

    }

    public function googleLogin()
    {
        return Socialite::driver('google')->stateless()->redirect();

    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();

            $finduser = User::where('platform_token', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                if ($finduser->role == 'vendor') {
                    return Redirect::to('auth/vendor-confirmation?id=' . $finduser->id);

                }
                if ($finduser->role == 'partner') {
                    return Redirect::to('auth/partner-confirmation?id=' . $finduser->id);

                } else {
                    return Redirect::to('login');
                }

            } else {
                $newUser = User::create([
                    'first_name' => $user->user['given_name'],
                    'last_name' => $user->user['family_name'],
                    'email' => $user->email,
                    'platform_token' => $user->id,
                    'password' => encrypt('123456dummy'),
                ]);
                Auth::login($newUser);

                return Redirect::to('login');

            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

}
