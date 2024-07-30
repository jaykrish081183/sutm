<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px 0;
        }
        .content h2 {
            margin: 0 0 10px;
            font-size: 20px;
        }
        .content p {
            margin: 0 0 10px;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 14px;
            color: #999;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Booking Confirmation</h1>
        </div>
        <div class="content">
            <h2>Hello {{isset($booking_data['name'])?$booking_data['name']:''}},</h2>
            <p>We are pleased to confirm your booking. Here are the details:</p>
            <p><strong>Booking ID:</strong> {{isset($booking_data['id'])?$booking_data['id']:''}}</p>
            <p><strong>Date:</strong> {{isset($booking_data['booking_dates'])?$booking_data['booking_dates']:''}}</p>
            <p><strong>Status:</strong> {{(isset($booking_data['status']) && $booking_data['status']==2)?'Confirmed':'Pending'}}</p>
            <p>Thank you for choosing our service. We look forward to serving you.</p>
            <p>If you have any questions or need to make changes to your booking, please contact us at [Contact Information].</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Maa Umiya Australia. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
