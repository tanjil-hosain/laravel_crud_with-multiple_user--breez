@extends('backend.master')

@section('content')
<div class="container mt-4">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

                    <h4 class="mb-0">Add Sub Category</h4>

                    <a href="{{route('admin.sub_category.index')}}" class="btn btn-light btn-sm">
                        Back
                    </a>

                </div>

                <div class="card-body">

                    <form action="{{route('admin.sub_category.store')}}" method="POST">
                        @csrf

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                               Sub Category Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Enter Category Name" value="{{old('name')}}">

                        </div>

                        <div class="d-flex justify-content-end">

                            <button type="reset" class="btn btn-secondary me-2">
                                Reset
                            </button>

                            <button type="submit" class="btn btn-primary">
                                Save Sub Category
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection