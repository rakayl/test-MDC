<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['queue_date', 'tiketable_id', 'tiketable_type'];

    public function tiketable()
    {
        return $this->morphTo();
    }
     public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
     public function umum()
    {
        return $this->belongsTo(Umum::class);
    }
    public function anak()
    {
        return $this->belongsTo(Anak::class);
    }
    public function gigi_mulut()
    {
        return $this->belongsTo(GigiMulut::class);
    }
    public function obgyn()
    {
        return $this->belongsTo(Obgyn::class);
    }
    public function penyakit_dalam()
    {
        return $this->belongsTo(PenyakitDalam::class);
    }
    public function saraf()
    {
        return $this->belongsTo(Saraf::class);
    }
    public function tht()
    {
        return $this->belongsTo(Tht::class);
    }
    public function jantung()
    {
        return $this->belongsTo(Jantung::class);
    }
    public function mata()
    {
        return $this->belongsTo(Mata::class);
    }
}
