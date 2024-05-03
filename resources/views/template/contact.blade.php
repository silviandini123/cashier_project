@extends('template/layout')

@push('style')
    <style>
        .section-title {
            margin-bottom: 30px;
            text-align: center;
        }

        .history {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .history h4 {
            margin-top: 0;
            color: #333333;
        }

        .history ul {
            list-style-type: none;
            padding: 0;
        }

        .history ul li {
            margin-bottom: 15px;
            line-height: 1.6;
            color: #666666;
        }

        .history ul li strong {
            font-weight: bold;
            color: #007bff;
        }

        .section-title h3 {
            margin-bottom: 20px;
            color: #333333;
            font-size: 26px;
        }

        .section-title p {
            margin-bottom: 30px;
            color: #666666;
            font-size: 16px;
        }

        .section-title img {
            max-width: 50%; /* Perkecil ukuran foto */
            margin: 0 auto 20px;
            display: block;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .map-container {
            text-align: center;
        }

        .map-container iframe {
            max-width: 100%;
            width: 600px;
            height: 450px;
            border: 0;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Style untuk kontak */
        .contact-info {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .contact-info h3 {
            margin-bottom: 10px;
            color: #333333;
            font-size: 20px;
            text-align: center;
        }

        .contact-info ul {
            list-style-type: none;
            padding: 0;
            text-align: left;
        }

        .contact-info ul li {
            margin-bottom: 10px;
            line-height: 1.6;
            color: #666666;
        }

        .contact-info ul li strong {
            font-weight: bold;
            color: #007bff;
        }

        /* Style untuk form pertanyaan */
        .question-form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .question-form h3 {
            margin-bottom: 20px;
            color: #333333;
            font-size: 20px;
            text-align: center;
        }

        .question-form form {
            margin-bottom: 0;
        }

        .question-form label {
            display: block;
            margin-bottom: 10px;
            color: #333333;
        }

        .question-form input[type="text"],
        .question-form textarea {
            width: calc(100% - 22px); /* Perbaikan ukuran input */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px; /* Ubah dari 10px menjadi 20px */
        }

        .question-form textarea {
            height: 100px;
        }

        .question-form button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: block; /* Mengubah dari inline menjadi block */
            margin: 0 auto; /* Posisikan tombol ke tengah */
        }

        .question-form button:hover {
            background-color: #0056b3;
        }
    </style>
@endpush

@section('content')
    <section class="content">
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="dashboard_graph">
                        <div class="section-title">
                            <h3>Kantor Kami</h3>
                            <!-- Tambahkan foto di sini -->
                            <img src="gedung.jpg" class="img-circle profile_img">
                        </div>
                        <!-- Informasi Kontak -->
                        <div class="contact-info">
                            <h3>Hubungi Kami</h3>
                            <ul>
                                <li><strong>Alamat:</strong> [Jl. Raya Bandung]</li>
                                <li><strong>Nomor Telepon:</strong> [8845208402]</li>
                                <li><strong>Email:</strong> [Pt Bayu Mart Jaya Abadi]</li>
                            </ul>
                        </div>

                        <!-- Peta Google Maps -->
                        <div class="section-title map-container">
                            <h3>Lokasi Kami</h3>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d[Latitude]!2d[Longitude]!3d[Zoom Level]!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTPCsDQ3JzQzLjYiTiAxMDLCsDU2JzM1LjkiRQ!5e0!3m2!1sen!2sus!4v1614111256621!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>

                        <!-- Form Pertanyaan -->
                        <div class="section-title question-form">
                            <h3>Ada Pertanyaan?</h3>
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <input type="text" id="nama" name="nama" required>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" required>
                                </div> -->
                                <div class="form-group">
                                    <label for="pertanyaan">Pertanyaan:</label>
                                    <textarea id="pertanyaan" name="pertanyaan" required></textarea>
                                </div>
                                <button type="submit">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
