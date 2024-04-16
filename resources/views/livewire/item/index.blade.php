@push('sourceJS')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

<div>
    @include('livewire.item.add')
    @include('livewire.item.edit')
    @include('livewire.item.delete')

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-md-12">
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">
                Tambah Item
            </button>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="col-md-12">
                    <p class="fw-bold fs-4">Daftar Ruangan</p>
                    <div class="table-responsive">
                        <table class="display table_dtable row-border" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Item Barcode Number</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($items))
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->barcode_number }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <button type="button" class="btn bg-primary text-white"
                                                    data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                    wire:click="selectedItem('{{ $item->id }}')">
                                                    Edit
                                                </button>

                                                <button type="button" class="btn bg-danger text-white"
                                                    data-bs-toggle="modal" data-bs-target="#modalDelete"
                                                    wire:click="selectedItem('{{ $item->id }}')">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('admin') }}" class="btn bg-danger text-white col-md-1 mt-3">
            Back
        </a>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            Livewire.on('tableUpdated', function() {
                $('.table_dtable').DataTable().destroy();
                $('.table_dtable').DataTable({
                    "aLengthMenu": [
                        [5, 10, 25, 50, 75, -1],
                        [5, 10, 25, 50, 75, "Semua"]
                    ],
                    "iDisplayLength": 5,
                    // "ordering": false,		
                    searching: true,
                    responsive: true,
                    lengthChange: false,
                    info: false,
                    border: true,
                    scrollY: '100%',
                });

            });
            Livewire.on('hideModals', function() {
                $('#modalAdd').modal('hide');
                $('#modalEdit').modal('hide');
                $('#modalDelete').modal('hide');

            })

            Livewire.on('modalInfo', function(text) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: text,
                    showConfirmButton: false,
                    timer: 2000
                })
            });

        });
    </script>
@endpush
