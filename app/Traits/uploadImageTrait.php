<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait uploadImageTrait
{
    public function uploadImage(Request $request, $folderName)
        {
            $name = $request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->storeAs($folderName,$name,'public');
            return $path;
        }
}
