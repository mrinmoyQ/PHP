<?php

// Connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

//die if connection wasn't successful
if (!$conn) {
  die("Failed to Connect" . mysqli_connect_error() . "<br>");
}

$insert = false;
$update = false;
$delete = false;
if (isset($_GET['delete'])) {
  $sno = $_GET['delete'];
  $sql = "DELETE FROM `notes` WHERE `notes`.`sno` = $sno";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $delete = true;
  } else {
    mysqli_error($conn) . "<br>";
  }

}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST["snoEdit"])) {
    // Update the record
    $sno = $_POST["snoEdit"];
    $title = $_POST["titleEdit"];
    $description = $_POST["descriptionEdit"];

    //sql query execution
    $sql = "UPDATE `notes` SET `title` = '$title' , `description` = '$description' WHERE `notes`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $update = true;
    } else {
      echo "no luck" . mysqli_error($conn) . "<br>";
    }

  } else {
    $title = $_POST["title"];
    $description = $_POST["description"];

    //sql query execution
    $sql = "INSERT INTO `notes` ( `title`, `description`,`timestamp`) VALUES ( '$title', '$description', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $insert = true;
    } else {
      echo "no luck" . mysqli_error($conn) . "<br>";
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <title>Project 1 - PHP CRUD TO-DO list</title>

</head>

<body>
  <!-- edit modal -->
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
    Edit Modal
  </button> -->

  <!-- edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/crud/index.php" method="post">
            <input type="hidden" class="snoEdit" id="snoEdit" name="snoEdit">
            <div class="mb-3">
              <label for="title" class="form-label">Notes Titles</label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="desc">Note Description</label>
              <textarea class="form-control" placeholder="Leave a comment here" id="descriptionEdit"
                name="descriptionEdit" style="height: 100px"></textarea>
            </div>
            <button type="submit" class="btn btn-primary my-2">Update Note</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">CRUD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <?php
  if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Hooray! Your record has been inserted successfully<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
  }
  if ($delete) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Your record has been deleted successfully<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
  }
  if ($update) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Hooray! Your record has been updated successfully<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
  }
  ?>
  <div class="container my-4">
    <h2>Add a Note</h2>
    <form action="/crud/index.php" method="post">
      <div class="mb-3">
        <label for="title" class="form-label">Notes Titles</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="desc">Note Description</label>
        <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description"
          style="height: 100px"></textarea>
      </div>
      <button type="submit" class="btn btn-primary my-2">Submit</button>
    </form>
  </div>

  <div class="container my-4">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">sno</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `notes`";
        $result = mysqli_query($conn, $sql);
        $sno = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo "
          <tr>
          <th scope='row'>" . $sno++ . "</th>
          <td>" . $row['title'] . "</td>
          <td>" . $row['description'] . "</td>
          <td><button class='edit btn btn-sm btn-primary my-1' id =" . $row['sno'] . ">Edit</button> <button class='delete btn btn-sm btn-danger' id =" . $row['sno'] . ">Delete</button></td>
        </tr>";
        }

        ?>

      </tbody>
    </table>
  </div>
  <hr>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

  <script>
    let table = new DataTable('#myTable');
  </script>

  <script>
    let edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit",);
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        console.log(title, description);
        titleEdit.value = title;
        descriptionEdit.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id);
        $('#editModal').modal('toggle');
      });
    });

    let deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit",);
        sno = e.target.id;
        if (confirm("Press a button")) {
          console.log("yes");
          window.location = `/crud/index.php?delete=${sno}`;
        } else {
          console.log("NO");
        }
      });
    });
  </script>

</body>

</html>