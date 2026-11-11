<?php
session_start();

$message = "";

// បង្កើត array សម្រាប់ផ្ទុកទិន្នន័យ ប្រសិនបើមិនទាន់មាន
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

// ពេលមានការផ្ញើ Form មក
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $password = $_POST['password'] ?? '';
    $repassword = $_POST['repassword'] ?? '';

    if ($password !== $repassword) {
        $message = "⚠️ ពាក្យសម្ងាត់ និង ការបញ្ជាក់ពាក្យសម្ងាត់មិនត្រូវគ្នាទេ!";
    } elseif ($name !== '' && $email !== '') {
        // បន្ថែមទិន្នន័យថ្មីចូល array (មិនលុបចោលចាស់)
        $_SESSION['users'][] = [

            'name'       => $name,
            'email'      => $email,
            'gender'     => $gender,
            'password'   => password_hash($password, PASSWORD_DEFAULT),

        ];
        $message = "✅ បានរក្សាទុកទិន្នន័យដោយជោគជ័យ!";
    } else {
        $message = "⚠️ សូមបំពេញឈ្មោះ និង អ៊ីមែល!";
    }
}

// ទាញយកទិន្នន័យទាំងអស់ពី Session
$users = $_SESSION['users'];
?>
<!DOCTYPE html>
<html lang="km">

<head>
    <meta charset="UTF-8">
    <title>បញ្ជីទិន្នន័យ</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: linear-gradient(135deg, #f4f7fb, #eaf2ff);
            margin: 0;
            padding: 40px 20px;
            color: #1f2937;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 12px 32px rgba(15, 23, 42, 0.12);
            padding: 28px;
        }

        .message {
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .message.success {
            background: #e8f9ee;
            color: #146c43;
            border: 1px solid #b7ebc9;
        }

        .message.warning {
            background: #fff4e5;
            color: #b45309;
            border: 1px solid #f9dcb6;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
            border: 1px solid #dfe7f3;
            background: #fff;
        }

        .user-table thead th {
            background: #2563eb;
            color: #fff;
            padding: 14px 16px;
            text-align: left;
            font-size: 16px;
        }

        .user-table tbody td {
            padding: 14px 16px;
            border-bottom: 1px solid #edf2f7;
            font-size: 15px;
        }

        .user-table tbody tr:nth-child(even) {
            background: #f8fbff;
        }

        .user-table tbody tr:hover {
            background: #eef6ff;
        }

        .user-table .empty-row td {
            text-align: center;
            color: #64748b;
            padding: 28px 16px;
            font-style: italic;
            background: #f8fafc;
        }

        .actions {
            margin-top: 22px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .actions a {
            display: inline-block;
            text-decoration: none;
            background: #2563eb;
            color: #fff;
            padding: 10px 16px;
            border-radius: 10px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .actions a:hover {
            background: #1d4ed8;
        }

        .actions a.delete {
            background: #dc2626;
        }

        .actions a.delete:hover {
            background: #b91c1c;
        }
    </style>
</head>

<body>

    <div class="container">

        <?php if (!empty($message)): ?>
            <div class="message <?= strpos($message, '⚠️') !== false ? 'warning' : 'success' ?>">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <table class="user-table">
            <thead>
                <tr>
                    <th>ឈ្មោះ</th>
                    <th>អ៊ីមែល</th>
                    <th>ភេទ</th>
                    <th>ពាក្យសម្ងាត់</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($users) > 0): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['name']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= htmlspecialchars($user['gender'] ?? '') ?></td>
                            <td><?= !empty($user['password']) ? '••••••••' : '' ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="empty-row">
                        <td colspan="4">មិនទាន់មានទិន្នន័យ — សូមបញ្ចូលពី Form</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="actions">
            <a href="form.php">➕ បន្ថែមទិន្នន័យថ្មី</a>
            <?php if (count($users) > 0): ?>
                <a href="clear.php" class="delete"
                    onclick="return confirm('តើអ្នកពិតជាចង់លុបទិន្នន័យទាំងអស់មែនទេ?')">
                    🗑️ លុបទាំងអស់
                </a>
            <?php endif; ?>
        </div>

    </div>

</body>

</html>