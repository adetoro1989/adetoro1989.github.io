<?php include "auth.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>My Message Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container py-5">
  <h1 class="display-6 mb-4">Welcome Back 👋</h1>

  <div class="row g-4">
    <div class="col-md-4">
      <a class="text-decoration-none" href="viewmessages.php">
        <div class="card shadow-sm h-100">
          <div class="card-body text-center">
            <h2 class="card-title fs-4 mb-2">View Messages</h2>
            <p class="card-text">View all Messages posted on the site.</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a class="text-decoration-none" href="delete_messages.php">
        <div class="card shadow-sm h-100">
          <div class="card-body text-center">
            <h2 class="card-title fs-4 mb-2">Delete Messages</h2>
            <p class="card-text">Delete Selected Messages.</p>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>