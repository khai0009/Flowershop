<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;

    protected $fillable = ['Ngaygiao','Tongcong', 'Thanhtoan', 'Diachi','Pttt','user_id'];
    protected $primaryKey = 'Mahd';
    public $incrementing = true;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
?>