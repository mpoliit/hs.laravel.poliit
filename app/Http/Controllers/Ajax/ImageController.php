<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function remove(Image $image){
        $image->delete();
        return response()->json(['success' => true, 'message'=>'Image deleted successfully.']);
    }
}
