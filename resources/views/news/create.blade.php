@extends('layouts.master')

@section('title', $title)

@section('sidebar')
    @parent
    // you can add something here
@endsection

@section('content')

    <h1>{{ $title }}</h1>

    <form action="{{ route('news.store') }}" method="POST">
    @csrf

    <table>
        <tr>
            <td><label for="title" class="control-label">Title</label></td>
            <td><input type="text" id="title" name="title" class="form-control" size="64"></td>
        </tr>
        <tr>
            <td><label for="slug" class="control-label">Slug</label></td>
            <td><input type="text" id="slug" name="slug" class="form-control" size="64"></td>
        </tr>
        <tr>
            <td><label for="category" class="control-label">Category</label></td>
            <td>
                <select id="category" name="category" class="form-control">
                    <option value="" selected>Select Category</option>
                    <option value="Politics">Politics</option>
                    <option value="Sports">Sports</option>
                    <option value="International">International</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="author" class="control-label">Author</label></td>
            <td>
                <select id="author" name="author" class="form-control">
                    <option value="" selected>Select Author</option>
                    <option value="John">John</option>
                    <option value="Tom">Tom</option>
                    <option value="Jack">Jack</option>
                </select>
            </td>
        </tr>
        <tr>
            <td valign="top"><label for="short_description" class="control-label">Short Description</label></td>
            <td>
                <textarea id="short_description" name="short_description" class="form-control"></textarea>
            </td>
        </tr>
        <tr>
            <td valign="top"><label for="full_content" class="control-label">Full Content</label></td>
            <td>
                <textarea id="full_content" name="full_content" class="form-control"></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-submit">Submit</button>
            </td>
        </tr>
    </table>
</form>


@endsection