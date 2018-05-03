<?php
require 'amp.php';
include '../kernel/SITE.php';
$amp = new amp();
$site = new SITE();

$triggerUser = true;
if (!$site->avt->userDb->login) {
    $triggerUser = false;
}

$pageParam = include '../kernel/param/PageParam.php';

if (isset($pageParam['you'])) {
    if ($triggerUser) {
        $find = ['user_full_name', 'user_less_name', 'user_city'];
        $replase = [$site->avt->fullName(), $site->avt->lessName(), $site->avt->userDb->city];
        $meta_d = str_replace($find, $replase, $pageParam['you']['description']);
        $meta_k = str_replace($find, $replase, $pageParam['you']['keyword']);
        $title = str_replace($find, $replase, $pageParam['you']['title']);
    } else {
        $meta_d = 'Личный кабинет. Добро пожаловать на наш сайт. ';
        $meta_k = '';
        $title = 'Ваш личный кабинет. Добро пожаловать 💻';
    }
} else {
    if ($triggerUser) {
        $meta_d = 'Личный кабинет ' . $site->avt->fullName();
        $meta_k = $site->avt->userDb->city . ' ' . $site->avt->fullName();
        $title = 'Ваш личный кабинет ' . $site->avt->lessName();
    } else {
        $meta_d = 'Личный кабинет. Добро пожаловать на наш сайт. ';
        $meta_k = '';
        $title = 'Ваш личный кабинет. Добро пожаловать 💻';
    }
}

$amp->head('none', $title, $meta_d, $meta_k);
?>
<main>
    <section class="text-center">
        <?php if($triggerUser){ ?>
            <h1><span class="g-color-text-3"><?=$title?></span></h1>
            <div class="container">

                <amp-img src="https://www.islandgift.ru/<?=$site->avt->userDb->img;?>" alt="MaxImko" class="rbt-inline-89" width="350" height="240" layout="responsive"></amp-img>
                <h2>Приветствуем Вас <?=$site->avt->userDb->login?></h2>
                <h3>Контактные данные</h3>
                <table>
                    <tr><td>ФИО</td><td><?=$site->avt->fullName()?></td></tr>
                    <tr><td>Пол</td><td><?php $vkTrigger = false;if($site->avt->userDb->sex == 1) echo'Женский';else if($site->avt->userDb->sex == 2) echo'Мужской';else{echo 'Не определенно'; $vkTrigger = true;}?></td></tr>
                    <tr><td>Дата рождения</td><td><?=$site->avt->userDb->birthday?></td></tr>
                    <tr><td>Город</td><td><?=$site->avt->userDb->city?></td></tr>
                    <tr><td>Почта</td><td><?=$site->avt->userDb->mail?></td></tr>
                    <tr><td>Телефон</td><td><?=$site->avt->userDb->phone?></td></tr>
                </table>
                <h3>О Вас:</h3>
                <p><?= $site->avt->userDb->about?></p>
                <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a class="normal ul-w-button1 middle" target="_self" href="https://www.islandgift.ru/you">Посмотреть заказы</a></div>

            </div>
        <?php } else {?>
        <h1><span class="g-color-text-3"><?=$title?></span></h1>
        <div class="container">

            <amp-img src="https://www.islandgift.ru/templates/c_bestday/img/scaled/goods-default-img-720.jpg" alt="MaxImko" class="rbt-inline-89" width="350" height="240" layout="responsive"></amp-img>
            <h2>Приветствуем Вас.</h2>
            <p>Для Вашего удобства мы разработали личный кабинет клиента интернет-магазина. Он позволит Вам быстрее и удобнее производить заказы, а так же можно посмотреть товары и услуги, которые Вы заказали у нас.</p>
            <p>
                Если вы до сих пор не авторизованы, то настоятельно рекомендуем Вам сделать это.
                Так как после регистрации вы сможете получить множество приятных бонусов и сюрпризов для себя.<br>
                Для того чтобы пройти регистрацию на сайте “islandgift” и получить личный кабинет, пройдите небольшую регистрацию. Это займет у Вас не более 3 минут, а если у вас есть аккаунт ВКонтакте, то данная процедура не займет и минуты!</p>

            <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a class="normal ul-w-button1 middle" target="_self" href="https://www.islandgift.ru/registration">Зарегистрироваться</a>
            </div>
        </div>
        <?php } ?>
    </section>

</main>
<?php
$amp->footer();
?>
