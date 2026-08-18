<?php
// Shared site footer: footer menu, copyright, and address.
// Reuses $current_page, already set by the page for header.php.

$footer_menu = [
    'about' => ['url' => 'about.php', 'label' => 'About us'],
    'terms' => ['url' => 'terms.php', 'label' => 'Terms and conditions'],
];
?>
    <!-- Page footer: shared by every page -->
    <footer class="site-footer">
      <div class="container">
        <nav class="footer-nav" aria-label="Footer menu">
          <ul>
            <?php foreach ($footer_menu as $key => $item): ?>
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

        <p class="copyright">&copy; 2026 Bookstore Page. All rights reserved.</p>
        <address>Oranienburger Straße 27 · 10117 Berlin</address>
      </div>
    </footer>
  </body>
</html>
