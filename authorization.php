<?php
session_start();
require_once 'vendor/autoload.php';
use Valitron\Validator as V;

V::lang('ru');

$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

    $db = mysqli_connect('localhost','root','','mysql');

if(isset($_POST['register']))
{
 
    $query = mysqli_query($db,"SELECT email, password FROM my_bd WHERE email='".$_POST['email']."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    if($data['password'] === md5(md5($_POST['password'])))
    {
        echo "<script>alert('Успешный вход!')</script>";
    }
    else
    {
        echo "<script>alert('неверный логин или пароль!')</script>";
    }
}

$rules = [
    'required' => ['email', 'password'],
    'email' => ['email']
];

if(!empty($_POST)) {
    $v = new v($_POST);
    $v->rules($rules);
    if ($v->validate()) {
        $_SESSION['success'] = 'Validacia proidena';
    } else {
        $errors = '<ul>';
        foreach ($v -> errors() as $error) {
            foreach ($error as $item) {
                $errors .= "<li>{$item}</li>";
            }
        } 
        $_SESSION['errors'] = $errors;
    }
}

?>

<form method="post" action="authorization.php" name="signup-form">
    <h1>Вход на сайт</h1>
    <h2><div class="form-element">
    <label>E-mail<br></label>
    <input type="text" name="email" pattern="[a-zA-Z0-9@.]+" />
    </div></h2>
    <h2><div class="form-element">
    <label>Пароль<br></label>
    <input type="password" name="password" />
    </div></h2>
    <button type="submit" name="register" value="register">Войти</button>

    <?php if (!empty($_SESSION['errors'])): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?>
                            </div>
                        <?php endif; ?>
</form> 