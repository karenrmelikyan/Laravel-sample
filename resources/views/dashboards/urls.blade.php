@extends('layouts.app')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <form action=" {{ route('dashboard_urls.store') }}" method="POST">
                @csrf
                <label>New URL</label>
                <input type="hidden" name="category_id" value="{{ $category_id }}"/>
                <input type="text" name="url_path"/>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center mb-4">
                        {{ $category_name }}
                    </h2>
                    <h6 class="text-center mb-4">
                        <a href="{{ route('dashboard_categories.index') }}">{{ 'All Categories' }}</a>
                    </h6>
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Creation Time</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                //get correct numeration of elements
                               $count = $paginator->currentPage() * $paginator->perPage() - $paginator->perPage() + 1;
                            @endphp
                            @foreach ($paginator as $url)
                                <tr>
                                    <th scope="row" class="scope">{{ $count ++  }}</th>
                                    <td>{{ $url->path }}</td>
                                    <td>{{ $url->created_at }}</td>
                                    <td>
                                        <form action="{{ route('dashboard_urls.destroy', ['dashboard_url' => $url->id] }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <buttons-body>
                                                <button type="button" id="edit" class="btn btn-primary">Edit</button>
                                                <button type="submit" class="btn btn-danger btn-primary">X</button>
                                            </buttons-body>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @include('pagination')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
