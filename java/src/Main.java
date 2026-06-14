import entity.Product;
import services.InventoryManager;
import services.InvoiceGenerator;
import services.NotificationService;
import services.OrderManager;
import strategy.IDiscountStrategy;
import strategy.VipDiscountStrategy;

public class Main {
    public static void main(String[] args) {
        Product product = new Product("Ordinateur HP", 300000f, 10);

        InventoryManager inventoryManager = new InventoryManager();
        InvoiceGenerator invoiceGenerator = new InvoiceGenerator();
        NotificationService notificationService = new NotificationService();

        OrderManager orderManager = new OrderManager(
                inventoryManager,
                invoiceGenerator,
                notificationService
        );

        IDiscountStrategy discountStrategy = new VipDiscountStrategy();

        try {
            orderManager.processOrder(
                    product,
                    2,
                    discountStrategy,
                    "mady@gmail.com"
            );

            System.out.println("Stock restant : " + product.getStock());

        } catch (RuntimeException e) {
            System.out.println(e.getMessage());
        }
    }
}