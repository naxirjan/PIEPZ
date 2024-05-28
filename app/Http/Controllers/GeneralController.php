<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Liberary\Import\ProductImport;
use App\Models\ImportFile;
use App\Liberary\Media\Media;
use Auth;
class GeneralController extends Controller
{
    //
    public function Import(Request $request)
    {
        return ProductImport::import2($request);

        return ProductImport::import($request);
    }
    public function uploadFile(Request $request){
       $file= Media::uploadMedia('importfiles',$request->file);
       $extension=$request->file->getClientOriginalExtension();
       $data=['user_id'=>Auth::user()->id??null,'file_type'=>$extension,'file_url'=>$file];
       return ImportFile::insertData($data);
    }
}
