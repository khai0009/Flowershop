<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;

    protected $fillable = ['Ngaygiao','Tongcong', 'Thanhtoan','Status', 'Diachi','Pttt','user_id','Dathang'];
    protected $primaryKey = 'Mahd';
    public $incrementing = true;

    public function carts()
    {
        return $this->hasMany(Cart::class, 'cart_id', 'Mahd');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
?>