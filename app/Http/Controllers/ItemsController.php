<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddItem;

use App\Item;

class ItemsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * add item
     */
    public function addItem(AddItem $request)
    {
        if($request->isMethod('get')){
            return view('addItem');
        }else if($request->isMethod('post')){
            $path = '';

            // upload image
            if(isset($request->photo)){
                // get the image
                $image = $request->file('photo');
                $folder = config('item.folder');
                $disk = config('item.disk');

                //dd($folder, $disk);

                $path = Item::uploadItemImage($image, $folder, $disk);
            }

            // add item
            Item::add($request->title, $path, $request->desc);

            return redirect()->route('home');
        }
    }

    /**
     * get items
     */
    public function loadItems(Request $request)
    {
        $items = Item::items(config('item.paginate'));

        return response()->json($items);
    }
}
