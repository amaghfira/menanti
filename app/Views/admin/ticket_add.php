<form method="post" action="<?= base_url('tiket/add_new/'); ?>">
  <div class="form-group">
    <label for="title">Judul Masalah</label>
    <input type="text" class="form-control" id="title" name="title" value="" required>
  </div>
  <div class="form-group">
    <label for="content">Deskripsi Masalah</label>
    <textarea class="form-control" id="content" name="content" rows="3" value="" required></textarea>
  </div>
  <div class="form-group">
    <label for="bmn">Nomor BMN</label>
    <input type="text" class="form-control" id="bmn" name="bmn" value="" required>
  </div>
  <div class="form-group">
    <label for="category">Kategori</label>
    <select class="form-control" id="category" name="category" required>
      <option value="1">Tablet</option>
      <option value="2">Laptop/Notebook</option>
      <option value="3">PC/Komputer</option>
      <option value="4">Printer</option>
      <option value="5">Scanner</option>
      <option value="6">UPS</option>
      <option value="7">Lainnya</option>
    </select>
  </div>
  <div class="form-group">
    <label for="author_name">Nama Pelapor</label>
    <input type="text" class="form-control" id="author_name" name="author_name" value="<?= $name; ?>" required>
  </div>
  <div class="form-group">
    <label for="author_email">Email Pelapor</label>
    <input type="email" class="form-control" id="author_email" name="author_email" value="<?= $auth['email']; ?>" required>
  </div>
  <div class="form-group">
    <label for="solver_name">Nama yang Memperbaiki</label>
    <!-- <input type="text" class="form-control" id="solver_name" name="solver_name" placeholder="Masukkan nama yang memperbaiki disini" required> -->
    <select class="form-control" id="solver_name" name="solver_name" required>
      <?php if ($orang) : ?>
        <?php foreach($orang as $org): ?>
          <option value="<?= $org['nama'] ?>"><?= $org['nama']; ?></option>
        <?php endforeach; ?>
      <?php endif; ?>
    </select>
  </div>

  <button type="submit" class="btn btn-md btn-primary">Add Ticket</button>

</form>