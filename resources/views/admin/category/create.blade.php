@extends('layouts.master')

@section('title','Create Category')

@section('content')
    <div class="container-fluid my-5">
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col-5">
                    <form method="POST">
                        <h1 class="text-center">Create Category</h1>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" name="categoryName" class="form-control" id="category">
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/admin" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

