<?php
include "Connection/connect.php";

if ($connect->connect_error) {
  die("Error connecting to database: " . $connect->connect_error);
}

$sql = "SELECT * FROM author";

$result = $connect->query($sql);
?>

<!doctype html>
<html lang="en">

<head>
  <title>Author</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">SS06 </a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item" href="author.php">Authors</a>
              <a class="dropdown-item" href="book.php">Book</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  
  <main class="p-5">
    <h3 class="text-center text-success">
      All Authors / Artists
    </h3>
    <div class="container-fluid">
      <a href="Create/createAuthor.php" class="btn btn-outline-success">Add Author</a>
      <table class="table table-bordered table-hover">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Handle Action</th>
        </tr>

        <?php if ($result->num_rows > 0) { ?>
          <?php foreach ($result as $key => $value) { ?>
            <tr>
              <th>
                <?= $value['id'] ?>
              </th>
              <td>
                <?= $value['name'] ?>
              </td>
              <td style="width: 20%;">
                <a href="Update/updateAuthor.php?id=<?= $value['id']?>" class="btn btn-outline-success">
                  Update
                </a>
                <a href="Deleting/delAuthor.php?id=<?= $value['id']?>" class="btn btn-outline-danger">
                  Delete
                </a>
              </td>
            </tr>
          <?php } ?>
        <?php } else { ?>
          <p class="text-danger">0 Data Returned</p>
        <?php } ?>
      </table>
    </div>

  </main>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>