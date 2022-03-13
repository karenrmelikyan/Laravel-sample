<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\URL;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;


class DashboardController extends Controller
{
    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
       return view('dashboards.dashboard');
    }

    /**
     * @return array
     */
    public function api(): array
    {
        $users = [];
        $categories = [];
        $urls = [];

        foreach (User::all() as $user) {
            $users[] = $user->name;
        }

        foreach (Category::all() as $category) {
            $categories[] = $category->name;
        }

        foreach (Url::all() as $url) {
            $urls[] = $url->path;
        }

        return [
            'users' => $users,
            'categories' => $categories,
            'urls' => $urls,
            'additional' => [
                'Some additional info',
            ],
        ];
    }
}
