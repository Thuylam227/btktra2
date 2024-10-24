<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">PHP Example</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        <a class="nav-link" href="connect.php">Connect MySQL</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container my-3">
        <nav class="alert alert-primary" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Index</li>
            </ol>
        </nav>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            session_start();
            if (isset($_SESSION['server'], $_SESSION['database'], $_SESSION['username'], $_SESSION['password'])) {
                $conn = new mysqli(
                    $_SESSION['server'],
                    $_SESSION['username'],
                    $_SESSION['password'],
                    $_SESSION['database']
                );

                if ($conn->connect_error) {
                    die('error: ' . $conn->connect_error);
                }

                $result = $conn->query("SELECT * FROM db_lam_phuong_thuy");

                if ($result->num_rows > 0) {
                    echo '<table class="table table-striped table-bordered">';
                    echo '<thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
            </tr>
          </thead>
          <tbody>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                <td>' . $row['Title'] . '</td>
                <td>' . $row['Description'] . '</td>
                <td><img src="' . $row['ImageURL'] . '" alt="Course Image" class="img-fluid" style="max-width: 100px;"></td>
              </tr>';
                    }

                    echo '</tbody></table>';
                } else {
                    echo '<p>No courses found</p>';
                }

                $conn->close();
            } else {
                echo '<p>error</p>';
            }
            ?>
        </div>

        <hr>

        <!--Write -->
        <form class="row" method="POST" enctype="multipart/form-data">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="filename" placeholder="File name" name="filename" value="data">
                    <label for="filename">File name</label>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Write file</button>
            </div>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $filename = $_POST['filename'] . '.txt';

            if (isset($_SESSION['server'], $_SESSION['database'], $_SESSION['username'], $_SESSION['password'])) {
                $conn = new mysqli(
                    $_SESSION['server'],
                    $_SESSION['username'],
                    $_SESSION['password'],
                    $_SESSION['database']
                );

                if ($conn->connect_error) {
                    die('Kết nối thất bại: ' . $conn->connect_error);
                }

                $result = $conn->query("SELECT * FROM db_lam_phuong_thuy");
                if ($result->num_rows > 0) {
                    $content = "Danh sách các khóa học:\n";
                    while ($row = $result->fetch_assoc()) {
                        $content .= "ID: " . $row['ID'] . "\n";
                        $content .= "Title: " . $row['Title'] . "\n";
                        $content .= "Description: " . $row['Description'] . "\n";
                        $content .= "Image URL: " . $row['ImageURL'] . "\n\n";
                    }
                    if (file_put_contents($filename, $content)) {
                        echo '<p>File written successfully: ' . $filename . '</p>';
                    } else {
                        echo '<p>Failed to write file</p>';
                    }
                } else {
                    echo '<p>No courses available to write</p>';
                }
                $conn->close();
            } else {
                echo '<p>No database connection information available in session</p>';
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>