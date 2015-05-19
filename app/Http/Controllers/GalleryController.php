<?php namespace App\Http\Controllers;

use File;
use Input;
use Response;
use Validator;
use Request;

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

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('gallery');
    }

    public function upload()
    {
        $input = Input::all();
        $rules = array(
            'file' => 'image|max:3000',
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails())
        {
            return Response::make($validation->errors->first(), 400);
        }

        if(Input::hasFile('file')) {
            $original = Input::file('file');
            $filename = sha1(time().time()) . "." . $original->getClientOriginalExtension();
            $upload_success = $original->move('uploads', $filename);
            if( $upload_success ) {
                return redirect('/')->with('message', 'Upload Successfull');
            }
        }
        return redirect('/')->with('message', 'Upload failed');

    }

    /**
     * @param $uri
     *
     * Save the uri referred to by string $uri in the database
     */
    public function saveURI($uri) {
        return;
    }
}
