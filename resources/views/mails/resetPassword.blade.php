<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .card {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            padding: 20px;
            background-color: #464AC8;
            color: #ffffff;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-body {
            padding: 20px;
            background-color: #f7f7f7;
        }

        .btn-reset {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #0841ec;
            text-decoration: none;
            border-radius: 4px;
        }

        .card-footer {
            padding: 10px 20px;
            background-color: #ffffff;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h5>Password Reset</h5>
        </div>
        <div class="card-body">
            <p>
                Dear <strong>{{ $username }}</strong>,
            </p>
            <p>
                You have requested to reset your password. Please click on the following link to proceed with the password reset process:
            </p>
            <p>
                <a href="http://127.0.0.1:8081/resetPassword/LnMX9S3NfcbHZ5PsIA3pR4ShOcKZGHMj161EBTtt" class="btn-reset" style="color: #fffdfd">Reset Password</a>

            </p>
            <p>
                If you did not initiate this request, you can ignore this email.
            </p>
            <p>
                Best regards,<br>
                BootCoders
            </p>
        </div>
        <div class="card-footer">
            <p>This email is sent by BootCoders.</p>
        </div>
    </div>
</body>
</html>
