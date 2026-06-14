package services;

import entity.Product;

public class InventoryManager {

    public void verifyStock(Product product, int quantity) {
        if (product.getStock() < quantity) {
            throw new RuntimeException("Stock insuffisant pour " + product.getName());
        }
    }

    public void deductStock(Product product, int quantity) {
        product.decreaseStock(quantity);
    }
}