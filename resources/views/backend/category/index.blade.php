@extends('backend.master')

@section('content')
<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">

            <h4 class="mb-0">Category List</h4>

            <a href="{{route('admin.category.create')}}" class="btn btn-light">
                <i class="bi bi-plus-circle"></i> Add Category
            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover table-bordered align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th class="text-center">Action</th>
                        </tr>

                    </thead>

                    <tbody>
                        @foreach ($items as $item)
                        @csrf
                            
                       

                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>

                            <td class="text-center">

                               <form action="{{route('admin.category.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                 <a href="{{route('admin.category.edit', $item->id)}}" class="btn btn-sm btn-success">
                                    Edit
                                </a>
                               

                                <button onclick="return confirm('Are you Delete Ths Category?')" class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                                </form>

                            </td>

                        </tr>

                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection