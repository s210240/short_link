<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLink;
use Illuminate\Http\Request;
use App\Link;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Code;

class LinkController extends Controller
{
    public function index()
    {
        //
    }

    public function store(StoreLink $request)
    {
        $validated = $request->validated();

        $code = new Code();
        $result_code = $code->generate();

        Link::updateOrCreate(
            ['link' => $validated['link']],
            ['code' => $result_code]
        );

        echo 'http://localhost/' . $result_code;
    }

    public function shortLink($code)
    {
        $link = Link::where('code', $code)->first();

        try {
            return redirect($link->link);
        } catch (\Exception $exception) {
            abort(404);
        }
    }
}
