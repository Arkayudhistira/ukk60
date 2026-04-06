<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $guarded = [];
    public function buku(){
        return $this->belongsTo(buku::class);
    }
    public function user(){
        return $this->belongsTo(user::class);
    }
}
