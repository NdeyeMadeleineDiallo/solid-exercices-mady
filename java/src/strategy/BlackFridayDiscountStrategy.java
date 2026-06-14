package strategy;

public class BlackFridayDiscountStrategy implements IDiscountStrategy {

    @Override
    public float applyDiscount(float total) {
        return total * 0.50f;
    }
}