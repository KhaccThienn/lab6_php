<?php
include "../Connection/connect.php";

$name = "";
$price = "";
$image = "";
$author_id = "";

$succMessage = "";
$errors = [];

$sqlpro = "SELECT id, name FROM author";
$category = $connect->query($sqlpro);
$rows = $category->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  if (!isset($_GET['id'])) {
    header("location: ../category.php");
    exit;
  }

  $id = $_GET['id'];
  $sql = "SELECT * FROM book WHERE id = $id";
  $result = mysqli_query($connect, $sql);
  $row = $result->fetch_assoc();

  $name = $row['name'];
  $price = $row['price'];
  $image = $row['image'];
  $author_id = $row['author_id'];

} else {

  $id = $_POST['id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $image = $_POST['image'];
  $author_id = $_POST['author_id'];

  do {
    if (empty($id) || empty($name) || empty($price) || empty($author_id) || empty($image)) {
      $errMessage = "All Fields are required !";
      break;
    }

    $sql = "UPDATE book SET name = '$name', price = '$price',image = '$image', author_id = $author_id WHERE id = $id";
    $results = $connect->query($sql);

    if (!$results) {
      $errMessage = "Invalid Query" . $conn->connect_error;
      break;
    }

    $succMessage = "Update Successfully";

    header("location: ../book.php");
    exit;
  } while (false);
}


?>

<!doctype html>
<html lang="en">

<head>
  <title>Update Book</title>
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
            <a class="nav-link" href="../home.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item" href="../author.php">Authors</a>
              <a class="dropdown-item" href="../book.php">Book</a>
            </div>
          </li>
        </ul>
        <form class="form-inline d-flex justify-content-between my-2 my-lg-0">
          <a href="../Create/createAuthor.php" class="btn btn-outline-success btn-block">Add Author</a>
          <a href="../Create/createBook.php" class="btn btn-outline-dark btn-block">Add Book</a>
        </form>
      </div>
    </div>

  </nav>

  <main class="p-5">
    <h3 class="text-center text-success">
      Update A Book
    </h3>
    <form method="POST">
      <div class="container">

        <?php foreach ($errors as $err) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>
              <?php echo $err; ?>
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endforeach; ?>

        <?php if (!empty($succMessage)) { ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>
              <?php echo $succMessage; ?>
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>



        <input type="hidden" value="<?= $id ?>" name="id">
        <div class="form-group">
          <label for="name">Book's Name</label>
          <input type="text" name="name" id="name" class="form-control" value="<?= $name ?>">
        </div>
        <div class="form-group">
          <label for="price">Book's Price</label>
          <input type="text" name="price" id="price" class="form-control" value="<?= $price ?>">
        </div>
        <div class="form-group">
          <label for="image">Book's Image</label>
          <input type="text" name="image" id="image" class="form-control" value="<?= $image ?>">
        </div>
        <div class="form-float mb-4">
          <label for="author_id">Author ID</label>

          <select name="author_id" id="author_id" class="form-select">

            <?php if ($category->num_rows > 0) { ?>
              <?php foreach ($category as $key => $value) { ?>
                <?php if ($value['id'] == $author_id) { ?>
                  <option value="<?= $value['id'] ?>" selected>
                    <?= $value['name'] ?> (<?= $value['id'] ?>)
                  </option>
                <?php } else { ?>
                  <option value="<?= $value['id'] ?>">
                    <?= $value['name'] ?> (<?= $value['id'] ?>)
                  </option>
                <?php } ?>
              <?php } ?>
            <?php } ?>

          </select>

        </div>
        <button type="submit" class="btn btn-outline-primary btn-block">Add An Author / Artist</button>
      </div>

    </form>
  </main>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>