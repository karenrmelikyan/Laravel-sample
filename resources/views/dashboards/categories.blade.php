@extends('layouts.app')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <form action="{{ route('dashboard_categories.store') }}" method="POST">
                @csrf
                <label>New Category</label>
                <input type="text" name="category_name"/>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center mb-4">All Categories</h2>
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Creation Time</th>
                                <th>URLs</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                 //get correct numeration of elements
                                $count = $paginator->currentPage() * $paginator->perPage() - $paginator->perPage() + 1;
                            @endphp

                            @foreach ($paginator as $category)
                                <tr>
                                    <th scope="row" class="scope">{{ $count ++  }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td><a href="{{ route('dashboard_urls.show', ['dashboard_url' => $category->id] )}}">View / Edit</a></td>
                                    <td>
                                        <form action="{{ route('dashboard_categories.destroy', ['dashboard_category' => $category->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" id="edit" class="btn btn-primary">Edit</button>
                                            <button type="submit" class="btn btn-danger btn-primary">X</button>
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
