<?php
session_start();
require_once 'vendor/autoload.php';
use Valitron\Validator as V;

V::lang('ru');

$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$pass = md5(md5($pass));
$db = mysqli_connect('localhost', 'root', '', 'mysql');

$query = sprintf("SELECT email, password FROM my_bd WHERE email='" . $_POST['email'] . "'", mysqli_real_escape_string($db, $_POST['email']));
$result2 = mysqli_query($db, $query);
$data = mysqli_fetch_assoc($result2);

if ($data['email'] === $_POST['email']) {
    echo "<script>alert('E-mail already used!')</script>";
}

$rules = [
    'required' => ['email', 'name', 'password'],
    'email' => ['email']
];

if (!empty($_POST)) {
    $v = new v($_POST);
    $v->rules($rules);
    if ($v->validate()) {
        $_SESSION['success'] = 'Validacia proidena';
        $name2 = mysqli_real_escape_string($db, $name);
        $email2 = mysqli_real_escape_string($db, $email);
        $pass2 = mysqli_real_escape_string($db, $pass);
        $db->query("INSERT INTO my_bd (name, email, password)
    VALUES('$name2', '$email2', '$pass2')");
        echo "<script>alert('Success registration!')</script>";
    } else {
        $errors = '<ul>';
        foreach ($v->errors() as $error) {
            foreach ($error as $item) {
                $errors .= "<li>{$item}</li>";
            }
        }
        $_SESSION['errors'] = $errors;
    }
}

?>
    <form method="post" action="registration.php" name="signup-form" >
        <h1>Регистрационная форма</h2>
        <div class="form-element">
            <h2><label>Имя<br></label>
                <input type="text" name="name"   />
        </div>
    </div >
        </h2 >
        <div class="form-element">
            <h2><label>E-mail<br></label>
                <input type="email" name="email"  />
        </div>
        </h2 >
        <div class="form-element">
            <h2><label>Пароль<br></label>
                <input type="password" name="password"  />
        </div>
        </h2 >
        <button type="submit" name="register" value="register">Регистрация</button>

        <?php if (!empty($_SESSION['errors'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['errors'];
            unset($_SESSION['errors']); ?>
            </div>
            <?php endif; ?>
</form >