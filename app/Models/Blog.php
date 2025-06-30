<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    
    protected $fillable = [
        'title', 
        'description', 
        'content',
        'image'
    ];

    // Nonaktifkan updated_at karena tidak ada di database
    public $timestamps = false;
    
    // Set kolom created_at
    const CREATED_AT = 'created_at';
    
    // Format tanggal
    protected $casts = [
        'created_at' => 'datetime',
    ];
    
    // Accessor untuk format tanggal yang lebih readable
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at ? $this->created_at->format('d M Y') : null;
    }
    
    // Accessor untuk excerpt description
    public function getExcerptAttribute()
    {
        return strlen($this->description) > 100 ? 
               substr($this->description, 0, 100) . '...' : 
               $this->description;
    }
}