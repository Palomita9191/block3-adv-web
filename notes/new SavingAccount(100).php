new BankAccount(100)
new SavingsAccount(100)
new SavingsAccount()// error
new SavingsAccount(100,0.15)
new SavingsAccount(0.15)

class BankAccount {
    public __construct($balance)
}

class SavingsAccount {
    public __construct($interest)
}

$example = new SavingAccount(.15)