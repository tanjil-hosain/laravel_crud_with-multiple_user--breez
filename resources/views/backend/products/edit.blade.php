@extends('backend.master')

@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Management</p>
                        <h1 class="h3 mb-1">Update Product</h1>
                    </div>
                </div>
                <div class="heading-actions"><a class="btn btn-outline-secondary btn-sm"
                        href="{{ route('admin.product.index') }}"><i class="bi bi-arrow-left" aria-hidden="true"></i> Back
                        to product</a></div>
            </div>

            <section class="row g-3">
                <div class="col-12 col-xl-12">
                    <form class="panel needs-validation" action="{{ route('admin.product.update', $product->id) }} " method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="panel-header">
                            <div>
                                <h2 class="h5 mb-1 section-title"><i class="bi bi-person-plus"
                                        aria-hidden="true"></i><span>Product</span></h2>
                                <p class="text-muted mb-0">Create a Product</p>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6"><label class="form-label" for="firstName">Product Name</label><input
                                    class="form-control" id="firstName" type="text" name="name"
                                    value="{{ old('name', $product->name) }}">
                                <div class="invalid-feedback">Product name is required.</div>
                            </div>
                            <div class="col-md-6"><label class="form-label" for="email">Product Image</label><input
                                    class="form-control" id="email" type="file" name="photo" value="{{old('photo', url($product->photo))}}">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6"><label class="form-label" for="firstName">Price </label><input
                                    class="form-control" id="firstName" type="text" name="price" value="{{ old('price', $product->price) }}">
                            </div>
                            <div class="col-md-6"><label class="form-label" for="role">Category</label><select
                                    class="form-select" id="role"name="category">
                                    <option value="">Choose Category</option>
                                    @foreach (  $categorys as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">Choose a Category.</div>
                            </div>
                            <div class="col-md-6"><label class="form-label" for="team" name="sub_cat">Sub
                                    category</label><select class="form-select" id="team" name="sub_cat">
                                    <option value="">Choose Sub_category</option>
                                    @foreach ($sub_cats as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">Choose a Sub_cat.</div>
                            </div>
                            <div class="col-md-6"><label class="form-label" for="firstName">Product Status</label> <br>
                                <input type="radio" name="status" value="1">Instock
                                <input type="radio" name="status" value="0">Out of stock
                                <div class="invalid-feedback">Product Status is required.</div>
                            </div>
                            <div class="col-12"><label class="form-label" for="notes">Description</label>
                                <textarea class="form-control" id="notes" rows="4" placeholder="Optional onboarding notes" name="description"></textarea>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-end gap-2 mt-4"><a class="btn btn-outline-secondary"
                                href="users.html">Cancel</a><button class="btn btn-primary" type="submit"><i
                                    class="bi bi-person-check" aria-hidden="true"></i> Add Product</button></div>
                    </form>
                </div>

            </section>
        </div>
    </main>
@endsection
