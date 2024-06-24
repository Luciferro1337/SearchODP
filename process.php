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
