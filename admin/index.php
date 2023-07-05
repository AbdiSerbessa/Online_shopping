<?php
session_start();
include ("../db.php");
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
}
include "./templates/top.php";

?>
<?php include "./templates/navbar.php"; ?>

<div class="container-fluid">
  <div class="row">

    <?php include "./templates/sidebar.php"; ?>



      <h2><center>Admin Details</center></h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="admin_list">
            <tr>
              <td>1,000</td>
              <td>online</td>
              <td>active</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/admin.js"></script>
