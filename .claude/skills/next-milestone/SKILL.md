---
name: next-milestone
description: >
  Use to advance to the next milestone of the educational bookstore ecommerce.
  Triggered when the user asks "next milestone", "let's continue", "go to
  milestone N", "start the next increment" or similar in this project.
  Determines which milestone the project is on, generates the next reference,
  lists its user stories, and proposes the corresponding commit and tag.
---

# Advance to the next milestone

This skill standardizes the work cycle of the educational bookstore ecommerce.
The human is the Product Manager; Claude generates the reference solution.

## Procedure

1. **Detect the current milestone.** Check the git tags (`git tag --list 'milestone-*'`)
   to see the last completed milestone. The next one is the immediate entry in the
   milestones list in `CLAUDE.md`. If there are no tags, the next is Milestone 1.

2. **Confirm scope before coding (PM role).** Before writing code,
   briefly present what the milestone includes, its user stories, and the
   acceptance criteria for each story, then wait for PM approval.
   If available, use plan mode.

3. **Generate the reference.** Write the increment code respecting the
   constraints in `CLAUDE.md` (procedural PHP, PDO with prepared statements,
   no framework, comments in English, beginner level). Do not write code
   for future milestones.

4. **List user stories with acceptance criteria.** For each story use the format:

   ```
   - **MN-X** — As a [role], I want to [action] so that [benefit].
     - **Acceptance criteria:**
       - [Observable, testable condition in a plain declarative sentence.]
       - [Another condition.]
       - (at least two criteria per story)
   ```

   Follow the exact format used in `BACKLOG.md` (plain declarative sentences,
   no Gherkin/BDD syntax). Update `BACKLOG.md` with the new stories and criteria.

5. **Append the study topics.** Add a `## Milestone N — Name` section to
   `STUDY-GUIDE.md`, mirroring the structure of the existing Milestone 1
   section. List the concepts the student must learn to build *this* increment —
   derive them from the reference code you just wrote, never from future
   milestones. For each topic give a short explanation, *why* it's needed in
   this milestone, and two free resource links (MDN as the authoritative
   reference, W3Schools as the beginner-friendly tutorial).

6. **Propose the close.** Suggest the commit message and the tag
   `milestone-N-name` (e.g. `milestone-2-styles`). Do not execute irreversible
   git actions without user confirmation.

## Reminders

- One milestone at a time. If the code grows large, split it into clear files.
- Each milestone must leave the site in a functional and reviewable state.
- Stay consistent with the domain (books, COP, sample data from CLAUDE.md).
