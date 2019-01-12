<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Link;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Redirect;

class LinkController extends Controller
{
	public function make(Request $request)
	{
		$validator = Validator::make(Input::all(), [
			'url' => 'required|url|max:255'
		]);

		if($validator->fails()) {
			return redirect()->route('home')->withInput()->withErrors($validator);
		} else {
			$url	= $request->url;
			$code	= null;

			$exists = Link::whereUrl($url);

			if ($exists->count() === 1){
				$code = $exists->first()->code;
			} else {
				$created = Link::create(['url' => $url]);

				if ($created) {

					$code = base_convert($created->id, 16, 2);
					// dd($code);
					Link::whereId($created->id)->update(['code' => $code]);
				}
			}

			if ($code) {
				return redirect()->route('home')->with('global', $code);
			}
		}

		return redirect()->route('home')->with('global', 'Something went wrong, try again');

	}

	public function get($code)
	{
		$link = Link::whereCode($code);

		if ($link->count() === 1) {
			return redirect($link->first()->url);
		}

		return redirect()->route('home');
	}
}
