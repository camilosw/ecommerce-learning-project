# Backlog — Bookstore E-commerce

User stories for the entire project, grouped by milestone.
Roles: **Customer** (the shopper) and **Administrator** (manages the store).
Technical concerns (PHP includes, database schema, validation, escaping, prepared
statements) are the *how* an increment is built, so they live inside the
customer/administrator stories they serve — not as separate technical stories.

---

## Milestone 1 — Static home

- **M1-1** — As a customer, I want to see the store name and navigation menu on every page so that I can orient myself.
  - **Acceptance criteria:**
    - The store name is shown in a header at the top of the home page.
    - A navigation menu lists the main sections (Home, Catalog, Contact, Cart).
    - The header and menu use semantic tags (`<header>`, `<nav>`, lists).
- **M1-2** — As a customer, I want to see a featured books section with title, author, and price so that I can discover what's on offer.
  - **Acceptance criteria:**
    - A clearly identified "Featured books" section is present.
    - Each featured book shows its title, author, and price.
    - Prices are displayed in euros (€), consistent with the store's domain.
    - The sample catalog books are listed.
- **M1-3** — As a customer, I want to see the available categories so that I know what types of books are sold.
  - **Acceptance criteria:**
    - A section lists the available categories.
    - The four domain categories appear: Fiction, Non-fiction, Science fiction and fantasy, Children's.
- **M1-4** — As a customer, I want to see a footer with informational links (about us, terms, privacy) so that I can access store information.
  - **Acceptance criteria:**
    - A footer is present at the bottom of the page using a semantic `<footer>` tag.
    - It contains links to About us, Terms and conditions, and Privacy policy.

## Milestone 2 — Styles

- **M2-1** — As a customer, I want a consistent visual identity (colors, typography, spacing) so that the store feels professional.
- **M2-2** — As a customer, I want the site to look good on mobile so that I can browse from any device.
- **M2-3** — As a customer, I want books displayed as neat cards so that I can clearly distinguish each product.
- **M2-4** — As a customer, I want visual feedback when hovering over links and buttons so that I know what is interactive.

## Milestone 3 — Componentization (PHP includes)

- **M3-1** — As a customer, I want the same header and footer on every page so that navigation and store information stay consistent as I move around the site.
- **M3-2** — As a customer, I want the menu to highlight the current section so that I know where I am in the site.

## Milestone 4 — Database

- **M4-1** — As a customer, I want to see the book catalog loaded from the database so that I can browse the real, up-to-date offer.
- **M4-2** — As a customer, I want to see the full catalog on a dedicated page so that I can explore all books.
- **M4-3** — As a customer, I want to filter books by category so that I can find what I'm looking for faster.

## Milestone 5 — Product detail

- **M5-1** — As a customer, I want to open a book's detail page so that I can see its description, author, price, and availability.
- **M5-2** — As a customer, I want to see the book's image on the detail page so that I can recognize the edition.
- **M5-3** — As a customer, I want to know whether a book is available or out of stock so that I can decide whether to buy it.
- **M5-4** — As a customer, I want to easily go back to the catalog from the detail page so that I can keep browsing.

## Milestone 6 — Cart

- **M6-1** — As a customer, I want to add a book to the cart from the catalog or the detail page so that I can prepare my purchase.
- **M6-2** — As a customer, I want to see the cart contents with quantities and subtotal so that I can review my order.
- **M6-3** — As a customer, I want to change the quantity of a book in the cart so that I can adjust my purchase.
- **M6-4** — As a customer, I want to remove a book from the cart so that I can drop items I no longer want.
- **M6-5** — As a customer, I want to see an updated cart counter in the header so that I always know how many items I have.

## Milestone 7 — Simulated checkout

- **M7-1** — As a customer, I want to fill in a form with my shipping details so that I can complete my purchase.
- **M7-2** — As a customer, I want the form to validate required fields so that I cannot submit incomplete data.
- **M7-3** — As a customer, I want to see an order summary with the total before confirming so that I can review what I am about to buy.
- **M7-4** — As a customer, I want to confirm the order and have it saved so that I have a record of the purchase.
- **M7-5** — As a customer, I want to see a confirmation page with the order number so that I have a reference.
- **M7-6** — As a customer, I want the cart to be cleared after confirming so that I start fresh on my next purchase.

## Milestone 8 — Admin panel (session login + product CRUD)

- **M8-1** — As an administrator, I want to log in so that I can access the management panel.
- **M8-2** — As an administrator, I want admin pages to be protected so that only I can access them.
- **M8-3** — As an administrator, I want to see the product list in the panel so that I can manage the catalog.
- **M8-4** — As an administrator, I want to create a new book so that I can expand the catalog.
- **M8-5** — As an administrator, I want to edit an existing book so that I can correct or update its information.
- **M8-6** — As an administrator, I want to delete a book so that I can remove it from the catalog.
- **M8-7** — As an administrator, I want to log out so that I can protect access to the panel.

## Milestone 9 — Dashboard (sales statistics)

- **M9-1** — As an administrator, I want to see total revenue and the number of orders so that I can gauge the store's overall performance.
- **M9-2** — As an administrator, I want to see the list of received orders with their dates and totals so that I can review individual sales.
- **M9-3** — As an administrator, I want to see the best-selling books so that I know which titles are most popular.
- **M9-4** — As an administrator, I want to see sales broken down by category so that I understand demand across the catalog.
- **M9-5** — As an administrator, I want a visual chart of sales over time so that I can spot trends at a glance.
- **M9-6** — As an administrator, I want to see low-stock books so that I know what needs restocking.

## Milestone 10 — Polish & hardening

- **M10-1** — As a customer, I want clear and consistent success and error messages so that I understand what happened after each action.
- **M10-2** — As a customer, I want a friendly error page (e.g. book not found) so that I don't encounter a broken screen.
- **M10-3** — As a customer, I want my form inputs to be validated and sanitized so that my data is handled correctly and the store stays secure.
- **M10-4** — As a customer, I want all content to be displayed safely (output escaping) so that the site cannot be used to run malicious scripts against me.
- **M10-5** — As an administrator, I want every database query to use prepared statements so that the store's data is protected from SQL injection.
- **M10-6** — As a customer, I want accessible navigation (labels, contrast, visible focus) so that the site can be used without barriers.

---

**Total: 10 milestones, 47 stories. Roles: Customer and Administrator.**
