<!doctype html>
<html lang="en">

<head>
    <title>Add Course</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    </script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
    </script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js">
    </script>
    <link rel="stylesheet" href="style/style.css">

    <link rel="stylesheet" href=" ../plugins/richtexteditor/rte_theme_default.css"  />  
    <script type="text /javascript" src="../plugins/richtexteditor/rte.js"></script>  
    <script type="text /javascript" src='../plugins/richtexteditor/plugins/all_plugins.js'></script>  
</head>

<body>
    <!-- required bootstrap js -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/logo.png
              " alt="" , height="34">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-muted h4" href="#">Smart Learn</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item m-2">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link" href="profile_view.php">Profile</a>
                    </li>
                    <li class="nav-item m-2">
                        <a href="add_course.php" class="card-link btn btn-primary">Add Courses</a>
                    </li>
                    <li class="nav-item m-2">
                        <a href="logout.php" class="card-link btn btn-outline-success">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Items for Course</h5>
            <p class="card-text"></p>
            <form action="add_video_course.php" class="card-text">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Please Select Video File</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <div class="text-warning">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <input type="submit" value="Upload" class="btn btn-primary">
        </div>
        </form>
    </div>
    <textarea id="inp_editor1" >
 &lt;p&gt;Initial Document Content&lt;/p&gt; 
</textarea>  
    <div class="container-fluid">
        <div class=" my-2">
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

            ?>
            <div class="table-responsive-md">
                <table class="table table-striped table-bordered" id="sortTable">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Title</th>
                            <th scope="col">File</th>
                            <th scope="col">Text</th>
                            <th scope="col">Date</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php


                        $id = 1;
                        $sql = "SELECT * FROM `student` WHERE 1";

                        $qurey = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_array($qurey)) {


                            echo '<tr>';
                            echo '<th scope="row">' . $id++ . '</th>';
                            echo '<td>' . $row['s_name'] . '</td>';
                            echo '<td>' . $row['s_address'] . '</td>';
                            echo '<td>' . $row['s_pincode'] . '</td>';
                            echo '<td>' . $row['s_email'] . '</td>';
                            echo '<td class="">
                        <a class="btn btn-primary my-1 " href="approve.php?id=' . $row['s_id'] . '">Delete</a></td>
                        <td>
                        <a class="btn btn-danger my-1" href="decline.php?id=' . $row['s_id'] . '">Edit</a>
                        </td>';
                            echo '</tr>';
                        }
                        ?>

                    </tbody>
                </table>
                <hr>
            </div>
        </div>
        <!-- Scripts -->

        <script>
            $('#sortTable').DataTable();
        </script>
        <script>
            var editor1 = new RichTextEditor("#inp_editor1");
        </script>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>