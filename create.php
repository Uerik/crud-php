<?php 

    require('config.php');


    $name = "";
    $email = "";
    $phone = "";
    $address = "";

    $errorMessage="";
    $successMessage ="";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        do{
            if (empty($name) || empty($email) || empty($phone) || empty($address)) {
                $errorMessage = "all the fields are required";
                break;
            }

            // add bew client to database
            $sql = "INSERT INTO clients (name, email, phone, address)" . 
                    "VALUES ('$name', '$email', '$phone', '$address')";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = 'Invalid query: ' . $connection->error;
                break;
            }

            $name = "";
            $email = "";
            $phone = "";
            $address = "";

            $successMessage = "Client add correctly";
            header('location:/myshop/index.php');
            exit;

        } while(false);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>New Client</h2>

        <?php 
            if (!empty($errorMessage)) {
                echo "
                    <div class='alert alert-warning alertdismissible fade show' role='alert'>
                        <strong>$errorMessage</strong>
                        <button class='btn btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                "; 
                

            }
        ?>

        <form  method="post">
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>"> 
                </div>
            </div>

            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Phone:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Address:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>


            <?php 
                if (!empty($successMessage)) {
                    echo
                    "
                        <div class='row mb-3'>
                            <div class='offset-sm-3 col-sm-6'>
                                <div class='alert alert-success alert-dismissible'>
                                    <strong>$successMessage</strong>
                                    <button class='btn btn-close' data-bs-dismiss='alert'</button>
                                </div>
                            </div>
                        </div>
                    ";
                    
                }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="/myshop//index.php" class="btn btn-outline-primary">Cancel</a>
                </div>
            </div>
        </form>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>