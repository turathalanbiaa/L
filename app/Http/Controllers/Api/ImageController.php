<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mockery\Matcher\Ducktype;

class ImageController extends Controller
{
    use ApiResponseTrait;

    public function store(Request $request)
    {
        $id = $request->get('id');
        $type = $request->get('type');
        $file = $request->file('image');
        $document = Document::where("user_id", $id)->where("type", $type)->first();
      if($document)
      {
          $document->image=Storage::put('public/user/' . $id, $file, 'public');
          $document->state = 3;

          if ($document->save()) {
             // $url = Storage::url($document->image);
        //      $document = Document::find($id);
//              $document->image = $url;
              return $this->apiResponse($document);
          } else {
              return $this->apiResponse(null, 404, true);
          }
      }else{
          $document = new Document();
          $document->user_id = $id;
          $document->image = Storage::put('public/user/' . $id, $file,'public');
          $document->type = $type;
          $mydatetime = Carbon::now();
          $mydate = $mydatetime->toDateString();

          $document->created_at =$mydate;
          $document->state = 3;
          if ($document->save()) {
              $url = Storage::url($document->image);
          //    $document = Document::find($id);
//              $document->image = $url;

              return $this->apiResponse($document,200);
          } else {
              return $this->apiResponse(null, 404, true);
          }
      }






    }

    public function updateimage(Request $request)
    {
        $id = $request->get('id');
        $type = $request->get('type');
        $file = $request->file('image');
        $document = Document::where("user_id", $id)->where("type", $type)->first();
        if ($document->state != 1 || $document->type != 4) {
            $document->image = Storage::put('public/user/' . $id, $file);
            $document->state = 3;
            if ($document->save()) {
                return $this->apiResponse();
            } else {
                return $this->apiResponse("", 404, true);
            }
        }else{
            return $this->apiResponse("", 404, true);
        }
    }
    public function allimages(Request $request)
{
    $id = $request->get('id');

    $document = Document::where("user_id", $id)->get();
    if ($document) {

            return $this->apiResponse($document, 200, false);

    }else{
        return $this->apiResponse("", 404, true);
    }



}

    public function deleteimage(Request $request)
    {
        $id = $request->get('id');
        $type = $request->get('type');


        $document = Document::where("user_id", $id)->where("type", $type)->first();
        if ($document) {
            if ($document->state != 1 || $document->type != 4) {
                $document->image = "";
                $document->state = 3;
                if ($document->save()) {
                    return $this->apiResponse($document,200);
                } else {
                    return $this->apiResponse("", 404, true);
                }
            } else {
                return $this->apiResponse("", 404, true);
            }

        }


    }
}
