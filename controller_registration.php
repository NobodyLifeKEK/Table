<?php
class Controller_Registration extends Controller
{
  function __construct()
  {
    $this->model = new Model_Registration();
    $this->view = new View();
  }

  function action_index()
  {
    $login = '';
      $login_err = '';
      $password = '';
      $password_err = '';
    $auth_check['status'] = '';
    $auth_check['text'] ='';

    // Проверяем нажата ли кнопка сабмит (зарегистрироваться), иначе ничего не делаем, чилл
    if (isset($_POST['submit'])) {

      // Собираем данные с полей
      $login = trim($_POST['login']);
      $password = trim($_POST['password']);

      // Создаём переменные для сбора ошибок
      $login_err = false;
      $password_err = false;

      // Проверяем логин
      if ($login === '') {
        $login_err = 'Введите Ваш логин';
      } elseif (strlen($login) < 4) {
        $login_err = 'Слишком короткий логин';
      } elseif (!preg_match('/^[a-z0-9-_]+$/i', $login)) {
        $login_err = 'В логине могут использоваться только латинские буквы, цифры, знак подчеркивания и тире';
      } elseif (strlen($login) >= 30) {
        $login_err = 'Максимальная длина логина 30 символов';
      }

      // Проверяем пароль
      if (strlen($password) < 6) {
        $password_err = 'Минимальная длина пароля 6 символов';
      } elseif (strlen($password) >= 60) {
        $password_err = 'Максимальная длина пароля 60 символов';
      }

      // Если логин и пароль прошли проверку ввода (! = поля остались со значением false), то обращаемся к модели
      if (!$login_err && !$password_err) {
        $auth_check = $this->model->registerNewUser($login, $password);
      }
    }

    $data = [
      'login' => $login,
      'login_err' => $login_err,
      'password' => $password,
      'password_err' => $password_err,
      'auth_status' => $auth_check['status'],
      'auth_text' => $auth_check['text'],
    ];


    $this->view->generate('registration_view.php', 'template_view.php', $data);
  }
}
