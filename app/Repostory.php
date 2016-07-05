<?php

namespace App;

use Heroicpixels\Filterable\FilterableTrait;
use Illuminate\Database\Eloquent\Model;

class Repostory extends Model
{
    use FilterableTrait;
    protected $fillable = [
        'repos_id','name','full_name','repo_url','description',
        'repo_updated_at','stars','language','repo_owner_id',
        'repo_owner_name','repo_owner_profile_url','repo_owner_avatar'
    ];
}
