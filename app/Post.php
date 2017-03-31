<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Post extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title', 'link', 'category_id', 'user_id'
    ];

    protected $hidden = [
        'category_id', 'user_id', 'deleted_at'
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

        if (! Auth::check()) {
            return 'Your must login to perform this action';
        }

        $client = new \GuzzleHttp\Client();

        $res = $client->request('GET', 'https://www.reddit.com/r/programming/top/.json?limit='.$post_number, [
            'headers' => [
                'User-Agent' => 'procreaderserver/1.0',
                'Accept'     => 'application/json',
            ]
        ]);

        $posts = json_decode($res->getBody(), true);

        DB::table('posts')->truncate();
        DB::table('categories')->truncate();

        $category = Category::create([
            'name' => 'reddit/programming',
            'user_id' => Auth::id()
        ]);

        foreach ($posts['data']['children'] as $p) {
            Post::create([
                'user_id' => Auth::id(),
                'title' => $p['data']['title'],
                'link' => $p['data']['url'],
                'category_id' => $category->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
