# Epic 2 — Secondary pages (PHP includes)

> Part of the [Backlog](README.md) · Study guide [epic-2-pages.md](../study-guide/epic-2-pages.md) ·
> Tech spec [epic-2-pages.md](../tech-spec/epic-2-pages.md) · Tag `epic-2-pages`

The single page becomes a small site. The home page of Epic 1 has no menu at all — it had
nowhere to go. Now the header and footer move into shared components that every page
includes, they gain the menus that connect the site, and three content pages join the home
page.

- **E2-1** — As a customer, I want a navigation menu in the header so that I can move between the store's sections.
  - **Acceptance criteria:**
    - The header shows a navigation menu listing the store's sections: Home, Catalog, About us, Contact, and the cart.
    - The menu uses semantic tags (`<nav>` and a list).
    - The Catalog and Cart entries are placeholders until the epics that build them (3 and 6); every other entry leads to a real page.
    - On a narrow screen (~375px) the menu stays readable and causes no horizontal scrolling.
- **E2-2** — As a customer, I want the same header and footer on every page so that navigation and store information stay consistent as I move around the site.
  - **Acceptance criteria:**
    - The header markup exists in exactly one file, and the footer markup in exactly one file.
    - Every page of the site renders that shared header and footer.
    - Changing the store name in the shared header changes it on every page at once.
    - The shared files are not reachable by URL.
- **E2-3** — As a customer, I want the menu to highlight the current section so that I know where I am in the site.
  - **Acceptance criteria:**
    - The menu link matching the page being viewed is visually distinguished from the others.
    - That link carries `aria-current="page"` so screen readers announce it.
    - The main menu and the footer menu follow the same rule, and neither ever marks more than one of its own links.
- **E2-4** — As a customer, I want a footer with informational links (about us, terms and conditions) so that I can access store information.
  - **Acceptance criteria:**
    - The footer shows a menu with links to About us and Terms and conditions, marked up with `<nav>` and a list.
    - The copyright notice and the postal address delivered in Epic 1 stay in the footer alongside the menu.
- **E2-5** — As a customer, I want an About us page so that I know who I am buying from.
  - **Acceptance criteria:**
    - The About us page is reachable from both the main menu and the footer menu.
    - It presents the store's story and what it sells, inside the site's shared layout.
- **E2-6** — As a customer, I want to read the terms and conditions so that I know the rules of purchase before I buy.
  - **Acceptance criteria:**
    - The Terms and conditions page is reachable from the footer menu.
    - The page is not listed in the main menu.
    - It covers ordering, prices in euros (€), shipping, and returns.
- **E2-7** — As a customer, I want a contact page with the store's details and location so that I can visit or get in touch.
  - **Acceptance criteria:**
    - The Contact page shows the postal address, phone number, email address, and opening hours.
    - The address and the opening hours are the same ones the home page already shows (E1-11); the two pages never contradict each other.
    - An embedded map shows the store's location.
    - The map has a text alternative describing what it shows.
    - The page contains no contact form, as forms arrive in a later epic.
- **E2-8** — As a customer, I want every page to identify itself in the browser tab so that I can tell my open tabs apart.
  - **Acceptance criteria:**
    - Each page sets its own `<title>` including the store name.
    - No link in the main menu or footer leads to a page that does not exist, except the Catalog and Cart placeholders reserved for later epics.

## Amendments to earlier epics

- **[E1-1](epic-1-home.md)** — the store name stops being the page's `<h1>`. A shared header
  would repeat that heading identically on every page, leaving each page without a heading
  of its own, so the store name becomes a link back to the home page and every page carries
  its own `<h1>` inside `<main>`. The store name is still shown at the top of every page, so
  the rest of E1-1 stands.
