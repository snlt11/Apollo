@extends('layouts.master')

@section('title','Create Category')

@section('content')
            <style>
                .pagination > li{
                    padding: 5px 10px;
                    background :#ddd;
                    margin-right : 1px;
                }
            </style>
            <div class="container-fluid">
                <h1 class="text-center my-5">Create Category</h1>
                <div class="row">
                    <div class="col-md-4">
                        <div>
                            @include('layouts.adminSidebar')
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="d-flex justify-content-center">
                            <div class="col-7">
                                <form method="POST" enctype="multipart/form-data">
                                    @if(\App\classes\Session::has('error'))
                                        {{ \App\classes\Session::flashMessage('error') }}
                                    @endif
                                    @if(\App\classes\Session::has('success'))
                                        {{ \App\classes\Session::flashMessage('success') }}
                                    @endif
                                    @include('layouts.reportMessages')
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <input type="text" name="name" class="form-control" id="category">
                                    </div>
                                    <input type="hidden" name="token" value="{{ \App\classes\CSRFToken::__token() }}">
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                        <a href="/admin" class="btn btn-warning">Cancel</a>
                                    </div>
                                </form>
                                <ul class="list-group mt-4">
                                    @foreach($categories as $category)
                                        <li class="list-group-item">
                                            <a href="#">{{$category->name}}</a>
                                        <span class="float-right">
                                            <a href="">
                                                <i class="fa fa-edit text-warning" onclick="edit('{{$category->name}}','{{$category->id}}')">Edit</i>
                                            </a>
                                            <a href="/admin/category/{{$category->id}}/delete">
                                                <i class="fa fa-trash text-danger">Delete</i>
                                            </a>
                                        </span>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="mt-5">
                                    {!! $pages !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--    Modal Start --}}
            <div class="modal" tabindex="-1" id="categoryUpdateModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
{{--    Modal End--}}
@endsection

<script>
    function edit(name,id){
        alert(`Name is : ${name}  id : ${id}`);
    }
</script>

