<?php
session_start();
?>
<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>Form បញ្ចូលទិន្នន័យ</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #eef6ff 0%, #dfeeff 100%);
            font-family: "Segoe UI", Tahoma, sans-serif;
            color: #1f2937;
        }

        .form-card {
            width: min(440px, 92vw);
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 18px 45px rgba(37, 99, 235, 0.14);
            padding: 30px 28px;
        }

        h2 {
            margin: 0 0 24px;
            text-align: center;
            font-size: 28px;
            color: #1d4ed8;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        label {
            font-weight: 600;
            color: #374151;
            font-size: 15px;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #d1d5db;
            font-size: 15px;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            background: #f9fafb;
        }

        input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
            background: #ffffff;
        }

        button {
            margin-top: 8px;
            padding: 13px 16px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #ffffff;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 8px 18px rgba(37, 99, 235, 0.25);
        }

        button:hover {
            transform: translateY(-1px);
        }

        .link-box {
            text-align: center;
            margin-top: 20px;
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: #1d4ed8;
            font-weight: 600;
            padding: 10px 14px;
            border-radius: 8px;
            transition: background 0.2s ease;
        }

        a:hover {
            background: #eff6ff;
        }
    </style>
</head>
<body>
    <div class="form-card">
        <h2>📝 បញ្ចូលព័ត៌មាន</h2>

        <form action="store.php" method="POST">
            <div>
                <label for="name">ឈ្មោះ (Name):</label>
                <input type="text" id="name" name="name" placeholder="បញ្ចូលឈ្មោះ..." required>
            </div>

            <div>
                <label for="email">អ៊ីមែល (Email):</label>
                <input type="email" id="email" name="email" placeholder="បញ្ចូលអ៊ីមែល..." required>
            </div>
            <div>
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value="male">male</option>
                    <option value="female">female</option>
                </select>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="password" require>
            </div>
            <div>
                <label for="repassword">Repassword</label>
                <input type="repassword" id="repassword" name="repassword" placeholder="repassword" require>
            </div>

            <button type="submit">រក្សាទុក</button>
        </form>

        <div class="link-box">
            <a href="store.php">📋 មើលទិន្នន័យទាំងអស់</a>
        </div>
    </div>
</body>
</html>