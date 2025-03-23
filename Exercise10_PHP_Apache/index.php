<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>PHP Server Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            color: #0056b3;
            text-align: center;
        }
        .info {
            background-color: #e9ecef;
            padding: 15px;
            border: 1px solid #ced4da;
            border-radius: 3px;
            margin-top: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        .info p:nth-child(odd) {
            background-color: #f8f9fa;
            padding: 5px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to PHP Docker Application</h1>
        <div class="info">
            <?php
            echo "<p><b>PHP Version:</b> " . phpversion() . "</p>";
            echo "<p><b>Server Time:</b> " . date("Y-m-d H:i:s") . "</p>";
            echo "<p><b>Server IP:</b> " . $_SERVER['SERVER_ADDR'] . "</p>";
            echo "<p><b>Container ID:</b> " . gethostname() . "</p>";
            ?>
        </div>
        <p style="margin-top: 20px; text-align: center;">
            Simple PHP application running on Docker container, using Apache server.
        </p>
        <hr>
        <h2>Detailed information about PHP (phpinfo()):</h2>
        <?php
            phpinfo();
        ?>
    </div>
</body>
</html>
