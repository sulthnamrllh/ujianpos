<?php
include_once 'config/database.php';

// Menghitung jumlah supplier
$querySupplier = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM suppliers");
$dataSupplier = mysqli_fetch_assoc($querySupplier);
$totalSupplier = $dataSupplier['total'];

// Menghitung jumlah sales
$querySales = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM sales");
$dataSales = mysqli_fetch_assoc($querySales);
$totalSales = $dataSales['total'];
?>

<div class="card">
    <div class="card-body">
        <div class="text-center py-4">
            <img src="img/unnamed.png" alt="Logo POS" width="100" class="mb-3">
            <h1 class="h2">Aplikasi Point Of Sales</h1>
            <p class="text-secondary">
                Dashboard jumlah data Suppliers dan Sales.
            </p>
        </div>

        <div class="row g-4 justify-content-center">

            <!-- Total Suppliers -->
            <div class="col-md-5">
                <div class="card h-100 border-primary" >
                    <div class="card-body text-center py-4">
                        <h2 class="h5 text-primary">Total Suppliers</h2>
                        <h1 class="display-3 fw-bold">
                            <?= $totalSupplier; ?>
                        </h1>
                        <p class="text-secondary mb-0">
                            Jumlah seluruh supplier
                        </p>
                    </div>
                </div>
            </div>

            <!-- Total Sales -->
            <div class="col-md-5">
                <div class="card h-100 border-success">
                    <div class="card-body text-center py-4">
                        <h2 class="h5 text-success">Total Sales</h2>
                        <h1 class="display-3 fw-bold">
                            <?= $totalSales; ?>
                        </h1>
                        <p class="text-secondary mb-0">
                            Jumlah seluruh transaksi sales
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>