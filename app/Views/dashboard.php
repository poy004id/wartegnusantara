<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            </div>
        </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">Sales Graph</h5>
                        </div>
                        <div class="card-body">
                            <p>Halaman sales graph</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">Latest Transaction</h5>
                        </div>
                        <div class="card-body">
                            <p>Halaman latest transaction</p>
                        </div>
                        <div class="card-body">
                            <p>Menu favorit</p>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Menu</th>
                                            <th>Total </th>
                                            <th>Harga </th>

                                            <th>Total_harga </th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                          <?php foreach ($menu_fav as $key => $row): ?>
                                        <tr>
                                            <td><?php echo $key +1; ?></td>
                                            <td><?php echo $row['nama_menu']; ?></td>
                                            <td><?php echo $row['total_penjualan']; ?></td>
                                            <td><?php echo $row['harga']; ?></td>

                                            <td><?php echo $row['total_penjualan'] * $row['harga']; ?></td>
                                        </tr>




                                       <?php endforeach; ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
