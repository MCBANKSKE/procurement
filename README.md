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
1. Ensure you have **PHP** and **Composer** installed for backend setup.
2. Set up a **MySQL** database or any preferred database.

### Backend Setup
1. Clone the repository:
   ```bash
   git clone https://github.com/MCBANKSKE/procuretrack.git
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

### Running the Application
1. Start the Laravel development server:
   ```bash
   php artisan serve
   ```
2. Open your browser and visit `http://localhost:8000` to view the application.

## Contact

For feature requests or support, feel free to contact us at:  
[Email: info@rmsystems.site](mailto:info@rmsystems.site) or WhatsApp +254798808796
