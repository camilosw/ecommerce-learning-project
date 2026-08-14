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

All the layout in this epic is built with **flexbox**. CSS Grid can do some of
it too, but you only need one layout tool to build this page, and flexbox is
the one you already know.

### 1. HTML document skeleton

Every page begins with the same scaffold: `<!doctype html>`, the `<html lang>`
root, a `<head>` (with `<meta charset>`, `<meta name="viewport">` and
`<title>`), and the `<body>` that holds the visible content. Without this the
browser cannot reliably read your page or its character encoding.

- W3Schools: <https://www.w3schools.com/html/html_basic.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Learn/HTML/Introduction_to_HTML/The_head_metadata_in_HTML>

### 2. Semantic structural elements

`<header>`, `<main>`, `<section>`, `<article>` and `<footer>` give your page
meaning instead of using generic boxes. The epic's acceptance criteria
explicitly require semantic tags for the header and the footer, and each
featured book is wrapped in its own `<article>`. Two more appear on this page:
`<aside>` for the promotional notice (content related to the page but not part
of its main thread) and `<address>` for the store's postal address in the
footer.

- W3Schools: <https://www.w3schools.com/html/html5_semantic_elements.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Glossary/Semantics#semantics_in_html>

### 3. Headings and hierarchy

`<h1>`–`<h6>` form an outline. Use one `<h1>` for the page (the store name),
`<h2>` for each section (the banner claim, "Featured books", the opening hours)
and `<h3>` for each book title. A correct order helps both readers and screen
readers.

- W3Schools: <https://www.w3schools.com/html/html_headings.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements>

### 4. Lists

`<ul>` with `<li>` items group related things. On this page the featured books
are a list: they are several items of the same kind, so they belong in one
rather than in four loose blocks.

- W3Schools: <https://www.w3schools.com/html/html_lists.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ul>

### 5. Description lists

Some lists are pairs of *term* and *value* rather than plain items. The opening
hours are exactly that: `<dl>` wraps the list, `<dt>` holds the day ("Mon–Fri")
and `<dd>` the times ("9:00 – 20:30"). Using `<dl>` instead of two parallel
`<ul>`s keeps each day tied to its own schedule.

- W3Schools: <https://www.w3schools.com/html/html_lists_other.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dl>

### 6. Links

The `<a>` element with its `href` attribute connects pages. The detail page
doesn't exist yet, so the book covers and titles use a placeholder `href="#"`
— they will point at the real page in epic 4.

- W3Schools: <https://www.w3schools.com/html/html_links.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a>

### 7. Images

`<img>` needs a `src` (where the file is) and an `alt` (what it shows, for
readers who cannot see it — E1-8 requires a descriptive one on every cover).
Declaring `width` and `height` lets the browser reserve the space before the
image arrives, so the page doesn't jump around while loading, and
`loading="lazy"` postpones images that are far down the page. The reference uses
<https://picsum.photos> as a placeholder image service: the `/seed/<word>/`
part of the URL makes each book always get the *same* random photo.

- W3Schools: <https://www.w3schools.com/html/html_images.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img>

### 8. Text and paragraphs

`<p>` holds blocks of text such as the author name, the price and the
announcement. It's the basic unit of running text.

- W3Schools: <https://www.w3schools.com/html/html_paragraphs.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/p>

### 9. HTML entities

Some characters are written with entity codes: `&euro;` (or the literal `€`) for
prices, which the bookstore always shows in euros, `&copy;` for the copyright
symbol in the footer, and `&#9733;` for the star inside the announcement badge.

- W3Schools: <https://www.w3schools.com/html/html_entities.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Glossary/Character_reference>

### 10. Accessibility basics

`aria-label` names a region (here, the announcement `<aside>`), and
`aria-labelledby` links a `<section>` to the `id` of its heading.
`aria-hidden="true"` does the opposite: it hides purely decorative content —
such as the star in the promo badge — from screen readers, so they don't
announce a meaningless symbol.

- W3Schools: <https://www.w3schools.com/accessibility/accessibility_labels.php>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Attributes/aria-labelledby>

### 11. HTML comments

`<!-- ... -->` lets you annotate the markup. The reference uses comments to label
each section ("Site header", "Featured books"); it's a good habit that keeps
longer files readable.

- W3Schools: <https://www.w3schools.com/html/html_comments.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Comments>

With the markup in place, the topics below cover the CSS that gives the page its
visual identity, card layout, hover feedback and mobile-friendly behavior.

### 12. Linking a stylesheet

`<link rel="stylesheet" href="css/style.css">` in the `<head>` connects the page
to an external CSS file, keeping structure (HTML) and presentation (CSS) separate.

- W3Schools: <https://www.w3schools.com/css/css_howto.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/Guides/Getting_started>

### 13. Selectors: type, class, descendant and child

The reference styles elements by tag (`body`, `h2`), by `class` (`.book-card`,
`.promo-bubble`) for reusable hooks, by combining selectors (`.book-title a`) to
target elements only inside a specific ancestor, and with the child combinator
(`.book-list > li`) to reach *direct* children only.

- W3Schools: <https://www.w3schools.com/css/css_selectors.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_selectors>

### 14. The box model and `box-sizing`

Every element is a box with content, padding, border and margin. Setting
`box-sizing: border-box` on all elements (the reference uses the universal
selector `*`) makes width calculations include padding and border, which avoids
surprises when sizing cards.

- W3Schools: <https://www.w3schools.com/css/css_boxmodel.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Learn_web_development/Core/Styling_basics/Box_model>

### 15. Custom properties (CSS variables)

`:root { --color-primary: #7d2440; }` defines reusable design tokens for color,
font and spacing, referenced elsewhere with `var(--color-primary)`. This keeps
the visual identity (E1-4) consistent and easy to change from one place. The
reference also stores the gap between book cards in `--book-gap`, because that
same value is needed twice: once to draw the gap and once to calculate the card
width.

- W3Schools: <https://www.w3schools.com/css/css3_variables.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/Using_CSS_custom_properties>

### 16. Centred containers and full-width bands

`max-width: 1100px` plus `margin: 0 auto` centres a block and stops it from
growing on wide screens. The reference puts that pair in a reusable `.container`
class: each `<section>` stays full-width so its background color can span the
whole screen (the blue banner of E1-9), while the `.container` inside keeps the
text aligned with the rest of the page.

- W3Schools: <https://www.w3schools.com/css/css_max-width.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/max-width>

### 17. Flexbox

`display: flex` turns an element into a row (or, with `flex-direction: column`,
a stack) and gives you `align-items`, `justify-content` and `gap` to distribute
its children. It is the only layout tool this epic needs: the row of books, the
promo bubble with its badge, the card's internal stack of cover-title-author-price,
and the opening hours are all flex containers.

- W3Schools: <https://www.w3schools.com/css/css3_flexbox.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Learn_web_development/Core/CSS_layout/Flexbox>

### 18. `flex-wrap` and `flex-basis`: rows that wrap

By default a flex row squeezes everything onto one line. `flex-wrap: wrap` lets
it break onto the next line instead, and then the width you give each item
decides how many fit per row. The reference is explicit about it:

```css
.book-list > li {
  flex: 0 0 calc((100% - 3 * var(--book-gap)) / 4);
}
```

`flex: 0 0 <width>` reads "don't grow, don't shrink, be exactly this wide", and
the `calc()` subtracts the three gaps that sit between four cards before
dividing the rest by four. Fixing the width like this is what guarantees E1-5:
the row holds four cards or two or one, but never three with a lonely fourth
hanging underneath. The opening hours use the same idea — the day and its times
add up to 100%, so each pair takes a line of its own.

- W3Schools: <https://www.w3schools.com/css/css3_flexbox_items.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/flex-basis>

### 19. Sizing images: `aspect-ratio` and `object-fit`

Placeholder photos arrive in whatever proportions the service returns, but the
covers must all look alike (E1-8). `aspect-ratio: 2 / 3` forces every cover into
the same portrait shape, and `object-fit: cover` fills that shape by cropping the
photo instead of squashing it. `overflow: hidden` on the rounded wrapper keeps
the image from spilling over the corners.

- W3Schools: <https://www.w3schools.com/css/css3_object-fit.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/aspect-ratio>

### 20. Media queries

`@media (max-width: 900px) { ... }` applies extra rules only below that width.
The reference uses three, from wide to narrow, and each one only overrides what
must change:

| Below  | What changes                                                        |
| ------ | ------------------------------------------------------------------- |
| 900 px | two books per row instead of four, capped with a `max-width` and centred with `justify-content` |
| 640 px | header centred, smaller claim, promo bubble stacked                 |
| 480 px | one book per row, fluid again (`max-width: none`)                   |

Stacking queries this way is how a layout steps down gradually instead of
jumping straight from four columns to one (E1-5).

- W3Schools: <https://www.w3schools.com/css/css_rwd_mediaqueries.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_media_queries/Using_media_queries>

### 21. The `:hover` and `:focus` pseudo-classes

`:hover` and `:focus` style an element while the pointer is over it or it has
keyboard focus, giving the book covers and titles the visual feedback required
by E1-7. Always style `:focus` alongside `:hover`, or people navigating with the
keyboard get no feedback at all.

- W3Schools: <https://www.w3schools.com/css/css_pseudo_classes.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/Pseudo-classes>

### 22. Transitions

`transition: box-shadow 0.2s ease, transform 0.2s ease;` animates a property
smoothly between its states instead of changing it instantly, so lifting a cover
on hover feels polished rather than abrupt.

- W3Schools: <https://www.w3schools.com/css/css3_transitions.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_transitions/Using_CSS_transitions>

### 23. `border-radius` and `box-shadow`

Rounded corners and a soft drop shadow give the book covers (E1-6) the "neat
card" look and separate them from the page background. A very large radius —
`border-radius: 999px` — turns the announcement into a pill shape, and
`border-radius: 50%` makes the promo badge a perfect circle.

- W3Schools: <https://www.w3schools.com/css/css3_borders.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/box-shadow>

### 24. Pseudo-elements and the CSS triangle

`::after` adds a decorative box at the end of an element without adding any tag
to the HTML. The reference uses it to draw the tail of the announcement bubble
(E1-10) with the classic border trick: an element with zero size and thick
transparent borders shows only the side you color, which the browser renders as
a triangle. Positioning it needs `position: relative` on the bubble and
`position: absolute` on the tail.

- W3Schools: <https://www.w3schools.com/css/css_pseudo_elements.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/Pseudo-elements>
