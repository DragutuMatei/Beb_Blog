<header>
    <div class="logo">

        <a href="index.php" style="font-weight: 900;">
            My mind is a mess
        </a>
    </div>
    <input type="checkbox" class="menu-btn" id="menu-btn">
    <label for="menu-btn" class="menu-icon">
        <span class="menu-icon__line"></span>
    </label>
    <ul class="nav-links">
        <li class="nav-link"><a href="./#about">Despre</a></li>
        <li class="nav-link"><a href="./postari.php">Poezii</a></li>
        <li class="nav-link"><a href="./#work">Work</a></li>
        <li class="nav-link"><a href="./#contact">Contact</a></li>
        <?php

        $user = new User();

        if ($user->isLoggedIn()) {
            $nume = $user->data()->username;
            echo "
            <li class='nav-link'><a href='#'>{$nume}</a></li>
            <li class='nav-link'><a href='./logout.php'>Logout</a></li>";
        } else {
            echo "
            <li class='nav-link'><a href='./registration.php'>Înregistrează-te</a></li>
            <li class='nav-link'><a href='./login.php'>Intră în cont</a></li>";
        }
        ?>
    </ul>
</header>