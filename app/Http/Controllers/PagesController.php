<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class PagesController extends Controller
{
    public function list()
    {
        return View('Admin.List');
    }

    public function trangMoi(): View
    {
        return view('Home.trang-moi');
    }

    public function sort(Request $request)
    {
        $sortOrder = $request->input('sort');
        $products = Product::query();

        $products->when($sortOrder === 'asc', function ($query) {
            $query->orderBy('gia', 'asc');
        })->when($sortOrder === 'desc', function ($query) {
            $query->orderBy('gia', 'desc');
        }, function ($query) {
            $query->orderBy('created_at', 'desc');
        });

        $products = $products->paginate(15)->appends(['sort' => $sortOrder]);

        return view('Home.index', compact('products'));
    }

    public function index(Request $request): View
    {
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
            'url' => [
                'secure' => true,
            ],
        ]);

        $products = Product::paginate(15); // Phân trang ngay cả khi không có tham số

        return view('Home.index', compact('products', 'cloudinary'));
    }

    public function timKiem(Request $request)
    {
        $tenHoa = $request->input('tenhoa');

        if ($tenHoa) {
            $products = Product::where('tenhoa', 'LIKE', '%' . $tenHoa . '%')->paginate(15); // Phân trang kết quả tìm kiếm
            if ($products->isEmpty()) {
                $products = Product::paginate(15); // Hiển thị tất cả sản phẩm nếu không tìm thấy
            }
        } else {
            $products = Product::paginate(15); // Hiển thị tất cả sản phẩm nếu không có tìm kiếm
        }

        return view('Home.index', compact('products'));
    }

    public function detail($id)
    {
        $sanPham = Product::find($id);

        if (!$sanPham) {
            abort(404);
        }

        $giaSanPham = $sanPham->gia;

        $products = Product::where('gia', '>=', $giaSanPham - 200)
            ->where('gia', '<=', $giaSanPham + 200)
            ->get();

        return view('Home.detail', compact('sanPham', 'products'));
    }
}