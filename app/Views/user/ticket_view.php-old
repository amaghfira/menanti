<form>
  <div class="form-group">
    <label for="title">Judul</label>
    <input type="text" class="form-control" id="title" name="title" value="<?= $ticket['title']; ?>" readonly> 
  </div>
  <div class="form-group">
    <label for="content">Deskripsi</label>
    <textarea class="form-control" id="content" name="content" rows="3" value="<?= $ticket['content']; ?>" readonly><?= $ticket['content']; ?></textarea>
  </div>
  <div class="form-group">
    <label for="created">Waktu Tiket Dibuat</label>
    <input type="datetime" class="form-control" id="created" name="created" value="<?= $ticket['created_at']; ?>" readonly>
  </div>
  <div class="form-group">
    <label for="status">Status Tiket</label>
    <select class="form-control" id="status" name="status" value="<?= $ticket['status_id']; ?>" readonly>
      <option value="1">Open</option>
      <option value="2">Closed</option>
    </select>
  </div>
  <div class="form-group">
    <label for="author_name">Nama Pelapor</label>
    <input type="text" class="form-control" id="author_name" name="author_name" value="<?= $ticket['author_name']; ?>" readonly>
  </div>
  <div class="form-group">
    <label for="author_email">Email Pelapor</label>
    <input type="email" class="form-control" id="author_email" name="author_email" value="<?= $ticket['author_email']; ?>" readonly>
  </div>
  <div class="form-group">
    <label for="comment">Komentar</label>
    <textarea class="form-control" id="comment" name="comment" rows="3" readonly>
        <?php foreach ($reply as $rep) { ?>
          <?php print $rep['reply_exp']; ?>
        <?php  } ?>
    </textarea>
  </div>
  <div class="form-group">
    <label for="solver_name">Nama yang Memperbaiki</label>
    <input type="text" class="form-control" id="solver_name" name="solver_name" readonly value="<?php echo $ticket['solver']; ?>">
  </div>

</form>