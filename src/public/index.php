<?php
// Home page.
$page_title   = 'Home';
$current_page = 'home';
$page_css     = 'home';
require __DIR__ . '/../includes/header.php';
?>

<main>
  <!-- Hero: full-width colour band with the store claim -->
  <section class="hero" aria-labelledby="welcome-title">
    <div class="container">
      <h1 id="welcome-title">
        Your mind travels with the best books — we are the bridge
      </h1>
    </div>
  </section>

  <!-- Announcement: speech bubble pointing at the featured books -->
  <aside class="promo" aria-label="Store announcement">
    <p class="promo-bubble">
      <span class="promo-badge" aria-hidden="true">&#9733;</span>
      Free shipping on every order over &euro;30
    </p>
  </aside>

  <!-- Featured books -->
  <section class="featured-books" aria-labelledby="featured-title">
    <div class="container">
      <h2 id="featured-title">Featured books</h2>

      <ul class="book-list">
        <li>
          <article class="book-card">
            <a class="book-cover" href="#">
              <img
                src="https://picsum.photos/seed/solitude/400/600"
                alt="Cover of One Hundred Years of Solitude, by Gabriel García Márquez"
                width="400"
                height="600"
                loading="lazy"
              />
            </a>
            <h3 class="book-title">
              <a href="#">One Hundred Years of Solitude</a>
            </h3>
            <p class="book-author">Gabriel García Márquez</p>
            <p class="book-price">&euro;19.95</p>
          </article>
        </li>
        <li>
          <article class="book-card">
            <a class="book-cover" href="#">
              <img
                src="https://picsum.photos/seed/namewind/400/600"
                alt="Cover of The Name of the Wind, by Patrick Rothfuss"
                width="400"
                height="600"
                loading="lazy"
              />
            </a>
            <h3 class="book-title"><a href="#">The Name of the Wind</a></h3>
            <p class="book-author">Patrick Rothfuss</p>
            <p class="book-price">&euro;22.50</p>
          </article>
        </li>
        <li>
          <article class="book-card">
            <a class="book-cover" href="#">
              <img
                src="https://picsum.photos/seed/nineteen84/400/600"
                alt="Cover of 1984, by George Orwell"
                width="400"
                height="600"
                loading="lazy"
              />
            </a>
            <h3 class="book-title"><a href="#">1984</a></h3>
            <p class="book-author">George Orwell</p>
            <p class="book-price">&euro;9.95</p>
          </article>
        </li>
        <li>
          <article class="book-card">
            <a class="book-cover" href="#">
              <img
                src="https://picsum.photos/seed/sapiens/400/600"
                alt="Cover of Sapiens, by Yuval Noah Harari"
                width="400"
                height="600"
                loading="lazy"
              />
            </a>
            <h3 class="book-title"><a href="#">Sapiens</a></h3>
            <p class="book-author">Yuval Noah Harari</p>
            <p class="book-price">&euro;24.90</p>
          </article>
        </li>
      </ul>
    </div>
  </section>

  <!-- Physical store: opening hours -->
  <section class="store-info" aria-labelledby="store-info-title">
    <div class="container">
      <h2 id="store-info-title">Bookstore Page — opening hours</h2>
      <dl class="opening-hours">
        <dt>Mon–Fri</dt>
        <dd>9:00 – 20:30</dd>
        <dt>Sat</dt>
        <dd>9:00 – 20:00</dd>
        <dt>Sun</dt>
        <dd>13:00 – 16:00</dd>
      </dl>
    </div>
  </section>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>
