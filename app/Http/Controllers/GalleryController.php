<?php namespace App\Http\Controllers;

use File;
use Input;
use Response;
use Validator;
use Request;

use Session;

use View;
use App\Picture as Picture;

use DB;
use Log;

class GalleryController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Gallery Controller
    |--------------------------------------------------------------------------
    |
    */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('guest');
    }

    public function index()
    {
        return view('gallery');
    }

    public function upload()
    {
        $input = Input::all();
        $rules = array(
            'file' => 'image|max:3000'
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails())
        {
            return Response::make($validation->errors->first(), 400);
        }

        if(Input::hasFile('file')) {
            $original = Input::file('file');
            $uploadTime = time().time();
            $filename = sha1($uploadTime);
            $ext = $original->getClientOriginalExtension();
            $uploadSuccess = $original->move('uploads', $filename . '.' . $ext);

            if( $uploadSuccess ) {
                $this->savePicture($filename,
                    $original->getClientOriginalExtension(),
                    $original->getClientSize(),
                    $uploadTime);
                return view('gallery');
            }
        }
        return redirect('/')->with('message', 'Upload failed');

    }

    public function savePicture($name, $ext, $size, $uploaded_at)
    {
        DB::insert('insert into itdept_test (name, ext, size, uploaded) values (?, ?, ?, ?)',
            [$name, $ext, $size, $uploaded_at]);
    }
}

