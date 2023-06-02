<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, "id_user");
    }

    public function wisata(){
        return $this->belongsTo(Tour::class, "id_tipe");
    }

    public function restoran(){
        return $this->belongsTo(Restoran::class, "id_tipe");
    }
}
