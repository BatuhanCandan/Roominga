<?php
use Roominga\Forms\UploadRoomForm;
use Roominga\Rooms\RoomRepository;
use Roominga\Rooms\UploadRoomCommand;

class RoomsController extends \BaseController
{

    protected $roomRepository;
    protected $uploadRoomForm;


    function __construct(UploadRoomForm $uploadRoomForm, RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
        $this->uploadRoomForm = $uploadRoomForm;
    }

    public function index()
    {
        $rooms = $this->roomRepository->getAllForAll();

        return View::make('rooms.index', compact('rooms'));
    }


    public function store()
    {
        $uploads_path = public_path() . '/rooms/' . Auth::id() . '/uploads/';
        $dh = opendir($uploads_path);
        $files = array();
        while (false !== ($filename = readdir($dh))) {
            if ($filename != '.' && $filename != '..') {
                $files[] = $filename;
            }
        }
        $roomname = Input::get('roomname');

        if ($roomname != "") {

            if (count($files) != 0) {
                $input = array_add(Input::get(), 'userId', Auth::id());
                $this->uploadRoomForm->validate($input);
                $room_path = public_path() . '/rooms/' . Auth::id() . '/' . $roomname . '/';
                File::exists($room_path) or File::makeDirectory($room_path, $mode = 0777, true, true);
                $this->execute(UploadRoomCommand::class, $input);
                foreach ($files as $file) {
                    $first = public_path() . '/rooms/' . Auth::id() . '/uploads/' . $file;
                    $second = public_path() . '/rooms/' . Auth::id() . '/' . $roomname . '/' . $file;
                    rename($first, $second);
                }

                return Redirect::home();
            } else {
                $files = glob(public_path() . '/rooms/' . Auth::id() . '/uploads/*'); // get all file names
                foreach ($files as $file) { // iterate files
                    if (is_file($file))
                        unlink($file); // delete file
                }

                Flash::message('You have not uploaded a photo, yet!');
                return View::make('upload.create');
            }
        } else {
            $files = glob(public_path() . '/rooms/' . Auth::id() . '/uploads/*'); // get all file names
            foreach ($files as $file) { // iterate files
                if (is_file($file))
                    unlink($file); // delete file
            }

            Flash::message('The roomname field is required!');
            return View::make('upload.create');

        }
    }


}