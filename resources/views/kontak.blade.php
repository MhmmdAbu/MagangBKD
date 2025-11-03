<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/kontak.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVwM5Jb0f5j0WJv9T1W15V8K5A35aG7oA5S1M6B2bW9N3x0Vj8S8B5aG6b2O4x9T5V0S8B5v0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

@include('navigation.navbar')

<section class="hero kontak-hero">
    <div class="hero-content">
    </div>
</section>

<section class="kontak-content">
    <div class="container">
        <div class="row g-4">
            
            <!-- Maps -->
            <div class="col-lg-7">
                <div class="map-card">
                    <div class="map-placeholder">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1403.0966578227462!2d119.62226355024457!3d-4.011851993660112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d95bb5c01a3e1d7%3A0x909189ace2fcf73d!2sDinas%20PTSP!5e0!3m2!1sid!2sid!4v1761555761617!5m2!1sid!2sid" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Kontak -->
            <div class="col-lg-5">
                
                <!-- Email -->
                <div class="info-card">
                    <div class="info-icon-box"><i class="fas fa-envelope"></i></div>
                    <div class="info-detail">
                        <h5>Email</h5>
                        <p>bkd@gmail.com</p>
                    </div>
                </div>

                <!-- Telpon -->
                <div class="info-card">
                    <div class="info-icon-box"><i class="fas fa-phone"></i></div>
                    <div class="info-detail">
                        <h5>Telepon</h5>
                        <p>08123456789010</p>
                    </div>
                </div>

                <!-- Instagram -->
                <div class="info-card">
                    <div class="info-icon-box"><i class="fab fa-instagram"></i></div>
                    <div class="info-detail">
                        <h5>Instagram</h5>
                        <p>@bkdparepare</p>
                    </div>
                </div>

                <!-- Waktu Pelayanan -->
                <div class="info-card">
                    <div class="info-icon-box"><i class="far fa-clock"></i></div>
                    <div class="info-detail">
                        <h5>Waktu Pelayanan</h5>
                        <p>Senin-Jumat: 09.00-16.00</p>
                    </div>
                </div>

                <!-- {{-- Kartu 5: Lokasi --}} -->
                <div class="info-card">
                    <div class="info-icon-box"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="info-detail">
                        <h5>Location</h5>
                        <p>-4.011529, 119.623193<br>Mallusetasi, Kec. Ujung, Kota Parepare, Sulawesi Selatan</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>