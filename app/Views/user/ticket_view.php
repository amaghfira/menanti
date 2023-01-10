<div class="form-view">
  <div class="form-box">

    <table class="table table-hover">
      <tbody>
      <tr>
        <th>Judul</th>
        <td><?= $ticket['title']; ?></td>
      </tr>
      <tr>
        <th>Deskripsi</th>
        <td><?= $ticket['content']; ?></td>
      </tr>
      <tr>
        <th>Nomor BMN</th>
        <td><?= $ticket['no_bmn']; ?></td>
      </tr>
      <tr>
        <th>Waktu tiket dibuat</th>
        <td><?= $ticket['created_at']; ?></td>
      </tr>
      <tr>
        <th>Status Tiket</th>
        <td><?= $ticket['nama_status']; ?></td>
      </tr>
      <tr>
        <th>Nama Pelapor</th>
        <td><?= $ticket['author_name']; ?></td>
      </tr>
      <tr>
        <th>Email Pelapor</th>
        <td><?= $ticket['author_email']; ?></td>
      </tr>
      <tr>
        <th>Komentar</th>
        <td><?php foreach ($reply as $rep) : ?>
          <?= ' [' . $rep['reply_date'] . '] ' . $rep['name'] . ': ' . $rep['reply_exp']; ?>
          <?= '<br>'; ?>
        <?php endforeach; ?></td>
      </tr>
      <tr>
        <th>Nama yang memperbaiki</th>
        <td><?= $ticket['solver']; ?></td>
      </tr>
      </tbody>
    </table>
  </div>
</div>