@extends('layouts.app')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <table>
                <thead class="thead-primary">
                <tr>
                    <th>{{ __('Users') }}</th>
                    <th>{{ __('Categories') }}</th>
                    <th>{{ __('URLs') }}</th>
                    <th>{{ __('Additional') }}</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <p class="card-text" data-url="/api" data-key="users"></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <p class="card-text" data-url="/api" data-key="categories"></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <p class="card-text" data-url="/api" data-key="urls"></p>
                                </div>
                            </div>
                        </td>
                       <td>
                           <div class="card" style="width: 18rem;">
                               <div class="card-body">
                                   <p class="card-text" data-url="/api" data-key="additional"></p>
                               </div>
                           </div>
                       </td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('dashboard_categories.index') }}" class="btn btn-primary">Start</a>
        </div>
    </section>
@endsection
