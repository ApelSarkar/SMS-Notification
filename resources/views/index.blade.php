<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 300px;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>SMS Form</h2>
        <form action="{{ route('sms.send') }}" method="post">
            @csrf

            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" required>

            <label for="message">Message:</label>
            <textarea name="message" rows="4" required></textarea>

            <button type="submit">Send SMS</button>
        </form>
    </div>
</body>

</html>
