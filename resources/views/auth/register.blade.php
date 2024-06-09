<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Register Page</title>
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
                            Register
                        </h2>
                        <form method="" >
                            <div class="form-group my-4">
                                <label for="username" class="form-label"
                                    >Nama pengguna</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="username"
                                    placeholder="Nama anda"
                                />
                            </div>
                            <div class="form-group my-4">
                                <label for="email" class="form-label"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    placeholder="Email anda"
                                />
                            </div>
                            <div class="form-group my-4">
                                <label for="password" class="form-label"
                                    >Buat kata sandi
                                    <a href="#" class="text-dark" id="icon-klik"
                                        ><i
                                            class="bi bi-eye-fill ms-2"
                                            id="icon"
                                        ></i></a
                                ></label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="Minimal 8 karakter"
                                    name="password"
                                />
                            </div>
                            <div class="form-group my-4">
                                <label
                                    for="password_confirmation"
                                    class="form-label"
                                    >Ulangi kata sandi<a
                                        href="#"
                                        class="text-dark"
                                        id="icon-klik2"
                                        ><i
                                            class="bi bi-eye-fill ms-2"
                                            id="icon2"
                                        ></i></a
                                ></label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password_confirmation"
                                    placeholder="Ulangi Kata Sandi"
                                    name="password_confirmation"
                                />
                            </div>

                            <div class="d-flex justify-content-center">
                                <button
                                    type="submit"
                                    class="btn btn-primary py-2 px-5 fw-bold"
                                >
                                    Buat
                                </button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            Sudah punya akun? <a href="{{ route('loginAdmin') }}">Masuk</a>
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
        <script>
            $(document).ready(function () {
                $("#icon-klik").click(function () {
                    $("#icon").toggleClass("bi-eye-slash");
                    let x = document.getElementById("password");
                    if (x.type == "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                });
            });
            $(document).ready(function () {
                $("#icon-klik2").click(function () {
                    $("#icon2").toggleClass("bi-eye-slash");
                    let x = document.getElementById("password_confirmation");
                    if (x.type == "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                });
            });
        </script>
    </body>
</html>
