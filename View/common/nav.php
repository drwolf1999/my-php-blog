<script>
    function toggleBurger() {
        let burger = $('.navbar-burger');
        let menu = $('.navbar-menu');
        burger.toggleClass('is-active');
        menu.toggleClass('is-active');
    }
</script>

<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/"><span class="username">drwolf1999</span>'s 블로그</a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar-menu-for-mobile" onclick="toggleBurger()">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbar-menu-for-mobile" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="/about.php">About</a>
            <a class="navbar-item" href="/posts.php">Posts</a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">More</a>

                <div class="navbar-dropdown">
                    <a class="navbar-item" href="https://github.com/drwolf1999">
                        <i class="fab fa-github"></i>&nbsp;Git Hub
                    </a>
                    <a class="navbar-item" href="https://www.instagram.com/kdy19991222/">
                        <i class="fab fa-instagram"></i>&nbsp;Instagram
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item" href="https://github.com/drwolf1999/my-php-blog/issues">Report an issue</a>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary" href="/writePost.php">
                        <strong>Write</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>