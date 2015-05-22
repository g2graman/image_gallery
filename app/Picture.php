<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model {

    protected $table = 'itdept_test';

    protected $fillable = ['name', 'ext', 'size', 'uploaded'];

    //protected $primaryKey = 'id';

    public function setNameAttribute($name) {
        $this->attributes['name'] = $name; //case-sensitive
    }

    public function setExtAttribute($ext) {
        $this->attributes['ext'] = strtolower($ext); //case-insensitive
    }

    public function setSizeAttribute($size) {
        $this->attributes['size'] = $size;
    }

    public function setUploadedAttribute($unixTimestamp) {
        $this->attributes['uploaded'] = $unixTimestamp;
    }

}
