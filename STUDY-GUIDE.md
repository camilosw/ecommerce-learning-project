# Study Guide — Bookstore E-commerce

What to **study before** building each milestone. For every milestone this file
lists the concepts you need, a short explanation of why they matter *for that
increment*, and free resources to learn them (MDN as the authoritative
reference, W3Schools as the beginner-friendly tutorial).

How to use it: read the topics for the milestone, then open `BACKLOG.md` and
build the user stories. Each milestone lists **only** what that increment needs —
no concept from a later milestone appears before you reach it.

---

## Milestone 1 — Static home

**Goal:** build the home page with semantic HTML and no styles. You are
describing the *structure and meaning* of the content, not how it looks.

### 1. HTML document skeleton

Every page begins with the same scaffold: `<!doctype html>`, the `<html lang>`
root, a `<head>` (with `<meta charset>`, `<meta name="viewport">` and
`<title>`), and the `<body>` that holds the visible content. Without this the
browser cannot reliably read your page or its character encoding.

- MDN: <https://developer.mozilla.org/en-US/docs/Learn/HTML/Introduction_to_HTML/The_head_metadata_in_HTML>
- W3Schools: <https://www.w3schools.com/html/html_basic.asp>

### 2. Semantic structural elements

`<header>`, `<nav>`, `<main>`, `<section>`, `<article>` and `<footer>` give your
page meaning instead of using generic boxes. The milestone's acceptance criteria
explicitly require semantic tags for the header, navigation and footer, and each
featured book is wrapped in its own `<article>`.

- MDN: <https://developer.mozilla.org/en-US/docs/Glossary/Semantics#semantics_in_html>
- W3Schools: <https://www.w3schools.com/html/html5_semantic_elements.asp>

### 3. Headings and hierarchy

`<h1>`–`<h6>` form an outline. Use one `<h1>` for the page (the store name),
`<h2>` for each section ("Featured books", "Browse by category"), and `<h3>` for
each book title. A correct order helps both readers and screen readers.

- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements>
- W3Schools: <https://www.w3schools.com/html/html_headings.asp>

### 4. Lists

`<ul>` with `<li>` items group related things: the navigation menu, the list of
featured books, the categories and the footer links are all lists.

- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ul>
- W3Schools: <https://www.w3schools.com/html/html_lists.asp>

### 5. Links

The `<a>` element with its `href` attribute connects pages. While the other
pages don't exist yet, use a placeholder `href="#"` for the menu, categories,
footer links and the "View details" / "Browse catalog" actions.

- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a>
- W3Schools: <https://www.w3schools.com/html/html_links.asp>

### 6. Text and paragraphs

`<p>` holds blocks of text such as the author name, the price and the welcome
copy. It's the basic unit of running text.

- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/p>
- W3Schools: <https://www.w3schools.com/html/html_paragraphs.asp>

### 7. HTML entities

Some characters are written with entity codes: `&euro;` (or the literal `€`) for
prices, which the bookstore always shows in euros, and `&copy;` for the
copyright symbol in the footer.

- MDN: <https://developer.mozilla.org/en-US/docs/Glossary/Character_reference>
- W3Schools: <https://www.w3schools.com/html/html_entities.asp>

### 8. Accessibility basics

`aria-label` names a region (for example the main and footer navigation), and
`aria-labelledby` links a `<section>` to the `id` of its heading. Both are used
throughout the reference page so assistive technology can announce each area.

- MDN: <https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Attributes/aria-labelledby>
- W3Schools: <https://www.w3schools.com/accessibility/accessibility_labels.php>

### 9. HTML comments

`<!-- ... -->` lets you annotate the markup. The reference uses comments to label
each section ("Site header", "Featured books"); it's a good habit that keeps
longer files readable.

- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Comments>
- W3Schools: <https://www.w3schools.com/html/html_comments.asp>
