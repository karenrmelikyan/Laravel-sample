@extends('layouts.app')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <form action="{{ route('dashboard_categories.store') }}" method="POST">
                @csrf
                <label>{{ __('New Category') }}</label>
                <input type="text" name="category_name"/>
                <button type="submit" class="btn btn-primary">{{ __('Add')}}</button>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center mb-4">{{ __('All Categories') }}</h2>
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Creation Time') }}</th>
                                <th>{{ __('URLs') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                 //get correct numeration of elements
                                $count = $paginator->currentPage() * $paginator->perPage() - $paginator->perPage() + 1;
                            @endphp

                            @foreach ($paginator as $category)
                                <!-- Table -->
                                <tr>
                                    <th scope="row" class="scope">{{ $count ++  }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td><a href="{{ route('dashboard_urls.show', ['dashboard_url' => $category->id] )}}" class="bi bi-wrench"></a></td>
                                    <td>
                                        <button type="button" id="edit" class="btn btn-primary bi bi-pencil-fill" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}"></button>
                                        <button type="button" class="btn btn-primary btn-danger bi bi-trash3-fill" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}"></button>
                                    </td>
                                </tr>
                                <!-- End Table -->

                                <!-- Edit (update) Modal -->
                                <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Are you sure you want to change this record?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('dashboard_categories.update', ['dashboard_category' => $category->id]) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="text" name="update" value="{{ $category->name }}"/>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Are you sure you want to delete this record?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('dashboard_categories.destroy', ['dashboard_category' => $category->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End modals -->

                            @endforeach
                            </tbody>
                        </table>
                        @include('pagination')
                    </div>
                </div>
            </div>
        </div>
    </section>



<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
    })
</script>


@endsection
