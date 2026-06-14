package services;

public class InvoiceGenerator {

    public void generatePdfInvoice(String email, float total) {
        System.out.println("Generation de la facture PDF pour " + email + " d'un montant de " + total + " euros");
    }
}