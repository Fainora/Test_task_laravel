<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke() {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('admin.main.index', compact('user'));
    }
}
