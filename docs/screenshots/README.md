# Epic screenshots

This folder holds one screenshot per epic: an image that shows **what the
student must build** by the end of that increment. The main README displays them
in its "Epic previews" section.

## Convention

- **One file per epic.** The file name matches the epic tag:
  - `epic-1-home.png`
  - `epic-2-pages.png`
  - `epic-3-product-list.png`
  - `epic-4-product-detail.png`
  - `epic-5-login.png`
  - `epic-6-cart.png`
  - `epic-7-checkout.png`
  - `epic-8-admin.png`
  - `epic-9-dashboard.png`
- **Format:** PNG (use WebP if you want a smaller file).
- **Consistent viewport:** desktop capture at ~1280 px wide.
- **Optional responsive shot:** for epics with a responsive layout (1 onward)
  you may add a mobile variant `epic-N-name-mobile.png`.
- **Alt text:** when inserting the image in the README, always write a descriptive
  `alt` for accessibility.

## How it is added

The screenshot is part of **each epic's deliverable**. When closing an epic:

1. Take a screenshot of the rendered site for that increment.
2. Save it here using the tag name.
3. In the README, replace that section's `_Pending_` note with the image.
