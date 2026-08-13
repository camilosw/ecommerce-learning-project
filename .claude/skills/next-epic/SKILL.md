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

   Follow the exact format used in `docs/BACKLOG.md` (plain declarative sentences,
   no Gherkin/BDD syntax). Update `docs/BACKLOG.md` with the new stories and criteria.

5. **Append the study topics.** Add a `## Epic N — Name` section to
   `docs/STUDY-GUIDE.md`, mirroring the structure of the existing Epic 1
   section. List the concepts the student must learn to build *this* increment —
   derive them from the reference code you just wrote, never from future
   epics. For each topic give a short explanation, *why* it's needed in
   this epic, and two free resource links (MDN as the authoritative
   reference, W3Schools as the beginner-friendly tutorial).

6. **Capture the screenshot.** Remind the PM to take a screenshot of the rendered
   increment and save it as `docs/screenshots/epic-N-name.png` (file name = the
   epic tag; see `docs/screenshots/README.md` for the convention). Then, in the
   README "Epic previews" section (paths there are relative to the repo root,
   e.g. `docs/screenshots/...`), replace that epic's `_Pending_` note with
   the image, using a descriptive `alt`. The screenshot is part of the epic
   deliverable.

7. **Propose the close.** Suggest the commit message and the tag
   `epic-N-name` (e.g. `epic-2-pages`). Do not execute irreversible
   git actions without user confirmation.

## Reminders

- One epic at a time. If the code grows large, split it into clear files.
- Each epic must leave the site in a functional and reviewable state.
- Stay consistent with the domain (books, euros (€), sample data from CLAUDE.md).
