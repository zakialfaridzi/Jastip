 <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="nitip.php"> <i class="menu-icon ti-email"></i>Nitip</a>
                    </li>
                    <!-- <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Buka Jasa</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="add-category.php">Tambah Kategori</a></li>
                            <li><i class="fa fa-table"></i><a href="manage-category.php">Manage Kategori</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Nitip</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="manage-pesananmasuk.php">Manage Pesanan Masuk</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="manage-pesanankeluar.php">Manage Pesanan Keluar</a></li>
                        </ul>
                    </li> -->
                    <?php
                    include 'jastip/includes/dbconnection.php';
                    $idlog = $_SESSION['jastip'];
                    $nitip = mysqli_query($con, "SELECT * from tbltransaksi where fk_idpenjasa=$idlog && status='pending';");
                    $i=0;
                    while($ter = mysqli_fetch_array($nitip)) {
                            $i++;
                    }
                    ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Buka Jasa</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="add-jastip.php">Buka Jastip Barang</a></li>
                            <li><i class="fa fa-table"></i><a href="add-jasa.php">Buka Jasa</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Riwayat</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="laporan-pembelian.php">Pembelian</a></li>
                            <li><i class="fa fa-table"></i><a href="laporan-penjualan.php">Jasa Titip</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="list-penitip.php"> 
                            <i class="menu-icon ti-email"></i>Nitip euy
                            <?php 
                            if ($i > 0) { ?>
                                <div style="background: green; color: white; width: 15px; float: right; border-radius: 50px; text-align: center;">  <?php echo $i; ?> 
                                </div>
                            <?php } ?>
                        </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
