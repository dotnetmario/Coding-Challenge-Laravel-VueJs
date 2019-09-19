<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'image', 'description',
    ];

    /**
     * add an item
     * 
     * @param string title
     * @param string description
     * @param string image
     * @return Item
     */
    public static function add($title, $image, $desc = null)
    {
        return Item::create([
            'title' => $title,
            'image' => $image,
            'description' => $desc
        ]);
    }

    /**
     * upload image
     * 
     * @param UploadedFile uploadedFile
     * @param string folder
     * @param string disk
     * @param string filename
     * @return string path
     */
    public static function uploadItemImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : substr(md5(time()), 1, 25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }


    /**
     * get items with pagination
     * 
     * @param int paginate
     * @return Collection items
     */
    public static function items($paginate = 10)
    {
        return Item::paginate($paginate);
    }
}
