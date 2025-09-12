<div class="container">
    <h3 class="text-center mb-4">Daftar Antrian Poli Jantung</h3>

    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            Poli Jantung
        </div>
        <div class="card-body">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>No Antrian</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($queues as $index => $queue)
                        <tr>
                            <td>{{ $queues->firstItem() + $index }}</td>
                            <td>{{ $queue->queue_date->format('Y-m-d') }}</td>
                            <td>{{ $queue->no_queue }}</td>
                            <td>{{ ucfirst($queue->status) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada antrian</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div>
                {{ $queues->links() }}
            </div>
        </div>
    </div>
</div>
