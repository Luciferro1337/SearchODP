<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CARI ODP BY LUCIFERRO</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Glitch&display=swap" rel="stylesheet">

    <style>
        body,
        html {
            font-family: "Rubik Glitch", sans-serif;
            margin: 0;
            padding: 0;
            background: url('https://images8.alphacoders.com/136/thumb-1920-1360572.png') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            overflow-x: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.6); /* Adjust opacity as needed */
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .btn-primary {
            margin-top: 1rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
        }
    </style>

    <script>
        function prepareForm() {
            var sto = document.getElementById('sto').value;
            var odc = document.getElementById('odc').value;
            var odp = document.getElementById('odp').value;

            // Hanya proses jika ODP diisi
            if (odp) {
                // Cek jika ODP sudah dimulai dengan format yang benar
                if (!odp.startsWith('ODP-') && (sto || odc)) {
                    // Tambahkan prefix sesuai dengan nilai STO dan ODC
                    odp = 'ODP-' + (sto || '') + '-' + (odc || '') + '/' + odp.split('/').pop();
                }

                // Update nilai ODP di form
                document.getElementById('odp').value = odp;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">CARI ODP BY LUCIFERRO</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" target="_blank" onsubmit="prepareForm()">
            <div class="form-group">
                <label for="sto">STO:</label>
                <input type="text" class="form-control" id="sto" name="sto" pattern="[A-Za-z0-9]+" title="Please fill out this field.">
            </div>
        
            <div class="form-group">
                <label for="odc">ODC:</label>
                <input type="text" class="form-control" id="odc" name="odc" pattern="[A-Za-z0-9]+" title="Please fill out this field.">
            </div>
        
            <div class="form-group">
                <label for="odp">ODP:</label>
                <input type="text" class="form-control" id="odp" name="odp" required>
            </div>
            <button type="submit" class="btn btn-primary">GASKAN !</button>
        </form>
        <h4 class="text-center mt-4">Untuk Dapat Mencari ODP Pertama Anda Harus Login ke dalam Web Ixsa Terlebih Dahulu!</h4>
        <a href="https://ixsa.telkom.co.id/3.0/">ixsa.telkom.co.id</a>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil nilai parameter dari form
            $sto = isset($_POST['sto']) ? $_POST['sto'] : '';
            $odc = isset($_POST['odc']) ? $_POST['odc'] : '';
            $odp = isset($_POST['odp']) ? $_POST['odp'] : '';

            // Validasi input (opsional)
            if (empty($odp)) {
                echo "<div class='alert alert-danger mt-3'>Parameter ODP harus diisi.</div>";
                exit;
            }

            // Base URL tujuan
            $base_url = "https://ixsa.telkom.co.id/3.0/index.php/uimodp_index/detail?reg=7&witel=PAPUA%20BARAT";

            // Gabungkan parameter menjadi URL tanpa mengubah karakter '/'
            $merged_url = $base_url;

            // Tambahkan parameter STO, ODC, dan ODP jika tersedia
            if ($sto && $odc && $odp) {
                $merged_url .= "&sto=" . urlencode($sto) . "&odc=" . urlencode($odc) . "&odp=" . urlencode($odp);
            } elseif ($odp) {
                $merged_url .= "&odp=" . urlencode($odp);
            }

            // Redirect ke URL yang telah digabungkan
            echo "<script>window.location.href = '$merged_url';</script>";
            exit;
        }
        ?>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
