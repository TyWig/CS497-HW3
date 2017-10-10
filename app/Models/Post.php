<?php
/**
 * Created by PhpStorm.
 * User: tyler
 * Date: 10/3/17
 * Time: 6:42 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'user_posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'user_id',
        'content',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}