Supplier
| Field       | Type | Description                                   |
|-------------|------|-----------------------------------------------|
| SupplierID  | Text | Primary Key, Auto-generated for new suppliers |
| Name        | Text | Supplier's name                               |
| Location    | Text | Supplier's location                           |
| ContactInfo | Text | Supplier's contact information                |


Ingredient
| Field         | Type     | Description                                    |
|---------------|----------|------------------------------------------------|
| IngredientID  | Text     | Primary Key, Auto-generated for new ingredients|
| Name          | Text     | Ingredient's name                              |
| Type          | Dropdown | Options: Meat, Vegetables, Dairy, etc.         |
| SupplierID    | Dropdown | FK                                             |
| PurchasePrice | Number   | Cost of the ingredient                         |
| ShelfLife     | Number   | Shelf life in days                             |


Dish
| Field       | Type      | Description                                   |
|-------------|-----------|-----------------------------------------------|
| DishID      | Text      | Primary Key, Auto-generated for new dishes    |
| IngredientID  | Text    | FK                                            |
| Name        | Text      | Dish's name                                   |
| SalePrice   | Number    | Selling price of the dish                     |
| Description | Textarea  | Description of the dish                       |



