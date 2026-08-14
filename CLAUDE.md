# Project: Bookstore Ecommerce (Educational)

This repo is the **reference solution** of an ecommerce that a beginner student
will build step by step. The human acts as **Product Manager**:
defines requirements as user stories and validates each increment. Claude
generates the reference epic by epic.

## Golden rule

**One epic at a time.** Never write code for future epics. Each epic must
leave the site as a functional, self-contained version.

## Stack and constraints

- Semantic HTML, CSS, JavaScript (vanilla), PHP, MariaDB.
- **Procedural PHP**, no heavy OOP. Exception: a lightweight class for the PDO connection.
- **PDO with prepared statements always.** Never concatenate variables in SQL.
- **No framework, no Composer, no Docker.** Target environment: WSL2.
- Code written for a beginner: clear, commented in English, without
  unnecessary abstractions.

## Domain

- **Book** store. Prices in **EURO (€)**.
- Product model: title, author, price, category, description, image, stock.
- Sample data already used: One Hundred Years of Solitude, The Name of the Wind, 1984,
  Sapiens. Categories: Fiction, Non-fiction, Science fiction and fantasy, Children's.

## Epics

1. Home — semantic HTML + CSS, basic responsive layout, visual identity.
2. Secondary pages — header/footer as PHP `include` components, first PHP.
3. Product listing — schema, PDO connection, list real products, category filter.
4. Product detail — dynamic page with URL parameter.
5. Login — session login, protected area, logout.
6. Cart — PHP sessions + JS.
7. Checkout — form, validation, save order (no real payment).
8. Admin panel — product CRUD (reuses the login from epic 5).
9. Dashboard — sales statistics.

## Delivery conventions per epic

Each epic produces:

1. The **reference code** for the increment.
2. The corresponding **user stories** with acceptance criteria (format: _As a [role], I
   want to [action] so that [benefit]_), written in `docs/backlog/epic-N-name.md` and
   ready to paste into the Trello backlog.
3. A **study guide** `docs/study-guide/epic-N-name.md` — what the student must learn to
   build *this* increment, with a free tutorial and reference link per topic.
4. A **tech spec** `docs/tech-spec/epic-N-name.md` — how the increment is built and why:
   file layout, contracts between files, decisions taken and rejected, what is left out
   for later epics, and a story-to-file traceability table.
5. A **screenshot** `docs/screenshots/epic-N-name.png`, linked from the README preview.
6. A **commit** and a **tag** `epic-N-name` (e.g. `epic-1-home`).

Documents 2–5 are all named after the epic's tag.

## Version control

- One tag per epic = functional snapshot so the student can compare with `git diff`.
- The student works on their own repo; this one is only the solution.
