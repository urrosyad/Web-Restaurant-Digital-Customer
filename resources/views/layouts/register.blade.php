<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nikedai</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customiassetes/zed Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<style>
    body {
            background-image: url('assets/img/restaurant.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 1;
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

            body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
        }

            .login-box {
            margin-bottom: 10%;
            max-width: 800px;
            padding: 60px;
            background-color: #FDF5EB;
            border-radius: 45px;
            box-shadow: 0px 0px 10px #000000;
            position: absolute;
            left: 50%;
            transform: translate(-50%, -50%);
        }
</style>

<body>

    <div class="container-fluid bg-primary" >
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="login-box d-flex justify-content-center">
                    <form method="post" action="{{ route('register.store')}}">
                        @csrf
                        <h1 class="text-center mb-4 text-primary">Welcome to Restaurant</h1>
                        <div class="form-group m-3">
                            <input type="text" class="form-control text-center" id="nama_customer" name="nama_customer" placeholder="Masukkan Nama Anda" required>
                        </div>
                        <div class="form-group m-3">
                            <select name="id_meja" id="meja" class="form-control" required>
                                <option value="" class="form-control text-center">-- Pilih Meja --</option>
                                @foreach ($dataMeja as $meja)
                                    <option value="{{ $meja->id_meja }}" class="form-control text-center my-5">{{ $meja->no_meja }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group d-flex justify-content-center mx-3">
                            <button type="submit" name="pesan" class="btn btn-primary rounded text-center fs-4" style="width: 100%; height: 50px;">Pesan Menu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/wow/wow.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/lib/counterup/counterup.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- TemplateJavascript -->
    <script src="js/main.js"></script>

</body>

</html>