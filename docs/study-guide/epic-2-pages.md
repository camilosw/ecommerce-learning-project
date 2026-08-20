# Epic 2 — Secondary pages

> Part of the [Study Guide](README.md) · Stories [E2-1 … E2-8](../backlog/epic-2-pages.md) · Tag `epic-2-pages`

**Goal:** turn the single static page from Epic 1 into a small site of several
pages that all share one header and one footer, and give it the menus that connect
them — Epic 1's page had none, because there was nowhere to go. This is your
**first PHP**: instead of copying the header markup into every file, you write it
once and every page pulls it in from the server.

Nothing is stored in a database yet — that is Epic 3. Everything here is about
*assembling* pages on the server before they reach the browser.

> **A note on the links.** MDN is the authoritative reference for the web platform
> (HTML, CSS), but it does not document PHP. For the PHP topics the authoritative
> reference is the official manual at php.net, so that is what the second link points
> to. W3Schools stays the beginner-friendly tutorial throughout.

## 1. What PHP is and how it runs

PHP is a language that runs **on the server**. When the browser asks for
`contact.php`, PHP executes the file and sends only the resulting HTML — the visitor
never sees your PHP code. This is the whole reason a shared header is possible: the
server glues the pieces together before anyone downloads the page.

You run the site with PHP's built-in web server, pointed at the public folder:

```bash
php -S localhost:8000 -t src/public
```

Opening `index.html` by double-clicking it will no longer work from this epic onward —
a `.php` file must be served by PHP to be executed.

- W3Schools: <https://www.w3schools.com/php/php_intro.asp>
- PHP manual: <https://www.php.net/manual/en/features.commandline.webserver.php>

## 2. PHP tags and mixing PHP with HTML

Code goes between `<?php` and `?>`. Anything outside those tags is sent to the browser
untouched, which means a `.php` file can be mostly HTML with small islands of PHP —
exactly how the pages in this epic are written.

```php
<?php $page_title = 'Contact'; ?>
<h1>Welcome</h1>
```

Note that a file which contains *only* PHP (like `header.php`) conventionally omits the
closing `?>`, to avoid accidentally sending stray blank lines.

- W3Schools: <https://www.w3schools.com/php/php_syntax.asp>
- PHP manual: <https://www.php.net/manual/en/language.basic-syntax.phpmode.php>

## 3. `echo` and the short echo tag

`echo` sends a value to the page. When you are inside HTML and just want to print one
value, the short form `<?= ... ?>` is shorter and is used throughout the shared header:

```php
<title><?= $page_title ?> — Bookstore Page</title>
```

`<?= $x ?>` is simply shorthand for `<?php echo $x; ?>`.

- W3Schools: <https://www.w3schools.com/php/php_echo_print.asp>
- PHP manual: <https://www.php.net/manual/en/function.echo.php>

## 4. Variables and strings

A variable starts with `$` and holds a value. This epic uses two of them as the
*contract* between a page and the shared header: `$page_title` (what goes in the
browser tab) and `$current_page` (which menu link to highlight). Each page sets them
before including the header.

Learn the difference between single and double quotes: `"Hello $name"` inserts the
variable, `'Hello $name'` prints it literally.

- W3Schools: <https://www.w3schools.com/php/php_variables.asp>
- PHP manual: <https://www.php.net/manual/en/language.variables.basics.php>

## 5. Associative arrays

An array holds many values under one name. An **associative** array gives each value a
named key instead of a number — perfect for a menu, where each entry has an identifier,
a URL and a label:

```php
$main_menu = [
    'home'    => ['url' => 'index.php', 'label' => 'Home'],
    'contact' => ['url' => 'contact.php', 'label' => 'Contact'],
];
```

Defining the menu as data (rather than as five hand-written `<li>` blocks) means adding
a page later is a one-line change.

- W3Schools: <https://www.w3schools.com/php/php_arrays_associative.asp>
- PHP manual: <https://www.php.net/manual/en/language.types.array.php>

## 6. `foreach`

`foreach` walks through every entry of an array. The shared header loops over the menu
array to print one `<li>` per entry, so the markup for a menu item is written once no
matter how many items there are.

```php
foreach ($main_menu as $key => $item) {
    // ... print one <li> ...
}
```

- W3Schools: <https://www.w3schools.com/php/php_looping_foreach.asp>
- PHP manual: <https://www.php.net/manual/en/control-structures.foreach.php>

## 7. `if` and comparison

Inside that loop you need a decision: *is this link the page I am currently on?* That is
an `if` comparing the loop's key against `$current_page`. When they match, the link gets
a CSS class and the `aria-current="page"` attribute required by story E2-3.

Learn `==` versus `===` early: `===` also checks the type, and is the safer default.

- W3Schools: <https://www.w3schools.com/php/php_if_else.asp>
- PHP manual: <https://www.php.net/manual/en/control-structures.if.php>

## 8. `include` and `require`, and `__DIR__`

These pull another PHP file into the current one — the mechanism behind story E2-2.
`include` warns and continues if the file is missing; `require` stops the page. Since a
page is meaningless without its header, this project uses `require`.

`__DIR__` is the folder of the file being executed. Writing
`require __DIR__ . '/../includes/header.php';` builds a path relative to *the file*
rather than to wherever PHP happens to be running, which is what makes the include work
reliably.

One detail that is easy to miss: the included file **shares the variables** of the file
that required it. That is why every page assigns `$page_title`, `$current_page` and
`$page_css` *before* the `require` — when `header.php` runs, it can already read them.
Assigning them afterwards would be too late, because the `<head>` has already been written.

- W3Schools: <https://www.w3schools.com/php/php_includes.asp>
- PHP manual: <https://www.php.net/manual/en/function.require.php> ·
  <https://www.php.net/manual/en/language.constants.magic.php> ·
  <https://www.php.net/manual/en/language.variables.scope.php>

## 9. `htmlspecialchars()` — escaping output

This function converts characters like `<`, `>` and `"` into safe HTML entities, so a
value is printed as *text* instead of being interpreted as markup. The reference wraps
every printed variable in it:

```php
<?= htmlspecialchars($item['label']) ?>
```

Right now all the data is written by you, so nothing can go wrong. The habit is
established *now*, before Epic 3 brings in data from the database and later epics bring
in data typed by visitors — the point at which forgetting it becomes a real security
hole (cross-site scripting).

- W3Schools: <https://www.w3schools.com/php/func_string_htmlspecialchars.asp>
- PHP manual: <https://www.php.net/manual/en/function.htmlspecialchars.php>

## 10. PHP comments

`//` for a single line, `/* ... */` for several. They explain *why* a line exists and
never reach the browser — unlike HTML comments, which anyone can read with "view source".

- W3Schools: <https://www.w3schools.com/php/php_comments.asp>
- PHP manual: <https://www.php.net/manual/en/language.basic-syntax.comments.php>

## 11. The web root, and what lives outside it

Only the folder you point the server at (`src/public`) is reachable by URL. The shared
partials live in `src/includes`, one level *outside* it, so nobody can request
`header.php` directly in a browser — PHP can still read the file from disk. Requesting
it returns 404, which is the fourth acceptance criterion of E2-2.

This is the same reasoning that will keep your database password unreachable in Epic 3,
so it is worth understanding now rather than later.

- W3Schools: <https://www.w3schools.com/php/php_includes.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Learn_web_development/Extensions/Server-side/First_steps/Introduction>

## 12. The `<nav>` element and menu markup

Epic 1's page had no menu — a single page has nowhere to link to. This epic adds two,
so the markup is new to you: `<nav>` wraps a block of navigation links, and inside it a
`<ul>` holds one `<li>` per destination. A menu *is* a list of links, and marking it up
as one lets a screen reader announce how many items it has and let its user skip past
them.

Use `<nav>` for the main and footer menus only, not for every group of links on the
page. `aria-label` distinguishes the two when a page has more than one (E2-1, E2-4).

- W3Schools: <https://www.w3schools.com/html/html5_semantic_elements.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/nav>

## 13. CSS attribute selectors and `aria-current`

The active menu link is styled by selecting the attribute itself rather than a class:

```css
nav a[aria-current="page"] { ... }
```

This way the visual highlight and the information given to screen readers can never
drift apart — one attribute drives both, which is what E2-3 asks for.

- W3Schools: <https://www.w3schools.com/css/css_attribute_selectors.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/CSS/Attribute_selectors> ·
  <https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Attributes/aria-current>

## 14. Embedding an `<iframe>` accessibly

The contact page shows the store's location with a map embedded in an `<iframe>`, which
displays another page inside yours. Two attributes matter: `title`, which gives screen
readers a text alternative describing what the frame shows (an E2-7 criterion), and
`loading="lazy"`, which defers the download until the frame is near the viewport.

Be aware that an embed loads content from a third party — the visitor's browser contacts
Google when the contact page opens.

- W3Schools: <https://www.w3schools.com/html/html_iframe.asp>
- MDN: <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe>
