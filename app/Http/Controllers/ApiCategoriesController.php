<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ApiCategoriesController extends Controller
{
    use GetAuthenticatedUser;
    use TEntityNotFound;


    private function returnCategoryWithLinkedEntity($category)
    {
        return Category::with('user')->where('id', $category->id)->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(Request $request)
    {
        $category = Category::with('user')
            ->limit($request->get('limit'))
            ->get();

        return $category;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = $this->getAuthenticatedUser()['id'];
        $category = Category::create($input);

        return $this->returnCategoryWithLinkedEntity($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $category = Category::findOrFail($id);
            return $category;

        } catch (ModelNotFoundException $e) {
            return $this->NotFoundResponse();
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            $input = $request->all();
            $category = Category::findOrfail($id);

            $input['user_id'] = $this->getAuthenticatedUser()['id'];

            $category->update($input);

            return $this->returnCategoryWithLinkedEntity($category);

        } catch (ModelNotFoundException $e) {
            return $this->NotFoundResponse();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
        } catch (ModelNotFoundException $e) {
            return $this->NotFoundResponse();
        }
    }
}
