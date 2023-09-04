<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your iPhone Coupon Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .content {
            padding: 20px;
            text-align: center;
        }

        .coupon-code {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            font-size: 24px;
            margin-top: 20px;
            border-radius: 5px;
        }

        .footer {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Hello User,</h1>
        </div>
        <div class="content">
            <p>Thanks for your referrals. We appreciate your support!</p>
            <p>Please find your coupon code below:</p>
            <div class="coupon-code">{{ $coupenCode }}</div>
            <p>You can use this coupon code to purchase a new iPhone from our store.</p>
        </div>
        <div class="footer">
            <p>Thank you for choosing us!</p>
        </div>
    </div>
</body>

</html>
