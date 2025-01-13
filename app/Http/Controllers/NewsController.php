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
        $itemsPerPage = 3;
        $news = News::orderBy('created_at', 'desc')->paginate($itemsPerPage);

        return view('news.index', array('news' => $news, 'title' => 'News Display'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create', array('title' => 'Add News'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            array(
                'title' => 'required',
                'slug' => 'required',
                'short_description' => 'required',
                'full_content' => 'required',
            )
        );

        $input = $request->all();
        //dd($input); // dd() helper function is print_r alternative

        News::create($input);

        Session::flash('flash_message', 'News added successfully!');

        //return redirect()->back();
        //return redirect('news');
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     */

     
    public function show(string $id)
    {   
        $news = News::where('slug', $id)->first();
        return view('news.show', array('news' => $news));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);

        return view('news.edit', array('news' => $news, 'title' => 'Edit News'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::findOrFail($id);

        $this->validate($request, array(
                                'title' => 'required',
                                'slug' => 'required',
                                'short_description' => 'required',
                                'full_content' => 'required',
                            )
                        );

        $input = $request->all();

        $news->fill($input)->save();

        Session::flash('flash_message', 'News updated successfully!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);

        $news->delete();

        Session::flash('flash_message', 'News deleted successfully!');

        return redirect()->route('news.index');
    }
}
