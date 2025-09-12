<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header text-center">
                    <h4>Antrian Pendaftaran</h4>
                </div>

                <div class="card-body text-center">

                    {{-- Nomor antrian setelah klik tombol --}}
                    @if($queueNumber)
                        <div class="alert alert-success">
                            Nomor Antrian Anda: <strong>{{ $queueNumber }}</strong>
                        </div>
                    @endif

                    {{-- Tombol Ambil Nomor --}}
                    <button wire:click="takeQueue" class="btn btn-primary mb-3">
                        Ambil Nomor Antrian Pendaftaran
                    </button>

                </div>
            </div>

        </div>
    </div>
</div>
