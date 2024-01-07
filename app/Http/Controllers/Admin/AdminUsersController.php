<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequestValidation;
use Illuminate\Support\Facades\Route;
use App;
use Hash;
use Auth;
use Session;
use App\Models\SuperAdmin;
class AdminUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admin = Auth::user();
        $users = SuperAdmin::all();
        return view('SuperAdmin.list_of_admins')->with([
        'admin' => $admin,
        'admins' => $users,
        ]);
    }

    public function addAdmin(UsersRequestValidation $request)
    {
        $newAdmin = App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        ]);
        $newAdmin->save();
        Session::flash('success', 'Your New Admin Account has been created successfully');
        return redirect()->back();
    }

    public function updateAdminPassword(Request $request)
    {
        $admin = Auth::user();
        $currentpass = $request->current_password;
        $new = $request->new_password;
        $admin->email = $request->new_email;
        $confirm = $request->confirm_password;
        if (Hash::check($currentpass, $admin->password) && $new == $confirm) {
            $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:5',
            ]);
            $admin->password = bcrypt($request->new_password);
            $admin->save();
            Session::flash('success', 'Your Password Has Been Changed successfully');
            return redirect()->back();
        } else {
            Session::flash('danger', 'Please Enter a Valid Password');
            return redirect()->back();
        }
    }


    public function deleteAdmin($id)
    {
        $admin = App\Models\User::find($id);
        $admin->delete();
        Session::flash('success', 'This Admin had been Deleted successfully.');
        return redirect()->route('ad_list_admins');
    }
}
