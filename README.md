# Bookstore Ecommerce — Reference Solution

**Reference** repository for a bookstore ecommerce built milestone by milestone.
Each milestone leaves the site as a functional, self-contained version.

> This repo is the **solution**. The student works in their own repository and
> uses this one to compare their progress with `git diff`.

## Stack

Semantic HTML · CSS · JavaScript (vanilla) · procedural PHP · MariaDB · PDO with
prepared statements. No framework, no Composer.

## Milestones

Each milestone has a tag = an immutable snapshot of the increment. To explore one:

```bash
git checkout milestone-1-home                  # move to an increment
git diff milestone-1-home milestone-2-styles   # compare two increments
git show milestone-1-home                       # see a tag's summary and changes
```

| #   | Milestone          | Tag                                               | Status | Introduces                                                 |
| --- | ------------------ | ------------------------------------------------- | ------ | ---------------------------------------------------------- |
| 1   | Static home        | [`milestone-1-home`](../../tree/milestone-1-home) | ✅     | Home with semantic HTML, no styles                         |
| 2   | Styles             | `milestone-2-styles`                              | ⏳     | CSS, basic responsive layout, visual identity              |
| 3   | Componentization   | `milestone-3-componentization`                    | ⏳     | header/footer with `include`, first PHP                    |
| 4   | Database           | `milestone-4-database`                            | ⏳     | Schema, PDO connection, list real products                 |
| 5   | Product detail     | `milestone-5-product-detail`                      | ⏳     | Dynamic page with URL parameter                            |
| 6   | Cart               | `milestone-6-cart`                                | ⏳     | Cart with PHP sessions + JS                                |
| 7   | Simulated checkout | `milestone-7-checkout`                            | ⏳     | Form, validation, save order (no real payment)             |
| 8   | Admin panel        | `milestone-8-admin`                               | ⏳     | Session login + product CRUD                               |
| 9   | Dashboard          | `milestone-9-dashboard`                           | ⏳     | Sales statistics                                           |
| 10  | Polish & hardening | `milestone-10-hardening`                          | ⏳     | Messages, error pages, validation, escaping, accessibility |

✅ delivered · ⏳ pending

## Documents

- [BACKLOG.md](BACKLOG.md) — user stories per milestone.
- [STUDY-GUIDE.md](STUDY-GUIDE.md) — study guide.
