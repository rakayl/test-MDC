@push('css')
<style>
    .table-area {
        background: #fff;
        border-radius: 5px;
        padding: 20px;
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .table-btn-area {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .search-wrapper {
        position: relative;
        width: 250px;
    }

    .search-wrapper input {
        width: 100%;
        height: 40px;
        padding: 8px 15px 8px 40px;
        border: 1px solid #e5e5e5;
        border-radius: 5px;
        outline: none;
        font-size: 14px;
    }

    .search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #666;
        pointer-events: none;
    }

    .btn-add-default {
        height: 40px;
        padding: 0 20px;
        background: #c91b1b;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
    }

    .btn-add-default:hover {
        background: #a51616;
        color: white;
    }

    .entry-wrapper {
        margin-bottom: 15px;
    }

    .entry-wrapper select {
        width: auto;
        margin: 0 5px;
    }

    .custom-table td, 
    .custom-table th {
        text-align: left !important;
        padding: 12px;
    }
</style>
@endpush

@section('page-title')
    @include('admin.components.page-title',['title' => __($page_title)])
@endsection


<div class="table-area">
    <div class="table-wrapper my-4">
       <div class="container text-center ">
            <h3>Pendaftaran Pasien</h3>

            <h1 class="display-1 text-primary">
                {{ $activeQueue->tiketable->no_queue ?? '---'}}
            </h1>

            <div class="d-flex justify-content-center mt-3">
                <button wire:click="previous" class="btn btn-warning mx-2">Previous</button>
                <button wire:click="next" class="btn btn-success mx-2">Next</button>
            </div>

        </div>
    </div><div class="table-wrapper my-4">
       <div class="container text-center ">
            <h3>Antrian Poli</h3>

            <h1 class="display-1 text-primary">
                {{ $noantrian ?? '---'}}
            </h1>

            

        </div>
    </div>
    <div class="table-wrapper">
       <div class="container text-center row">
            <div class="col-md-6 card shadow-sm p-4" >
                <h4>Daftar Antrian (Status: Waiting)</h4>
                <table class="table table-bordered custom-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Antrian</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Waktu Daftar</th>
                        </tr>
                    </thead>
                    <tbody wire:poll.5s>
                        @forelse ($waitingQueues as $index => $queue)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $queue->no_queue }}</td>
                                <td>
                                    <span class="badge bg-secondary">
                                        {{ ucfirst($queue->status) }}
                                    </span>
                                </td>
                                <td>{{ $queue->queue_date->format('Y-m-d') }}</td>
                                <td>{{ $queue->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada antrian menunggu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                    <div class="card shadow-sm p-4">
                        <h4 class="mb-3">Form Pendaftaran Pasien</h4>

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form wire:submit.prevent="save">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" wire:model.defer="name" class="form-control">
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" wire:model.defer="email" class="form-control">
                                @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pilih Poli</label>
                                <select wire:model.defer="poli" class="form-control">
                                    <option value="">-- Pilih Poli --</option>
                                    <option value="umum">Umum</option>
                                    <option value="anak">Anak</option>
                                    <option value="gigi_mulut">Gigi & Mulut</option>
                                    <option value="obgyn">Obgyn</option>
                                    <option value="penyakit_dalam">Penyakit Dalam</option>
                                    <option value="saraf">Saraf</option>
                                    <option value="tht">THT</option>
                                    <option value="jantung">Jantung</option>
                                    <option value="mata">Mata</option>
                                </select>
                                @error('poli') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Daftar</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>



