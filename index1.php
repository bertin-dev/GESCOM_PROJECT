<?php
require 'app/config/Config_Server.php';
session_start();

if(isset($_SESSION['ID_USER'])) {
    $user_id = intval($_SESSION['ID_USER']);
    $last_name = $_SESSION['NOM_USER'];
    $first_name = $_SESSION['PRENOM_USER'];
}
else if(isset($_COOKIE['ID_USER'])) {
    var_dump($_COOKIE['NOM_USER']);
    $user_id = intval($_COOKIE['ID_USER']);
    $last_name = $_COOKIE['NOM_USER'];
    $first_name = $_COOKIE['PRENOM_USER'];
}
else {
    $user_id = 0;
    $last_name = "";
    $first_name = "";
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Institut Salomon, IS, formation, centre de formation agréé, minfop, certification, vae, paj, va">
  <meta name="author" content="Bertin Mounok, Bertin-Mounok, Pipo Ndemba, Supers-Pipo, bertin.dev, bertin-dev, Ngando Mounok Hugues Bertin">
  <meta name="copyright" content="© <?=date('Y', time());?>, bertin.dev, Inc.">

  <title>Tableau de Bord - INSTITUT SALOMON</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
      <?php require 'sidebar.php';?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php require 'topbar.php';?>
            <!-- End of Topbar -->

            <div class="container-fluid">
                    <!-- Content Row -->
                <!-- Content Row -->
                <div class="row">


                    <!-- database N°2 -->
                    <div class="col-lg-12">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">All transactions from database N° 2</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable_module" width="100%"
                                           cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>#id</th>
                                            <th>business_name</th>
                                            <th>code</th>
                                            <th>payment_status</th>
                                            <th>transaction_date</th>
                                            <th>total_before_tax</th>
                                            <th>tax_amount</th>
                                            <th>discount_type</th>
                                            <th>discount_amount</th>
                                            <th>final_total</th>
                                            <th>commission_agent</th>
                                            <th>total_amount_recovered</th>

                                            <th>product_name</th>
                                            <th>tax_type</th>
                                            <th>enable_stock</th>
                                            <th>alert_quantity</th>
                                            <th>barcode_type</th>

                                            <!--<th>enable_stock</th>
                                            <th>enable_stock</th>
                                            <th>enable_stock</th>
                                            <th>enable_stock</th>
                                            <th>enable_stock</th>
                                            <th>enable_stock</th>
                                            <th>enable_stock</th>
                                            <th>enable_stock</th>-->


                                            <th>created_at</th>
                                            <th>updated_at</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>#id</th>
                                            <th>business_name</th>
                                            <th>code</th>
                                            <th>payment_status</th>
                                            <th>transaction_date</th>
                                            <th>total_before_tax</th>
                                            <th>tax_amount</th>
                                            <th>discount_type</th>
                                            <th>discount_amount</th>
                                            <th>final_total</th>
                                            <th>commission_agent</th>
                                            <th>total_amount_recovered</th>

                                            <th>product_name</th>
                                            <th>tax_type</th>
                                            <th>enable_stock</th>
                                            <th>alert_quantity</th>
                                            <th>barcode_type</th>

                                            <!--<th>enable_stock</th>
                                            <th>enable_stock</th>
                                            <th>enable_stock</th>
                                            <th>enable_stock</th>
                                            <th>enable_stock</th>
                                            <th>enable_stock</th>
                                            <th>enable_stock</th>-->


                                            <th>created_at</th>
                                            <th>updated_at</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                        foreach (App::getDB()->query('SELECT transactions.id AS transId, transactions.business_id, transactions.location_id, transactions.res_table_id, transactions.res_waiter_id, transactions.res_order_status, transactions.type, transactions.sub_type, transactions.status, transactions.is_quotation, transactions.payment_status, transactions.adjustment_type, transactions.contact_id, transactions.customer_group_id, transactions.invoice_no, transactions.ref_no, transactions.subscription_no, transactions.subscription_repeat_on, transactions.transaction_date, transactions.total_before_tax, transactions.tax_id, transactions.tax_amount, transactions.discount_type, transactions.discount_amount, transactions.rp_redeemed, transactions.rp_redeemed_amount, transactions.shipping_details, transactions.shipping_address, transactions.shipping_status, transactions.delivered_to, transactions.shipping_charges, transactions.additional_notes, transactions.staff_note, transactions.round_off_amount, transactions.final_total, transactions.expense_category_id, transactions.expense_for, transactions.commission_agent, transactions.document, transactions.is_direct_sale, transactions.is_suspend, transactions.exchange_rate, transactions.total_amount_recovered, transactions.transfer_parent_id, transactions.return_parent_id, transactions.opening_stock_product_id, transactions.created_by, transactions.import_batch, transactions.import_time, transactions.types_of_service_id, transactions.packing_charge, transactions.packing_charge_type, transactions.service_custom_field_1, transactions.service_custom_field_2, transactions.service_custom_field_3, transactions.service_custom_field_4, transactions.is_created_from_api, transactions.rp_earned, transactions.order_addresses, transactions.is_recurring, transactions.recur_interval, transactions.recur_interval_type, transactions.recur_repetitions, transactions.recur_stopped_on, transactions.recur_parent_id, transactions.invoice_token, transactions.pay_term_number, transactions.pay_term_type, transactions.selling_price_group_id, transactions.created_at AS transCreated_at, transactions.updated_at AS transUpdated_at,
                                                                                           products.id, products.name AS P_name, products.business_id, products.type, products.unit_id, products.sub_unit_ids, products.brand_id, products.category_id, products.sub_category_id, products.tax, products.tax_type, products.enable_stock, products.alert_quantity, products.sku, products.barcode_type, products.expiry_period, products.expiry_period_type, products.enable_sr_no, products.weight, products.product_custom_field1, products.product_custom_field2, products.product_custom_field3, products.product_custom_field4, products.image, products.product_description, products.created_by, products.warranty_id, products.is_inactive, products.not_for_selling, products.created_at, products.updated_at, 
                                                                                           business.id, business.name, business.currency_id, business.start_date, business.tax_number_1, business.tax_label_1, business.tax_number_2, business.tax_label_2, business.default_sales_tax, business.default_profit_percent, business.owner_id, business.time_zone, business.fy_start_month, business.accounting_method, business.default_sales_discount, business.sell_price_tax, business.logo, business.sku_prefix, business.enable_product_expiry, business.expiry_type, business.on_product_expiry, business.stop_selling_before, business.enable_tooltip, business.purchase_in_diff_currency, business.purchase_currency_id, business.p_exchange_rate, business.transaction_edit_days, business.stock_expiry_alert_days, business.keyboard_shortcuts, business.pos_settings, business.weighing_scale_setting, business.enable_brand, business.enable_category, business.enable_sub_category, business.enable_price_tax, business.enable_purchase_status, business.enable_lot_number, business.default_unit, business.enable_sub_units, business.enable_racks, business.enable_row, business.enable_position, business.enable_editing_product_from_purchase, business.sales_cmsn_agnt, business.item_addition_method, business.enable_inline_tax, business.currency_symbol_placement, business.enabled_modules, business.date_format, business.time_format, business.ref_no_prefixes, business.theme_color, business.created_by, business.enable_rp, business.rp_name, business.amount_for_unit_rp, business.min_order_total_for_rp, business.max_rp_per_order, business.redeem_amount_per_unit_rp, business.min_order_total_for_redeem, business.min_redeem_point, business.max_redeem_point, business.rp_expiry_period, business.rp_expiry_type, business.email_settings, business.sms_settings, business.custom_labels, business.common_settings, business.is_active, business.created_at, business.updated_at, 
                                                                                           currencies.id, currencies.country, currencies.currency, currencies.code, currencies.symbol, currencies.thousand_separator, currencies.decimal_separator, currencies.created_at, currencies.updated_at 
                                                                                           FROM transactions
                                                                                           INNER JOIN products
                                                                                           ON transactions.opening_stock_product_id = products.id
                                                                                           INNER JOIN business
                                                                                           ON transactions.business_id = business.id
                                                                                           INNER JOIN currencies
                                                                                           ON business.currency_id = currencies.id
                                                                                           ORDER BY transactions.id DESC') as $transaction):

                                            echo '<tr>
                                                <td title="ID">#' . $transaction->transId . '</td>
                                                <td title="business_name">' . $transaction->name . '</td>
                                                <td title="code">' . $transaction->code . '</td>
                                                <td title="payment_status">' . $transaction->payment_status . '</td> 
                                                <td title="transaction_date"> <time class="timeago" datetime="' . $transaction->transaction_date . '"></time></td>
                                                <td title="total_before_tax">' . $transaction->total_before_tax . '</td>
                                                <td title="tax_amount">' . $transaction->tax_amount . '</td>
                                                <td title="discount_type">' . $transaction->discount_type . '</td>
                                                <td title="discount_amount">' . $transaction->discount_amount . '</td>
                                                <td title="final_total">' . $transaction->final_total . '</td>
                                                <td title="commission_agent">' . $transaction->commission_agent . '</td>
                                                <td title="total_amount_recovered">' . $transaction->total_amount_recovered . '</td>
                                                
                                                <td title="product_name">' . $transaction->P_name . '</td>
                                                <td title="tax_type">' . $transaction->tax_type . '</td>
                                                <td title="enable_stock">' . $transaction->enable_stock . '</td>
                                                <td title="alert_quantity">' . $transaction->alert_quantity . '</td>
                                                <td title="barcode_type">' . $transaction->barcode_type . '</td>
                                                
                                                <!--<td title="created_at">' . $transaction->created_at . '</td>
                                                <td title="product_name">' . $transaction->name . '</td>
                                                <td title="product_name">' . $transaction->name . '</td>-->
                                                
                                                
                                                
                                                <td title="created_at">' . $transaction->transCreated_at . '</td>
                                                <td title="updated_at">' . $transaction->transUpdated_at . '</td>
                                            </tr>';
                                        endforeach;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- database N°1 -->
                    <div class="col-lg-12">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">all invoices from database N° 1</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable_module" width="100%"
                                           cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>#Id</th>
                                            <th>N°facture</th>
                                            <th>Total_ht</th>
                                            <th>Total_ttc</th>
                                            <th>Etat_facture</th>
                                            <th>Reste_a_payer_patient</th>
                                            <th>Part_patient</th>
                                            <th>Net_a_payer</th>
                                            <th>Nom_personne</th>
                                            <th>Prenom_personne</th>
                                            <th>Sexe_personne</th>
                                            <th>Lieu_personne</th>
                                            <th>Telephone</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>#Id</th>
                                            <th>N°facture</th>
                                            <th>Total_ht</th>
                                            <th>Total_ttc</th>
                                            <th>Etat_facture</th>
                                            <th>Reste_a_payer_patient</th>
                                            <th>Part_patient</th>
                                            <th>Net_a_payer</th>
                                            <th>Nom_personne</th>
                                            <th>Prenom_personne</th>
                                            <th>Sexe_personne</th>
                                            <th>Lieu_personne</th>
                                            <th>Telephone</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                        foreach (App::getDbPgSQL()->query_pgsql('SELECT *
                                                                                   FROM public            
                                                                                   ORDER BY public.id DESC') as $cash):

                                            echo '<tr>
                                                <td title="ID">#' . $cash->id . '</td>
                                                <td title="num_facture">' . $cash->num_facture . '</td>
                                                <td title="total_ht">' . $cash->total_ht . '</td>
                                               
                                                <td title="total_ttc">' . $cash->total_ttc . '</td>
                                                <td title="etat_fact">' . $cash->etat_fact . '</td>
                                                <td title="reste_a_payer_patient">' . $cash->reste_a_payer_patient . '</td>
                                                <td title="part_patient">' . $cash->part_patient . '</td>
                                                <td title="net_a_payer">' . $cash->net_a_payer . '</td>
                                                <td title="nom_personne">' . $cash->nom_personne . '</td>
                                                <td title="prenom_personne">' . $cash->prenom_personne . '</td>
                                                <td title="sexe_personne">' . $cash->sexe_personne . '</td>
                                                <td title="lieu_personne">' . $cash->lieu_personne . '</td>
                                                <td title="telephone">' . $cash->telephone . '</td>
                                            </tr>';
                                        endforeach;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- End of Main Content -->

      <!-- Footer -->
        <?php require 'footer.php';?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <?php require 'required_js.php';?>

</body>

</html>
