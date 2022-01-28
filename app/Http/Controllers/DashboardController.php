<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddURLRequest;
use App\Models\URL;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use function view;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): Renderable
    {
        return view('dashboard', [
                'paginator' => URL::paginate(3),
                'paginationLinksCount' => 7,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AddURLRequest $request): RedirectResponse
    {
        $url = new URL();
        $url->path = $request->input('add');

        try {
            $url->save();
        } catch(QueryException $ex) {
            return redirect('/dashboard');
        }

        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Routing\Redirector|RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        URL::find($id)->delete();

        return redirect('/dashboard');
    }
}
