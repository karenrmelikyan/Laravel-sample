@extends('layouts.app')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <form action="{{ 'dashboard' }}" method="post">
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
                                <th>Path</th>
                                <th>Creation Time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--get right numeration of elements--}}
                            @php $count = $paginator->currentPage() * $paginator->perPage() - $paginator->perPage() + 1 @endphp
                            @foreach ($paginator as $url)
                                <tr>
                                    <th scope="row" class="scope">{{ $count ++ }}</th>
                                    <td>{{ $url->path }}</td>
                                    <td>{{ $url->created_at  }}</td>
                                    <td>
                                        <form action="{{'dashboard/' . $url->id }}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        @if ($paginator->hasPages())
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">

                                    @php
                                        $currentPageURL = url()->current();
                                        $pagesCount = $paginator->total() / $paginator->perPage();

                                        if (is_float($pagesCount)) {
                                            $pagesCount = (int) ($pagesCount + 1);
                                        }

                                        // if given pagination links count more than the count of possible pages
                                        $paginationLinksLimit = $paginationLinksLimit > $pagesCount ? $pagesCount : $paginationLinksLimit;

                                        $currentPage = $paginator->currentPage();
                                        $bothSidesLinksCount =  (int) ($paginationLinksLimit / 2 );

                                        if ($currentPage > 1 && $currentPage > $bothSidesLinksCount) {
                                            $i = $currentPage - $bothSidesLinksCount;
                                            $limit = $currentPage + $bothSidesLinksCount;

                                            if ($limit > $pagesCount) {
                                                $limit = $pagesCount;
                                                $i = ($limit - $paginationLinksLimit) + 1;
                                            }

                                        } else {
                                            $i = 1;
                                            $limit = $paginationLinksLimit;
                                        }

                                    @endphp

                                    <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>

                                    @for ($i; $i <= $limit; $i ++)
                                        @if ($i === $currentPage)
                                            <li class="page-item active"><a class="page-link" href="{{ $currentPageURL . '?page=' . $i }}">{{ $i }}</a></li>

                                        @else
                                            <li class="page-item"><a class="page-link" href="{{ $currentPageURL . '?page=' . $i }}">{{ $i }}</a></li>

                                        @endif
                                    @endfor

                                    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
                                </ul>
                            </nav>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

