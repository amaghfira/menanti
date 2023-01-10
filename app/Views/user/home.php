<div class="row">
<div class="col-lg-3 col-6">

    <?php 
    
      // $session = session();
      // echo $session->username;
      // echo $session->nama;
      // echo $session->role;
      // echo $_SESSION['nama'];
    ?>
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $total_ticket->tot; ?></h3>

                <p>Total Tiket</p>
              </div>
              <div class="icon">
                <i class="ion ion-chatbox-working"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $new_ticket->tot; ?><sup style="font-size: 20px"></sup></h3>

                <p>Tiket Baru</p>
              </div>
              <div class="icon">
                <i class="ion ion-pricetags"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $pending_ticket->tot; ?></h3>

                <p>Tiket Pending</p>
              </div>
              <div class="icon">
                <i class="ion ion-load-a"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $closed_ticket->tot; ?></h3>

                <p>Tiket Selesai</p>
              </div>
              <div class="icon">
                <i class="ion ion-thumbsup"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->