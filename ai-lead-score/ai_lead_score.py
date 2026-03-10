"""
Media Nirvana Lead Intelligence Engine
Rule-based lead intelligence, scoring, logging, and automated email responses
Version: 1.1
Author: Media Nirvana AI Team
"""

import smtplib
import sqlite3
import os
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
from datetime import datetime


# ----------------------------------
# DATABASE SETUP
# ----------------------------------

DB_PATH = os.path.join(os.path.dirname(__file__), "mn_leads.db")


def create_lead_table():
    """Create the leads table if it doesn't exist."""
    conn = sqlite3.connect(DB_PATH)
    cursor = conn.cursor()
    cursor.execute("""
        CREATE TABLE IF NOT EXISTS mn_leads (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT,
            email TEXT,
            message TEXT,
            service TEXT,
            business_type TEXT,
            outcome TEXT,
            lead_score INTEGER,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )
    """)
    conn.commit()
    conn.close()


# ----------------------------------
# SERVICE DETECTION
# ----------------------------------

def detect_service(message):
    """Detect the most relevant service based on keywords in the message."""
    message = message.lower()

    if "google" in message or "ads" in message:
        return "Google Ads"

    if "seo" in message:
        return "SEO & Content Marketing"

    if "social" in message:
        return "Social Media Marketing"

    if "website" in message:
        return "Web Development"

    return "Performance Marketing"


# ----------------------------------
# BUSINESS TYPE DETECTION
# ----------------------------------

def detect_business(message):
    """Detect the business type based on keywords in the message."""
    message = message.lower()

    if "shop" in message or "product" in message:
        return "D2C / E-Commerce"

    if "local" in message:
        return "Regional Business"

    return "Service Business"


# ----------------------------------
# OUTCOME DETECTION
# ----------------------------------

def detect_outcome(message):
    """Detect the desired outcome based on keywords in the message."""
    message = message.lower()

    if "lead" in message or "client" in message:
        return "More Qualified Leads"

    if "roi" in message:
        return "Profitable Ad Spend"

    if "growth" in message:
        return "Scalable Growth Systems"

    return "Business Growth"


# ----------------------------------
# LEAD SCORING
# ----------------------------------

def lead_score(message):
    """Calculate a lead score (0-100) based on message content."""
    message = message.lower()
    score = 50

    if "urgent" in message:
        score += 30

    if "ads" in message or "seo" in message:
        score += 20

    return min(score, 100)


# ----------------------------------
# EMAIL GENERATION
# ----------------------------------

def generate_email(name, service, business, outcome):
    """Generate auto-reply email subject and body for the lead."""
    subject = "Thanks for contacting Media Nirvana"

    body = f"""Hi {name},

Thank you for reaching out to Media Nirvana.

Based on your message, it looks like you're interested in {service} and aiming for {outcome}.

We help {business} businesses build predictable growth systems using data-driven marketing.

One of our strategists will review your request and contact you shortly.

Best regards,
Media Nirvana Team"""

    return subject, body


# ----------------------------------
# STORE LEAD IN DATABASE
# ----------------------------------

def store_lead(name, email, message, service, business, outcome, score):
    """Insert a lead record into the SQLite database."""
    conn = sqlite3.connect(DB_PATH)
    cursor = conn.cursor()
    cursor.execute(
        """
        INSERT INTO mn_leads (name, email, message, service, business_type, outcome, lead_score)
        VALUES (?, ?, ?, ?, ?, ?, ?)
        """,
        (name, email, message, service, business, outcome, score),
    )
    conn.commit()
    conn.close()


# ----------------------------------
# SEND EMAIL
# ----------------------------------

def send_email(to_email, subject, body, smtp_host="localhost", smtp_port=25,
               from_email="hello@medianirvana.in"):
    """Send an email using SMTP."""
    msg = MIMEMultipart("alternative")
    msg["Subject"] = subject
    msg["From"] = f"Media Nirvana <{from_email}>"
    msg["To"] = to_email

    msg.attach(MIMEText(body, "plain"))

    try:
        with smtplib.SMTP(smtp_host, smtp_port) as server:
            server.sendmail(from_email, to_email, msg.as_string())
        return True
    except Exception as e:
        print(f"Email send failed: {e}")
        return False


# ----------------------------------
# MAIN PROCESSOR
# ----------------------------------

def process_lead(name, email, message):
    """Full pipeline: analyze → score → store → email."""
    service = detect_service(message)
    business = detect_business(message)
    outcome = detect_outcome(message)
    score = lead_score(message)

    subject, body = generate_email(name, service, business, outcome)

    store_lead(name, email, message, service, business, outcome, score)

    send_email(email, subject, body)

    return {
        "name": name,
        "email": email,
        "service": service,
        "business_type": business,
        "outcome": outcome,
        "lead_score": score,
    }


# ----------------------------------
# ANALYZE LEAD (returns analysis without storing/emailing)
# ----------------------------------

def analyze_lead(message):
    """Analyze a message and return intelligence without side effects."""
    return {
        "intent": "High" if lead_score(message) >= 70 else "Medium",
        "matched_service": detect_service(message),
        "business_type": detect_business(message),
        "desired_outcome": detect_outcome(message),
        "lead_score": lead_score(message),
        "auto_reply": generate_email("", detect_service(message),
                                     detect_business(message),
                                     detect_outcome(message))[1],
    }


# ----------------------------------
# INITIALISE DB ON IMPORT
# ----------------------------------

create_lead_table()


# ----------------------------------
# CLI USAGE
# ----------------------------------

if __name__ == "__main__":
    # Example usage
    result = process_lead(
        name="Test User",
        email="test@example.com",
        message="I need help with Google Ads for my local shop. It's urgent.",
    )
    print("Lead processed:")
    for key, value in result.items():
        print(f"  {key}: {value}")
