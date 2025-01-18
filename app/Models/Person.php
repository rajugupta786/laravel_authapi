<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['name', 'parent_id'];

    public function children()
    {
        return $this->hasMany(Person::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Person::class, 'parent_id');
    }
}
