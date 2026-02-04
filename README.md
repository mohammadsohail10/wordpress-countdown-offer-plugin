# wordpress-countdown-offer-plugin

A lightweight WordPress plugin that adds a **dynamic countdown timer** using a shortcode.
Ideal for promotions, limited-time offers, campaigns, and announcements.

---

## 🚀 Features

* Shortcode-based countdown timer
* Dynamic **headline** and **sub-headline**
* Custom **expiry date & time**
* Supports **multiple countdowns on one page**
* jQuery-based (WordPress native)
* Fully responsive design
* Works with **Gutenberg**, **Classic Editor**, and **Elementor**
* No theme dependency

---

## 📦 Installation

### Option 1: Manual Installation

1. Download or clone this repository
2. Upload the folder to:

   ```
   /wp-content/plugins/sfortech-countdown-offer/
   ```
3. Go to **WordPress Admin → Plugins**
4. Activate **Sfortech Countdown Offer**

### Option 2: ZIP Upload

1. Zip the plugin folder
2. Go to **Plugins → Add New → Upload Plugin**
3. Upload ZIP and activate

---

## 🔧 Usage

Use the shortcode anywhere in posts, pages, or builders:

```text
[sfortech_countdown 
headline="Limited Time Offer: 40% OFF Full Body Laser!" 
sub_headline="This exclusive offer ends soon. Book your consultation now to lock in this price." 
expire_date="2026-02-10" 
expire_time="23:59:59"]
```

## 📸 Screenshots

### 1. Countdown Display on Frontend
Shows the main headline, sub-headline, and live countdown timer.

![Countdown Frontend](https://raw.githubusercontent.com/mohammadsohail10/wordpress-countdown-offer-plugin/refs/heads/main/sfortech-countdown-offer/screenshots/screenshot-1.png)

---

---

## 🧩 Shortcode Attributes

| Attribute      | Required | Description              | Example             |
| -------------- | -------- | ------------------------ | ------------------- |
| `headline`     | ❌        | Main heading text        | `"Flash Sale"`      |
| `sub_headline` | ❌        | Supporting text          | `"Offer ends soon"` |
| `expire_date`  | ✅        | Expiry date (YYYY-MM-DD) | `"2026-02-10"`      |
| `expire_time`  | ❌        | Expiry time (24h format) | `"23:59:59"`        |

> If `expire_time` is not provided, it defaults to **23:59:59**

---

## 🎨 Design & Styling

* CSS is injected automatically by the plugin
* Fully responsive
* Can be overridden using your theme’s CSS if needed

Example override:

```css
.sfortech-headline {
    color: #d62828;
}
```

---

## ⚙️ Technical Details

* Uses `add_shortcode()`
* Uses `shortcode_atts()` for defaults
* Uses WordPress-bundled jQuery
* Inline JS & CSS for zero configuration
* Safe output using `esc_html()` and `esc_attr()`

---

## 🧪 Compatibility

* WordPress 5.5+
* PHP 7.4+
* Tested with:

  * Elementor
  * Gutenberg
  * Classic Editor

---

## ❗ Notes

* Attribute names use **underscores (`_`)**, not hyphens (`-`)
* `expire_date` is mandatory
* Countdown stops at zero (no auto-hide by default)

---

## 🛣 Roadmap (Planned Enhancements)

* Auto-hide countdown after expiry
* Timezone support
* Admin settings page
* Elementor widget
* Gutenberg block
* Expiry callback action

---

## 👨‍💻 Author

**Sohail**
WordPress Backend & DevOps Engineer

---

## 📄 License

This project is licensed under the **GPL-2.0 License**
You are free to use, modify, and distribute this plugin.

---

## ⭐ Contributing

Pull requests are welcome.
For major changes, please open an issue first to discuss what you would like to change.
