@extends('layouts.master')

@section('title', $title)

@section('sidebar')
    @parent
    {{-- you can add something here --}}
@endsection

@section('content') 
    <h1>News</h1>
    
    @foreach ($news as $data)
        <div style="width:60%; border-bottom:1px solid #aaa">
            
                <a href="{{ route('news.show', $data->slug) }}"><strong>{{ $data->title }}</strong></a>
                <br>                
                 
                <div>
                    <span style="float:left"> 
                        Category: {{ $data->category }} | Author: {{ $data->author }} | Published on: {{ $data->created_at }} |
                        <a href="{{ route('news.edit', $data->id) }}">Edit</a>  
                    </span> 
                    
                    <!-- Delete button using plain HTML -->
                    <form method="POST" action="{{ route('news.destroy', $data->id) }}" onsubmit="return confirm('Are you sure you want to delete?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <!-- End Delete button -->
                </div>
            
            {{ $data->short_description }}
        </div>
    @endforeach
    
    <!-- Showing Pagination Links -->
    <style>
        ul {display:inline-block}
        li {display:inline; padding:5px}
    </style>    
    <div> {{ $news->links() }} </div>
    <!-- End Showing Pagination Links -->
        
@endsection
