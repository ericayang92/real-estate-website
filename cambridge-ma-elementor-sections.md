# Cambridge MA Page - Elementor Section Builder Guide

This guide provides step-by-step instructions for building the Cambridge MA neighborhood page using Elementor's drag-and-drop builder.

## Before You Start

1. Log into WordPress admin: http://localhost:8080/wp-admin/
2. Create a new page: Pages → Add New
3. Title: "Homes for Sale in Cambridge, MA"
4. Click "Edit with Elementor"

## Page Structure Overview

The page consists of 11 main sections:
1. Hero Section
2. Overview
3. Market Statistics
4. Schools
5. Amenities & Lifestyle
6. Transportation
7. Featured Listings
8. Photo Gallery
9. Interactive Map
10. FAQ
11. Contact CTA

---

## Section 1: Hero Section

### Setup
1. Click the "+" icon to add a new section
2. Choose "1 Column" layout
3. Click the section settings (6 dots icon)

### Section Settings
- **Layout Tab**:
  - Content Width: Full Width (100%)
  - Height: Fit to Screen (or Custom: 600px)
  - Column Position: Middle

- **Style Tab → Background**:
  - Type: Gradient
  - Color 1: #2c3e50
  - Color 2: #3498db
  - Angle: 135deg
  - OR use Background Image: Upload a Cambridge photo
  - If using image, add Overlay with gradient

- **Advanced Tab → Padding**:
  - Top: 80px
  - Bottom: 60px

### Content Widgets

**1. Breadcrumbs Widget** (or HTML widget):
```html
<nav class="breadcrumbs">
    <a href="/">Home</a> &gt;
    <a href="/neighborhoods/">Neighborhoods</a> &gt;
    <span>Cambridge, MA</span>
</nav>
```

**2. Heading Widget**:
- Title: "Homes for Sale in Cambridge, Massachusetts"
- HTML Tag: H1
- Color: #ffffff
- Typography: Size 48px, Weight 700
- Alignment: Center

**3. Text Editor Widget**:
- Content: "Discover Your Dream Home in Boston's Most Vibrant City"
- Color: #ffffff
- Typography: Size 20px
- Alignment: Center

**4. Inner Section** (for quick stats):
- Choose 3 columns
- In each column, add:

**Column 1 - Icon Box Widget**:
- Icon: Choose dollar sign or house icon
- Title: "$1,250,000"
- Description: "Median Home Price"
- Alignment: Center
- Style: Custom colors (white text)

**Column 2 - Icon Box Widget**:
- Title: "145"
- Description: "Active Listings"

**Column 3 - Icon Box Widget**:
- Title: "28"
- Description: "Avg. Days on Market"

---

## Section 2: Overview Section

### Setup
1. Add new section → 1 Column
2. Section Settings:
   - Background: White (#ffffff)
   - Padding: 60px top, 60px bottom

### Content Widgets

**1. Heading Widget**:
- Title: "About Cambridge, MA"
- HTML Tag: H2
- Typography: Size 36px, Weight 600
- Color: #2c3e50
- Alignment: Center

**2. Text Editor Widget**:
- Paste the overview content from cambridge-ma-content.html
- Typography: Size 18px, Line Height 1.8
- Color: #555555

---

## Section 3: Market Statistics

### Setup
1. Add new section → 1 Column
2. Background: Light Gray (#f8f9fa)
3. Padding: 60px top/bottom

### Content Widgets

**1. Heading Widget**:
- Title: "Cambridge Real Estate Market"
- H2, 36px, Center

**2. Text Editor Widget**:
- "Current market trends and statistics (Updated December 2025)"
- Center, gray color

**3. Inner Section** (3 columns, set to 2 columns on tablet):
- Add 6 Icon Box widgets (2 rows × 3 columns)

**Icon Box 1** (Median Sale Price):
- Icon: 🏠 (or house icon)
- Title: "Median Sale Price"
- Description: "$1,250,000"
- Add custom HTML below: `<span style="color: #27ae60;">+4.2% YoY</span>`
- Background: White
- Box Shadow: Yes
- Border Radius: 12px
- Padding: 30px

Repeat for all 6 stat cards:
1. Median Sale Price: $1,250,000 (+4.2% YoY)
2. Price Per Sq Ft: $825 (+3.8% YoY)
3. Days on Market: 28 days (-12% from last year)
4. Sale-to-List Ratio: 101.5%
5. Homes Sold: 87 (Last 30 Days)
6. Inventory Level: 2.1 months

**4. Text Editor Widget**:
- "*Data updated monthly | Source: MLS*"
- Small font, center, gray

---

## Section 4: Schools Section

### Setup
1. Add new section → 1 Column
2. Background: White
3. Padding: 60px top/bottom

### Content Widgets

**1. Heading Widget**:
- "Cambridge Schools & Education"
- H2, Center

**2. Text Editor**:
- "Cambridge is served by the highly-rated Cambridge Public School District"

**3. Inner Section** (2 columns, 1 on mobile):
- Add 4 Testimonial widgets (repurposed for schools)

**School Card 1**:
- Use Testimonial widget or Icon Box
- Name: "Cambridge Rindge and Latin School"
- Job: "Public High School | ⭐⭐⭐⭐ 8/10"
- Content: "Grades 9-12 | Enrollment: ~1,900 students. Comprehensive public high school..."
- Style: Light gray background, left border (blue)

Repeat for 4 schools (see cambridge-ma-content.html for all details)

**4. Call to Action Widget**:
- Title: "Higher Education"
- Content: List Harvard, MIT, Lesley
- Button: "Visit Cambridge School District Website"
- Link: https://www.cpsd.us/
- Background: Gradient purple

---

## Section 5: Amenities & Lifestyle

### Setup
1. Add new section → 1 Column
2. Background: Light Gray (#f8f9fa)
3. Padding: 60px top/bottom

### Content Widgets

**1. Heading + Subtitle** (same as previous sections)

**2. Inner Section** (3 columns, adapt to 2 on tablet, 1 on mobile):
- Add 6 Icon List widgets (one per column for 2 rows)

**Column 1 - Parks & Recreation**:
- Widget: Icon List
- Icon: 🌳 (or park icon)
- Add title with Heading widget above: "Parks & Recreation"
- List items:
  - Charles River Esplanade
  - Fresh Pond Reservation
  - Cambridge Common
  - Danehy Park
  - Magazine Beach Park
  - Multiple playgrounds

- Style: White background, padding, box shadow, rounded corners

Repeat for 6 amenity categories:
1. Parks & Recreation 🌳
2. Dining & Food 🍽️
3. Shopping 🛍️
4. Arts & Culture 🎭
5. Healthcare 🏥
6. Fitness & Wellness 💪

---

## Section 6: Transportation

### Setup
1. Add new section → 1 Column
2. Background: White
3. Padding: 60px top/bottom

### Content Widgets

**1. Heading + Subtitle**

**2. Inner Section** (4 columns for transport cards):
- Add 4 Icon Box widgets

**Transport Card 1 - MBTA Red Line**:
- Icon: 🚇 (or subway icon)
- Title: "MBTA Red Line"
- Description: "Stations: Alewife, Davis, Porter, Harvard, Central, Kendall/MIT"
- Add custom text: "**Commute to Downtown Boston: 15-20 minutes**"
- Background: Light gray
- Center alignment

Repeat for 4 transport types:
1. 🚇 MBTA Red Line
2. 🚌 Bus Routes
3. 🚴 Bike-Friendly
4. 🚗 Major Roads

**3. Inner Section** (1 column, gradient background):
- Heading: "Average Commute Times from Cambridge"
- Add HTML widget with commute times table (see cambridge-ma-content.html)
- Background: Blue gradient
- Text color: White

---

## Section 7: Featured Listings

### Setup
1. Add new section → 1 Column
2. Background: Light Gray
3. Padding: 60px top/bottom

### Content Widgets

**1. Heading**: "Featured Cambridge Homes for Sale"

**2. Dynamic Content**:
- **Option A**: If you have an IDX plugin installed:
  - Add HTML widget
  - Paste your IDX shortcode: `[idx-listings city="Cambridge" state="MA" limit="8"]`

- **Option B**: Use Posts widget:
  - Widget: Posts (Elementor Pro)
  - Filter by category or tag for Cambridge listings
  - Layout: Grid (4 columns)

- **Option C**: Manual cards:
  - Inner Section: 4 columns
  - Add Portfolio/Card widgets for each listing

**3. Button Widget**:
- Text: "View All Cambridge Listings"
- Link: /cambridge-ma-listings/
- Alignment: Center
- Style: Large, blue background

---

## Section 8: Photo Gallery

### Setup
1. Add new section → 1 Column
2. Background: White
3. Padding: 60px top/bottom

### Content Widgets

**1. Heading**: "Explore Cambridge"
**2. Subtitle**: "A visual tour of the city"

**3. Gallery Widget**:
- Widget: Image Gallery
- Upload 6-12 professional Cambridge photos:
  - Harvard Square
  - Charles River
  - MIT Campus
  - Central Square
  - Fresh Pond
  - Porter Square
  - Residential streets
  - Local shops/restaurants

- Settings:
  - Columns: 3
  - Gap: 20px
  - Aspect Ratio: 1:1 or 4:3
  - Link: Lightbox
  - Hover animation: Zoom

**4. Text Editor**:
- Note about images (small, gray, italic)

---

## Section 9: Interactive Map

### Setup
1. Add new section → 1 Column
2. Background: Light Gray
3. Padding: 60px top/bottom

### Content Widgets

**1. Heading**: "Cambridge Location & Map"

**2. Google Maps Widget** (Elementor Pro):
- Widget: Google Maps
- Address: "Cambridge, MA"
- Zoom: 12
- Height: 500px
- Disable scrollwheel zoom
- Enable controls

- **OR** if no Elementor Pro:
  - Use HTML widget
  - Paste Google Maps embed code
  - Get from: https://www.google.com/maps
  - Search "Cambridge, MA" → Share → Embed a map

---

## Section 10: FAQ Section

### Setup
1. Add new section → 1 Column
2. Background: White
3. Padding: 60px top/bottom

### Content Widgets

**1. Heading**: "Cambridge, MA - Frequently Asked Questions"

**2. Accordion Widget** (or Toggle widget):
- Widget: Accordion
- Add 8 items (FAQs from cambridge-ma-content.html)

**FAQ Item 1**:
- Title: "Is Cambridge, MA a good place to live?"
- Content: "Yes! Cambridge consistently ranks as one of the best places to live..."

Settings for all FAQs:
- Icon: Plus/Minus
- Title color: #2c3e50
- Content color: #555
- Background: Light gray
- Border left: 4px blue
- Border radius: 12px
- Spacing: 20px between items

Add all 8 FAQs from the content file.

---

## Section 11: Contact CTA

### Setup
1. Add new section → 1 Column
2. Background: Gradient (Purple: #667eea to #764ba2)
3. Padding: 80px top/bottom

### Content Widgets

**1. Heading Widget**:
- Title: "Ready to Find Your Cambridge Home?"
- HTML Tag: H2
- Color: White
- Size: 42px
- Center

**2. Text Editor**:
- "Get personalized home search assistance and insider knowledge of the Cambridge market"
- Color: White, Center

**3. Inner Section** (2 columns for features):
- Add 4 Icon List widgets with checkmarks
- "Custom property searches tailored to your needs"
- "Neighborhood tours and local insights"
- Etc.

**4. Inner Section** (2 columns for agent info):

**Column 1 - Image Widget**:
- Upload your professional headshot
- Shape: Circle
- Border: 4px white

**Column 2 - Text Editor**:
- Your name (H3)
- Title: "Your Cambridge Real Estate Expert"
- Phone number (click-to-call link)
- Email address

**5. Form Widget** (Elementor Pro) or Contact Form 7:
- Widget: Form (Elementor Pro)
- Add fields:
  - Full Name (required)
  - Email (required)
  - Phone
  - Timeline to Purchase (dropdown)
  - Message (textarea, required)
  - Hidden field: neighborhood = "Cambridge, MA"

- Submit button: "Get My Free Market Report"
- Email To: your email
- Background: White
- Padding: 40px
- Border radius: 12px

---

## Section 12: Related Neighborhoods (Optional)

### Setup
1. Add new section → 1 Column
2. Background: Light Gray
3. Padding: 60px top/bottom

### Content Widgets

**1. Heading**: "Explore Nearby Communities"

**2. Inner Section** (4 columns, 2 on tablet, 1 on mobile):
- Add 4 Call to Action widgets (or Icon Box)

**CTA 1 - Somerville**:
- Title: "Somerville, MA"
- Description: "Adjacent city with similar vibe, slightly more affordable"
- Button: "Explore Somerville"
- Link: /neighborhoods/somerville-ma/
- Background: White
- Hover: Lift effect

Repeat for:
- Arlington, MA
- Brookline, MA
- Watertown, MA

---

## Final Steps

### 1. Page Settings

Click the hamburger menu (☰) → Page Settings:

**General Tab**:
- Title: "Homes for Sale in Cambridge, MA"

**SEO Tab** (if using Rank Math/Yoast):
- Focus Keyword: "Cambridge MA homes for sale"
- Meta Title: "Cambridge MA Homes for Sale | Erica Yang Realtor"
- Meta Description: "Explore homes for sale in Cambridge, MA. Local expert Erica Yang provides market insights, school ratings, and personalized home searches in this vibrant Boston suburb."

**Advanced Tab**:
- Custom CSS: Paste content from neighborhood-pages.css

### 2. Add Schema Markup

**Option A - Using Rank Math**:
1. Scroll down to Rank Math SEO box (below Elementor)
2. Schema tab → Add Schema
3. Select "Place"
4. Fill in details or paste from cambridge-ma-schema.json

**Option B - Custom Code**:
1. Page Settings → Advanced → Custom Code
2. Paste schema JSON from cambridge-ma-schema.json wrapped in `<script type="application/ld+json">` tags

### 3. Mobile Responsiveness

For EACH section:
1. Click responsive mode icon (desktop/tablet/mobile)
2. Switch to Mobile view
3. Adjust:
   - Font sizes (make headings smaller)
   - Padding (reduce to 40px top/bottom)
   - Column layouts (force 1 column on mobile)
   - Button sizes (make full-width on mobile)

### 4. Publish

1. Click "Update" or "Publish"
2. Test the page:
   - Desktop view: http://localhost:8080/neighborhoods/cambridge-ma/
   - Mobile view: Use browser dev tools (F12 → Toggle Device Toolbar)
   - Test all links
   - Test form submission
   - Check schema with Google Rich Results Test

---

## Tips for Best Results

### Performance
- Optimize all images before uploading (use Imagify plugin)
- Use lazy loading for images (enabled by default in Elementor)
- Minimize use of custom fonts
- Enable caching after publishing

### SEO
- Use only ONE H1 per page (the main heading in hero)
- Use H2 for section headings
- Use H3 for subsection headings
- Add alt text to all images with location keywords
- Internal links to related pages and listings

### Design Consistency
- Use consistent spacing (60px between sections)
- Stick to the color scheme:
  - Primary: #2c3e50 (dark blue)
  - Secondary: #3498db (bright blue)
  - Accent: #e74c3c (red for CTAs)
- Use consistent border radius (12px)
- Use consistent box shadows for cards

### Accessibility
- Ensure sufficient color contrast (check with WebAIM tool)
- Add descriptive link text (not "click here")
- Provide form labels
- Test keyboard navigation

---

## Troubleshooting

**Issue**: Widget not found
- **Solution**: Ensure Elementor Pro is active if using Pro widgets (Google Maps, Forms, Posts)

**Issue**: Layout breaks on mobile
- **Solution**: Edit each column → Advanced → Responsive → Set width to 100% on mobile

**Issue**: Background gradient not showing
- **Solution**: Section Settings → Style → Background Type → Gradient (not Classic)

**Issue**: Form not working
- **Solution**: Check Actions → Email settings → Verify email address and SMTP settings

**Issue**: Images too large/slow loading
- **Solution**: Use Imagify plugin to compress, or resize images to max 1920px width before uploading

---

## Next Steps

After Cambridge is complete:

1. **Duplicate the page** for other neighborhoods
2. **Find/Replace all "Cambridge" references** with new neighborhood name
3. **Update all content** to be unique (NEVER duplicate content)
4. **Change statistics** to match new neighborhood data
5. **Upload new photos** specific to new neighborhood
6. **Update schema** with new coordinates and details
7. **Adjust colors** slightly to differentiate neighborhoods

This ensures Google sees each page as unique, valuable content!

---

## Resources

- Elementor Documentation: https://elementor.com/help/
- Google Maps Embed: https://www.google.com/maps
- Schema Markup Generator: https://technicalseo.com/tools/schema-markup-generator/
- Image Optimization: https://imagify.io/
- Rich Results Test: https://search.google.com/test/rich-results
