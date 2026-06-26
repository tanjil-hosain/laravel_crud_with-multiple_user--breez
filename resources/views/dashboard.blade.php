<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <title>Products</title>

    <style>
        .product-card{
            transition:.3s;
            border-radius:15px;
            overflow:hidden;
        }

        .product-card:hover{
            transform:translateY(-8px);
            box-shadow:0 15px 30px rgba(0,0,0,.15);
        }

        .product-img{
            height:220px;
            object-fit:contain;
            padding:20px;
        }

        .price{
            font-size:24px;
            font-weight:700;
            color:#0d6efd;
        }

        .old-price{
            text-decoration:line-through;
            color:#999;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">

    <h2 class="text-center fw-bold mb-5">Our Products</h2>

    <div class="row">

        @foreach($items as $item)
        @csrf

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

            <div class="card product-card border-0 shadow-sm h-100">

                <div class="position-relative">

                    <img src="{{ url($item->photo) }}" class="card-img-top product-img">

                    <span class="badge bg-danger position-absolute top-0 start-0 m-3">
                        New
                    </span>

                    <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3 shadow-sm">
                        <i class="bi bi-heart"></i>
                    </button>

                </div>

                <div class="card-body">

                    <small class="text-secondary">
                        {{ $item->category->name }}
                    </small>

                    <h5 class="fw-bold mt-2">
                        {{ $item->name }}
                    </h5>

                    <p class="text-muted small">
                        {{ ($item->description) }}
                    </p>

                    <div class="mb-2 text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>

                    <div>
                        <span class="old-price">৳1200</span>
                        <span class="price ms-2">
                            ৳{{ $item->price }}
                        </span>
                    </div>

                </div>

                <div class="card-footer bg-white border-0">

                    <div class="d-grid">

                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-cart-plus"></i>
                            Add To Cart
                        </a>

                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>