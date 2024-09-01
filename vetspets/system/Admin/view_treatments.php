<?php
include('includes/config.php');
include('includes/header.php');

// Retrieve treatment details from the database
$query = "SELECT * FROM treatments";
$result = mysqli_query($con, $query);

?>

<div class="container mt-4">
  <h2 class="text-center">Treatment Record Details</h2>
  <br>
  <?php if (mysqli_num_rows($result) > 0): ?>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Treatment</th>
            <th>Treatment Cost</th>
            <th>Note</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['treatment']; ?></td>
              <td><?php echo $row['treatment_cost']; ?></td>
              <td><?php echo $row['note']; ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <p class="text-center">No treatment details found.</p>
  <?php endif; ?>

</div>

<?php
include('includes/footer.php');
include('includes/script.php');
?>
