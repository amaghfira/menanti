
<div class="row">
<h5>Daftar Tiket</h5>
</div>
<?php 
// Display Response
if(session()->has('pesan')){
?>
   <div class="alert <?= session()->getFlashdata('alert-class') ?>">
      <?= session()->getFlashdata('pesan'); ?>
   </div>
<?php
}
?>
<?php 
// Display Response
if(session()->has('pesan_add_tiket')){
?>
   <div class="alert <?= session()->getFlashdata('alert-class') ?>">
      <?= session()->getFlashdata('pesan_add_tiket'); ?>
   </div>
<?php
}
?>

<table class="table table-bordered table-hover" id="ticket-lists">
<thead class="thead-dark">
    <tr style="text-align: center;">
        <th>Title</th>
        <th>Content</th>
        <th>Author Name</th>
        <th>Author Email</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php if($tickets): ?>
    <?php foreach($tickets as $ticket): ?>
    <tr>
        <td><?php echo $ticket['title']; ?></td>
        <td><?php echo $ticket['content']; ?></td>
        <td><?php echo $ticket['author_name']; ?></td>
        <td><?php echo $ticket['author_email']; ?></td>
        <td><?php echo $ticket['created_at']; ?></td>
        <td><?php echo $ticket['updated_at']; ?></td>
        <td><?php echo $ticket['status_id']; ?></td>
        <td style="text-align: center;"><a href="<?= base_url('tiket/view/' . $ticket['id']); ?>" class="btn btn-info btn-sm btn-view">View</a> <a href="<?= base_url('tiket/show/' . $ticket['id']); ?>" class="btn btn-success btn-sm btn-edit">Edit</a> <a href="<?= base_url('tiket/delete/' . $ticket['id']); ?>" class="btn btn-danger btn-sm btn-delete" data-id="">Hapus</a></td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</tbody>
</table>

 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#ticket-lists').DataTable({
        "responsive": true, 
        "lengthChange": false, 
        "autoWidth": false
      });
  } );
</script>
</body>
</html>