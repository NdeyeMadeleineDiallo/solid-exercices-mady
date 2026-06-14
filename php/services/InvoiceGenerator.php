<?php

namespace services;

class InvoiceGenerator
{
    public function generatePdfInvoice(string $email, float $total): void
    {
        echo "Génération de la facture PDF pour {$email} d'un montant de {$total} FCFA" . PHP_EOL;
    }
}