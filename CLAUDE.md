# Project: Bookstore Ecommerce (Educational)

This repo is the **reference solution** of an ecommerce that a beginner student
will build step by step. The human acts as **Product Manager**:
defines requirements as user stories and validates each increment. Claude
generates the reference milestone by milestone.

## Golden rule

**One milestone at a time.** Never write code for future milestones. Each milestone must
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

## Milestones (epics)

1. Static home — semantic HTML, no styles.
2. Styles — CSS, basic responsive layout, visual identity.
3. Componentization — header/footer with `include`, first PHP.
4. Database — schema, PDO connection, list real products.
5. Product detail — dynamic page with URL parameter.
6. Cart — PHP sessions + JS.
7. Simulated checkout — form, validation, save order (no real payment).
8. Admin panel — session login + product CRUD.
9. Dashboard — sales statistics.
10. Polish & hardening — messages, error pages, validation, escaping, accessibility.

## Delivery conventions per milestone

Each milestone produces:

1. The **reference code** for the increment.
2. The corresponding **user stories** (format: _As a [role], I want to
   [action] so that [benefit]_), ready to paste into the Trello backlog.
3. A **commit** and a **tag** `milestone-N-name` (e.g. `milestone-1-home`).

## Version control

- One tag per milestone = functional snapshot so the student can compare with `git diff`.
- The student works on their own repo; this one is only the solution.
