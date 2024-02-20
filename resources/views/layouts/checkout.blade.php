<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>restaurant</title>
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
    <link href="/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    /* Set background color */
    body {
        background-color: #EAA636;
    }
</style>

<body>
    
    <div class="container-fluid bg-primary" style="height:500px">
        <div class="row justify-content-center align-items-center fadeIn" data-wow-delay="0.3s">
            <div class="col-md-6 my-5 text-center">
                <span class="display-1 text-light">SILAHKAN TUNGGU</span> 
            <br> <hr class="text-light">
            <span class="display-5 lead text-light">Pesanan anda sedang diproses</span>
        </div>
    </div>
</div>

<script>
    setTimeout(function(){
        window.location.href = "{{ route('register.index') }}";
    }, 3000); // 3000 milidetik = 3 detik
</script>



<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/lib/wow/wow.min.js"></script>
<script src="/assets/lib/easing/easing.min.js"></script>
<script src="/assets/lib/waypoints/waypoints.min.js"></script>
<script src="/assets/lib/counterup/counterup.min.js"></script>
<script src="/assets/lib/owlcarousel/owl.carousel.min.js"></script>

<script src="/assets/js/main.js"></script>

</body>

</html>