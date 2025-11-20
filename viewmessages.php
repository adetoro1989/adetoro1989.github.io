<?php 
include "auth.php"; 
include "dbconnect.php"; 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>All Messages</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include "navbar.php"; ?>

<div class="container py-4">
  <h2 class="mb-3">All Messages</h2>

  <?php if (isset($_GET['added'])): ?>
    <div class="alert alert-success">Messages saved successfully.</div>
  <?php endif; ?>

  <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>SUBJECT</th>
          <th>MESSAGE</th>
          <th>CREATED AT</th>
          <th>CLEAR</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $res = $conn->query("SELECT * FROM messages ORDER BY id DESC");

        if ($res && $res->num_rows > 0):
          while ($row = $res->fetch_assoc()):
        ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= htmlspecialchars($row['name'], ENT_QUOTES) ?></td>
              <td><?= htmlspecialchars($row['email'], ENT_QUOTES) ?></td>
              <td><?= htmlspecialchars($row['subject'], ENT_QUOTES) ?></td>
              <td><?= htmlspecialchars($row['message'], ENT_QUOTES) ?></td>
              <td><?= $row['created_at'] ?></td>
              <td><a class="btn btn-danger" href="deletemessage.php?id=<?php echo $row['id']; ?>">Delete</a></td>
            </tr>
        <?php
          endwhile;
        else:
        ?>
          <tr><td colspan="6" class="text-center">No messages found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
