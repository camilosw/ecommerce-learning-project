<?php
// Shared site header: <head>, <header>, and the main menu.
// Every page sets $page_title and $current_page (and optionally $page_css)
// before requiring this file. See docs/tech-spec/epic-2-pages.md, section 4.

$main_menu = [
    'home'    => ['url' => 'index.php',   'label' => 'Home'],
    'catalog' => ['url' => '#',           'label' => 'Catalog'],   // Epic 3
    'about'   => ['url' => 'about.php',   'label' => 'About us'],
    'contact' => ['url' => 'contact.php', 'label' => 'Contact'],
    'cart'    => ['url' => '#',           'label' => 'Cart (0)'],  // Epic 6
];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($page_title) ?> — Bookstore Page</title>
    <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/layout.css" />
    <link rel="stylesheet" href="css/components.css" />
    <?php if (isset($page_css)): ?>
    <link rel="stylesheet" href="css/<?= htmlspecialchars($page_css) ?>.css" />
    <?php endif; ?>
  </head>
  <body>
    <!-- Site header: store name and main menu, shared by every page -->
    <header class="site-header">
      <div class="container">
        <p class="site-title"><a href="index.php">Bookstore Page</a></p>

        <nav class="main-nav" aria-label="Main menu">
          <ul>
            <?php foreach ($main_menu as $key => $item): ?>
            <li>
              <a
                href="<?= htmlspecialchars($item['url']) ?>"
                <?php if ($key === $current_page): ?>
                class="active" aria-current="page"
                <?php endif; ?>
              ><?= htmlspecialchars($item['label']) ?></a>
            </li>
            <?php endforeach; ?>
          </ul>
        </nav>
      </div>
    </header>
