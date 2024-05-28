<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnerAddOnsController extends Controller
{
  //
  public function choice()
  {
    return view('partners.addons.add-ons-choices');
  } // End Method
  public function services()
  {
    return view('partners.addons.add-ons-services');
  } // End Method

  public function marketplaces()
  {
    return view('partners.addons.add-ons-marketplaces');
  } // End Method

  public function invoices()
  {
    return view('partners.addons.add-ons-invoices');
  } // End Method

  public function accountingTools()
  {
    return view('partners.addons.add-ons-accounting-tools');
  } // End Method
  public function accountingToolsRevenue()
  {
    return view('partners.addons.add-ons-accounting-tools-revenue');
  } // End Method
  public function accountingToolsCost()
  {
    return view('partners.addons.add-ons-accounting-tools-cost');
  } // End Method
  public function accountingToolsVat()
  {
    return view('partners.addons.add-ons-accounting-tools-vat');
  } // End Method
  public function profitCalculator()
  {
    return view('partners.addons.add-ons-profit-calculator');
  } // End Method

  public function webshop()
  {
    return view('partners.addons.add-ons-webshop');
  } // End Method
}
