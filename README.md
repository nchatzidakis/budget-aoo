# TALL Budget App
This is a budget app that will be based on [TALL](https://tallstack.dev/). 

## Key concepts
- A user will be able to create an Entity, i.e. home, business "ABC", so you will be able to manage both your business and personal financing.
- In each Entity you will manage its:
  - Accounts (Bank accounts, Credit Cards etc.)
  - Expense Categories
  - Expenses
  - Incomes
  - Debt
  - Investments
  - Budget
- One user will be able to create or manage multiple Entities, and each Entity will be managed by one or more users.
- We will use [multi-tenancy](https://tenancyforlaravel.com/) in order to support multiple users in the same application.
