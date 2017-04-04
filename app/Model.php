<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
	//untuk bilang yang boleh di mass assigned hanya field title dan body saja
    //$fillable untuk whitelist, $guarded untuk blacklist
    //protected $fillable = ['title','body'];
    protected $guarded = [];
    //berarti: we are not guarding anything
}
