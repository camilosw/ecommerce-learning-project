# Tech specs — Bookstore E-commerce

One document per epic recording **how the increment is built and why**. Three documents
answer three different questions, and it is worth keeping them apart:

| Document                                    | Question it answers                    | Audience               |
| ------------------------------------------- | -------------------------------------- | ---------------------- |
| [backlog/](../backlog/README.md)            | *What* does the customer get?          | Product Manager        |
| [study-guide/](../study-guide/README.md)    | *What* must I learn to build it?       | Student, before coding |
| tech-spec/ (this folder)                    | *How* is it built, and why that way?   | Student, while coding  |

A spec is written **before** the code and describes the target design: file layout,
the contracts between files, decisions taken and rejected, and what is deliberately left
out so a later epic can introduce it.

## Specs

| #   | Epic            | Spec                                 | Tag              |
| --- | --------------- | ------------------------------------ | ---------------- |
| 1   | Home            | —                                    | `epic-1-home`    |
| 2   | Secondary pages | [epic-2-pages.md](epic-2-pages.md)   | `epic-2-pages`   |
| 3   | Product listing | _Pending_                            | `epic-3-product-list` |

Epic 1 predates this convention and has no spec; it is a single static HTML file plus
its stylesheet, described well enough by its study guide. Specs run from Epic 2 onward.

Documents are named after the epic's git tag, the same convention used in
[docs/study-guide/](../study-guide/README.md) and [docs/screenshots/](../screenshots/README.md).
