<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class ApiPostsController extends Controller
{

    use GetAuthenticatedUser;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @internal param int $limit
     */
    public function index(Request $request)
    {

        $posts = Post::with('user', 'category')
            ->limit($request->get('limit'))
            ->get();

        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = $this->getAuthenticatedUser()['id'];
        $post = Post::create($input);

        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::findOrFail($id);

        return $post;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $post = Post::findOrfail($id);

        $input['user_id'] = $this->getAuthenticatedUser()['id'];

        $post->update($input);

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    }
}
