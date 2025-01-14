<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemsPerPage = 10;

        //the order of showing items is (created at, descending order). The newest one will be at top
        // paginate is how many item you will see per page
        $news = News::orderBy('created_at', 'desc')->paginate($itemsPerPage);

        //news.index is the html 
        //news will be pointed to $news
        //title is the title of the page
        return view('news.index', array('news' => $news, 'title' => 'Home Page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //news.create is the html
        return view('news.create', array('title' => 'Add News'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate data 
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'author' => 'required',
            'category' => 'required',
            'short_description' => 'required',
            'full_content' => 'required',
        ]);

        // Create news according to validated data
        News::create(attributes: $validatedData);

        // Flash message to show that news is added successfully
        Session::flash('flash_message', 'News added successfully!');

        //return redirect()
        //return redirect('news.index');
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     */


    public function show(string $id)
    {
        //find the news by slug/id
        $news = News::where('slug', $id)->first();

        //news.show is the html
        return view('news.show', array('news' => $news));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // find the news by id
        $news = News::findOrFail($id);

        //news.edit is the html
        return view('news.edit', array('news' => $news, 'title' => 'Edit News'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // find the news by id, if none found, throw an error
        $news = News::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'author' => 'required',
            'category' => 'required',
            'short_description' => 'required',
            'full_content' => 'required',
        ]);

        // update the news according to validated data
        $input = $request->all();

        //fill the news with input and save it
        $news->fill($input)->save();

        // Flash message to show that news is updated successfully
        Session::flash('flash_message', 'News updated successfully!');

        //return to index page
        return redirect()->route('news.index');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // find the news by id, if none found, throw an error
        $news = News::findOrFail($id);

        //delete the news
        $news->delete();

        // Flash message to show that news is deleted successfully
        Session::flash('flash_message', 'News deleted successfully!');

        // return to index page
        return redirect()->route('news.index');
    }

}
