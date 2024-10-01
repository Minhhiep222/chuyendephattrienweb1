<?php
// Start the session
session_start();

require_once 'models/UserModel.php';
$userModel = new UserModel();

$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
}

$users = $userModel->getUsers($params);

function enco($index) {
    $array = [];
    $digits = str_split($index);
    $decodeTable = [
        0 => 'Z99X',
        1 => 'A12B',
        2 => '&BUYG',
        3 => 'PQR4',
        4 => '%$#@!',
        5 => '3GH6D',
        6 => 'N7OP8',
        7 => '^&*E',
        8 => 'KLM9',
        9 => ')(*YH',
    ];
    for ($i = 0; $i < count($digits); $i++) {
        $array[$i] = $decodeTable[$digits[$i]];
    }
    
    return $stringWithComma = implode('-', $array);
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php'?>
    <div class="container">
        <?php if (!empty($users)) {?>
        <div class="alert alert-warning" role="alert">
            List of users! <br>
            Hacker: http://php.local/list_users.php?keyword=ASDF%25%22%3BTRUNCATE+banks%3B%23%23
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) {?>
                <tr>
                    <th scope="row"><?php echo $user['id']?></th>
                    <td>
                        <?php echo $user['name']?>
                    </td>
                    <td>
                        <?php echo $user['fullname']?>
                    </td>
                    <td>
                        <?php echo $user['type']?>
                    </td>
                    <td>
                        <a href="form_user.php?id=<?php echo enco($user['id']) ?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                        </a>
                        <a href="view_user.php?id=<?php echo $user['id'] ?>">
                            <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                        </a>
                        <a href="delete_user.php?id=<?php echo enco($user['id']) ?>">
                            <i class="fa fa-eraser" aria-hidden="true" title="Delete"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php }else { ?>
        <div class="alert alert-dark" role="alert">
            This is a dark alert—check it out!
        </div>
        <?php } ?>
    </div>
</body>

</html>