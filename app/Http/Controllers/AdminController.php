<?php namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class AdminController extends Controller
{   
   
    public function index(Request $request)
    {
        $query = Product::query();
        
        if ($request->search) {
            $query->where('tenhoa', 'like', '%' . $request->search . '%')
                  ->orWhere('soluong', 'like', '%' . $request->search . '%');
        }
        
        if ($request->category && $request->category !== 'all') {
            $query->where('soluong', $request->category);
        }
        
        $products = $query->get();

        
        return view('Admin.index', compact('products'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:255', // Sẽ được thay bằng 'tenhoa'
        'Image' => 'required', // Sẽ được thay bằng 'hinhanh'
        'price' => 'required|numeric|min:0', // Sẽ được thay bằng 'gia'
        'stock' => 'required|integer|min:0', // Sẽ được thay bằng 'soluong'
        'Describe' => 'required', // Thêm validation cho 'Describe'
    ]);

    $validated['status'] = $validated['stock'] > 0
        ? ($validated['stock'] <= 10 ? 'Low Stock' : 'In Stock')
        : 'Out of Stock';

    Product::create([
        'tenhoa' => $validated['name'],
        'hinhanh' => $validated['Image'],
        'mieuta' => $validated['Describe'],
        'soluong' => $validated['stock'],
        'gia' => $validated['price'],
        'status' => $validated['status'], 
    ]);

    return redirect()->route('Admin.index')
        ->with('success', 'Product created successfully.');
}

public function update(Request $request, $id)
{   

    $validated = $request->validate([
        'name' => 'required|max:255', // Sẽ được thay bằng 'tenhoa'
        'Image' => 'required', // Sẽ được thay bằng 'hinhanh'
        'price' => 'required|numeric|min:0', // Sẽ được thay bằng 'gia'
        'stock' => 'required|integer|min:0', // Sẽ được thay bằng 'soluong'
        'Describe' => 'required', // Thêm validation cho 'Describe'
    ]);

    $validated['status'] = $validated['stock'] > 0
        ? ($validated['stock'] <= 10 ? 'Low Stock' : 'In Stock')
        : 'Out of Stock';
    $product = Product::find($id);
    $product->update([
        'tenhoa' => $validated['name'],
        'hinhanh' => $validated['Image'],
        'mieuta' => $validated['Describe'],
        'soluong' => $validated['stock'],
        'gia' => $validated['price'],
        'status' => $validated['status'],
       
    ]);

    return redirect()->route('Admin.index')
        ->with('success', 'Product updated successfully.');
}

    public function destroy(Product $product,$id)
    {   
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('Admin.index')
            ->with('success', 'Product deleted successfully.');
    }
}?>