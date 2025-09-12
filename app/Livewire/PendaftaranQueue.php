<?php

namespace App\Livewire;


use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

//model
use App\Models\Ticket;
use App\Models\User;
use App\Models\Pendaftaran;
use App\Models\Umum;
use App\Models\Anak;
use App\Models\GigiMulut;
use App\Models\Obgyn;
use App\Models\PenyakitDalam;
use App\Models\Saraf;
use App\Models\Tht;
use App\Models\Jantung;
use App\Models\Mata;

class PendaftaranQueue extends Component
{
    public $activeQueue;
    public $waitingQueues;
    public $page_title;
    public $no = 0;
    public $name;
    public $email;
    public $poli;
    public $queueNumber;
    public $noantrian; 




    public function save()
    {
        
       DB::beginTransaction();
        if (empty($this->activeQueue)) return session()->flash('error', 'Antrian belum tersedia.');
        $antri = Pendaftaran::where([
                        'id'=>$this->activeQueue->tiketable_id,
                        'status'=>'waiting'
                    ])->first();
        if (!$antri) return session()->flash('error', 'Nomor pendaftaran sudah dilayani.');
        
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'poli'  => 'required|in:umum,anak,gigi_mulut,obgyn,penyakit_dalam,saraf,tht,jantung,mata'
        ]);
        $user = User::where('email',$this->email)->first();
        if(!$user){
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make('password'),
            ]);
            $role = $user->assignRole('customer');
        }
        $update = Pendaftaran::where('id',$this->activeQueue->tiketable_id)
                    ->update([
                        'user_id'=>$user->id,
                        'status'=>'done'
                    ]);
        if($update){
            if($this->poli == 'umum'){
                $lastNumber = Umum::whereDate('queue_date', today())->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = Umum::create([
                    'queue_date'=>today(),
                    'number'=>$nextNumber,
                    'no_queue'=>'U'.$nextNumber,
                    'status'     => 'waiting',
                    'pendaftaran_id'=>$this->activeQueue->tiketable_id,
                    'user_id'=>$user->id
                ]);
                $this->noantrian = 'U'.$nextNumber;
                $this->queueNumber = $queue->no_queue;
            }elseif($this->poli == 'anak'){
                $lastNumber = Anak::whereDate('queue_date', today())->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = Anak::create([
                    'queue_date'=>today(),
                    'number'=>$nextNumber,
                    'no_queue'=>'A'.$nextNumber,
                    'status'     => 'waiting',
                    'pendaftaran_id'=>$this->activeQueue->tiketable_id,
                    'user_id'=>$user->id
                ]);
                $this->noantrian = 'A'.$nextNumber;
                $this->queueNumber = $queue->no_queue;
            }elseif($this->poli == 'gigi_mulut'){
                $lastNumber = GigiMulut::whereDate('queue_date', today())->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = GigiMulut::create([
                    'queue_date'=>today(),
                    'number'=>$nextNumber,
                    'no_queue'=>'G'.$nextNumber,
                    'status'     => 'waiting',
                    'pendaftaran_id'=>$this->activeQueue->tiketable_id,
                    'user_id'=>$user->id
                ]);
                $this->noantrian = 'G'.$nextNumber;
                $this->queueNumber = $queue->no_queue;
            }elseif($this->poli == 'obgyn'){
                $lastNumber = Obgyn::whereDate('queue_date', today())->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = Obgyn::create([
                    'queue_date'=>today(),
                    'number'=>$nextNumber,
                    'no_queue'=>'O'.$nextNumber,
                    'status'     => 'waiting',
                    'pendaftaran_id'=>$this->activeQueue->tiketable_id,
                    'user_id'=>$user->id
                ]);
                $this->noantrian = 'O'.$nextNumber;
                $this->queueNumber = $queue->no_queue;
            }elseif($this->poli == 'penyakit_dalam'){
                $lastNumber = PenyakitDalam::whereDate('queue_date', today())->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = PenyakitDalam::create([
                    'queue_date'=>today(),
                    'number'=>$nextNumber,
                    'no_queue'=>'P'.$nextNumber,
                    'status'     => 'waiting',
                    'pendaftaran_id'=>$this->activeQueue->tiketable_id,
                    'user_id'=>$user->id
                ]);
                $this->noantrian = 'P'.$nextNumber;
                $this->queueNumber = $queue->no_queue;
            }elseif($this->poli == 'saraf'){
                $lastNumber = Saraf::whereDate('queue_date', today())->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = Saraf::create([
                    'queue_date'=>today(),
                    'number'=>$nextNumber,
                    'no_queue'=>'S'.$nextNumber,
                    'status'     => 'waiting',
                    'pendaftaran_id'=>$this->activeQueue->tiketable_id,
                    'user_id'=>$user->id
                ]);
                $this->noantrian = 'S'.$nextNumber;
                $this->queueNumber = $queue->no_queue;
            }elseif($this->poli == 'tht'){
                $lastNumber = Tht::whereDate('queue_date', today())->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = Tht::create([
                    'queue_date'=>today(),
                    'number'=>$nextNumber,
                    'no_queue'=>'T'.$nextNumber,
                    'status'     => 'waiting',
                    'pendaftaran_id'=>$this->activeQueue->tiketable_id,
                    'user_id'=>$user->id
                ]);
                $this->noantrian = 'T'.$nextNumber;
                $this->queueNumber = $queue->no_queue;
            }elseif($this->poli == 'jantung'){
                $lastNumber = Jantung::whereDate('queue_date', today())->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = Jantung::create([
                    'queue_date'=>today(),
                    'number'=>$nextNumber,
                    'no_queue'=>'J'.$nextNumber,
                    'status'     => 'waiting',
                    'pendaftaran_id'=>$this->activeQueue->tiketable_id,
                    'user_id'=>$user->id
                ]);
                $this->noantrian = 'J'.$nextNumber;
                $this->queueNumber = $queue->no_queue;
            }elseif($this->poli == 'mata'){
                $lastNumber = Mata::whereDate('queue_date', today())->max('number');

                $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

                // Simpan antrian
                $queue = Mata::create([
                    'queue_date'=>today(),
                    'number'=>$nextNumber,
                    'no_queue'=>'M'.$nextNumber,
                    'status'     => 'waiting',
                    'pendaftaran_id'=>$this->activeQueue->tiketable_id,
                    'user_id'=>$user->id
                ]);
                $this->queueNumber = $queue->no_queue;
                $this->noantrian = 'M'.$nextNumber;
            }
        }else{
            DB::rollBack();
           return session()->flash('error', 'Pendaftaran gagal.');
        }
        $this->reset(['name', 'email','poli']);
        DB::commit();
        session()->flash('success', 'Pendaftaran berhasil ditambahkan.');
       
    }
    public function mount()
    {
        $this->activeQueue = Ticket::with(['tiketable'])
            ->whereDate('queue_date', today())
            ->where('tiketable_type','App\Models\Pendaftaran')
            ->first();
        $this->page_title = "Pendaftaran";
        
    }

    public function next()
    {
        $this->changeQueue(1);
    }

    public function previous()
    {
        $this->changeQueue(-1);
    }

    private function changeQueue($direction)
    {
//        if($this->no == 0 && $direction == -1) return;
//        $this->no = 1;
//            
        $queues = Pendaftaran::whereDate('queue_date', today())
            ->where('status','waiting')
            ->orderBy('number')
            ->get();

        if ($queues->isEmpty()) return;
            
        if (empty($this->activeQueue)){
            if($direction == -1)return;
            $queues = Pendaftaran::whereDate('queue_date', today())
            ->where('status','waiting')
            ->first();
            $create = Ticket::create([
                'queue_date' =>today(),
                'tiketable_id' =>$queues->id,
                'tiketable_type' => Pendaftaran::class,
            ]);
            Pendaftaran::where('id', $queues->id)
                        ->update([
                            'called_at'=>date('Y-m-d H:i:s')
                        ]);
            $this->activeQueue = Ticket::with(['tiketable'])->where('id',$create->id)->first();
        }else{
            
            if($direction == 1){
                $queues = Pendaftaran::whereDate('queue_date', today())
//                ->where('status','waiting')
                ->orderBy('number','DESC')
                ->get();
                $after = null;
                foreach($queues as $value){
                    if($value->id == $this->activeQueue->tiketable_id){
                        if(isset($after)){
                            $update = Ticket::where('id', $this->activeQueue->id)->update([
                                'tiketable_id'=>$after
                            ]);
                            
                            $this->activeQueue->update(['tiketable_id'=>$after]);
                            $this->activeQueue = Ticket::with(['tiketable'])
                            ->whereDate('queue_date', today())
                            ->where('tiketable_type','App\Models\Pendaftaran')
                            ->first();
                            Pendaftaran::where('id', $after)
                                ->update([
                                    'called_at'=>date('Y-m-d H:i:s')
                                ]);
                            continue;
                        }else{
                            return;
                        }
                    }else{
                        if($value->status == 'waiting'){
                            $after = $value->id;
                        }
                    }
                }
            }else{
                $queues = Pendaftaran::whereDate('queue_date', today())
//                    ->where('status','waiting')
                    ->orderBy('number')
                    ->get();
                $before = null;
                foreach($queues as $value){
                    if($value->id == $this->activeQueue->tiketable_id){
                        if(isset($before)){
                            $update = Ticket::where('id', $this->activeQueue->id)->update([
                                'tiketable_id'=>$before
                            ]);
                            
                            $this->activeQueue->update(['tiketable_id'=>$before]);
                            $this->activeQueue = Ticket::with(['tiketable'])
                            ->whereDate('queue_date', today())
                            ->where('tiketable_type','App\Models\Pendaftaran')
                            ->first();
                            Pendaftaran::where('id', $before)
                                ->update([
                                    'called_at'=>date('Y-m-d H:i:s')
                                ]);
                            continue;
                        }else{
                            return;
                        }
                    }else{
                        if($value->status == 'waiting'){
                            $before = $value->id;
                        }
                    }
                }
            }
        }
        $this->waitingQueues = Pendaftaran::whereDate('queue_date', today())
            ->where('status','waiting')->get();
    }

    public function render()
    {
        $this->waitingQueues = Pendaftaran::whereDate('queue_date', today())
            ->where('status','waiting')->get();
        return view('livewire.pendaftaran-queue')->layout('admin.layouts.master');
    }
}
