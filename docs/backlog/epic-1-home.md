# Epic 1 — Home

> Part of the [Backlog](README.md) · Study guide [epic-1-home.md](../study-guide/epic-1-home.md) · Tag `epic-1-home`

Semantic HTML and CSS: the store's first page, its visual identity, and a layout that
works on a phone. No server, no database — a single static page.

- **E1-1** — As a customer, I want to see the store name at the top of the page so that I know which store I am visiting.
  - **Acceptance criteria:**
    - The store name is shown in a header at the top of the home page.
    - The header uses the semantic `<header>` tag, and the store name is the page's `<h1>`.
  - _Amended in [Epic 2](epic-2-pages.md): once the header is shared by every page, the store
    name becomes a link rather than the page's `<h1>`, and each page carries its own `<h1>`._
- **E1-2** — As a customer, I want to see a featured books section with title, author, and price so that I can discover what's on offer.
  - **Acceptance criteria:**
    - A clearly identified "Featured books" section is present.
    - Each featured book shows its title, author, and price.
    - Prices are displayed in euros (€), consistent with the store's domain.
    - The sample catalog books are listed.
- **E1-3** — As a customer, I want to see a footer closing the page so that I know who is behind the store.
  - **Acceptance criteria:**
    - A footer is present at the bottom of the page using a semantic `<footer>` tag.
    - It shows the copyright notice with the year and the store name.
- **E1-4** — As a customer, I want a consistent visual identity (colors, typography, spacing) so that the store feels professional.
  - **Acceptance criteria:**
    - A single stylesheet defines a shared color palette, heading font, and body font used across the whole page.
    - Spacing between sections and elements follows a consistent scale rather than one-off values.
- **E1-5** — As a customer, I want the site to look good on mobile so that I can browse from any device.
  - **Acceptance criteria:**
    - The page includes a `<meta name="viewport">` tag so mobile browsers render it at device width.
    - On a narrow screen (~375px) the books stack in a single column, with no horizontal scrolling anywhere on the page.
    - The number of books per row steps down cleanly: **four** on a large screen, **two** on a medium one, **one** on a phone.
    - A row is never left incomplete: the layout never shows three books in a row with a single one hanging below.
- **E1-6** — As a customer, I want books displayed as neat cards so that I can clearly distinguish each product.
  - **Acceptance criteria:**
    - Each featured book is shown as a card: its cover framed with a border, rounded corners, and a soft shadow, with the text beneath it.
    - The cards form a row that wraps onto the next line when it runs out of space, and every card in a row has the same width.
- **E1-7** — As a customer, I want visual feedback when hovering over links so that I know what is interactive.
  - **Acceptance criteria:**
    - The book covers and titles change appearance (color or elevation) on hover and keyboard focus.
    - The change uses a smooth transition rather than an instant jump.
- **E1-8** — As a customer, I want to see each book's cover so that I can recognize the titles at a glance.
  - **Acceptance criteria:**
    - Every featured book shows a cover image above its title, author, and price.
    - Each image has a descriptive `alt` naming the book it belongs to.
    - All covers are shown with the same portrait proportions, so a row of cards stays aligned even when the source images have different sizes.
    - The cover leads to the same destination as the book title.
- **E1-9** — As a customer, I want a striking banner at the top of the home page so that I immediately understand what the store offers.
  - **Acceptance criteria:**
    - The banner's background color spans the full width of the screen, while its text stays aligned with the rest of the page content.
    - It contains the store's claim and nothing else, so the message reads at a glance.
- **E1-10** — As a customer, I want to see the store's current announcement highlighted so that I don't miss active promotions.
  - **Acceptance criteria:**
    - A visually distinct notice (its own background color and an icon) is shown between the banner and the featured books.
    - The notice reads as a message coming from the store: it is shaped as a speech bubble pointing at the content below it.
    - On a narrow screen the notice keeps its content readable, without overflowing the viewport.
- **E1-11** — As a customer, I want to know the physical store's opening hours and address so that I can visit in person.
  - **Acceptance criteria:**
    - A section lists the opening hours for weekdays, Saturday, and Sunday.
    - Each day (or range of days) is paired with its times, and the pairing is marked up as a description list.
    - The store's postal address appears in the footer, marked up with the `<address>` tag.
