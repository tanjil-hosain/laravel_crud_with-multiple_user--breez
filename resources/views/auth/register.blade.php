<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Registration Form</h3>
                </div>

                <div class="card-body">

                    <!-- Tabs -->
                    <ul class="nav nav-pills nav-justified mb-4">
                        <li class="nav-item">
                            <button class="nav-link active"
                                    data-bs-toggle="pill"
                                    data-bs-target="#user"
                                    type="button">
                                User
                            </button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link"
                                    data-bs-toggle="pill"
                                    data-bs-target="#admin"
                                    type="button">
                                Admin
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <!-- User Form -->
                        <div class="tab-pane fade show active" id="user">

                            <form method="POST" action="{{ route('user.register') }}">
                                @csrf

                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email"
                                           class="form-control"
                                           name="email"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password"
                                           class="form-control"
                                           name="password"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label>Confirm Password</label>
                                    <input type="password"
                                           class="form-control"
                                           name="password_confirmation"
                                           required>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    Register as User
                                </button>

                            </form>

                        </div>

                        <!-- Admin Form -->
                        <div class="tab-pane fade" id="admin">

                            <form method="POST" action="{{ route('admin.register.store') }}">
                                @csrf

                                <div class="mb-3">
                                    <label>Admin Name</label>
                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email"
                                           class="form-control"
                                           name="email"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password"
                                           class="form-control"
                                           name="password"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label>Confirm Password</label>
                                    <input type="password"
                                           class="form-control"
                                           name="password_confirmation"
                                           required>
                                </div>

                                <button type="submit" class="btn btn-danger w-100">
                                    Register as Admin
                                </button>

                            </form>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>