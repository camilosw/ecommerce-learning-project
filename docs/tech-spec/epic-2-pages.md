# Tech spec — Epic 2: Secondary pages

> Stories [E2-1 … E2-8](../backlog/epic-2-pages.md) ·
> Study guide [epic-2-pages.md](../study-guide/epic-2-pages.md) · Tag `epic-2-pages`

## 1. Purpose

Epic 1 delivered one static file, `public/index.html`: a header holding the wordmark, the
home content, and a footer with the copyright and the store's address. No menus — a single
page has nowhere to link to. The header and footer markup lives in that file exactly once,
so the moment a second page appears it would be duplicated, and would drift.

This increment introduces server-rendered pages. The header and footer move into two
shared partials that every page pulls in with `require`, they gain the main and footer
menus that connect the site (E2-1, E2-4), and three content pages join the home page. It
is the student's first contact with PHP.

## 2. Scope

**In scope**

- Convert the home page from `.html` to `.php` and strip its header/footer into partials.
- Three new static pages: About us, Terms and conditions, Contact.
- A main menu and a footer menu — both new in this epic — marking the page currently being viewed.
- Move the application code under `src/`.

**Out of scope** — deliberately left for later epics, do not write this code now:

| Not now                          | Arrives in |
| -------------------------------- | ---------- |
| Database, PDO, real product data | Epic 3     |
| Catalog listing page             | Epic 3     |
| Book detail pages                | Epic 4     |
| Any form or input handling       | Epic 7     |
| Cart behaviour and a live counter| Epic 6     |

The `Catalog` and `Cart (0)` menu entries therefore keep `href="#"` through this epic.
They are the only two placeholder links allowed to remain (E2-1, E2-8).

## 3. Directory layout

Application code moves under `src/`, leaving the repository root for documentation and
configuration only. Moves are performed with `git mv` so history follows the files.

```
src/
  includes/            NOT reachable by URL
    header.php         <head>, <header>, main menu
    footer.php         <footer>, footer menu, closing tags
  public/              the web root
    index.php          home        (git mv from public/index.html)
    about.php          About us
    terms.php          Terms and conditions
    contact.php        Contact
    css/
      base.css         tokens, reset, .container  (git mv from public/css/style.css)
      layout.css       the header and footer chrome
      components.css   design used by more than one page
      home.css         index.php only
      contact.css      contact.php only
docs/                  backlog, study guide, tech specs, screenshots
```

Epic 1's single `style.css` becomes the five files above; §9 explains the split and
what moves where. `base.css` is the `git mv` target because it keeps the largest part
of the original file, so the history follows the bulk of the content.

The server is pointed at `src/public` only:

```bash
php -S localhost:8000 -t src/public
```

**Why `includes/` sits outside the web root.** Anything inside `src/public` can be
requested by URL. A partial is not a page — asking for `header.php` directly would render
a broken half-document. Keeping it one level up makes that request return 404 (an E2-2
criterion) while PHP can still read the file from disk. The same rule will protect the
database credentials in Epic 3, so the habit is established before it matters.

All pages sit flat in `src/public`, so `href="about.php"` and `href="css/base.css"` work
unchanged from every page — including from inside the shared header, which prints the same
relative paths whichever page required it. No base URL handling is needed.

## 4. The include contract

Every page follows the same three-part skeleton. A page sets two variables (optionally a
third), requires the header, writes its own `<main>`, and requires the footer:

```php
<?php
// Values consumed by the shared header.
$page_title   = 'Contact';   // browser tab title
$current_page = 'contact';   // which menu entry to mark as active
$page_css     = 'contact';   // optional: also load css/contact.css
require __DIR__ . '/../includes/header.php';
?>

<main>
    <!-- page content only -->
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>
```

| Variable        | Set by          | Used by                   | Purpose                                       |
| --------------- | --------------- | ------------------------- | --------------------------------------------- |
| `$page_title`   | page            | `header.php`              | `<title>$page_title — Bookstore Page</title>` |
| `$current_page` | page            | `header.php`, `footer.php`| matches a menu key to mark the active link     |
| `$page_css`     | page (optional) | `header.php`              | loads `css/$page_css.css` for this page alone  |

All three are plain variables, and that is the whole mechanism: `require` does **not** open
a new scope. The required file is executed inside the scope of the page that required it,
so by the time `header.php` runs, the variables the page just assigned already exist and it
can simply read them. This is also why they are assigned *before* the `require` — setting
`$page_css` after that line would have no effect, because the `<head>` has already been
written and sent.

### Loading a page's own stylesheet

`$page_css` is the only optional variable. This is what `header.php` prints inside its
`<head>`:

```php
<link rel="stylesheet" href="css/base.css" />
<link rel="stylesheet" href="css/layout.css" />
<link rel="stylesheet" href="css/components.css" />
<?php if (isset($page_css)): ?>
<link rel="stylesheet" href="css/<?= htmlspecialchars($page_css) ?>.css" />
<?php endif; ?>
```

The three shared stylesheets are unconditional. The fourth `<link>` exists only when the
page set the variable, and its filename is built from the value:

| Page          | Sets `$page_css` | Fourth `<link>` printed |
| ------------- | ---------------- | ----------------------- |
| `index.php`   | `'home'`         | `css/home.css`          |
| `contact.php` | `'contact'`      | `css/contact.css`       |
| `about.php`   | — not set        | none                    |
| `terms.php`   | — not set        | none                    |

Read the whole path for `contact.php`: the page assigns `$page_css = 'contact'`, requires
the header, the header finds the variable set, `htmlspecialchars($page_css)` prints
`contact` between `css/` and `.css`, and the browser requests `css/contact.css`.

The `isset()` check is what lets a page opt out. `about.php` and `terms.php` have no styles
of their own, so they never set the variable, no fourth `<link>` is printed, and the browser
requests nothing that does not exist — without the check, PHP would warn about an
undefined variable and both pages would ask for `css/.css`, taking a 404.

Pages set the value as a bare name (`'home'`), not a path and not a filename, so the folder
and the extension are decided in one place: the line above. §9 covers what goes in each
stylesheet, and why their order is fixed here rather than left to each page.

**Considered and rejected:** deriving the stylesheet name from `$current_page`, which
would need no new variable at all. It would force *every* page to own a stylesheet — the
two that need none would request a file that does not exist and take a 404 — and it would
weld a menu key to a filename, so renaming one would silently break the other.

`require` rather than `include`: a page without its header is meaningless, so a missing
file must stop execution rather than warn and continue. `__DIR__` anchors the path to the
file itself rather than to the working directory, so the include resolves the same way no
matter how the server is started.

`header.php` opens `<!doctype html>` through `<header>`; `footer.php` emits `<footer>` and
closes `</body></html>`. Between them each page owns exactly one `<main>`.

## 5. Menus

Both menus are new in this epic: Epic 1's header carried only the wordmark and its footer
only the copyright and address. Each menu is a `<nav>` wrapping a `<ul>`, built from an
associative array looped with `foreach` to print one `<li>` per entry. Defining menus as
data means adding a page later is a one-line change instead of an edit in four files.

```php
// src/includes/header.php
$main_menu = [
    'home'    => ['url' => 'index.php',   'label' => 'Home'],
    'catalog' => ['url' => '#',           'label' => 'Catalog'],   // Epic 3
    'about'   => ['url' => 'about.php',   'label' => 'About us'],
    'contact' => ['url' => 'contact.php', 'label' => 'Contact'],
    'cart'    => ['url' => '#',           'label' => 'Cart (0)'],  // Epic 6
];

// src/includes/footer.php
$footer_menu = [
    'about' => ['url' => 'about.php', 'label' => 'About us'],
    'terms' => ['url' => 'terms.php', 'label' => 'Terms and conditions'],
];
```

**Terms and conditions appears in the footer menu only** (PM decision, E2-6). It is a
legal page, not a section of the store.

**Active-link rule.** Inside each loop, the entry's key is compared with `$current_page`;
on a match the anchor receives `class="active"` and `aria-current="page"`. Both menus
apply the identical rule, so on `about.php` the About link is marked in both — correct,
since both point at the page being viewed. Keys are unique per menu, so no menu can ever
mark two links.

`$current_page` values in use: `home`, `about`, `terms`, `contact`.

**Considered and rejected:** a shared `render_menu()` helper to avoid writing the same
eight-line loop in both partials. Two copies of a short, obvious loop are easier for a
beginner to follow than a function with parameters, and CLAUDE.md rules out unnecessary
abstraction. Revisit if a third menu appears.

## 6. Output escaping

Every variable printed into HTML is wrapped in `htmlspecialchars()`:

```php
<a href="<?= htmlspecialchars($item['url']) ?>"><?= htmlspecialchars($item['label']) ?></a>
```

All data in this epic is hard-coded by the developer, so nothing can currently go wrong.
The policy is adopted now precisely because it is free now: Epic 3 introduces database
values and Epic 7 introduces text typed by visitors, and a rule applied uniformly from the
first PHP file is one that does not have to be retro-fitted to twenty templates later.

## 7. Heading structure

Epic 1 used `<h1>` for the store name, correct for a one-page site. With a shared header
that `<h1>` would repeat identically on every page, leaving each page without a heading of
its own. From this epic:

- The store name in the header becomes a **link to the home page**, marked up as a
  paragraph with `class="site-title"` — not a heading.
- Each page carries its own `<h1>` inside `<main>`: the store claim already in the hero
  band on the home page, then "About us", "Terms and conditions", "Contact".
- Section headings within a page stay `<h2>`.

On the home page this promotes the existing hero `<h2>` — *Your mind travels with the best
books — we are the bridge* — to `<h1>`, rather than adding a second heading above it. The
claim is already the most prominent text on the page and E1-9 requires the band to hold it
and nothing else, so the page gains its `<h1>` without gaining any markup.

This supersedes topic 3 of the [Epic 1 study guide](../study-guide/epic-1-home.md), which
told the student to use `<h1>` for the store name. E1-1 asks for that `<h1>` explicitly, so
this is a real amendment to an accepted criterion, recorded in §11 — not a silent change.
The visible outcome E1-1 exists for is unaffected: the store name still sits at the top of
every page, in a semantic `<header>`.

## 8. Contact page

Static store details, no form — forms and validation belong to Epic 7 (E2-7).

| Field    | Value                                          |
| -------- | ---------------------------------------------- |
| Address  | Oranienburger Straße 27 · 10117 Berlin         |
| Phone    | +49 30 1234 5678                               |
| Email    | hallo@bookstorepage.example                    |
| Hours    | Mon–Fri 9:00–20:30 · Sat 9:00–20:00 · Sun 13:00–16:00 |

**The address and the hours must match the home page**, which already prints the address in
its footer (`<address>`) and the hours as a `<dl>` — E2-7 requires the two pages to agree.
The hours are Epic 1's, transcribed rather than invented. The address is the other way
round: it is a **PM decision made here**, and Epic 1's footer was updated to carry the same
street, so the store has one address across the site. Both stay hard-coded in two places
for now — a single source for them would need data storage, which is Epic 3.

The street is a real one in Berlin, chosen so the keyless map embed below can actually
resolve it; the store itself, its phone number and its email are fictional. The `.example`
TLD is reserved by RFC 2606 and can never belong to anyone, so the email cannot reach a
real inbox. Prices in euros (€) are consistent with the location.

The map uses Google Maps' keyless embed form:

```html
<iframe src="https://maps.google.com/maps?q=Oranienburger+Stra%C3%9Fe+27,+10117+Berlin&output=embed"
        title="Map showing the Bookstore Page shop at Oranienburger Straße 27, Berlin"
        loading="lazy"></iframe>
```

**Why this form.** The `?q=…&output=embed` URL needs no API key, no billing account and no
Composer package, and the location is changed by editing one string — appropriate for a
teaching repository. The alternative, Google's Maps Embed API, requires a key that would
have to be kept out of version control, which is a lesson for a later epic.

Note the URL encoding: `ß` is written `%C3%9F` and the spaces as `+`, because a query string
cannot carry those characters literally.

`title` gives the frame the text alternative E2-7 requires; `loading="lazy"` defers the
request. Note for the student: the embed loads third-party content, so the visitor's
browser contacts Google when this page opens.

## 9. CSS

Epic 1 shipped one `style.css`. This epic splits it into five files. The split happens
**now** rather than later for two reasons: this is the epic that introduces the shared
header, so the `<link>` tags live in exactly one file and adding a stylesheet later is a
one-line edit; and it is the epic that would otherwise push a single stylesheet past the
point where a beginner can still find anything in it.

| File             | Loaded by     | Holds                                                        |
| ---------------- | ------------- | ------------------------------------------------------------ |
| `base.css`       | every page    | design tokens, reset, base element rules, `.container`, `main h2` |
| `layout.css`     | every page    | `.site-header`, `.site-title`, `.main-nav`, `.footer-nav`, `.site-footer` |
| `components.css` | every page    | `.page-intro`, `.prose`, `.opening-hours`                     |
| `home.css`       | `index.php` via `$page_css`   | `.hero`, `.promo*`, `.book-list`, `.book-card`, `.book-cover`, `.store-info` |
| `contact.css`    | `contact.php` via `$page_css` | `.contact-layout`, `.contact-details`, `.map-embed`           |

`about.php` and `terms.php` get no stylesheet of their own: everything they need is in the
three shared files. A per-page file is created when the page has something to put in it,
not for symmetry.

**Load order is cascade order.** `header.php` prints the three shared stylesheets in the
order above and the page's own one — when there is one — last (§4 shows the block), so a
rule in a later file wins over the same rule in an earlier one: a page can override
anything shared, never the other way round. This is the reason the order is fixed in
`header.php` rather than left to whoever adds the next page.

**Why `layout.css` is its own file.** It styles exactly what the two partials in
`src/includes/` print, and nothing else. The markup for the site chrome lives in one place
(§4); its CSS now does too, which is the same argument that justifies the partials.

**When a rule moves into `components.css`.** A block earns its place there the moment a
**second** page needs it — not before, on the grounds that it looks reusable. This epic
has exactly one promotion: `.opening-hours` is on the home page and again on the contact
page, because E2-7 requires the two to agree. `.book-list`, `.book-card` and `.book-cover`
stay in `home.css` even though the catalog will obviously reuse them; they move in Epic 3,
when the second page actually exists.

Design tokens are the deliberate exception: `--book-gap` is used only by `home.css` but is
declared with the rest of them in `base.css`, because a token defined in two places is a
token that will drift.

### Selectors this epic adds

| Selector                     | File             | Purpose                                                                |
| ---------------------------- | ---------------- | ---------------------------------------------------------------------- |
| `.site-title`                | `layout.css`     | Store name in the header, now a link (§7); keeps the Epic 1 `.logo` styling |
| `.main-nav`, `.footer-nav`   | `layout.css`     | The two menus: flex rows that wrap, reusing `--space-*` for the gaps    |
| `nav a[aria-current="page"]` | `layout.css`     | Active menu link — underline in `--color-accent`                        |
| `.page-intro`                | `components.css` | `<h1>` plus lead paragraph shared by the three content pages            |
| `.prose`                     | `components.css` | Readable measure (`max-width: 70ch`) for body copy                      |
| `.prose ul`                  | `components.css` | Restores `list-style` and padding, which the global `ul { list-style: none }` in `base.css` strips |
| `.contact-layout`            | `contact.css`    | Details beside the map on desktop, stacked below 640px                  |
| `.map-embed`                 | `contact.css`    | Responsive `aspect-ratio` box so the iframe scales with the column      |

The active link is selected by its **attribute**, not by the `class`, so the visual
highlight and the screen-reader announcement can never drift apart. The `class="active"`
is emitted alongside it as a conventional hook, but carries no styling of its own.

Epic 1's rules are redistributed unchanged — the split moves CSS between files, it does not
rewrite it — with two exceptions. `.hero h2` becomes `.hero h1`, which follows from §7.
`.site-header` gains a flex layout so the store name sits on the left and the main menu on
the right on desktop (PM decision made during this epic's review), wrapping to a centred,
stacked column below 640px so the mobile layout is unchanged.

**Flexbox only, still.** Epic 1 chose flexbox as the single layout tool because CSS Grid is
not yet in the student's toolbox, and nothing in this epic teaches it — so the menus and
`.contact-layout` are flex rows with `flex-wrap`, not grids. The class is named
`.contact-layout` rather than `.contact-grid` so the name does not promise a technique the
CSS does not use. `.map-embed` reuses `aspect-ratio`, already learned in Epic 1 for the
book covers.

### Considered and rejected

**Keeping one `style.css`.** Simplest to link, and correct while the site was one page. It
loses on the first page that needs styles nobody else does: every visitor downloads the map
box and the announcement bubble to read the terms and conditions, and the student scrolls a
single growing file to find anything.

**One file per component** — `header.css`, `footer.css`, and so on. Too granular at this
size: the header is around 25 lines and the footer 15, and splitting only those two leaves
the majority of the stylesheet in an unnamed remainder. `layout.css` groups them by what
owns them instead.

**Chaining the files with `@import` from one stylesheet.** It would keep a single `<link>`
in the header, but CSS `@import` **serializes** the downloads: the browser cannot discover
the second file until the first has been fetched and parsed. Four `<link>` tags download in
parallel, and the load order is visible in the markup instead of hidden inside a CSS file.

**A `.btn` class in `components.css`.** Proposed and then dropped: the Epic 1 redesign
left no button anywhere on the site, and none of this epic's pages introduces one. It
arrives in Epic 3 with the catalog, under the promote-on-second-use rule above.

## 10. Traceability

| Story | Satisfied by                                                                    |
| ----- | ------------------------------------------------------------------------------- |
| E2-1  | `$main_menu` and its `<nav>` in `src/includes/header.php`; `.main-nav` in `layout.css` |
| E2-2  | `src/includes/header.php`, `src/includes/footer.php`, and the `require` calls in all four pages |
| E2-3  | the `foreach` + `$current_page` comparison in both partials; `nav a[aria-current="page"]` in `layout.css` |
| E2-4  | `$footer_menu` and its `<nav>` in `src/includes/footer.php`, kept alongside the Epic 1 copyright and `<address>`; `.footer-nav` in `layout.css` |
| E2-5  | `src/public/about.php`; `about` entries in both menu arrays                      |
| E2-6  | `src/public/terms.php`; `terms` entry in `$footer_menu` only                     |
| E2-7  | `src/public/contact.php` and its `$page_css`; `.contact-layout` and `.map-embed` in `contact.css` |
| E2-8  | `$page_title` handling in `header.php`; every menu URL resolving except the two documented placeholders |

## 11. Backlog change

**E1-1 amended.** Its criterion "the store name is the page's `<h1>`" no longer holds from
this epic on. A shared header would repeat that `<h1>` identically on every page, leaving
each page without a heading of its own, so the store name becomes a link marked up as a
paragraph and every page carries its own `<h1>` inside `<main>` (§7). The rest of E1-1 —
the store name at the top of the page, inside a semantic `<header>` — is unchanged.

Recorded as an _Amended in Epic 2_ note on the story in
[backlog/epic-1-home.md](../backlog/epic-1-home.md), and under "Amendments to earlier
epics" in [backlog/epic-2-pages.md](../backlog/epic-2-pages.md).

## 12. Verification

1. `php -S localhost:8000 -t src/public`, open <http://localhost:8000>.
2. The header shows the main menu — Home, Catalog, About us, Contact, Cart (0) — inside a
   `<nav>`, and the footer shows About us and Terms and conditions next to the copyright
   and the store address. *(E2-1, E2-4)*
3. Navigate Home → About us → Contact, and Terms from the footer. The header and footer are
   byte-identical on every page and each browser tab title differs. *(E2-2, E2-8)*
4. On each page the matching menu link is visibly highlighted and carries
   `aria-current="page"`; no menu marks two links. *(E2-3)*
5. Terms is absent from the main menu and present in the footer menu. *(E2-6)*
6. The Contact page shows address, phone, email, hours and a rendered map, and contains no
   `<form>` element. Its address and hours match the ones on the home page. *(E2-7)*
7. `curl -s -o /dev/null -w '%{http_code}' http://localhost:8000/includes/header.php`
   returns `404`. *(E2-2)*
8. Every menu and footer link resolves, except `Catalog` and `Cart (0)`. *(E2-8)*
9. At a ~375px viewport the menus and the contact layout stack with no horizontal
   scrolling — the Epic 1 responsive behaviour still holds.
10. View source on each page: all four request `base.css`, `layout.css` and
    `components.css`; only `index.php` requests `home.css` and only `contact.php` requests
    `contact.css`; `about.php` and `terms.php` request no fourth stylesheet. No request in
    the browser's network panel returns 404. *(§9)*
11. The home page renders exactly as it did at the `epic-1-home` tag. The stylesheet split
    moves rules between files without changing them, so any visual difference is a mistake
    made while splitting.
