package services;

import entity.Product;
import strategy.IDiscountStrategy;

public class OrderManager {
    private InventoryManager inventoryManager;
    private InvoiceGenerator invoiceGenerator;
    private NotificationService notificationService;

    public OrderManager(
            InventoryManager inventoryManager,
            InvoiceGenerator invoiceGenerator,
            NotificationService notificationService
    ) {
        this.inventoryManager = inventoryManager;
        this.invoiceGenerator = invoiceGenerator;
        this.notificationService = notificationService;
    }

    public void processOrder(Product product, int quantity, IDiscountStrategy discountStrategy, String userEmail) {
        // 1- Verification du stock
        inventoryManager.verifyStock(product, quantity);

        // 2- Calcul du prix avec reduction
        float total = product.getPrice() * quantity;
        total = discountStrategy.applyDiscount(total);

        // 3- Mise a jour du stock
        inventoryManager.deductStock(product, quantity);

        // 4- Generation de la facture
        invoiceGenerator.generatePdfInvoice(userEmail, total);

        // 5- Envoi de l'email
        notificationService.sendEmail(userEmail, "Votre commande de " + total + " FCFA est confirmee.");
    }
}