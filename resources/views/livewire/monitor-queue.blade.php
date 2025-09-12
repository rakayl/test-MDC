<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-4" wire:poll.2000ms>
            <div class="card">
                <div class="card-header text-center">
                    <h4>Antrian Terbaru</h4>
                </div>

                <div class="card-body text-center">
                        <div class="display-1 text-success">
                            <strong>{{ $activeQueue->tiketable->no_queue ?? '---' }}</strong>
                        </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row justify-content-center">
        @foreach($queue as $value)
            <div class="col-md-4 mb-3" wire:poll.2000ms>
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Antrian {{class_basename($value->tiketable_type)}}</h4>
                    </div>

                    <div class="card-body text-center">
                            <div class="display-1 text-danger">
                                <strong>{{ $value->tiketable->no_queue ?? '---' }}</strong>
                            </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
