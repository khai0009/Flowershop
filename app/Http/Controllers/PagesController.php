<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;


class PagesController extends Controller
{   
    private $tongQuantily = 0;
    public function list(){
        return View('Admin.List');
    }
    
    public function trangMoi(): View
    {
        return view('Home.trang-moi');
    }
    public function sort(Request $request)
    {
        $sortOrder = $request->input('sort');

        $duLieu = Product::query();

        if ($sortOrder === 'asc') {
            $duLieu->orderBy('gia', 'asc');
        } elseif ($sortOrder === 'desc') {
            $duLieu->orderBy('gia', 'desc');
        } else {
            $duLieu->orderBy('created_at', 'desc');
        }

        $duLieu = $duLieu->paginate(30)->appends(['sort' => $sortOrder]); // Thêm sort vào query string của phân trang

        $data = [
            'duLieu' => $duLieu,
            'tongQuantily' => $this->tongQuantily, // Đảm bảo $this->tongQuantily được định nghĩa
        ];

        return view('Home.index', $data); // Trả về view đầy đủ
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
        
        
        $duLieu = product::all(); // Lấy tất cả dữ liệu từ model
        return view('Home.index',['tongQuantily' => $this->tongQuantily],compact('duLieu','cloudinary')); // Trả về view và truyền dữ liệu
    }
    public function timKiem(Request $request)
    {   
        
        $tenHoa = $request->input('tenhoa');

        if ($tenHoa) {
            $ketQua = product::where('tenhoa', 'LIKE', '%' . $tenHoa . '%')->get();
            if(count($ketQua) == 0) 
                {$ketQua = product::all();}
        } else {
            $ketQua = product::all(); // Hiển thị tất cả sản phẩm nếu không có tìm kiếm
        }

        return view('Home.index', ['duLieu' => $ketQua],['tongQuantily' => $this->tongQuantily]);
    }
    public function detail($id)
    {   
        
        $sanPham = product::find($id);

        if (!$sanPham) {
            abort(404); // Hiển thị trang 404 nếu không tìm thấy sản phẩm
        }
        $giaSanPham = $sanPham->gia; // Lấy giá của sản phẩm

$duLieu = product::where('gia', '>=', $giaSanPham - 200)
                    ->where('gia', '<=', $giaSanPham + 200)
                    ->get();
        return view('Home.detail', ['sanPham' => $sanPham],['duLieu' => $duLieu]);
    }
}
