<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    protected $table = 'pengunjung';
    protected $guarded = ['id_pengunjung'];

    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member', 'id_member');
    }
}
