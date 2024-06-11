<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login Page</title>
        <link rel="stylesheet" href="style/style2.css" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        />

    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                    <a
                        class="navbar-brand d-flex justify-content-center"
                        href=""
                        ><img
                            src="assets/logo.png"
                            class="img-fluid"
                            alt=""
                    /></a>
                </nav>
            </div>
        </div>
        <div
            class="col-lg-11 offset-1 vh-100 d-flex justify-content-center align-items-center"
        >
            <div class="container">
                <div
                    class="row d-flex justify-content-center align-items-center h-100 "
                >
                    <div class="register-container bg-body-tertiary" >
                        <h2 class="text-center" style="font-size: 40px">
                            Login
                        </h2>

                        <!-- error message -->
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <!-- success message -->
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group my-4">
                                <label for="email" class="form-label"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Masukan Email"
                                    required
                                />
                            </div>
                            <div class="form-group my-4">
                                <label for="password" class="form-label"
                                    >Kata Sandi
                                    </label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="Masukan Kata Sandi"
                                    name="password"
                                    required
                                />
                            </div>

                            <div class="d-flex justify-content-center">
                                <button
                                    type="submit"
                                    class="btn btn-primary py-2 px-5 fw-bold"
                                >
                                    Masuk
                                </button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            Belum punya akun? <a href="{{ route('registerAdmin') }}">Buat Akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"
        ></script>

    </body>
</html>
