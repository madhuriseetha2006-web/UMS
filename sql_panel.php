<?php
include 'db.php';

$result_data = null;
$error = "";

if(isset($_POST['run_query'])){

    $query = trim($_POST['query']);

    if($query != ""){

        $run = mysqli_query($conn, $query);

        if($run){
            if(mysqli_num_rows($run) > 0){
                $result_data = $run;
            } else {
                $error = "Query executed successfully (No rows returned).";
            }
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SQL Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">
        <h4 class="mb-3">Admin SQL Panel</h4>

        <form method="POST">
            <textarea name="query" class="form-control mb-3" rows="3" placeholder="Enter SQL Query Here..." required></textarea>
            <button type="submit" name="run_query" class="btn btn-primary">Run Query</button>
        </form>

        <hr>

        <?php if($error != ""){ ?>
            <div class="alert alert-info"><?php echo $error; ?></div>
        <?php } ?>

        <?php if($result_data){ ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped mt-3">
                    <tr>
                        <?php while($field = mysqli_fetch_field($result_data)){ ?>
                            <th><?php echo $field->name; ?></th>
                        <?php } ?>
                    </tr>

                    <?php while($row = mysqli_fetch_assoc($result_data)){ ?>
                        <tr>
                            <?php foreach($row as $value){ ?>
                                <td><?php echo $value; ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>

    </div>

</div>

</body>
</html>