<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // Define the table name if different from the model name
    protected $table = 'suppliers';

    // Allow mass assignment on these fields
    protected $fillable = [
        'name',
        'contact_person',
        'email',
        'phone',
        'address',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
