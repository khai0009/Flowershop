<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;


class PagesController extends Controller
{   
    
    public function trangMoi(): View
    {
        return view('Home.trang-moi');
    }
    public function index(): View
    {   
        $cloudinary = new Cloudinary(
            [
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
                'url' => [
                    'secure' => true,
                ],
            ]
        );
        
        $tongQuantity = 0;
        $duLieu = product::all(); // Lấy tất cả dữ liệu từ model
        return view('Home.index', compact('duLieu','tongQuantity','cloudinary')); // Trả về view và truyền dữ liệu
    }
    public function timKiem(Request $request)
    {   
        $tongQuantity = 0;
        $tenHoa = $request->input('tenhoa');

        if ($tenHoa) {
            $ketQua = product::where('tenhoa', 'LIKE', '%' . $tenHoa . '%')->get();
            if(count($ketQua) == 0) 
                {$ketQua = product::all();}
        } else {
            $ketQua = product::all(); // Hiển thị tất cả sản phẩm nếu không có tìm kiếm
        }

        return view('Home.index', ['duLieu' => $ketQua],compact('tongQuantity'));
    }
    public function detail($id)
    {   
        $tongQuantity = 0;
        $sanPham = product::find($id);

        if (!$sanPham) {
            abort(404); // Hiển thị trang 404 nếu không tìm thấy sản phẩm
        }

        return view('Home.detail', ['sanPham' => $sanPham],compact('tongQuantity'));
    }
}
