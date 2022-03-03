<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\ShortUrl;
use http\Client\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class UrlShortenerController extends Controller
{
    /**
     * Show the form to send url
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        return view('index');
    }

    /**
     * Get initial url, shorten it and send to client
     *
     * @param UrlRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function urlShorten(UrlRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = Str::random(6);
        $urlShort['real_url'] = $request->real_url;
        $urlShort['code'] = $code;
        $urlShort['short_url'] = "http://".$request->getHttpHost()."/".$code;
        try {
            ShortUrl::query()->create($urlShort);
        } catch (QueryException) {
            ShortUrl::query()->firstWhere(['real_url' => $urlShort['real_url']])->update($urlShort);
            return response()->json(['short_url' => $urlShort['short_url']]);
        }
        return response()->json(['short_url' => $urlShort['short_url']]);
    }

    /**
     * Redirect from short url to real url
     *
     * @param $code
     * @return \Illuminate\Http\RedirectResponse
     */
    public function urlRedirect($code): \Illuminate\Http\RedirectResponse
    {
        $url = ShortUrl::query()->firstWhere(['code' => $code]);
        return redirect($url->real_url);
    }
}
