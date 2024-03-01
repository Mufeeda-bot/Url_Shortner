<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrl;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    public function index()
    {
        $shortUrls = ShortUrl::latest()->get();
        return view('shortenUrl', compact('shortUrls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'link'=> 'required|url'
        ]);
        
        $input['link'] = $request->link;
        $input['code'] = Str::random(6);

        ShortUrl::create($input);

        return redirect('generate-shorten-link')->withSuccess('Shorten link Generated Successfully');
    }

    public function shortenUrl($code)
    {
        $find = ShortUrl::where('code', $code)->firstOrFail();
        return redirect($find->link);
    }

    public function viewLink($id)
    {
        $shortUrl = ShortUrl::findOrFail($id);
        return view('viewLink', compact('shortUrl'));
    }

    public function destroy($id)
    {
        $shortUrl = ShortUrl::findOrFail($id);
        $shortUrl->delete();

        return redirect()->back()->withSuccess('Shorten link deleted successfully.');
    }

    public function edit($id)
    {
        $shortUrl = ShortUrl::findOrFail($id);
        return view('editLink', compact('shortUrl'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        $shortUrl = ShortUrl::findOrFail($id);
        $shortUrl->update([
            'link' => $request->link,
        ]);

        return redirect('generate-shorten-link')->withSuccess('Link updated successfully.');
    }
}
