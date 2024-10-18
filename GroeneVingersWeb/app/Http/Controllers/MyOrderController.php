<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyOrderController extends Controller
{
    public function index()
    {
        session_start();
        // Haal de gegevens uit de sessie op
        $order = isset($_SESSION['order']) ? $_SESSION['order'] : null;

        // Geef de gegevens door aan de view
        return view('myOrders', ['order' => $order]);

    }

    public function store(Request $request)
    {
        session_start();

        // Haal alle ingevoerde gegevens uit het formulier op
        $name = $request->input('name');
        $telefoonnummer = $request->input('telefoonnummer');
        $email = $request->input('email');
        $postcode = $request->input('postcode');
        $plaats = $request->input('plaats');
        $huisnummer = $request->input('huisnummer');
        $straat = $request->input('straat');
        $deliveryOption = $request->input('delivery_option');
        $paymentOption = $request->input('payment_option');

        // Sla de ingevoerde gegevens op in de sessie
        $_SESSION['order'] = [
            'name' => $name,
            'telefoonnummer' => $telefoonnummer,
            'email' => $email,
            'postcode' => $postcode,
            'plaats' => $plaats,
            'huisnummer' => $huisnummer,
            'straat' => $straat,
            'delivery_option' => $deliveryOption,
            'payment_option' => $paymentOption,
        ];

        // Terugkeren naar een bevestigingspagina of een andere actie uitvoeren
        return redirect()->route('payment'); // Terug naar index methode
    }
}
