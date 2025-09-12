<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $fillable = [
        'queue_date',
        'number',
        'no_queue',
        'status',
        'called_at',
        'served_at',
        'pendaftaran_id',
        'user_id'
        ];
    protected $casts = [
        'queue_date' => 'date',
        'called_at'  => 'datetime',
        'served_at'  => 'datetime',
    ];
    public function tiket()
    {
        return $this->morphOne(Tiket::class, 'tiketable');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
