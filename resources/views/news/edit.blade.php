@extends('layouts.master')

@section('title', $title)

@section('sidebar')
@parent
// you can add something here
@endsection

@section('content')

<h1>{{ $title }}</h1>

<form method="POST" action="{{ route('news.update', $news->id) }}">
    @csrf
    @method('PATCH')

    <table>
        <tr>
            <td><label for="title">Title</label></td>
            <td><input type="text" name="title" id="title" class="form-control" size="64"
                    value="{{ old('title', $news->title) }}"></td>
        </tr>
        <tr>
            <td><label for="slug">Slug</label></td>
            <td><input type="text" name="slug" id="slug" class="form-control" size="64"
                    value="{{ old('slug', $news->slug) }}"></td>
        </tr>
        <tr>
            <td><label for="category">Category</label></td>
            <td>
                <select name="category" id="category" class="form-control">
                    <option value="">Select Category</option>
                    <option value="Politics" {{ old('category', $news->category) == 'Politics' ? 'selected' : '' }}>
                        Politics</option>
                    <option value="Sports" {{ old('category', $news->category) == 'Sports' ? 'selected' : '' }}>Sports
                    </option>
                    <option value="International" {{ old('category', $news->category) == 'International' ? 'selected' : '' }}>International</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="author">Author</label></td>
            <td>
                <select name="author" id="author" class="form-control">
                    <option value="">Select Author</option>
                    <option value="John" {{ old('author', $news->author) == 'John' ? 'selected' : '' }}>John</option>
                    <option value="Tom" {{ old('author', $news->author) == 'Tom' ? 'selected' : '' }}>Tom</option>
                    <option value="Jack" {{ old('author', $news->author) == 'Jack' ? 'selected' : '' }}>Jack</option>
                </select>
            </td>
        </tr>
        <tr>
            <td valign="top"><label for="short_description">Short Description</label></td>
            <td>
                <textarea name="short_description" id="short_description"
                    class="form-control">{{ old('short_description', $news->short_description) }}</textarea>
            </td>
        </tr>
        <tr>
            <td valign="top"><label for="full_content">Full Content</label></td>
            <td>
                <textarea name="full_content" id="full_content"
                    class="form-control">{{ old('full_content', $news->full_content) }}</textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" class="btn btn-submit">Submit</button></td>
        </tr>
    </table>
</form>


@endsection