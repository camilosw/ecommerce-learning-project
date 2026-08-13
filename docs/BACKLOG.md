# Backlog — Bookstore E-commerce

User stories for the entire project, grouped by epic.
Roles: **Customer** (the shopper) and **Administrator** (manages the store).
Technical concerns (PHP includes, database schema, validation, escaping, prepared
statements) are the *how* an increment is built, so they live inside the
customer/administrator stories they serve — not as separate technical stories.

---

## Epic 1 — Home

- **E1-1** — As a customer, I want to see the store name and navigation menu on every page so that I can orient myself.
  - **Acceptance criteria:**
    - The store name is shown in a header at the top of the home page.
    - A navigation menu lists the main sections (Home, Catalog, Contact, Cart).
    - The header and menu use semantic tags (`<header>`, `<nav>`, lists).
- **E1-2** — As a customer, I want to see a featured books section with title, author, and price so that I can discover what's on offer.
  - **Acceptance criteria:**
    - A clearly identified "Featured books" section is present.
    - Each featured book shows its title, author, and price.
    - Prices are displayed in euros (€), consistent with the store's domain.
    - The sample catalog books are listed.
- **E1-3** — As a customer, I want to see the available categories so that I know what types of books are sold.
  - **Acceptance criteria:**
    - A section lists the available categories.
    - The four domain categories appear: Fiction, Non-fiction, Science fiction and fantasy, Children's.
- **E1-4** — As a customer, I want to see a footer with informational links (about us, terms, privacy) so that I can access store information.
  - **Acceptance criteria:**
    - A footer is present at the bottom of the page using a semantic `<footer>` tag.
    - It contains links to About us, Terms and conditions, and Privacy policy.
- **E1-5** — As a customer, I want a consistent visual identity (colors, typography, spacing) so that the store feels professional.
  - **Acceptance criteria:**
    - A single stylesheet defines a shared color palette, heading font, and body font used across the whole page.
    - Spacing between sections and elements follows a consistent scale rather than one-off values.
- **E1-6** — As a customer, I want the site to look good on mobile so that I can browse from any device.
  - **Acceptance criteria:**
    - The page includes a `<meta name="viewport">` tag so mobile browsers render it at device width.
    - On a narrow screen (~375px), the navigation and featured books stack in a single column with no horizontal scrolling.
- **E1-7** — As a customer, I want books displayed as neat cards so that I can clearly distinguish each product.
  - **Acceptance criteria:**
    - Each featured book is shown inside a bordered card with consistent padding, background, and spacing.
    - Cards are arranged in a responsive grid that reflows to fewer columns as the viewport narrows.
- **E1-8** — As a customer, I want visual feedback when hovering over links and buttons so that I know what is interactive.
  - **Acceptance criteria:**
    - Links and buttons change appearance (color, background, or elevation) on hover and keyboard focus.
    - The change uses a smooth transition rather than an instant jump.

## Epic 2 — Secondary pages (PHP includes)

- **E2-1** — As a customer, I want the same header and footer on every page so that navigation and store information stay consistent as I move around the site.
- **E2-2** — As a customer, I want the menu to highlight the current section so that I know where I am in the site.

## Epic 3 — Product listing

- **E3-1** — As a customer, I want to see the book catalog loaded from the database so that I can browse the real, up-to-date offer.
- **E3-2** — As a customer, I want to see the full catalog on a dedicated page so that I can explore all books.
- **E3-3** — As a customer, I want to filter books by category so that I can find what I'm looking for faster.

## Epic 4 — Product detail

- **E4-1** — As a customer, I want to open a book's detail page so that I can see its description, author, price, and availability.
- **E4-2** — As a customer, I want to see the book's image on the detail page so that I can recognize the edition.
- **E4-3** — As a customer, I want to know whether a book is available or out of stock so that I can decide whether to buy it.
- **E4-4** — As a customer, I want to easily go back to the catalog from the detail page so that I can keep browsing.

## Epic 5 — Login

- **E5-1** — As an administrator, I want to log in so that I can access the management area.
- **E5-2** — As an administrator, I want protected pages to be accessible only after logging in so that no one else can reach them.
- **E5-3** — As an administrator, I want to log out so that I can protect access when I am done.

## Epic 6 — Cart

- **E6-1** — As a customer, I want to add a book to the cart from the catalog or the detail page so that I can prepare my purchase.
- **E6-2** — As a customer, I want to see the cart contents with quantities and subtotal so that I can review my order.
- **E6-3** — As a customer, I want to change the quantity of a book in the cart so that I can adjust my purchase.
- **E6-4** — As a customer, I want to remove a book from the cart so that I can drop items I no longer want.
- **E6-5** — As a customer, I want to see an updated cart counter in the header so that I always know how many items I have.

## Epic 7 — Checkout

- **E7-1** — As a customer, I want to fill in a form with my shipping details so that I can complete my purchase.
- **E7-2** — As a customer, I want the form to validate required fields so that I cannot submit incomplete data.
- **E7-3** — As a customer, I want to see an order summary with the total before confirming so that I can review what I am about to buy.
- **E7-4** — As a customer, I want to confirm the order and have it saved so that I have a record of the purchase.
- **E7-5** — As a customer, I want to see a confirmation page with the order number so that I have a reference.
- **E7-6** — As a customer, I want the cart to be cleared after confirming so that I start fresh on my next purchase.

## Epic 8 — Admin panel (product CRUD)

- **E8-1** — As an administrator, I want to see the product list in the panel so that I can manage the catalog.
- **E8-2** — As an administrator, I want to create a new book so that I can expand the catalog.
- **E8-3** — As an administrator, I want to edit an existing book so that I can correct or update its information.
- **E8-4** — As an administrator, I want to delete a book so that I can remove it from the catalog.

## Epic 9 — Dashboard (sales statistics)

- **E9-1** — As an administrator, I want to see total revenue and the number of orders so that I can gauge the store's overall performance.
- **E9-2** — As an administrator, I want to see the list of received orders with their dates and totals so that I can review individual sales.
- **E9-3** — As an administrator, I want to see the best-selling books so that I know which titles are most popular.
- **E9-4** — As an administrator, I want to see sales broken down by category so that I understand demand across the catalog.
- **E9-5** — As an administrator, I want a visual chart of sales over time so that I can spot trends at a glance.
- **E9-6** — As an administrator, I want to see low-stock books so that I know what needs restocking.

---

**Total: 9 epics, 41 stories. Roles: Customer and Administrator.**
