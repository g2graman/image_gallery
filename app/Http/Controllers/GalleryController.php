<?php namespace App\Http\Controllers;

use File;
use Input;
use Response;
use Validator;
use Request;
//Use URL;

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

    public function delete() {
        $data = json_decode(Input::get('data'));
        $basenames = $data->names;
        //$exts = $data->exts; // For further development

        $ids = [];
        foreach($basenames as $name) {
            $results = $this->getPictureIDFromHashedName($name);
            foreach($results as $result) { // name field is unique so this will really only iterate once at most
                array_push($ids, $result->id);
            }
        }
        $this->deletePictures($ids);
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
            $uploadTime = time();
            $filename = sha1($uploadTime);
            $ext = $original->getClientOriginalExtension();

            //Save file in public/uploads
            $uploadSuccess = $original->move('uploads', $filename . '.' . $ext);

            if( $uploadSuccess ) {
                $this->savePictureToDB($filename,
                    $original->getClientOriginalExtension(),
                    $original->getClientSize(),
                    $uploadTime,
                    $original->getClientOriginalName());
                return view('gallery');
            }
        }
        return redirect('/')->with('message', 'Upload failed');
    }

    protected function savePictureToDB($name, $ext, $size, $uploaded_at, $originalName)
    {
        try {
            DB::insert('insert into itdept_test (name, ext, size, uploaded, original_name) values (?, ?, ?, ?, ?)',
                [$name, $ext, $size, $uploaded_at, $originalName]);
        } catch(\Exception $e){
            error_log($e);
            return null;
        }
    }

    protected function deletePicturesfromDB($ids) {
        try {
            DB::delete("delete from itdept_test where id in (" . implode(',', $ids) . ")");
        } catch(\Exception $e){
            error_log($e);
            return null;
        }
    }

    protected function deletePicturesfromDisk($ids) {
        try {
            $pictures = DB::select("SELECT name,ext FROM itdept_test WHERE id in (" . implode(',', $ids) . ")");

            foreach($pictures as $picture) {
                $basename = implode('.', get_object_vars($picture));
                $filename = public_path() . '/uploads/' . $basename;


                if (!File::delete($filename)) {
                    error_log('ERROR deleting ' . $basename);
                    return redirect('/')->with('message', 'ERROR deleting ' . $basename);
                } else {
                    error_log('Successfully deleted ' . $basename);
                    return redirect('/')->with('message', 'Successfully deleted ' . $basename);
                }
            }

        }catch(\Exception $e){
            error_log($e);
        }

    }

    protected function getPictureIDFromHashedName($name) {
        try {
            return DB::table('itdept_test')->select('id')->where('name', '=', $name)->get();
        } catch(\Exception $e){
            error_log($e);
            return null;
        }
    }

    protected function deletePictures($ids) {
        $this->deletePicturesfromDisk($ids);
        $this->deletePicturesfromDB($ids);
    }
}

