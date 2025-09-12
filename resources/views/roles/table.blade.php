<style>
    .custom-table {
        width: 100%;
    }
    
    .custom-table td, 
    .custom-table th {
        text-align: left !important;
        padding: 12px;
        vertical-align: middle;
    }

    .custom-table tbody tr:hover {
        background-color: rgba(0,0,0,0.02);
    }

    .user-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .user-list li img {
        min-width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
    }

    .badge--success {
        background-color: #28a745;
        color: white;
    }
</style>

<table class="custom-table">
    <thead>
        <tr>
            <th>{{ __('No') }}</th>
            <th>{{ __('Action') }}</th>
            <th>{{ __('Role') }}</th>
            <th>{{ __('Permission') }}</th>
            
        </tr>
    </thead>
    <tbody>
        @forelse($data ?? [] as $key => $item)
            <tr data-item="{{ $item->id }}" data-data="{{$item}}">
                <td>
                    {{ $key+1 }}
                </td>
                <td>
                    @include('admin.components.link.custom',[
                        'class'         => "btn btn--base permission-modal-button",
                        'href'          => "#roles-permission",
                        'icon'          => "las la-tag"
                        
                    ]) 
                    @if($item->name == 'admin' || $item->name == 'customer')
                    @else
                      @include('admin.components.link.info-default',[
                        'class'         => "edit-modal-button",
                    ])  
                   
                    @include('admin.components.link.delete-default',[
                        'class'         => "delete-modal-button",
                        'title'         => 'ingin menghapus data ini ?'
                    ])
                    @endif
                    
                </td>
                <td>{{ $item->name }}</td>
                <td> 
                     <ul>
                         @foreach($item->permission as $va)
                         <li>{{$va}}</li>
                        @endforeach
                      </ul>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">{{ __('No data found') }}</td>
            </tr>
        @endforelse
    </tbody>
</table>
