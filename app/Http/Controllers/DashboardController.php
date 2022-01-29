<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddURLRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use App\Models\URL;
use function view;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('dashboard', [
                'paginator' => URL::paginate(3),
                'paginationLinksLimit' => 7,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AddURLRequest $request
     * @return RedirectResponse
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
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        URL::find($id)->delete();

        return redirect('/dashboard');
    }
}
