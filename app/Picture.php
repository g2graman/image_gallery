<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model {

    protected $table = 'itdept_test';

    protected $guarded = ['id'];
    protected $fillable = ['name', 'ext', 'size', 'uploaded', 'original_name'];
    protected $primaryKey = 'id';

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

    public function setOriginalNameAttribute($originalName) {
        $this->attributes['original_name'] = $originalName;
    }

}
