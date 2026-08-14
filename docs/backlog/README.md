# Backlog — Bookstore E-commerce

The user stories for the whole project, **one document per epic**. Each story says
*what the customer gets*, in the format _As a [role], I want to [action] so that
[benefit]_, and carries the acceptance criteria that decide when it is done.

Roles: **Customer** (the shopper) and **Administrator** (manages the store).

Technical concerns (PHP includes, database schema, validation, escaping, prepared
statements) are the *how* an increment is built, so they live inside the
customer/administrator stories they serve — not as separate technical stories. The *how*
belongs in [tech-spec/](../tech-spec/README.md).

How to use it: open the file for the epic you are building and treat its stories as the
work to do; the matching [study guide](../study-guide/README.md) lists what to learn
first. Stories for epics not yet reached are outlined without acceptance criteria — those
are written when the epic is planned, as part of the PM scope confirmation.

## Epics

| #   | Epic                        | Stories                                                | Count |
| --- | --------------------------- | ------------------------------------------------------ | ----- |
| 1   | Home                        | [epic-1-home.md](epic-1-home.md)                       | 11    |
| 2   | Secondary pages             | [epic-2-pages.md](epic-2-pages.md)                     | 8     |
| 3   | Product listing             | [epic-3-product-list.md](epic-3-product-list.md)       | 4     |
| 4   | Product detail              | [epic-4-product-detail.md](epic-4-product-detail.md)   | 4     |
| 5   | Login                       | [epic-5-login.md](epic-5-login.md)                     | 3     |
| 6   | Cart                        | [epic-6-cart.md](epic-6-cart.md)                       | 5     |
| 7   | Checkout                    | [epic-7-checkout.md](epic-7-checkout.md)               | 6     |
| 8   | Admin panel                 | [epic-8-admin.md](epic-8-admin.md)                     | 4     |
| 9   | Dashboard                   | [epic-9-dashboard.md](epic-9-dashboard.md)             | 6     |

**Total: 9 epics, 51 stories.** Story ids are stable: `E<epic>-<number>`, so `E2-3` is the
third story of Epic 2 and keeps that id wherever it is referenced.

Documents are named after the epic's git tag, the same convention used in
[docs/study-guide/](../study-guide/README.md), [docs/tech-spec/](../tech-spec/README.md)
and [docs/screenshots/](../screenshots/README.md).

## Amendments

When an epic changes a criterion accepted in an earlier epic, the earlier story keeps its
original text with an _Amended in Epic N_ note, and the epic that made the change lists it
under "Amendments to earlier epics". Nothing is rewritten silently — the history of a
decision stays readable.

## Related documents

- [study-guide/](../study-guide/README.md) — what to learn before building each epic.
- [tech-spec/](../tech-spec/README.md) — how each increment is built, and why.
