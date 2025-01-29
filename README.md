# ProcureTrack - Procurement & Sales Management

**ProcureTrack** is a comprehensive tool designed to streamline procurement, sales, inventory, and accounting management for small to large businesses. With features like purchase requests, sales order management, reporting, and expense tracking, ProcureTrack offers an intuitive solution to manage your procurement and sales processes in one place.

## Features

### Procurement & Inventory
- **Purchase Requests & Approvals**: Submit internal requests for items and approve them.
- **Automated Purchase Orders**: Automatically create purchase orders once a request is approved.
- **Supplier Management**: Manage supplier details and track their contact information.
- **Stock & Inventory Tracking**: Keep track of product stock levels.

### Sales & Financial Tracking
- **Sales Order Management**: Track customer sales and manage sales records.
- **Revenue & Profit Reports**: Generate financial reports detailing profits and revenues.
- **Supplier & Customer Ledger**: Maintain a ledger for suppliers and customers to track payments and balances.

### Reporting & Analytics
- **Export Reports (Excel & PDF)**: Export your procurement, sales, and product reports.
- **Graphical Insights**: Visual insights and graphs for easy analysis.
- **Audit Logs**: Track and monitor all system activities for security and compliance.

### Accounting & Financial Management
- **Expense Tracking**: Keep track of your business expenses and manage budgets.
- **Automated Tax Calculation**: Calculate taxes automatically based on transactions.
- **General Ledger**: Record and categorize all your financial transactions.

### Notifications & Security
- **Email Notifications**: Receive email alerts for important actions like approvals and stock updates.
- **Low Stock Warnings**: Get notifications when stock is running low.
- **User Roles & Permissions**: Future updates will include user role management (Admin, Procurement, Sales roles).

## Installation

To get started with the **ProcureTrack** app, follow these steps:

### Prerequisites
1. Ensure you have **Node.js** and **npm** installed for frontend dependencies.
2. Ensure you have **PHP** and **Composer** installed for backend setup.
3. Set up a **MySQL** database or any preferred database.

### Backend Setup
1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/procuretrack.git
   cd procuretrack
   ```
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Set up your `.env` file for database and mail configurations:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Run database migrations:
   ```bash
   php artisan migrate
   ```
5. Seed the database with sample data (optional):
   ```bash
   php artisan db:seed
   ```

### Frontend Setup
1. Navigate to the frontend directory:
   ```bash
   cd frontend
   ```
2. Install frontend dependencies:
   ```bash
   npm install
   ```
3. Build the frontend assets:
   ```bash
   npm run build
   ```

### Running the Application
1. Start the Laravel development server:
   ```bash
   php artisan serve
   ```
2. Open your browser and visit `http://localhost:8000` to view the application.

## Pricing Plans

1. **Basic** – $10/month
   - Procurement Tracking
   - Sales Management
   - Stock Control
2. **Pro** – $25/month
   - All Basic Features
   - Automated Purchase Orders
   - Role-Based Access
   - Advanced Reporting
3. **Enterprise** – $50/month
   - All Pro Features
   - Custom Integrations
   - Dedicated Support
   - API Access

## FAQ

1. **How does the stock update work?**
   - Stock levels are automatically updated after a sale.

2. **Can I generate financial reports?**
   - Yes! You can export reports in Excel & PDF for sales, purchases, and products.

3. **Can I manage supplier payments?**
   - Yes, the app includes accounting & ledger tracking for payments and expenses.

4. **Will there be role-based access?**
   - Yes! Future updates will introduce Admin, Procurement, and Sales roles.

5. **Can I receive alerts for low stock?**
   - Yes! The system sends email notifications when stock is low.

## Contact

For feature requests or support, feel free to contact us at:  
[Email: info@rmsystems.site](mailto:info@rmsystems.site) or WhatsApp +254798808796
