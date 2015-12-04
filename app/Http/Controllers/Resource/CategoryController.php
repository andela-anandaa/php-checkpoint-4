<?php

namespace KnowTube\Http\Controllers\Resource;

use Illuminate\Http\Request;

use KnowTube\Category;
use KnowTube\Http\Requests;
use KnowTube\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * displays modal editor for an existing
     * category.
     * 
     * @param  $category_id id of category to edit
     * @return view
     */
    public function getEditor($category_id)
    {
        $category = Category::findOrFail($category_id);
        return view('category.editor', [
            'category' => $category
        ]);
    }

    /**
     * updates or an existing category
     * 
     * @param  Requests\CategoryChangeRequest $request     validated form
     * @param                                 $category_id id of category to update
     * @return redirect to updated category
     */
    public function postCategory(Requests\CategoryChangeRequest $request, $category_id)
    {
        $category = Category::findOrFail($category_id);
        $category->fill($request->all());
        $category->save();

        return redirect()->action('Resource\\DashboardController@getIndexByCategory', [
            'category_id' => $category_id,
        ]);
    }

    /**
     * display form to create category
     * @return view
     */
    public function getCreator()
    {
        return view('category.creator');
    }

    /**
     * create new category
     * @param  Requests\CategoryChangeRequest $request validated form
     * @return redirect to category page
     */
    public function postCreateCategory(Requests\CategoryChangeRequest $request)
    {
        $category = new Category();
        $category->fill($request->all());
        $category->save();

        return redirect()->action('Resource\\DashboardController@getIndexByCategory', [
            'category_id' => $category->id,
        ]);
    }
}
