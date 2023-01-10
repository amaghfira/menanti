<form method="post" action="<?= base_url('TiketUser/add_new/'); ?>">
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
    </select>
  </div>
  <div class="form-group">
    <label for="author_name">Nama Pelapor</label>
    <input type="text" class="form-control" id="author_name" name="author_name" value="<?= $nama; ?>" required>
  </div>
  <div class="form-group">
    <label for="author_email">Email Pelapor</label>
    <input type="email" class="form-control" id="author_email" name="author_email" value="<?= $auth['email']; ?>" required>
  </div>

  <button type="submit" class="btn btn-md btn-primary">Add Ticket</button>

</form>