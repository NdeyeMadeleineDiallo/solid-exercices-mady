package strategy;

public class VipDiscountStrategy implements IDiscountStrategy {

    @Override
    public float applyDiscount(float total) {
        return total * 0.80f;
    }
}