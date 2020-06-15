    <div class="pos-f-t shadow-2 fixed-top">
      <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-white p-4">
            <div class="row">
                <div class="col-sm-6">
                    <a class="dropdown-item" href="dashboard.php"><i class="fas fa-home"></i> Dasboard</a>
                    <a class="dropdown-item" href="students.php"><i class="fas fa-users"></i> Daftar Siswa</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-desktop"></i> Bayar SPP</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-pencil-alt"></i> Edit Pembayaran SPP</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-trophy"></i> Pembayaran Seragam</a>
                </div>
                <div class="col-sm-6">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php"><i class="fas fa-lock"></i> Logout</a>
                </div>
            </div>
        </div>
      </div>
      <nav class="navbar navbar-white bg-white">
        <?php if ($page != 'dashboard'): ?>
            <?php if ($backto == ''){ ?>
                <i class="fas fa-arrow-left pointer" onclick="history.go(-1)"></i>
            <?php } else{ ?>
                <i class="fas fa-arrow-left pointer" onclick="document.location.href='<?= $backto ?>'"></i>
            <?php } ?>
        <?php endif ?>
        <button class="navbar-toggler pointer" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fas fa-list"></span>
        </button>
      </nav>
    </div>