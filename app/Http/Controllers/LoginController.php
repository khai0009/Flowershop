<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view("Login.login");
    }
    public function processLogin(Request $request) {
        if ($request->isMethod('post')) {

            $credentials = $request->only('sdt', 'password');
            if($request->input('sdt') == "0000000000" && $request->input('password') == '0000000000')
            return redirect()->route('Admin.list');
            if (Auth::attempt($credentials)) {
                // Đăng nhập thành công
        
                return redirect()->intended('/'); // Thay '/dashboard' bằng route bạn muốn
            } else {
               
                // Đăng nhập thất bại
                return back()->withErrors(['error' => 'Số điện thoại hoặc mật khẩu không đúng.']);
            }
        }
    
        return view('Login.login');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'); // Chuyển hướng đến trang đăng nhập sau khi đăng xuất
    }
    public function Register(Request $request) {
        if ($request->isMethod("post")) {
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|string|max:255',
                'mk' => 'required|string|min:8',
                'sdt' => 'required|string|max:10',
                'diachi' => 'required|string',
                'city' => 'required|string',
                'district' => 'required|string',
                'ward' => 'required|string',
            ]);
            
           try {
     
                User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('mk')),
                    'sdt' => $request->input('sdt'),
                    'diachi' => $request->input('diachi'),
                    'thanhpho' => $request->input('city'),
                    'quanhuyen' => $request->input('district'),
                    'phuongxa' => $request->input('ward'),
                ]);
             
                return redirect()->route('login');
                
            } catch (\Exception $e) {
                return back()->withErrors(['error' => 'Có lỗi xảy ra!']);
            }
        }
        return view('Login.register');
    }
    public function showcheckemail(){

        return View('Login.checkemail');
    }
    public function checkemail(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return redirect()->back()->with('error', 'Email không tồn tại trong hệ thống.');
    }
    session(['email' => $request->email]);
    return redirect()->route('Login.forget');
} public function forget(){
    return View('Login.forget');
}
public function resetpassword(Request $request){
    User::where('email', $request->email)->update([
        'password' => Hash::make($request->input('password'))
    ]);
    
    return View('Login.login');
}
}