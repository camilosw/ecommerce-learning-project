<?php
// Contact page.
$page_title   = 'Contact';
$current_page = 'contact';
$page_css     = 'contact';
require __DIR__ . '/../includes/header.php';
?>

<main>
  <div class="container">
    <div class="page-intro">
      <h1>Contact</h1>
      <p>Visit us in person or get in touch — we are happy to help you find your next book.</p>
    </div>

    <div class="contact-layout">
      <div class="contact-details">
        <h2>Store details</h2>
        <address>Oranienburger Straße 27 · 10117 Berlin</address>
        <p>Phone: <a href="tel:+493012345678">+49 30 1234 5678</a></p>
        <p>Email: <a href="mailto:hallo@bookstorepage.example">hallo@bookstorepage.example</a></p>

        <h2>Opening hours</h2>
        <dl class="opening-hours">
          <dt>Mon–Fri</dt>
          <dd>9:00 – 20:30</dd>
          <dt>Sat</dt>
          <dd>9:00 – 20:00</dd>
          <dt>Sun</dt>
          <dd>13:00 – 16:00</dd>
        </dl>
      </div>

      <div class="map-embed">
        <iframe
          src="https://maps.google.com/maps?q=Oranienburger+Stra%C3%9Fe+27,+10117+Berlin&output=embed"
          title="Map showing the Bookstore Page shop at Oranienburger Straße 27, Berlin"
          loading="lazy"
        ></iframe>
      </div>
    </div>
  </div>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>
