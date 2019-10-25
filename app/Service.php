<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Employeeservice;
class Service extends Model
{
	use SoftDeletes;
    protected $fillable = ['title', 'duration','description','terms'];

    public function editPath()
    {
        return "services/{$this->id}";
    }
}
