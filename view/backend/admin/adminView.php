<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>
<div id="ensemble">
<!-- Card Body -->
    <div class="chart-area">
        <?php ob_start(); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Liste des membres</h4>
            </div>

            <div class="card-body">
              <div class="table-responsive">
              
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Prénom</th>
                      <th>E-mail</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Prénom</th>
                      <th>E-mail</th>
                    </tr>
                  </tfoot>
                   <?php foreach($task as $membresBlog): ?>
                  <tbody>
                    <tr>
                      <td><?= $membresBlog['id'] ?></td>
                      <td><?= $membresBlog['prenom'] ?></td>
                      <td><?= $membresBlog['email'] ?></td>
                    </tr>
                  </tbody>
                    <?php endforeach ?> 
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
     </div> 

     <!-- Bootstrap core JavaScript-->
  <script src="<?= MON_SITE ?>view/backEnd/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?= MON_SITE ?>view/backEnd/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= MON_SITE ?>view/backEnd/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= MON_SITE ?>view/backEnd/admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= MON_SITE ?>view/backEnd/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= MON_SITE ?>view/backEnd/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= MON_SITE ?>view/backend/admin/js/demo/datatables-demo.js"></script>

              <?php $content = ob_get_clean(); ?>
<?php require('view/backend/admin/admin.php') ?>

</html>