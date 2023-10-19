<div>
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Post List') }}</div>
            <div class="card-body">
                <div class="mb-3">
                    <input type="text" placeholder="search" class="form-control" wire:model.live="keyword">
                </div>
                <div class="alert @if (!empty(session('alert'))) alert-{{ session('alert') }} @else d-none @endif ">
                    @if (!empty(session('msg')))
                        {{ session('msg') }}
                    @endif
                </div>
                <table class="table table-hovered">
                    <thead>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Action') }}</th>
                    </thead>
                    @if (!empty($posts))
                        @foreach ($posts as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <a href="{{ url('post/edit/' . $item->id) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $item->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        {{ __('Delete') }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ __('lu yakin mau hapus post: ') }}
                                                    <b>{{ $item->title }}?</b>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" wire:click="deletePost({{ $item->id }})"
                                                        class="btn btn-danger">{{ __('Delete') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
