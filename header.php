<!DOCTYPE html>

<html>

<head <?php language_attributes() ?>>
    <meta charset="<?= bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    wp_head();
    ?>
</head>

<body <?= body_class() ?>>
    <header class="site-header">
        <div class="container">
            <h1 class="school-logo-text float-left">
                <a href="<?= site_url() ?>"><strong>Fictional</strong> University</a>
            </h1>
            <a href="<?= esc_url(get_site_url('/search'))  ?>" class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
            <div class="site-header__menu group">
                <nav class="main-navigation">
                    <ul>
                        <li <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 14) echo "class='current-menu-item'" ?>><a href="<?= site_url('/about-us') ?>">About Us</a></li>
                        <li <?php if (get_post_type() == 'program') echo "class='current-menu-item'" ?>><a href="<?= get_post_type_archive_link('program') ?>">Programs</a></li>
                        <li <?php if (get_post_type() == 'event' or is_page('past-events')) echo "class='current-menu-item'" ?>><a href="<?php echo get_post_type_archive_link('event') ?>">Events</a></li>
                        <li <?php if (get_post_type() == 'post') echo "class='current-menu-item'" ?>><a href="<?= site_url('/blog') ?>">Blog</a></li>
                    </ul>
                </nav>
                <div class="site-header__util">
                    <?php if (is_user_logged_in()) {
                    ?>
                        <a href="<?= esc_url(site_url('/my-notes')) ?>" class="btn btn--small btn--orange float-left push-right">
                            My Notes
                        </a>
                        <a href="<?= wp_logout_url() ?>" class="btn btn--small btn--dark-orange float-left btn--with-photo">
                            <span class="site-header__avatar"><?= get_avatar(get_current_user_id(), 60) ?></span>
                            <span class="btn__text">Log Out</span>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a href="<?= wp_login_url() ?>" class="btn btn--small btn--orange float-left push-right">Login</a>
                        <a href="<?= wp_registration_url() ?>" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
                    <?php
                    } ?>
                    <a href="<?= esc_url(get_site_url('/search'))  ?>" class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </header>