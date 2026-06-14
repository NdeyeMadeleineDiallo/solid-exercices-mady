package entity;

public class Product {
    private String name;
    private float price;
    private int stock;

    public Product(String name, float price, int stock) {
        this.name = name;
        this.price = price;
        this.stock = stock;
    }

    public String getName() {
        return name;
    }

    public float getPrice() {
        return price;
    }

    public int getStock() {
        return stock;
    }

    public void decreaseStock(int quantity) {
        if (quantity <= 0) {
            throw new IllegalArgumentException("La quantite doit etre superieure a 0");
        }

        if (this.stock < quantity) {
            throw new RuntimeException("Stock insuffisant pour " + this.name);
        }

        this.stock -= quantity;
    }
}