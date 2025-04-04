<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin PHP Server - Dockerized</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007bff; 
            --secondary-color: #6c757d; 
            --background-light: #f8f9fa;
            --background-white: #ffffff;
            --text-dark: #343a40;
            --text-light: #495057;
            --border-color: #dee2e6;
            --box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            --border-radius: 8px;
        }

        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: var(--background-light);
            color: var(--text-dark);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .page-container {
            max-width: 900px; 
            margin: 30px auto;
            padding: 30px;
            background-color: var(--background-white);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        h1, h2 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 0.5rem;
            font-weight: 500; 
        }
        h1 {
            text-align: center;
            font-size: 2rem;
            border-bottom-width: 3px; 
        }
        h2 {
            font-size: 1.5rem;
            margin-top: 2rem;
        }

        .info-box {
            background-color: var(--background-light);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 20px;
            margin-bottom: 2rem; 
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.04);
        }

        .info-item {
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            padding: 10px 15px; 
            border-bottom: 1px dashed var(--border-color); 
            transition: background-color 0.2s ease-in-out; 
        }
        .info-item:last-child {
            border-bottom: none; 
        }
        .info-item:hover {
            background-color: #e9ecef; 
        }

        .info-item .label {
            font-weight: 500; 
            color: var(--text-light);
            flex-shrink: 0; 
            margin-right: 15px; 
        }
        .info-item .value {
            color: var(--text-dark);
            text-align: right;
            word-break: break-all; 
        }

        .intro-text {
            text-align: center;
            color: var(--secondary-color);
            margin-bottom: 2rem; 
            font-style: italic;
        }

        hr {
            border: 0;
            height: 1px;
            background-color: var(--border-color);
            margin: 2rem 0;
        }

        .phpinfo-output {
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 15px;
            margin-top: 1rem;
            overflow-x: auto; 
            background-color: #fdfdfd;
            box-shadow: var(--box-shadow);
        }
        .phpinfo-output table {
            width: 100%;
            border-collapse: collapse;
        }
        .phpinfo-output .e, .phpinfo-output .v {
            padding: 8px 10px !important; 
            border: 1px solid #ddd !important;
        }
        .phpinfo-output .h {
            background-color: var(--primary-color) !important;
            color: var(--background-white) !important;
            font-weight: bold !important;
        }

    </style>
</head>
<body>
    <div class="page-container">
        <h1>Ứng dụng PHP trên Docker</h1>

        <div class="info-box">
            <?php

            function display_info($label, $value) {
                echo "<div class='info-item'>";
                echo "<span class='label'>{$label}:</span>";
                echo "<span class='value'>{$value}</span>";
                echo "</div>";
            }

            display_info("Phiên bản PHP", phpversion());
            display_info("Giờ Server", date("Y-m-d H:i:s T")); 
            display_info("IP Server (Container)", $_SERVER['SERVER_ADDR'] ?? 'N/A'); 
            display_info("Container Hostname/ID", gethostname()); 
            ?>
        </div>

        <p class="intro-text">
            Ứng dụng PHP đơn giản đang chạy trong container Docker, sử dụng server Apache.
        </p>

        <hr>

        <h2>Thông tin chi tiết PHP (<code>phpinfo()</code>)</h2>
        <div class="phpinfo-output">
            <?php
                ob_start(); 
                phpinfo();
                $phpinfo_content = ob_get_clean(); 

                $phpinfo_content = preg_replace('%<style type="text/css">(.*?)</style>%si', '', $phpinfo_content);

                $phpinfo_content = preg_replace('/^<br \/>\s*/i', '', $phpinfo_content);
                $phpinfo_content = preg_replace('/\s*<br \/>$/i', '', $phpinfo_content);

                echo $phpinfo_content;
            ?>
        </div>
    </div>
</body>
</html>