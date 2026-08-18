<?php
// Terms and conditions page.
$page_title   = 'Terms and conditions';
$current_page = 'terms';
require __DIR__ . '/../includes/header.php';
?>

<main>
  <div class="container">
    <div class="page-intro">
      <h1>Terms and conditions</h1>
      <p>The rules that apply when you order from Bookstore Page.</p>
    </div>

    <div class="prose">
      <h2>Ordering</h2>
      <p>
        Placing an order means you agree to these terms. An order is
        confirmed once payment has been accepted; until then, availability
        of a title is not guaranteed.
      </p>

      <h2>Prices</h2>
      <p>
        All prices on the site are shown in euros (&euro;) and include VAT
        at the rate applicable in Germany. Shipping costs, if any, are shown
        separately before you confirm an order.
      </p>

      <h2>Shipping</h2>
      <ul>
        <li>Orders are shipped within 2–4 business days of confirmation.</li>
        <li>Orders over &euro;30 ship free within Germany.</li>
        <li>You will receive a tracking link by email once your order leaves the store.</li>
      </ul>

      <h2>Returns</h2>
      <ul>
        <li>Unopened books can be returned within 14 days of delivery.</li>
        <li>Return shipping is paid by the customer, unless the book arrived damaged.</li>
        <li>Refunds are issued to the original payment method within 7 business days of us receiving the return.</li>
      </ul>
    </div>
  </div>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>
