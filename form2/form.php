<?php 
$name = $gender = $tel = $address = '';
$name_err = $gender_err = $tel_err = $address_err = $photo_err = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1. Validation ឈ្មោះ
    if (empty(trim($_POST["name"]))) {
        $name_err = "សូមបញ្ចូលឈ្មោះរបស់អ្នក។";
    } else {
        $name = htmlspecialchars(trim($_POST["name"]));
    }

    // 2. Validation ភេទ
    if (empty($_POST["gender"])) {
        $gender_err = "សូមជ្រើសរើសភេទ។";
    } else {
        $gender = htmlspecialchars($_POST["gender"]);
    }

    // 3. Validation លេខទូរស័ព្ទ
    if (empty(trim($_POST["tel"]))) {
        $tel_err = "សូមបញ្ចូលលេខទូរស័ព្ទ។";
    } elseif (!preg_match('/^[0-9]{9,11}$/', trim($_POST["tel"]))) {
        $tel_err = "លេខទូរស័ព្ទមិនត្រឹមត្រូវ (ត្រូវមាន ៩ ដល់ ១១ ខ្ទង់)។";
    } else {
        $tel = htmlspecialchars(trim($_POST["tel"]));
    }

    // 4. Validation អាសយដ្ឋាន
    if (empty(trim($_POST["address"]))) {
        $address_err = "សូមបញ្ចូលអាសយដ្ឋាន។";
    } else {
        $address = htmlspecialchars(trim($_POST["address"]));
    }

    // 5. Validation រូបថត (Photo Upload)
    $photo_dest = "";
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $allowed = ["jpg" => "image/jpeg", "jpeg" => "image/jpeg", "png" => "image/png"];
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!array_key_exists($ext, $allowed)) {
            $photo_err = "សូមជ្រើសរើសរូបថតជា JPG, JPEG ឬ PNG ប៉ុណ្ណោះ។";
        } elseif (!in_array($filetype, $allowed, true)) {
            $photo_err = "ប្រភេទរូបថតមិនត្រឹមត្រូវ។";
        } elseif ($filesize > 2 * 1024 * 1024) {
            $photo_err = "ទំហំរូបថតមិនត្រូវលើសពី 2MB ឡើយ។";
        } else {
            if (!is_dir("uploads")) {
                mkdir("uploads", 0777, true);
            }
            $new_filename = time() . "_" . basename($filename);
            $photo_dest = "uploads/" . $new_filename;
            move_uploaded_file($_FILES["photo"]["tmp_name"], $photo_dest);
        }
    } else {
        $photo_err = "សូមជ្រើសរើសរូបថតមួយ។";
    }

    // បើគ្មានកំហុសអ្វីទាំងអស់ បញ្ជូនទិន្នន័យទៅ profile.php តាមរយៈ Session
    if (empty($name_err) && empty($gender_err) && empty($tel_err) && empty($address_err) && empty($photo_err)) {
        session_start();
        $_SESSION['form_data'] = [
            'name' => $name,
            'gender' => $gender,
            'tel' => $tel,
            'address' => $address,
            'photo' => $photo_dest
        ];
        header("Location: profile.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>ចុះឈ្មោះព័ត៌មាន</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type="text"], textarea { width: 320px; padding: 8px; }
        .error { color: red; font-size: 13px; }
    </style>
</head>

<body>

<h2>ទម្រង់បំពេញព័ត៌មាន</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>ឈ្មោះ:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <div class="error"><?php echo $name_err; ?></div>
    </div>

    <div class="form-group">
        <label>ភេទ:</label>
        <input type="radio" name="gender" value="ប្រុស" <?php if ($gender == "ប្រុស") echo "checked"; ?>> ប្រុស
        <input type="radio" name="gender" value="ស្រី" <?php if ($gender == "ស្រី") echo "checked"; ?>> ស្រី
        <div class="error"><?php echo $gender_err; ?></div>
    </div>

    <div class="form-group">
        <label>លេខទូរស័ព្ទ:</label>
        <input type="text" name="tel" value="<?php echo htmlspecialchars($tel); ?>">
        <div class="error"><?php echo $tel_err; ?></div>
    </div>

    <div class="form-group">
        <label>អាសយដ្ឋាន:</label>
        <textarea name="address" rows="3"><?php echo htmlspecialchars($address); ?></textarea>
        <div class="error"><?php echo $address_err; ?></div>
    </div>

    <div class="form-group">
        <label>រូបថត:</label>
        <input type="file" name="photo" accept="image/*">
        <div class="error"><?php echo $photo_err; ?></div>
    </div>

    <button type="submit">Submit</button>
</form>

</body>
</html>

