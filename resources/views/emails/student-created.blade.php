<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Welcome to LectureSpace</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                line-height: 1.6;
                color: #1b1b18;
                margin: 0;
                padding: 0;
                background-color: #F8F8F6;
            }

            .wrapper {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
            }

            .container {
                background-color: #FDFDFC;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
                padding: 30px;
                margin-bottom: 20px;
            }

            .header {
                text-align: center;
                margin-bottom: 30px;
            }

            .logo {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 10px;
            }

            .logo-green {
                color: #166534;
                /* green-800 */
            }

            h1 {
                color: #1b1b18;
                font-size: 22px;
                margin-bottom: 20px;
                border-bottom: 1px solid #e5e7eb;
                padding-bottom: 15px;
            }

            .content {
                margin-bottom: 25px;
            }

            .details {
                background-color: #f9fafb;
                border-radius: 6px;
                padding: 15px;
                margin-bottom: 25px;
            }

            .details-item {
                display: flex;
                margin-bottom: 10px;
            }

            .details-label {
                font-weight: 600;
                width: 100px;
            }

            .btn {
                display: inline-block;
                background-color: #166534;
                color: #ffffff !important;
                text-decoration: none;
                padding: 12px 24px;
                border-radius: 6px;
                font-weight: 500;
                text-align: center;
                margin: 20px 0;
            }

            .btn:hover {
                background-color: #14532d;
            }

            .action-container {
                text-align: center;
            }

            .footer {
                text-align: center;
                color: #6b7280;
                font-size: 14px;
                margin-top: 30px;
                padding-top: 15px;
                border-top: 1px solid #e5e7eb;
            }
        </style>
    </head>

    <body>
        <div class="wrapper">
            <div class="container">
                <div class="header">
                    <div class="logo">
                        <span class="logo-green">lecture</span>space
                    </div>
                </div>

                <h1>Welcome to LectureSpace, {{ $name }}!</h1>

                <div class="content">
                    <p>You have been invited to join a course on LectureSpace. Here are your registration details:</p>

                    <div class="details">
                        <div class="details-item">
                            <div class="details-label">Email:</div>
                            <div>{{ $email }}</div>
                        </div>
                        <div class="details-item">
                            <div class="details-label">Course ID:</div>
                            <div>{{ $courseId }}</div>
                        </div>
                    </div>

                    <p>To complete your registration and access the course materials, please click the button below:</p>

                    <div class="action-container">
                        <a href="http://127.0.0.1:8000/student/email/{{ $courseId }}" class="btn">Complete
                            Registration</a>
                    </div>

                    <p>If you didn't request this invitation, you can safely ignore this email.</p>
                </div>

                <div class="footer">
                    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                </div>
            </div>
        </div>
    </body>

</html>
