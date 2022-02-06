@extends('layouts.app')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <form action="{{ 'dashboard' }}" method="POST">
                @csrf
                <label>New URL</label>
                <input type="text" name="add"/>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center mb-4">URLs for Monitoring</h2>
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Path</th>
                                <th>Creation Time</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                // get right numeration of elements
                                $count = $paginator->currentPage() * $paginator->perPage() - $paginator->perPage() + 1;
                                $currentURL = url()->current()
                            @endphp
                            @foreach ($paginator as $url)
                                <tr>
                                    <th scope="row" class="scope">{{ $count ++ }}</th>
                                    <td>{{ $url->path }}</td>
                                    <td>{{ $url->created_at  }}</td>
                                    <td>
                                        <form action="{{ $currentURL . $url->id }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Delete</button>
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

