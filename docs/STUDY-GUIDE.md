# Study Guide — Bookstore E-commerce

What to **study before** building each epic. For every epic this file
lists the concepts you need, a short explanation of why they matter *for that
increment*, and free resources to learn them (W3Schools as the beginner-friendly tutorial,
MDN as the authoritative reference).

How to use it: read the topics for the epic, then open `BACKLOG.md` and
build the user stories. Each epic lists **only** what that increment needs —
no concept from a later epic appears before you reach it.

---

## Epic 1 — Home

**Goal:** build the home page. Start with semantic HTML — describing the
*structure and meaning* of the content — and then add the CSS that gives it its
visual identity. The topics below cover the HTML foundation; the styling topics
are added once the markup is in place.

### 1. HTML document skeleton

Every page begins with the same scaffold: `<!doctype html>`, the `<html lang>`
root, a `<head>` (with `<meta charset>`, `<meta name="viewport">` and
`<title>`), and the `<body>` that holds the visible content. Without this the
browser cannot reliably read your page or its character encoding.

- W3Schools: <https://www.w3schools.com/html/html_basic.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Learn/HTML/Introduction_to_HTML/The_head_metadata_in_HTML>

### 2. Semantic structural elements

`<header>`, `<nav>`, `<main>`, `<section>`, `<article>` and `<footer>` give your
page meaning instead of using generic boxes. The epic's acceptance criteria
explicitly require semantic tags for the header, navigation and footer, and each
featured book is wrapped in its own `<article>`.

- W3Schools: <https://www.w3schools.com/html/html5_semantic_elements.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Glossary/Semantics#semantics_in_html>

### 3. Headings and hierarchy

`<h1>`–`<h6>` form an outline. Use one `<h1>` for the page (the store name),
`<h2>` for each section ("Featured books", "Browse by category"), and `<h3>` for
each book title. A correct order helps both readers and screen readers.

- W3Schools: <https://www.w3schools.com/html/html_headings.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements>

### 4. Lists

`<ul>` with `<li>` items group related things: the navigation menu, the list of
featured books, the categories and the footer links are all lists.

- W3Schools: <https://www.w3schools.com/html/html_lists.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ul>

### 5. Links

The `<a>` element with its `href` attribute connects pages. While the other
pages don't exist yet, use a placeholder `href="#"` for the menu, categories,
footer links and the "View details" / "Browse catalog" actions.

- W3Schools: <https://www.w3schools.com/html/html_links.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a>

### 6. Text and paragraphs

`<p>` holds blocks of text such as the author name, the price and the welcome
copy. It's the basic unit of running text.

- W3Schools: <https://www.w3schools.com/html/html_paragraphs.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/p>

### 7. HTML entities

Some characters are written with entity codes: `&euro;` (or the literal `€`) for
prices, which the bookstore always shows in euros, and `&copy;` for the
copyright symbol in the footer.

- W3Schools: <https://www.w3schools.com/html/html_entities.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Glossary/Character_reference>

### 8. Accessibility basics

`aria-label` names a region (for example the main and footer navigation), and
`aria-labelledby` links a `<section>` to the `id` of its heading. Both are used
throughout the reference page so assistive technology can announce each area.

- W3Schools: <https://www.w3schools.com/accessibility/accessibility_labels.php>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Attributes/aria-labelledby>

### 9. HTML comments

`<!-- ... -->` lets you annotate the markup. The reference uses comments to label
each section ("Site header", "Featured books"); it's a good habit that keeps
longer files readable.

- W3Schools: <https://www.w3schools.com/html/html_comments.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Comments>

With the markup in place, the topics below cover the CSS that gives the page its
visual identity, card layout, hover feedback and mobile-friendly behavior.

### 10. Linking a stylesheet

`<link rel="stylesheet" href="css/style.css">` in the `<head>` connects the page
to an external CSS file, keeping structure (HTML) and presentation (CSS) separate.

- W3Schools: <https://www.w3schools.com/css/css_howto.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/Guides/Getting_started>

### 11. Selectors: type, class and descendant

The reference styles elements by tag (`header`, `h2`), by `class` (`.book-card`,
`.btn`) for reusable hooks, and by combining selectors (`header nav a`) to target
elements only inside a specific ancestor.

- W3Schools: <https://www.w3schools.com/css/css_selectors.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_selectors>

### 12. The box model and `box-sizing`

Every element is a box with content, padding, border and margin. Setting
`box-sizing: border-box` on all elements (the reference uses the universal
selector `*`) makes width calculations include padding and border, which avoids
surprises when sizing cards.

- W3Schools: <https://www.w3schools.com/css/css_boxmodel.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Learn_web_development/Core/Styling_basics/Box_model>

### 13. Custom properties (CSS variables)

`:root { --color-primary: #6b2737; }` defines reusable design tokens for color,
font and spacing, referenced elsewhere with `var(--color-primary)`. This keeps
the visual identity (E1-5) consistent and easy to change from one place.

- W3Schools: <https://www.w3schools.com/css/css3_variables.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/Using_CSS_custom_properties>

### 14. Flexbox for the header and lists

`display: flex` arranges the header (title + nav) and the navigation lists in a
row that wraps onto multiple lines on narrow screens, without floats or manual
positioning.

- W3Schools: <https://www.w3schools.com/css/css3_flexbox.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Learn_web_development/Core/CSS_layout/Flexbox>

### 15. CSS Grid for the book cards

`display: grid` with `grid-template-columns: repeat(auto-fill, minmax(220px, 1fr))`
lays out the featured books (E1-7) as a responsive grid that automatically fits
more or fewer cards per row depending on the available width.

- W3Schools: <https://www.w3schools.com/css/css_grid.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Learn_web_development/Core/CSS_layout/Grids>

### 16. Media queries

`@media (max-width: 640px) { ... }` applies extra rules only below that width,
switching the header to a column layout and the card grid to a single column so
the page stays usable on mobile (E1-6).

- W3Schools: <https://www.w3schools.com/css/css_rwd_mediaqueries.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_media_queries/Using_media_queries>

### 17. The `:hover` and `:focus` pseudo-classes

`:hover` and `:focus` style an element while the pointer is over it or it has
keyboard focus, giving links, the "Browse full catalog" button and the category
pills the visual feedback required by E1-8.

- W3Schools: <https://www.w3schools.com/css/css_pseudo_classes.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/Pseudo-classes>

### 18. Transitions

`transition: background-color 0.2s ease, transform 0.2s ease;` animates a
property smoothly between its states instead of changing it instantly, so hover
effects on buttons and cards feel polished rather than abrupt.

- W3Schools: <https://www.w3schools.com/css/css3_transitions.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_transitions/Using_CSS_transitions>

### 19. `border-radius` and `box-shadow`

Rounded corners and a soft drop shadow give the book cards (E1-7) the "neat
card" look and separate them visually from the page background.

- W3Schools: <https://www.w3schools.com/css/css3_borders.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/box-shadow>
