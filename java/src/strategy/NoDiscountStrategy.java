package strategy;

public class NoDiscountStrategy implements IDiscountStrategy {

    @Override
    public float applyDiscount(float total) {
        return total;
    }
}