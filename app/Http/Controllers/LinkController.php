<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Link;
use Illuminate\Support\Facades\Log;
use App\Code;

/**
 * Main Class
 *
 * Class LinkController
 *
 * @package App\Http\Controllers
 */
class LinkController extends Controller
{
    /**
     * Save short link
     *
     * @param StoreLink $request Request params
     *
     * @return string
     */
    public function store(StoreLink $request)
    {/**/
        $validated = $request->validated();

        $resultCode = $this->_getCode();

        Link::updateOrCreate(
            ['link' => $validated['link']],
            ['code' => $resultCode]
        );

        $url = config('app.url');

        return $url . $resultCode;
    }

    /**
     * Redirect short link
     *
     * @param $code Short link code
     *
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function shortLink($code)
    {
        $link = Link::where('code', $code)->first();

        try {
            return redirect($link->link);
        } catch (\Exception $exception) {
            abort(404);
        }
    }

    /**
     * Get short code
     *
     * @return string
     */
    private function _getCode(): string
    {
        $code = new Code();
        $resultCode = $code->generate();

        $check = Link::where('code', $resultCode)->count();

        if ($check > 0) {
            $this->_getCode();
        } else {
            return $resultCode;
        }
    }
}
