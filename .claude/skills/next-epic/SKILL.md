---
name: next-epic
description: >
  Use to advance to the next epic of the educational bookstore ecommerce.
  Triggered when the user asks "next epic", "let's continue", "go to
  epic N", "start the next increment" or similar in this project.
  Determines which epic the project is on, generates the next reference,
  lists its user stories, and proposes the corresponding commit and tag.
---

# Advance to the next epic

This skill standardizes the work cycle of the educational bookstore ecommerce.
The human is the Product Manager; Claude generates the reference solution.

## Procedure

1. **Detect the current epic.** Check the git tags (`git tag --list 'epic-*'`)
   to see the last completed epic. The next one is the immediate entry in the
   epics list in `CLAUDE.md`. If there are no tags, the next is Epic 1.

2. **Confirm scope before coding (PM role).** Before writing code,
   briefly present what the epic includes, its user stories, and the
   acceptance criteria for each story, then wait for PM approval.
   If available, use plan mode.

3. **Generate the reference.** Write the increment code respecting the
   constraints in `CLAUDE.md` (procedural PHP, PDO with prepared statements,
   no framework, comments in English, beginner level). Do not write code
   for future epics.

4. **List user stories with acceptance criteria.** For each story use the format:

   ```
   - **EN-X** — As a [role], I want to [action] so that [benefit].
     - **Acceptance criteria:**
       - [Observable, testable condition in a plain declarative sentence.]
       - [Another condition.]
       - (at least two criteria per story)
   ```

   Follow the exact format used by the existing epic files (plain declarative sentences,
   no Gherkin/BDD syntax). Write them to `docs/backlog/epic-N-name.md` (file name = the
   epic tag) — the outlined stories for the epic are already there, so replace them with
   the full stories and their criteria — and keep the story count in the table in
   `docs/backlog/README.md` correct. If this epic changes a criterion accepted in an
   earlier epic, leave the earlier story text intact with an _Amended in Epic N_ note and
   list the change under "Amendments to earlier epics" in this epic's file.

5. **Write the study guide.** Create `docs/study-guide/epic-N-name.md` (file name =
   the epic tag), mirroring the structure of the existing per-epic guides, and add
   its row to `docs/study-guide/README.md`. List the concepts the student must
   learn to build *this* increment — derive them from the reference code you just
   wrote, never from future epics. For each topic give a short explanation, *why*
   it's needed in this epic, and two free resource links: W3Schools as the
   beginner-friendly tutorial, and the authoritative reference — MDN for the web
   platform, php.net for PHP, mariadb.com/kb for the database.

6. **Write the tech spec.** Create `docs/tech-spec/epic-N-name.md` (file name = the
   epic tag) and add its row to `docs/tech-spec/README.md`. Where the backlog says
   *what* the customer gets and the study guide says *what to learn*, the spec records
   *how the increment is built and why*: scope and an explicit out-of-scope table
   pointing at the epics that will cover each item, file layout, the contracts between
   files, decisions taken **and rejected** with their rationale, and a table mapping
   each story to the files that satisfy it. Note any amendment this epic makes to an
   earlier epic's accepted criteria.

7. **Capture the screenshot.** Remind the PM to take a screenshot of the rendered
   increment and save it as `docs/screenshots/epic-N-name.png` (file name = the
   epic tag; see `docs/screenshots/README.md` for the convention). Then, in the
   README "Epic previews" section (paths there are relative to the repo root,
   e.g. `docs/screenshots/...`), replace that epic's `_Pending_` note with
   the image, using a descriptive `alt`. The screenshot is part of the epic
   deliverable.

8. **Propose the close.** Suggest the commit message and the tag
   `epic-N-name` (e.g. `epic-2-pages`). Do not execute irreversible
   git actions without user confirmation.

## Reminders

- One epic at a time. If the code grows large, split it into clear files.
- Each epic must leave the site in a functional and reviewable state.
- Stay consistent with the domain (books, euros (€), sample data from CLAUDE.md).
