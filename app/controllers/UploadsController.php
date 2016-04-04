<?php


use Intervention\Image\Facades\Image;

class UploadsController extends \BaseController
{

    public function index()
    {
        $files = glob(public_path() . '/rooms/' . Auth::id() . '/uploads/*'); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file))
                unlink($file); // delete file
        }
        return View::make('upload.create');
    }

    public function store()
    {
        $file = Input::file('file');

        if ($file) {
            $filename = $file->getClientOriginalName();
            $room_path = public_path() . '/rooms/' . Auth::id() . '/uploads/';
            File::exists($room_path) or File::makeDirectory($room_path, $mode = 0777, true, true);
            $upload_success = Input::file('file')->move($room_path, $filename);
            if ($upload_success) {
                Image::make($room_path . $filename)->crop('517', '550')->save($room_path . $filename);
                return Response::json('success', 200);
            } else {
                return Response::json('error', 400);
            }
        }
    }

    public function destroy()
    {
        $room_path = public_path() . '/rooms/' . Auth::id() . '/uploads/';
        File::delete($room_path . Input::get('file'));

        return Response::json('success', 200);
    }

}