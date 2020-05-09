<?php
// Profiles table model.
namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function profileImage()
    {
      $imagePath = ($this->image) ? '/storage/' . $this->image : '/assets/img/loading3.gif';
      return $imagePath;
    }

}
