<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('common.jpeg'); /* Path to your image */
            background-size: cover;
            background-position: center;
            height: 100vh; /* Set the height to fill the viewport */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .overlay {
            background-color: rgba(255, 255, 255, 0.9); /* Overlay color with transparency */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.5); /* Shadow effect */
            max-width: 800px;
            width: 90%;
        }
        .job-container {
            border-radius: 5px;
            background-color: #f0f0f0; /* Light gray background */
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .job-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .job-title {
            font-size: 1.5em;
            font-weight: bold;
            color: #333; /* Dark gray text color */
        }
        .date-posted {
            color: #777;
        }
        .job-responsibilities {
            margin-bottom: 20px;
            color: #555; /* Medium gray text color */
        }
        .responsibility {
            margin-bottom: 10px;
        }
        .ctc {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
            color: #2e7d32; /* Green text color */
        }
        .language-requirement {
            margin-bottom: 20px;
            font-size: 1.2em;
            color: #1565c0; /* Blue text color */
        }
        .apply-by {
            font-size: 1.2em;
            margin-bottom: 20px;
            color: #d32f2f; /* Red text color */
        }
        /* Hide the registration form initially */
        #registration-form {
            display: none;
        }
        #registration-form form input[type="text"],
        #registration-form form input[type="email"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        #registration-form form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        #registration-form form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <title>Job Description Example</title>
</head>
<body>
    <div class="overlay">
        <div class="job-container">
            <div class="job-header">
                <div class="job-title">Actively hiring</div>
                <div class="date-posted">Posted 2 days ago</div>
            </div>
            <h2>Junior Web Application Developer - Microsoft</h2>
            <p class="job-responsibilities">Mumbai</p>
            <div class="ctc">CTC (ANNUAL): 12,00,000 - 15,00,000</div>
            <div class="job-responsibilities">
                <h3>Job Responsibilities:</h3>
                <div class="responsibility">Coding and Programming: Writing clean, efficient, and maintainable code using programming languages such as HTML, CSS, JavaScript, and frameworks like React, Angular, or Vue.js.</div>
                <div class="responsibility">Website Development: Building and maintaining websites and web applications according to project requirements and specifications.</div>
                <div class="responsibility">Bug Fixing and Troubleshooting: Identifying and fixing technical issues, bugs, and errors in web applications to ensure smooth functionality.</div>
                <div class="responsibility">Collaboration: Working closely with other team members such as designers, project managers, and senior developers to develop and implement web solutions.</div>
                <div class="responsibility">Testing and Quality Assurance: Conducting thorough testing of web applications to ensure they meet quality standards, including usability, accessibility, and performance testing.</div>
                <div class="responsibility">Documentation: Documenting code and technical processes for future reference and team collaboration, including writing technical specifications and user manuals.</div>
                <div class="responsibility">Continuous Learning and Skill Development: Keeping up-to-date with the latest web development trends, tools, and technologies, and continuously improving technical skills through self-learning and training opportunities.</div>
            </div>
            <div class="language-requirement">
                <span style="font-weight: bold;">Language Requirement:</span> C , C++ , Python , Java , JavaScript.
            </div>
            <div class="apply-by">
                <span style="font-weight: bold;">APPLY BY:</span> 8th March '24
            </div>
            <button onclick="toggleRegistrationForm()">Register Now</button>
            <!-- Registration Form -->
            <div id="registration-form">
                <h2>Registration Form</h2>
                <form action="" method="POST">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" required><br>
                    
                    <label for="roll_no">Roll No:</label><br>
                    <input type="text" id="roll_no" name="roll_no" required><br>
                    
                    <label for="phone">Phone Number:</label><br>
                    <input type="text" id="phone" name="phone" required><br>
                    
                    <label for="email">Email ID:</label><br>
                    <input type="email" id="email" name="email" required><br>
                    
                    <input type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleRegistrationForm() {
            var form = document.getElementById("registration-form");
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }
    </script>
</body>
</html>

<?php
$insert = false;
if(isset($_POST['name'], $_POST['roll_no'], $_POST['phone'], $_POST['email'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "registration"; // Database name, adjust if necessary

    // Establishing connection
    $con = mysqli_connect($server, $username, $password, $database);
    if(!$con) {
        die("Connection to the database failed: " . mysqli_connect_error());
    }

    // Capturing form data
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Inserting data into the database
    $sql = "INSERT INTO student_table (Name, Roll_no, Mobile_number, Email_id, dtm) VALUES ('$name', '$roll_no', '$phone', '$email', current_timestamp())";
    
    if(mysqli_query($con, $sql)) {
        $insert = true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Closing connection
    mysqli_close($con);
}
?>




                                                      





