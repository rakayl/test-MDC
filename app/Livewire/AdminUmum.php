<?php

namespace App\Livewire;


use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

//model
use App\Models\Ticket;
use App\Models\User;
use App\Models\Umum;

class AdminUmum extends Component
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

    public function mount()
    {
        $this->activeQueue = Ticket::with(['tiketable','tiketable.user'])
            ->whereDate('queue_date', today())
            ->where('tiketable_type','App\Models\Umum')
            ->first();
        $this->page_title = "Umum";
        
    }

    public function next()
    {
        $this->changeQueue(1);
    }
    public function done()
    {
        if(isset($this->activeQueue)){
             $update = Umum::where('id', $this->activeQueue->tiketable_id)
                       ->where('status','waiting')
                        ->update([
                            'status'=>'done',
                            'served_at'=>date('Y-m-d H:i:s')
                        ]);
             if($update){
               return session()->flash('success', 'Antrian berhasil dilakukan.');
             }else{
                return session()->flash('error', 'Antrian sudah diupdate.'); 
             }
        }
        
        return session()->flash('error', 'Nomor antrian tidak ada.');
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
        $queues = Umum::whereDate('queue_date', today())
            ->where('status','waiting')
            ->orderBy('number')
            ->get();

        if ($queues->isEmpty()) return;
            
        if (empty($this->activeQueue)){
            if($direction == -1)return;
            $queues = Umum::whereDate('queue_date', today())
            ->where('status','waiting')
            ->first();
            $create = Ticket::create([
                'queue_date' =>today(),
                'tiketable_id' =>$queues->id,
                'tiketable_type' => Umum::class,
            ]);
            Umum::where('id', $queues->id)
                    ->update([
                        'called_at'=>date('Y-m-d H:i:s')
                    ]);
            $this->activeQueue = Ticket::with(['tiketable','tiketable.user'])->where('id',$create->id)->first();
        }else{
            
            if($direction == 1){
                $queues = Umum::whereDate('queue_date', today())
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
                            Umum::where('id', $after)
                                ->update([
                                    'called_at'=>date('Y-m-d H:i:s')
                                ]);
                            $this->activeQueue->update(['tiketable_id'=>$after]);
                            $this->activeQueue = Ticket::with(['tiketable','tiketable.user'])
                            ->whereDate('queue_date', today())
                            ->where('tiketable_type','App\Models\Umum')
                            ->first();
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
                $queues = Umum::whereDate('queue_date', today())
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
                            $this->activeQueue = Ticket::with(['tiketable','tiketable.user'])
                            ->whereDate('queue_date', today())
                            ->where('tiketable_type','App\Models\Umum')
                            ->first();
                            Umum::where('id', $before)
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
        $this->waitingQueues = Umum::whereDate('queue_date', today())
            ->where('status','waiting')->get();
    }

    public function render()
    {
        $this->waitingQueues = Umum::whereDate('queue_date', today())
            ->where('status','waiting')->get();
        return view('livewire.admin-umum')->layout('admin.layouts.master');
    }
}
