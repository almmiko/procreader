<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Post extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title', 'link', 'category_id', 'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }


    public function createRedditPosts($post_number = 20)
    {

        $client = new \GuzzleHttp\Client();

        $res = $client->request('GET', 'https://www.reddit.com/r/programming/top/.json?limit='.$post_number, [
            'headers' => [
                'User-Agent' => 'procreaderserver/1.0',
                'Accept'     => 'application/json',
            ]
        ]);

        $posts = json_decode($res->getBody(), true);

        DB::table('posts')->truncate();

        foreach ($posts['data']['children'] as $p) {
            Post::create([
                'user_id' => 4, //omg don`t do this on product
                'title' => $p['data']['title'],
                'link' => $p['data']['url'],
                'category_id' => 3, //omg don`t do this on product
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
