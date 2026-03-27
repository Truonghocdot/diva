````markdown
# Design System Specification: Diva

## 1. Overview & Creative North Star

This design system is built upon the Creative North Star of **"Diva."** In a digital space often defined by rigid grids and clinical coldness, this system prioritizes sensory warmth and editorial intentionality. We are not building a generic e-commerce site; we are curating a digital flagship store that feels as intentional as a high-end Scandi-chic boutique.

The aesthetic leverages **Warm Minimalism**—a balance of "Scandi-Chic" efficiency and cozy, organic depth. We break the "template" look by utilizing asymmetrical layouts, overlapping tonal surfaces, and a high-contrast typography scale that prioritizes breathing room over density. Every interaction should evoke the calm of a flickering flame.

## 2. Colors & Tonal Architecture

The palette is a sophisticated blend of botanical sage, warm creams, and earthy charcoals.

### The "No-Line" Rule

To achieve a premium, seamless look, **this design system prohibits the use of 1px solid borders for sectioning.** Structural boundaries must be defined solely through background color shifts. For example, a `surface-container-low` (`#f1f4f4`) section should sit against a `surface` (`#f8faf9`) background to create a soft, edge-less transition.

### Surface Hierarchy & Nesting

Treat the UI as a series of physical layers—like stacked sheets of fine, heavy-stock paper. Use the `surface-container` tiers to create depth:

- **Base:** `surface` (`#f8faf9`) for the main canvas.
- **Depth:** Use `surface-container-highest` (`#dde4e3`) for "sunken" utility areas (like a shopping bag sidebar).
- **Lift:** Use `surface-container-lowest` (`#ffffff`) for floating cards or primary product focus areas.

### The "Glass & Gradient" Rule

Standard flat colors can feel "static." For main Call-to-Actions (CTAs) or high-end hero backgrounds, use subtle linear gradients.

- **Signature Gradient:** Transition from `primary` (`#53644d`) to `primary-container` (`#d5e8cc`) at a 135-degree angle.
- **Glassmorphism:** For floating navigation or modal overlays, use `surface-variant` (`#dde4e3`) at 60% opacity with a `20px` backdrop-blur. This softens edges and integrates the UI into the background imagery.

## 3. Typography

The typography is the "voice" of the brand—authoritative yet inviting.

- **Display & Headlines (Noto Serif):** Used for storytelling and product names. The serif evokes the heritage of candle-making.
  - _Usage:_ `display-lg` (3.5rem) should be used with tight letter-spacing (-0.02em) for an editorial feel.
- **Body & UI (Manrope):** A clean, modern sans-serif that ensures legibility for supply lists and technical instructions.
  - _Usage:_ `body-md` (0.875rem) for product descriptions, maintaining a line height of 1.6 for maximum readability.
- **Labels (Manrope):** Use `label-md` (0.75rem) in all-caps with 0.1em letter-spacing for category tags to provide a sophisticated, "stamped" look.

## 4. Elevation & Depth

In this design system, hierarchy is achieved through **Tonal Layering** rather than traditional structural lines.

### The Layering Principle

Depth is organic. Place a `surface-container-lowest` card on a `surface-container-low` section to create a soft, natural lift. This mimics the way light hits physical objects without the need for artificial shadows.

### Ambient Shadows

Shadows must be invisible until noticed.

- **Value:** Use a `16px` to `32px` blur with 4%–6% opacity.
- **Tinting:** Instead of pure black, use a tinted version of `on-surface` (`#2d3434`). This mimics natural, ambient light and prevents the UI from looking "muddy."

### The "Ghost Border" Fallback

If a border is required for accessibility (e.g., input fields), use a **Ghost Border**: the `outline-variant` (`#adb3b3`) at **15% opacity**. Never use 100% opaque borders; they shatter the "Warm Minimalism" illusion.

## 5. Components

### Buttons

- **Primary:** Background: `primary` (`#53644d`); Text: `on-primary` (`#ecffe1`). Shape: `lg` (1rem) roundedness.
- **Secondary:** A "Ghost" style. Background: `transparent`; Border: Ghost Border (15% `outline-variant`); Text: `primary`.
- **States:** On hover, the primary button should transition to `primary-dim` (`#475842`) with a subtle `2px` vertical lift.

### Cards & Lists

- **Rule:** Forbid divider lines.
- **Layout:** Separate content items using `spacing-6` (2rem) or `spacing-8` (2.75rem).
- **Product Cards:** Use `surface-container-lowest` with a `md` (0.75rem) corner radius. Use asymmetrical padding: more space at the bottom for the product name (`headline-sm`) and "Scent Profile" label.

### Input Fields

- **Style:** Minimalist underline or tonal box.
- **Active State:** The underline transitions from a Ghost Border to a `primary` (`#53644d`) `1px` line. Labels should use `body-sm` and float above the input.

### Signature Component: The "Scent Profile" Chip

- **Design:** Use `secondary-container` (`#f0e0d1`) for the background with `on-secondary-container` (`#5a5044`) text.
- **Shape:** `full` (9999px) pill shape.
- **Iconography:** Use a `1px` thin-lined stroke for scent icons (e.g., a single line representing a leaf or flame).

## 6. Do's and Don'ts

### Do:

- **Embrace Asymmetry:** Place a product image off-center and let the `display-md` headline overlap the edge of the image slightly.
- **Use Large-Scale Imagery:** High-quality, warm-toned photography is a component in itself. Use it to fill `surface` areas.
- **White Space as a Tool:** If a section feels "busy," increase the vertical spacing to `spacing-16` (5.5rem).

### Don't:

- **Don't use pure black:** Use `on-surface` (`#2d3434`) for all "black" elements to maintain the soft, charcoal aesthetic.
- **Don't use standard "Drop Shadows":** Avoid the default Figma/CSS shadow settings. Stick to the Ambient Shadow values (low opacity, high blur).
- **Don't crowd the margins:** Ensure the "Tactile Sanctuary" feels breathable. A minimum margin of `spacing-8` (2.75rem) should be maintained on mobile.

---

_This design system is a living document. Its goal is to move beyond the transaction and into the experience of calm, curated craft._```
````
