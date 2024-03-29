<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function actionDone()
    {
        return toast('تم', 'success')->position('bottom-start');
    }

    public function storeFile($folderName, $requestName)
    {
        $fileName = time() . request()->file($requestName)->getClientOriginalName();
        request()->file($requestName)->move("$folderName/", $fileName);
        return "$folderName/" . $fileName;
    }
}
