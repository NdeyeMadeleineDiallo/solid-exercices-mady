<?php

namespace services;

use entity\Product;
use strategy\IDiscountStrategy;

class OrderManager
{
    public function __construct(
        private InventoryManager $inventoryManager,
        private InvoiceGenerator $invoiceGenerator,
        private NotificationService $notificationService
    ) {}

    public function processOrder(
        Product $product,
        int $quantity,
        IDiscountStrategy $discountStrategy,
        string $userEmail
    ): void {
        // 1- Verification du stock
        $this->inventoryManager->verifyStock($product, $quantity);

        // 2- Calcul du prix avec reduction
        $total = $product->getPrice() * $quantity;
        $total = $discountStrategy->applyDiscount($total);

        // 3- Mise a jour du stock
        $this->inventoryManager->deductStock($product, $quantity);

        // 4- Generation de la facture
        $this->invoiceGenerator->generatePdfInvoice($userEmail, $total);

        // 5- Envoi de l'email
        $this->notificationService->sendEmail(
            $userEmail,
            "Votre commande de {$total} FCFA est confirmee."
        );
    }
}