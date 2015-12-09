<?php

namespace KnowTube\Http\Controllers\Resource;

use Illuminate\Http\Request;

use KnowTube\Http\Requests;
use KnowTube\Http\Controllers\Controller;

use KnowTube\Resource;
use KnowTube\Category;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => [
                'getIndex',
                'getIndexByCategory',
                'getResource',
            ]
        ]);

        $this->categories = Category::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function getIndex()
    {
        $resources = Resource::all();

        return view('resource.index', [
            'resources' => $resources,
            'categories' => $this->categories,
        ]);
    }

    /**
     * display resources filtered by a category
     * @param  $category_id id of category to filter by
     * @return view
     */
    public function getIndexByCategory($category_id)
    {
        $resources = Category::findOrFail($category_id)->resources;

        return view('resource.index', [
            'resources' => $resources,
            'categories' => $this->categories,
        ]);
    }


    /**
     * Display a form to create resource
     *
     * @return view
     */
    public function getCreate()
    {
        return view('resource.create', [
            'categories' => $this->categories,
        ]);
    }

    /**
     * Display form to edit resourse
     * 
     * @param  $resource_id id of resourse
     * @return view
     */
    public function getEditor($resource_id)
    {
        $resource = Resource::findOrFail($resource_id);

        $this->authorize('change', $resource);

        return view('resource.edit', [
            'resource' => $resource,
            'categories' => $this->categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function postCreate(Requests\ResourceChangeRequest $request)
    {
        $resource = new Resource();
        $resource->fill($request->all());

        $resource->user_id = Auth::user()->id;

        $resource->save();

        return redirect()->action('Resource\\DashboardController@getResource', ['resource_id' => $resource->id]);
    }

    /**
     * display a single resource
     *
     * @param  $resource_id id of resource to display
     * @return view
     */
    public function getResource($resource_id)
    {
        $resource = Resource::findOrFail($resource_id);

        return view('resource.resource', ['resource' => $resource]);
    }


    /**
     * update an existing resourse
     * 
     * @param  Requests\ResourceChangeRequest $request     a validated form
     * @param                                 $resource_id the id of a resource
     * @return redirect to updated resource
     */
    public function postResource(Requests\ResourceChangeRequest $request, $resource_id)
    {
        $resource = Resource::findOrFail($resource_id);

        $this->authorize('change', $resource);
        $resource->fill($request->all());
        $resource->save();

        return redirect()->action('Resource\\DashboardController@getResource', ['resource_id' => $resource->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function postDelete($resource_id)
    {
        $resource = Resource::findOrFail($resource_id);

        $this->authorize('change', $resource);
        $resource->delete();

        return redirect()->action('Resource\\DashboardController@getIndex');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function getPersonal()
    {
        $resources = Resource::forUser(Auth::user())->get();

        return view('resource.personal', ['resources' => $resources]);
    }
}
