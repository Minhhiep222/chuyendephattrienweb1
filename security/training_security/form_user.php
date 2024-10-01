<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$actualId = NULL;
// Decode ID
function decodeId($index) {
    $number = 0;
    $arrayNumber = [];
    $array = explode('-', $index);
    $decodeTable = [
        'Z99X' => 0,
        'A12B' => 1,
        '&BUYG' => 2,
        'PQR4' => 3,
        '%$#@!' => 4,
        '3GH6D' => 5,
        'N7OP8' => 6,
        '^&*E' => 7,
        'KLM9' => 8,
        ')(*YH' => 9,
        ];
    for ($i = 0; $i < count($array); $i++) {
        if (isset($decodeTable[$array[$i]])) { 
            $arrayNumber[$i] = $decodeTable[$array[$i]];
        } else {
            $arrayNumber[$i] = null;
        }
    }
    $index = 10;
    for ($i = 0; $i < count($arrayNumber); $i++) {
        if(isset($arrayNumber[$i])) {
            if($i !== 0){
                $number *= $index;
                $number += $arrayNumber[$i];
                $index*=$index;
            }else{
                $number += $arrayNumber[$i];
            }
        }
    }

    return $number;
}

if (!empty($_GET['id'])) {
    $actualId = decodeId($_GET['id']);
    //  $actualId = $_GET['id'];
    $user = $userModel->findUserById($actualId);//Update existing user
}

if (!empty($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    $errors = [];

    //kiểm tra dữ liệu
    if (empty($name)) {
        $errors[] = "Tên là bắt buộc.";
    } elseif (!preg_match('/^[A-Za-z0-9]{5,15}$/', $name)) {
        $errors[] = "Tên chỉ chứa từ 5-15 ký tự, không chứa ký tự đặt biệt";
    }
    if (empty($password)) {
        $errors[] = "Mật khẩu là bắt buộc.";
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*[0-9]).{5,10}$/", $password)) {
        $errors[] = "Password phải chứa từ 5-10 ký tự, bao gồm ít nhất một chữ cái in hoa và một chữ số";
    }

    if (empty($errors)) {
        if (!empty($actualId)) {
            $userModel->updateUser($_POST);
        } else {
            $userModel->insertUser($_POST);
        }
        header('location: list_users.php');
        exit();
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php'?>
    <div class="container">

        <?php if (!empty($errors)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($errors as $error) { ?>
            <?php echo $error . '<br>'; ?>
            <?php } ?>
        </div>
        <?php } ?>

        <?php if ($user || !isset($actualId)) { ?>
        <div class="alert alert-warning" role="alert">
            User form
        </div>
        <form method="POST" name="userForm" onsubmit="return validateForm()">
            <input type="hidden" name="id" value="<?php echo $actualId ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" placeholder="Name"
                    value='<?php if (!empty($user[0]['name'])) echo $user[0]['name']; ?>'
                    title=" Tên chỉ chứa từ 5-15 ký tự, không chứa ký tự đặt biệt" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password"
                    title=" Password chỉ chứa từ 5-10 ký tự, phải chứa ký tự đặt biệt, phải chứa chữ cái in hoa"
                    required>

            </div>

            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php } else { ?>
        <div class="alert alert-success" role="alert">
            User not found!
        </div>
        <?php } ?>
    </div>
</body>

</html>