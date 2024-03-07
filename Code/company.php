<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hire Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('hire1.jpg'); /* Replace 'background.jpg' with your image path */
            background-size: cover;
            z-index: -1; /* Ensure the background is behind other content */
        }

        .container {
            position: relative;
            max-width: 400px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.9); /* Adding transparency */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
        }

        h2 {
            margin-bottom: 30px;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 18px;
        }

        input[type="text"],
        input[type="date"],
        button {
            width: 100%;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 18px;
            transition: border-color 0.3s ease-in-out;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        button:focus {
            outline: none;
            border-color: #007bff;
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border: none;
            font-size: 20px;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #0056b3;
        }

        input[type="text"],
        input[type="date"],
        button {
            margin-bottom: 25px;
        }

        @media(max-width: 480px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="background"></div>
    <div class="container">
        <h2>Hire Form</h2>
        <form id="hireForm" action="" method="post">
            <div class="form-group">
                <label for="companyName">Company Name:</label>
                <input type="text" id="Company_Name" name="Company_name" required>
            </div>
            <div class="form-group">
                <label for="branch">Branch:</label>
                <input type="text" id="branch" name="branch" required>
            </div>
            <div class="form-group">
                <label for="dateOfVisit">Date of Visit:</label>
                <input type="date" id="date_of_v" name="date_of_v" required>
            </div>
            <button type="submit" name="submit" value="submit">Hire</button>
        </form>
    </div>

</body>
</html>
<?php
$insert = false;
if(isset($_POST['Company_name'], $_POST['branch'], $_POST['date_of_v'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "company"; // Database name, adjust if necessary

    // Establishing connection
    $con = mysqli_connect($server, $username, $password, $database);
    if(!$con) {
        die("Connection to the database failed: " . mysqli_connect_error());
    }

    // Capturing form data
    $Company_name = $_POST['Company_name'];
    $branch = $_POST['branch'];
    $date_of_v= $_POST['date_of_v'];

    // Inserting data into the database
    $sql = "INSERT INTO company (Company_name, branch, date_of_v, dtm) VALUES ('$Company_name', '$branch', '$date_of_v', current_timestamp())";
    
    if(mysqli_query($con, $sql)) {
        $insert = true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Closing connection
    mysqli_close($con);
}
?>