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
        
                'email' => 'required|string|email|max:255',
                'mk' => 'required|string|min:8',
                'sdt' => 'required|string',
                'diachi' => 'required|string',
                'city' => 'required|string',
                'district' => 'required|string',
                'ward' => 'required|string',
            ]);
            
           try {
                $user = new User();
                User::create([
                    'name' => $request->input('sdt'),
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
}