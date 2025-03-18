<?php 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Nếu có tham số tìm kiếm
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('users.index', compact('users'));
    }

    public function showadmin($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }
    public function show()
    {
        $user = Auth::user();
        return view('Account.profile', compact('user'));
    }

    public function edit()
    {
        return view('Account.update-profile');
    }

    public function update(Request $request)
    {
        $userId = Auth::id();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $userId,
            'city' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'ward' => 'nullable|string|max:255',
        ]);

        DB::table('users')->where('id', $userId)->update([
            'name' => $request->name,
            'email' => $request->email,
            'thanhpho' => $request->city,
            'quanhuyen' => $request->district,
            'phuongxa' => $request->ward,
            'updated_at' => now(),
        ]);

        return redirect()->route('profile')->with('success', 'Cập nhật tài khoản thành công!');
    }

    public function changePassword()
    {
        return view('Account.update-password');
    }

    public function updatePassword(Request $request)
    {
        $userId = Auth::id();
        $user = DB::table('users')->where('id', $userId)->first();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Mật khẩu cũ không đúng.');
        }

        DB::table('users')->where('id', $userId)->update([
            'password' => Hash::make($request->new_password),
            'updated_at' => now(),
        ]);

        return redirect()->route('profile')->with('success', 'Cập nhật mật khẩu thành công!');
    }
}



?>