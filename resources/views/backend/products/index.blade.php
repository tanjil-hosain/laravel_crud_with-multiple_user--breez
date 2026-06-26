@extends('backend.master')

@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Management</p>
                        <h1 class="h3 mb-1">Add Product</h1>
                        
                    </div>
                </div>
                <div class="heading-actions"><a class="btn btn-outline-secondary btn-sm" href="tables.html"><i
                            class="bi bi-download" aria-hidden="true"></i> Export</a><a class="btn btn-primary btn-sm"
                        href="{{route('admin.product.create')}}"><i class="bi bi-person-plus" aria-hidden="true"></i> Add Product</a></div>
            </div>

            <section class="panel mt-3">
                <div class="panel-header">
                    <div>
                        <h2 class="h5 mb-1 section-title"><i class="bi bi-table" aria-hidden="true"></i><span>Product
                                List</span></h2>
                        <p class="text-muted mb-0">Search, review, and manage team member accounts.</p>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <input class="form-control form-control-sm table-search" type="search" placeholder="Search users"
                            data-table-search="usersTable" aria-label="Search users">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0" id="usersTable" data-searchable-table>
                        <thead>
                            <tr>
                                <th scope="col">Nmae</th>
                                <th scope="col">Image</th>
                                <th scope="col">price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                @csrf
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td><img style="width: 50px" src="{{ url($item->photo) }}" alt=""></td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->status }}</td>
                                    <form action="{{ route('admin.product.destroy',$item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <td>
                                            <a href="#">view</a>
                                            <a class="btn btn-info"
                                                href="{{ route('admin.product.edit', $item->id) }}">Edit</a>
                                            <button onclick="return confirm('Are you Delete Ths Category?')"
                                                class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mt-3">
                    <p class="text-muted small mb-0">Showing 1 to 5 of 124 users</p>
                    <nav aria-label="Users pagination">
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </section>
        </div>
    </main>
@endsection
