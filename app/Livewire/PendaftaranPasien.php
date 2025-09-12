<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Umum;
use App\Models\Anak;
use App\Models\GigiMulut;
use App\Models\Obgyn;
use App\Models\PenyakitDalam;
use App\Models\Saraf;
use App\Models\Tht;
use App\Models\Jantung;
use App\Models\Mata;

class PendaftaranPasien extends Component
{
    public $poli,$queue_date,$queueActive;
    
    public function save()
    {
        $this->validate([
            'queue_date' => 'required|date|after_or_equal:today',
            'poli' => 'required|string',
        ]);

        if($this->poli == 'umum'){
                $check = Umum::whereDate('queue_date', $this->queue_date)
                        ->where('user_id',Auth::id())->first();
                if($check){
                    $this->queueActive = $check;
                }else{
                    $lastNumber = Umum::whereDate('queue_date', $this->queue_date)->max('number');
                    $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                    // Simpan antrian
                    $queue = Umum::create([
                        'queue_date'=>$this->queue_date,
                        'number'=>$nextNumber,
                        'no_queue'=>'U'.$nextNumber,
                        'status'     => 'waiting',
                        'user_id'=>Auth::user()->id
                    ]);
                    $this->queueActive = $queue;
                }
                
            }elseif($this->poli == 'anak'){
                $check = Anak::whereDate('queue_date', $this->queue_date)
                        ->where('user_id',Auth::id())->first();
                if($check){
                    $this->queueActive = $check;
                }else{
                $lastNumber = Anak::whereDate('queue_date', $this->queue_date)->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = Anak::create([
                    'queue_date'=>$this->queue_date,
                    'number'=>$nextNumber,
                    'no_queue'=>'A'.$nextNumber,
                    'status'     => 'waiting',
                    'user_id'=>Auth::user()->id
                ]);
                
                $this->queueActive = $queue;
                }
            }elseif($this->poli == 'gigi_mulut'){
                $check = GigiMulut::whereDate('queue_date', $this->queue_date)
                        ->where('user_id',Auth::id())->first();
                if($check){
                    $this->queueActive = $check;
                }else{
                $lastNumber = GigiMulut::whereDate('queue_date', $this->queue_date)->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = GigiMulut::create([
                    'queue_date'=>$this->queue_date,
                    'number'=>$nextNumber,
                    'no_queue'=>'G'.$nextNumber,
                    'status'     => 'waiting',
                    'user_id'=>Auth::user()->id
                ]);
                $this->queueActive = $queue;
                }
            }elseif($this->poli == 'obgyn'){
                $check = Obgyn::whereDate('queue_date', $this->queue_date)
                        ->where('user_id',Auth::id())->first();
                if($check){
                    $this->queueActive = $check;
                }else{
                $lastNumber = Obgyn::whereDate('queue_date', $this->queue_date)->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = Obgyn::create([
                    'queue_date'=>$this->queue_date,
                    'number'=>$nextNumber,
                    'no_queue'=>'O'.$nextNumber,
                    'status'     => 'waiting',
                    'user_id'=>Auth::user()->id
                ]);
                $this->queueActive = $queue;
                }
            }elseif($this->poli == 'penyakit_dalam'){
                $check = PenyakitDalam::whereDate('queue_date', $this->queue_date)
                        ->where('user_id',Auth::id())->first();
                if($check){
                    $this->queueActive = $check;
                }else{
                $lastNumber = PenyakitDalam::whereDate('queue_date', $this->queue_date)->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = PenyakitDalam::create([
                    'queue_date'=>$this->queue_date,
                    'number'=>$nextNumber,
                    'no_queue'=>'P'.$nextNumber,
                    'status'     => 'waiting',
                    'user_id'=>Auth::user()->id
                ]);
                $this->queueActive = $queue;
                }
            }elseif($this->poli == 'saraf'){
                $check = Saraf::whereDate('queue_date', $this->queue_date)
                        ->where('user_id',Auth::id())->first();
                if($check){
                    $this->queueActive = $check;
                }else{
                $lastNumber = Saraf::whereDate('queue_date', $this->queue_date)->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = Saraf::create([
                    'queue_date'=>$this->queue_date,
                    'number'=>$nextNumber,
                    'no_queue'=>'S'.$nextNumber,
                    'status'     => 'waiting',
                    'user_id'=>Auth::user()->id
                ]);
                $this->queueActive = $queue;
                }
            }elseif($this->poli == 'tht'){
               $check = Tht::whereDate('queue_date', $this->queue_date)
                        ->where('user_id',Auth::id())->first();
                if($check){
                    $this->queueActive = $check;
                }else{
                $lastNumber = Tht::whereDate('queue_date', $this->queue_date)->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = Tht::create([
                    'queue_date'=>$this->queue_date,
                    'number'=>$nextNumber,
                    'no_queue'=>'T'.$nextNumber,
                    'status'     => 'waiting',
                    'user_id'=>Auth::user()->id
                ]);
                $this->queueActive = $queue;
                }
            }elseif($this->poli == 'jantung'){
                 $check = Jantung::whereDate('queue_date', $this->queue_date)
                        ->where('user_id',Auth::id())->first();
                if($check){
                    $this->queueActive = $check;
                }else{
                $lastNumber = Jantung::whereDate('queue_date', $this->queue_date)->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = Jantung::create([
                    'queue_date'=>$this->queue_date,
                    'number'=>$nextNumber,
                    'no_queue'=>'J'.$nextNumber,
                    'status'     => 'waiting',
                    'user_id'=>Auth::user()->id
                ]);
                $this->queueActive = $queue;
                }
            }elseif($this->poli == 'mata'){
                 $check = Mata::whereDate('queue_date', $this->queue_date)
                        ->where('user_id',Auth::id())->first();
                if($check){
                    $this->queueActive = $check;
                }else{
                $lastNumber = Mata::whereDate('queue_date', $this->queue_date)->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = Mata::create([
                    'queue_date'=>$this->queue_date,
                    'number'=>$nextNumber,
                    'no_queue'=>'M'.$nextNumber,
                    'status'     => 'waiting',
                    'user_id'=>Auth::user()->id
                ]);
                $this->queueActive = $queue;
                }
            } 

        session()->flash('success', 'Pendaftaran poli berhasil!');
        $this->reset(['poli','queue_date']);
    }
    public function render()
    {
        return view('livewire.pendaftaran-pasien');
    }
}
