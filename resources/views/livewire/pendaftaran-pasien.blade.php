<div class="container">
    <div class=" d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card shadow-sm p-4">
                <h4 class="mb-3 text-center">Form Pendaftaran Poli</h4>

                @if (session()->has('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit.prevent="save">
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input 
                            type="date" 
                            wire:model.defer="queue_date" 
                            class="form-control"
                            min="{{ now()->format('Y-m-d') }}"
                        >
                        @error('queue_date') <span class="text-danger small">{{ $message }}</span> @enderror
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
    @if($queueActive)
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card shadow-sm p-4">
                <h4 class="mb-3 text-center">Antrian Poli</h4>
                <div class="row mb-3">
                    <div class="col-5 "><h4>Tanggal Antrian</h4></div>
                    <div class="col-7 fw-bold"><h4>{{ $queueActive->queue_date->format('Y-m-d') ?? null}}</h4></div>
                </div>
                <div class="row mb-3">
                    <div class="col-5 "><h4>Nomor Antrian</h4></div>
                    <div class="col-7 fw-bold"><h4>{{ $queueActive->no_queue ?? null}}</h4></div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
