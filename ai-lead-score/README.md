# Media Nirvana — AI Lead Intelligence Engine

A rule-based lead intelligence, scoring, and automated email response system built for [Media Nirvana](https://medianirvana.in).

---

## What It Does

When a potential client submits a contact form, the engine instantly:

1. **Detects Service Interest** — Maps the message to the most relevant service (Google Ads, SEO, Social Media, Web Dev, or Performance Marketing).
2. **Identifies Business Type** — Classifies the lead as D2C / E-Commerce, Regional Business, or Service Business.
3. **Determines Desired Outcome** — Extracts the lead's goal (qualified leads, profitable ad spend, scalable growth, etc.).
4. **Scores the Lead (0–100)** — Assigns a priority score based on urgency signals and service-specific keywords.
5. **Generates an Auto-Reply Email** — Creates a personalized response referencing the detected service, business type, and goal.
6. **Stores the Lead** — Logs all data to a local SQLite database for tracking and reporting.

---

## Architecture

```
ai-lead-score/
├── ai_lead_score.py    Core engine (all logic in one file)
├── mn_leads.db          SQLite database (auto-created on first run)
└── README.md            This file
```

### Core Functions

| Function | Purpose |
|---|---|
| `detect_service(message)` | Keyword-based service classification |
| `detect_business(message)` | Business type detection |
| `detect_outcome(message)` | Desired outcome extraction |
| `lead_score(message)` | 0–100 scoring based on intent signals |
| `generate_email(name, service, business, outcome)` | Auto-reply email generation |
| `store_lead(...)` | SQLite database insertion |
| `process_lead(name, email, message)` | Full pipeline: analyze → score → store → email |
| `analyze_lead(message)` | Analysis-only (no side effects) |

---

## Quick Start

### Requirements

- Python 3.7+
- No external dependencies (uses only standard library: `sqlite3`, `smtplib`, `email`)

### Run

```bash
python ai_lead_score.py
```

This runs the example lead and prints:

```
Lead processed:
  name: Test User
  email: test@example.com
  service: Google Ads
  business_type: Regional Business
  outcome: Business Growth
  lead_score: 100
```

### Import as a Module

```python
from ai_lead_score import process_lead, analyze_lead

# Full pipeline (store + email)
result = process_lead("John Doe", "john@example.com", "Need help with SEO for my local shop")

# Analysis only (no DB write, no email)
analysis = analyze_lead("Urgent — we need Google Ads management ASAP")
print(analysis["lead_score"])   # 100
print(analysis["intent"])       # "High"
```

---

## Scoring Logic

| Signal | Points |
|---|---|
| Base score | 50 |
| Message contains "urgent" | +30 |
| Message contains "ads" or "seo" | +20 |
| **Maximum** | **100** |

---

## Integration with WordPress Theme

This engine is also integrated into the [Media Nirvana WordPress theme](../media-nirvana/) via the `MN_AI_Wrapper` PHP class in `functions.php`. The WordPress integration calls the same logic server-side to:

- Append AI analysis to admin notification emails
- Enrich CRM records with lead scores and intent data
- Generate context-aware auto-reply emails

---

## Author

**Media Nirvana AI Team**  
[medianirvana.in](https://medianirvana.in)
