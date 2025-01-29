<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procurement & Sales Management</title>
    <style>
    /* Reset Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
    scroll-behavior: smooth;
}

/* General Styles */
body {
    background-color: #f9f9f9;
    color: #333;
    line-height: 1.6;
}

/* Navbar */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #007bff;
    padding: 15px 20px;
    color: white;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
}

.navbar .logo {
    font-size: 22px;
    font-weight: bold;
}

.nav-links {
    list-style: none;
    display: flex;
}

.nav-links li {
    margin: 0 15px;
}

.nav-links a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
}

.nav-links a:hover {
    color: #ffd700;
}

/* Hamburger Menu */
.hamburger {
    display: none;
    font-size: 28px;
    cursor: pointer;
}

/* Hero Section */
.hero {
    text-align: center;
    padding: 100px 20px;
    background: linear-gradient(to right, #007bff, #0056b3);
    color: white;
}

.hero h1 {
    font-size: 40px;
    margin-bottom: 10px;
}

.hero p {
    font-size: 18px;
    margin-bottom: 20px;
}

.btn {
    display: inline-block;
    padding: 12px 20px;
    background: #ffd700;
    color: black;
    font-weight: bold;
    text-decoration: none;
    border-radius: 5px;
    transition: 0.3s;
}

.btn:hover {
    background: #ffcc00;
}

/* Features Section */
.features {
    padding: 60px 20px;
    text-align: center;
    background: white;
}

.features h2 {
    font-size: 30px;
    margin-bottom: 20px;
}

.feature-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.feature-list h3 {
    margin-top: 20px;
    font-size: 22px;
    color: #007bff;
}

.feature-list ul {
    list-style: none;
    padding: 0;
    text-align: left;
    display: inline-block;
}

.feature-list li {
    font-size: 18px;
    margin-bottom: 8px;
}

/* Pricing Section */
.pricing {
    text-align: center;
    padding: 60px 20px;
    background: #f1f1f1;
}

.pricing-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.pricing-card {
    background: white;
    padding: 20px;
    margin: 15px;
    border-radius: 8px;
    width: 300px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.premium {
    border: 3px solid #ffd700;
}

.pricing-card h3 {
    font-size: 22px;
}

.pricing-card h4 {
    margin: 10px 0;
    font-size: 24px;
    color: #007bff;
}

.pricing-card ul {
    list-style: none;
    padding: 0;
}

.pricing-card ul li {
    margin: 10px 0;
}

/* FAQ Section */
.faq {
    padding: 60px 20px;
    background: white;
    text-align: center;
}

.faq h2 {
    font-size: 30px;
    margin-bottom: 20px;
}

.faq-item {
    width: 70%;
    margin: 0 auto;
    text-align: left;
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
}

.faq-question {
    width: 100%;
    background: none;
    border: none;
    font-size: 18px;
    cursor: pointer;
    font-weight: bold;
    text-align: left;
    color: #007bff;
    padding: 10px;
    transition: 0.3s;
}

.faq-question:hover {
    color: #0056b3;
}

.faq-answer {
    display: none;
    padding: 10px;
    font-size: 16px;
}

/* CTA Section */
.cta {
    text-align: center;
    padding: 60px 20px;
    background: linear-gradient(to right, #007bff, #0056b3);
    color: white;
}

.cta h2 {
    font-size: 30px;
    margin-bottom: 20px;
}

.cta .btn {
    margin: 10px;
}

/* Footer */
footer {
    background: #222;
    color: white;
    text-align: center;
    padding: 20px;
}

.social-links a {
    color: #ffd700;
    margin: 0 10px;
    text-decoration: none;
}

.social-links a:hover {
    color: #ffcc00;
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .nav-links {
        display: none;
        flex-direction: column;
        position: absolute;
        background: #007bff;
        width: 100%;
        top: 60px;
        left: 0;
    }

    .nav-links li {
        text-align: center;
        margin: 10px 0;
    }

    .hamburger {
        display: block;
    }

    .pricing-container {
        flex-direction: column;
        align-items: center;
    }

    .faq-item {
        width: 90%;
    }
}
 
    </style>
    
</head>
<body>
    <!-- Navigation -->
    <header>
        <nav class="navbar">
            <div class="logo">ProcureTrack</div>
            <ul class="nav-links">
                <li><a href="#features">Features</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="#faq">FAQs</a></li>
                <li><a href="#cta">Get Started</a></li>
            </ul>
            <div class="hamburger">&#9776;</div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Streamline Your Procurement & Sales</h1>
        <p>Manage procurement, sales, inventory, and accounting in one place.</p>
        <a href="#cta" class="btn">Try the Demo</a>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <h2>Key Features</h2>
        <div class="feature-list">
            <h3>📦 Procurement & Inventory</h3>
            <ul>
                <li>✔️ Purchase Requests & Approvals</li>
                <li>✔️ Automated Purchase Orders</li>
                <li>✔️ Supplier Management</li>
                <li>✔️ Stock & Inventory Tracking</li>
            </ul>

            <h3>💰 Sales & Financial Tracking</h3>
            <ul>
                <li>✔️ Sales Order Management</li>
                <li>✔️ Revenue & Profit Reports</li>
                <li>✔️ Supplier & Customer Ledger</li>
            </ul>

            <h3>📊 Reporting & Analytics</h3>
            <ul>
                <li>✔️ Export Reports (Excel & PDF)</li>
                <li>✔️ Graphical Insights</li>
                <li>✔️ Audit Logs</li>
            </ul>

            <h3>💼 Accounting & Financial Management</h3>
            <ul>
                <li>✔️ Expense Tracking</li>
                <li>✔️ Automated Tax Calculation</li>
                <li>✔️ General Ledger</li>
            </ul>

            <h3>🔔 Notifications & Security</h3>
            <ul>
                <li>✔️ Email Notifications</li>
                <li>✔️ Low Stock Warnings</li>
                <li>✔️ User Roles & Permissions (Upcoming)</li>
            </ul>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="pricing">
        <h2>Pricing Plans</h2>
        <div class="pricing-container">
            <div class="pricing-card">
                <h3>Basic</h3>
                <p>For small businesses</p>
                <h4>$10/month</h4>
                <ul>
                    <li>✔️ Procurement Tracking</li>
                    <li>✔️ Sales Management</li>
                    <li>✔️ Stock Control</li>
                </ul>
                <a href="#" class="btn">Get Started</a>
            </div>
            <div class="pricing-card premium">
                <h3>Pro</h3>
                <p>For growing businesses</p>
                <h4>$25/month</h4>
                <ul>
                    <li>✔️ All Basic Features</li>
                    <li>✔️ Automated Purchase Orders</li>
                    <li>✔️ Role-Based Access</li>
                    <li>✔️ Advanced Reporting</li>
                </ul>
                <a href="#" class="btn">Get Started</a>
            </div>
            <div class="pricing-card">
                <h3>Enterprise</h3>
                <p>For large enterprises</p>
                <h4>$50/month</h4>
                <ul>
                    <li>✔️ All Pro Features</li>
                    <li>✔️ Custom Integrations</li>
                    <li>✔️ Dedicated Support</li>
                    <li>✔️ API Access</li>
                </ul>
                <a href="#" class="btn">Get Started</a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-item">
            <button class="faq-question">How does the stock update work?</button>
            <div class="faq-answer">Stock levels are automatically updated after a sale.</div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Can I generate financial reports?</button>
            <div class="faq-answer">Yes! You can export reports in Excel & PDF for sales, purchases, and products.</div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Can I manage supplier payments?</button>
            <div class="faq-answer">Yes, the app includes accounting & ledger tracking for payments and expenses.</div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Will there be role-based access?</button>
            <div class="faq-answer">Yes! Future updates will introduce Admin, Procurement, and Sales roles.</div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Can I receive alerts for low stock?</button>
            <div class="faq-answer">Yes! The system sends email notifications when stock is low.</div>
        </div>
    </section>

    <!-- Call to Action -->
    <section id="cta" class="cta">
        <h2>Get Started Today!</h2>
        <a href="#" class="btn">Try the Demo</a>
        <a href="#" class="btn">Request a Feature</a>
        <a href="#" class="btn">Contact Support</a>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <p>&copy; 2025 ProcureTrack. All rights reserved.</p>
            <div class="social-links">
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">LinkedIn</a>
            </div>
        </div>
    </footer>
    <script>
        // Mobile Menu Toggle
document.querySelector(".hamburger").addEventListener("click", () => {
    document.querySelector(".nav-links").classList.toggle("show");
});

// FAQ Toggle
document.querySelectorAll(".faq-question").forEach((question) => {
    question.addEventListener("click", () => {
        const answer = question.nextElementSibling;
        answer.style.display = answer.style.display === "block" ? "none" : "block";
    });
});

    </script>
</body>
</html>
