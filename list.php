<?php
require 'app/config/Config_Server.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
          content="Tbelau de bord">
    <meta name="author"
          content="Bertin">
    <meta name="copyright" content="© <?= date('Y', time()); ?>, bertin.dev, Inc.">

    <title>Tableau de Bord</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php require 'sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php //require 'topbar.php'; ?>
            <!-- End of Topbar -->

            <div class="container-fluid">
                <?php
                if(isset($_GET['id'])){
                    if ($_GET['id'] == '1') {
                        ?>
                        <!-- Content Row -->
                        <div class="row">
                            <!-- Border Left Utilities -->
                            <div class="col-lg-12">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Transactions</h6>
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
                        </div>
                        <?php
                    } else if ($_GET['id'] == '2') {
                        ?>
                        <div class="row">
                            <!-- Border Left Utilities -->
                            <div class="col-lg-12">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Cash registers</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable_module" width="100%"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>user_type</th>
                                                    <th>surname</th>
                                                    <th>name</th>
                                                    <th>email</th>

                                                    <th>business_name</th>

                                                    <th>status</th>
                                                    <th>closed_at</th>
                                                    <th>closing_amount</th>
                                                    <th>total_card_slips</th>
                                                    <th>total_cheques</th>
                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>user_type</th>
                                                    <th>surname</th>
                                                    <th>name</th>
                                                    <th>email</th>

                                                    <th>business_name</th>

                                                    <th>status</th>
                                                    <th>closed_at</th>
                                                    <th>closing_amount</th>
                                                    <th>total_card_slips</th>
                                                    <th>total_cheques</th>
                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php
                                                foreach (App::getDB()->query('SELECT cash_registers.ID AS cashId, cash_registers.BUSINESS_ID, cash_registers.LOCATION_ID, cash_registers.USER_ID, cash_registers.STATUS, cash_registers.CLOSED_AT AS cashCLOSED_AT, cash_registers.CLOSING_AMOUNT AS cashClosing_amount, cash_registers.TOTAL_CARD_SLIPS , cash_registers.TOTAL_CHEQUES, cash_registers.CLOSING_NOTE, cash_registers.CREATED_AT AS cashCreated_at, cash_registers.UPDATED_AT AS cashUpdated_at, 
                                                                                          business.ID, business.NAME AS business_name, business.CURRENCY_ID, business.START_DATE, business.TAX_NUMBER_1, business.TAX_LABEL_1, business.TAX_NUMBER_2, business.TAX_LABEL_2, business.DEFAULT_SALES_TAX, business.DEFAULT_PROFIT_PERCENT, business.OWNER_ID, business.TIME_ZONE, business.FY_START_MONTH, business.ACCOUNTING_METHOD, business.DEFAULT_SALES_DISCOUNT, business.SELL_PRICE_TAX, business.LOGO, business.SKU_PREFIX, business.ENABLE_PRODUCT_EXPIRY, business.EXPIRY_TYPE, business.ON_PRODUCT_EXPIRY, business.STOP_SELLING_BEFORE, business.ENABLE_TOOLTIP, business.PURCHASE_IN_DIFF_CURRENCY, business.PURCHASE_CURRENCY_ID, business.P_EXCHANGE_RATE, business.TRANSACTION_EDIT_DAYS, business.STOCK_EXPIRY_ALERT_DAYS, business.KEYBOARD_SHORTCUTS, business.POS_SETTINGS, business.WEIGHING_SCALE_SETTING, business.ENABLE_BRAND, business.ENABLE_CATEGORY, business.ENABLE_SUB_CATEGORY, business.ENABLE_PRICE_TAX, business.ENABLE_PURCHASE_STATUS, business.ENABLE_LOT_NUMBER, business.DEFAULT_UNIT, business.ENABLE_SUB_UNITS, business.ENABLE_RACKS, business.ENABLE_ROW, business.ENABLE_POSITION, business.ENABLE_EDITING_PRODUCT_FROM_PURCHASE, business.SALES_CMSN_AGNT, business.ITEM_ADDITION_METHOD, business.ENABLE_INLINE_TAX, business.CURRENCY_SYMBOL_PLACEMENT, business.ENABLED_MODULES, business.DATE_FORMAT, business.TIME_FORMAT, business.REF_NO_PREFIXES, business.THEME_COLOR, business.CREATED_BY, business.ENABLE_RP, business.RP_NAME, business.AMOUNT_FOR_UNIT_RP, business.MIN_ORDER_TOTAL_FOR_RP, business.MAX_RP_PER_ORDER, business.REDEEM_AMOUNT_PER_UNIT_RP, business.MIN_ORDER_TOTAL_FOR_REDEEM, business.MIN_REDEEM_POINT, business.MAX_REDEEM_POINT, business.RP_EXPIRY_PERIOD, business.RP_EXPIRY_TYPE, business.EMAIL_SETTINGS, business.SMS_SETTINGS, business.CUSTOM_LABELS, business.COMMON_SETTINGS, business.IS_ACTIVE, business.CREATED_AT, business.UPDATED_AT,
                                                                                           users.id, users.user_type, users.surname, users.first_name, users.last_name, users.username, users.email, users.password, users.language, users.contact_no, users.address, users.remember_token, users.business_id, users.max_sales_discount_percent, users.allow_login, users.status, users.is_cmmsn_agnt, users.cmmsn_percent, users.selected_contacts, users.dob, users.gender, users.marital_status, users.blood_group, users.contact_number, users.fb_link, users.twitter_link, users.social_media_1, users.social_media_2, users.permanent_address, users.current_address, users.guardian_name, users.custom_field_1, users.custom_field_2, users.custom_field_3, users.custom_field_4, users.bank_details, users.id_proof_name, users.id_proof_number, users.deleted_at, users.created_at, users.updated_at
                                                                                           FROM cash_registers
                                                                                           INNER JOIN business
                                                                                           ON cash_registers.business_id = business.id
                                                                                           INNER JOIN users
                                                                                           ON cash_registers.user_id = users.id
                                                                                           ORDER BY cash_registers.id DESC') as $cash):

                                                    echo '<tr>
                                                <td title="ID">#' . $cash->cashId . '</td>
                                                <td title="user_type">' . $cash->user_type . '</td>
                                                <td title="surname">' . $cash->surname . '</td>
                                                <td title="first_name">' . $cash->first_name . ' ' . $cash->last_name . '</td>
                                                <td title="email">' . $cash->email . '</td> 
                                                
                                                <td title="business_name">' . $cash->business_name . '</td>
                                                
                                                <td title="status">' . $cash->status . '</td>
                                                <td title="closed_at"><time class="timeago" datetime="' . $cash->cashCLOSED_AT . '"></time></td>
                                                <td title="closing_amount">' . $cash->cashClosing_amount . '</td>
                                                <td title="total_card_slips">' . $cash->TOTAL_CARD_SLIPS . '</td>
                                                <td title="total_cheques">' . $cash->TOTAL_CHEQUES . '</td>
                                                <td title="created_at">' . $cash->cashCreated_at . '</td>
                                                <td title="updated_at">' . $cash->cashUpdated_at . '</td>
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
                        <?php
                    } else if ($_GET['id'] == '3') {
                        ?>
                        <div class="row">
                            <!-- Border Left Utilities -->
                            <div class="col-lg-12">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Subscriptions</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable_module" width="100%"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>start_date</th>
                                                    <th>trial_end_date</th>
                                                    <th>end_date</th>
                                                    <th>package_price</th>
                                                    <th>paid_via</th>
                                                    <th>status</th>

                                                    <th>business_name</th>

                                                    <th>user_count</th>
                                                    <th>product_count</th>
                                                    <th>bookings</th>
                                                    <th>invoice_count</th>
                                                    <th>interval</th>
                                                    <th>interval_count</th>
                                                    <th>trial_days</th>
                                                    <th>price</th>
                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>start_date</th>
                                                    <th>trial_end_date</th>
                                                    <th>end_date</th>
                                                    <th>package_price</th>
                                                    <th>paid_via</th>
                                                    <th>status</th>

                                                    <th>business_name</th>

                                                    <th>user_count</th>
                                                    <th>product_count</th>
                                                    <th>bookings</th>
                                                    <th>invoice_count</th>
                                                    <th>interval</th>
                                                    <th>interval_count</th>
                                                    <th>trial_days</th>
                                                    <th>price</th>
                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php
                                                foreach (App::getDB()->query('SELECT subscriptions.id AS sID, subscriptions.business_id, subscriptions.package_id, subscriptions.start_date, subscriptions.trial_end_date, subscriptions.end_date, subscriptions.package_price, subscriptions.package_details, subscriptions.created_id, subscriptions.paid_via, subscriptions.payment_transaction_id, subscriptions.status, subscriptions.deleted_at, subscriptions.created_at sCreated_at, subscriptions.updated_at sUpdated_at, 
                                                                                   p.id, p.name, p.description, p.location_count, p.user_count, p.product_count, p.bookings, p.kitchen, p.order_screen, p.tables, p.invoice_count, p.`interval`, p.interval_count, p.trial_days, p.price, p.custom_permissions, p.created_by, p.sort_order, p.is_active, p.is_private, p.is_one_time, p.enable_custom_link, p.custom_link, p.custom_link_text, p.deleted_at, p.created_at, p.updated_at, 
                                                                                   b.id, b.name b_name, b.currency_id, b.start_date, b.tax_number_1, b.tax_label_1, b.tax_number_2, b.tax_label_2, b.default_sales_tax, b.default_profit_percent, b.owner_id, b.time_zone, b.fy_start_month, b.accounting_method, b.default_sales_discount, b.sell_price_tax, b.logo, b.sku_prefix, b.enable_product_expiry, b.expiry_type, b.on_product_expiry, b.stop_selling_before, b.enable_tooltip, b.purchase_in_diff_currency, b.purchase_currency_id, b.p_exchange_rate, b.transaction_edit_days, b.stock_expiry_alert_days, b.keyboard_shortcuts, b.pos_settings, b.weighing_scale_setting, b.enable_brand, b.enable_category, b.enable_sub_category, b.enable_price_tax, b.enable_purchase_status, b.enable_lot_number, b.default_unit, b.enable_sub_units, b.enable_racks, b.enable_row, b.enable_position, b.enable_editing_product_from_purchase, b.sales_cmsn_agnt, b.item_addition_method, b.enable_inline_tax, b.currency_symbol_placement, b.enabled_modules, b.date_format, b.time_format, b.ref_no_prefixes, b.theme_color, b.created_by, b.enable_rp, b.rp_name, b.amount_for_unit_rp, b.min_order_total_for_rp, b.max_rp_per_order, b.redeem_amount_per_unit_rp, b.min_order_total_for_redeem, b.min_redeem_point, b.max_redeem_point, b.rp_expiry_period, b.rp_expiry_type, b.email_settings, b.sms_settings, b.custom_labels, b.common_settings, b.is_active, b.created_at, b.updated_at 
                                                                                   FROM subscriptions 
                                                                                   INNER JOIN packages p 
                                                                                   ON subscriptions.package_id = p.id 
                                                                                   INNER JOIN business b 
                                                                                   ON subscriptions.business_id = b.id
                                                                                   ORDER BY subscriptions.id DESC') as $cash):

                                                    echo '<tr>
                                                <td title="ID">#' . $cash->sID . '</td>
                                                <td title="start_date">' . $cash->start_date . '</td>
                                                <td title="trial_end_date">' . $cash->trial_end_date . '</td>
                                                <td title="end_date">' . $cash->end_date . '</td>
                                                <td title="package_price">' . $cash->package_price . '</td>
                                                <td title="paid_via">' . $cash->paid_via . '</td>
                                                <td title="status">' . $cash->status . '</td>
                                                
                                                <td title="business_name">' . $cash->b_name . '</td>
                                                
                                                <td title="user_count">' . $cash->user_count . '</td>
                                                <td title="product_count">' . $cash->product_count . '</td>
                                                <td title="bookings">' . $cash->bookings . '</td>
                                                <td title="invoice_count">' . $cash->invoice_count . '</td>
                                                <td title="interval">' . $cash->interval . '</td>
                                                <td title="interval_count">' . $cash->interval_count . '</td>
                                                <td title="trial_days">' . $cash->trial_days . '</td>
                                                <td title="price">' . $cash->price . '</td>
                                                <td title="created_at">' . $cash->sCreated_at . '</td>
                                                <td title="updated_at">' . $cash->sUpdated_at . '</td>
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
                        <?php
                    } else if ($_GET['id'] == '4') {
                        ?>
                        <div class="row">
                            <!-- Border Left Utilities -->
                            <div class="col-lg-12">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Stock Ajustment lines</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable_module" width="100%"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>quantity</th>
                                                    <th>unit_price</th>

                                                    <th>name_variation</th>
                                                    <th>sub_sku</th>
                                                    <th>default_purchase_price</th>
                                                    <th>dpp_inc_tax</th>
                                                    <th>profit_percent</th>
                                                    <th>default_sell_price</th>
                                                    <th>sell_price_inc_tax</th>

                                                    <th>business_name</th>

                                                    <th>name</th>
                                                    <th>type</th>
                                                    <th>tax_type</th>
                                                    <th>alert_quantity</th>
                                                    <th>sku</th>
                                                    <th>barcode_type</th>

                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>quantity</th>
                                                    <th>unit_price</th>

                                                    <th>name_variation</th>
                                                    <th>sub_sku</th>
                                                    <th>default_purchase_price</th>
                                                    <th>dpp_inc_tax</th>
                                                    <th>profit_percent</th>
                                                    <th>default_sell_price</th>
                                                    <th>sell_price_inc_tax</th>

                                                    <th>business_name</th>

                                                    <th>name</th>
                                                    <th>type</th>
                                                    <th>tax_type</th>
                                                    <th>alert_quantity</th>
                                                    <th>sku</th>
                                                    <th>barcode_type</th>


                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php
                                                foreach (App::getDB()->query('SELECT stock_adjustment_lines.id AS st_adID, stock_adjustment_lines.transaction_id, stock_adjustment_lines.product_id, stock_adjustment_lines.variation_id, stock_adjustment_lines.quantity st_adQuantity, stock_adjustment_lines.unit_price, stock_adjustment_lines.removed_purchase_line, stock_adjustment_lines.lot_no_line_id, stock_adjustment_lines.created_at st_adCreated_at, stock_adjustment_lines.updated_at st_adUpdated_at, 
                                                                                   v.id, v.name name_variation, v.product_id, v.sub_sku, v.product_variation_id, v.variation_value_id, v.default_purchase_price, v.dpp_inc_tax, v.profit_percent, v.default_sell_price, v.sell_price_inc_tax, v.created_at, v.updated_at, v.deleted_at, v.combo_variations, 
                                                                                   business.name b_name,
                                                                                   products.id, products.name, products.business_id, products.type, products.unit_id, products.sub_unit_ids, products.brand_id, products.category_id, products.sub_category_id, products.tax, products.tax_type, products.enable_stock, products.alert_quantity, products.sku, products.barcode_type, products.expiry_period, products.expiry_period_type, products.enable_sr_no, products.weight, products.product_custom_field1, products.product_custom_field2, products.product_custom_field3, products.product_custom_field4, products.image, products.product_description, products.created_by, products.warranty_id, products.is_inactive, products.not_for_selling, products.created_at, products.updated_at 
                                                                                   FROM stock_adjustment_lines 
                                                                                   INNER JOIN variations v 
                                                                                   ON stock_adjustment_lines.variation_id = v.id 
                                                                                   INNER JOIN products 
                                                                                   ON stock_adjustment_lines.product_id = products.id
                                                                                   INNER JOIN business 
                                                                                   ON products.business_id = business.id
                                                                                   ORDER BY stock_adjustment_lines.id DESC') as $cash):

                                                    echo '<tr>
                                                <td title="ID">#' . $cash->st_adID . '</td>
                                                <td title="quantity">' . $cash->st_adQuantity . '</td>
                                                <td title="unit_price">' . $cash->unit_price . '</td>
                                                
                                                <td title="name_variation">' . $cash->name_variation . '</td>
                                                <td title="sub_sku">' . $cash->sub_sku . '</td>
                                                <td title="default_purchase_price">' . $cash->default_purchase_price . '</td>
                                                <td title="dpp_inc_tax">' . $cash->dpp_inc_tax . '</td>
                                                <td title="profit_percent">' . $cash->profit_percent . '</td>
                                                <td title="default_sell_price">' . $cash->default_sell_price . '</td>
                                                <td title="sell_price_inc_tax">' . $cash->sell_price_inc_tax . '</td>
                                                
                                                <td title="business_name">' . $cash->b_name . '</td>
                                                
                                                <td title="name">' . $cash->name . '</td>
                                                <td title="type">' . $cash->type . '</td>
                                                <td title="tax_type">' . $cash->tax_type . '</td>
                                                <td title="alert_quantity">' . $cash->alert_quantity . '</td>
                                                <td title="sku">' . $cash->sku . '</td>
                                                <td title="barcode_type">' . $cash->barcode_type . '</td>
                                                
                                                
                                                
                                                <td title="created_at">' . $cash->st_adCreated_at . '</td>
                                                <td title="updated_at">' . $cash->st_adUpdated_at . '</td>
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
                        <?php
                    } else if ($_GET['id'] == '5') {
                        ?>
                        <div class="row">
                            <!-- Border Left Utilities -->
                            <div class="col-lg-12">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Purchase lines</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable_module" width="100%"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>quantity</th>
                                                    <th>pp_without_discount</th>
                                                    <th>discount_percent</th>
                                                    <th>purchase_price</th>
                                                    <th>purchase_price_inc_tax</th>
                                                    <th>item_tax</th>
                                                    <th>quantity_sold</th>
                                                    <th>quantity_adjusted</th>
                                                    <th>quantity_returned</th>
                                                    <th>mfg_quantity_used</th>

                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>quantity</th>
                                                    <th>pp_without_discount</th>
                                                    <th>discount_percent</th>
                                                    <th>purchase_price</th>
                                                    <th>purchase_price_inc_tax</th>
                                                    <th>item_tax</th>
                                                    <th>quantity_sold</th>
                                                    <th>quantity_adjusted</th>
                                                    <th>quantity_returned</th>
                                                    <th>mfg_quantity_used</th>
                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php
                                                foreach (App::getDB()->query('SELECT * FROM purchase_lines
                                                                                   ORDER BY purchase_lines.id DESC') as $cash):

                                                    echo '<tr>
                                                <td title="ID">#' . $cash->id . '</td>
                                                <td title="quantity">' . $cash->quantity . '</td>
                                                <td title="pp_without_discount">' . $cash->pp_without_discount . '</td>
                                               
                                                <td title="discount_percent">' . $cash->discount_percent . '</td>
                                                <td title="purchase_price">' . $cash->purchase_price . '</td>
                                                <td title="purchase_price_inc_tax">' . $cash->purchase_price_inc_tax . '</td>
                                                <td title="item_tax">' . $cash->item_tax . '</td>
                                                <td title="quantity_sold">' . $cash->quantity_sold . '</td>
                                                <td title="quantity_adjusted">' . $cash->quantity_adjusted . '</td>
                                                <td title="quantity_returned">' . $cash->quantity_returned . '</td>
                                                <td title="mfg_quantity_used">' . $cash->mfg_quantity_used . '</td>
                                                
                                                <td title="created_at">' . $cash->created_at . '</td>
                                                <td title="updated_at">' . $cash->updated_at . '</td>
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
                        <?php
                    } else if ($_GET['id'] == '6') {
                        ?>
                        <div class="row">
                            <!-- Border Left Utilities -->
                            <div class="col-lg-12">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable_module" width="100%"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>name</th>
                                                    <th>type</th>
                                                    <th>tax</th>
                                                    <th>tax_type</th>
                                                    <th>enable_stock</th>
                                                    <th>alert_quantity</th>
                                                    <th>sku</th>
                                                    <th>barcode_type</th>
                                                    <th>expiry_period</th>

                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>name</th>
                                                    <th>type</th>
                                                    <th>tax</th>
                                                    <th>tax_type</th>
                                                    <th>enable_stock</th>
                                                    <th>alert_quantity</th>
                                                    <th>sku</th>
                                                    <th>barcode_type</th>
                                                    <th>expiry_period</th>
                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php
                                                foreach (App::getDB()->query('SELECT * FROM products
                                                                                   ORDER BY products.id DESC') as $cash):

                                                    echo '<tr>
                                                <td title="ID">#' . $cash->id . '</td>
                                                <td title="name">' . $cash->name . '</td>
                                                <td title="type">' . $cash->type . '</td>
                                               
                                                <td title="tax">' . $cash->tax . '</td>
                                                <td title="tax_type">' . $cash->tax_type . '</td>
                                                <td title="enable_stock">' . $cash->enable_stock . '</td>
                                                <td title="alert_quantity">' . $cash->alert_quantity . '</td>
                                                <td title="sku">' . $cash->sku . '</td>
                                                <td title="barcode_type">' . $cash->barcode_type . '</td>
                                                <td title="expiry_period">' . $cash->expiry_period . '</td>
                                                
                                                <td title="created_at">' . $cash->created_at . '</td>
                                                <td title="updated_at">' . $cash->updated_at . '</td>
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
                        <?php
                    } else if ($_GET['id'] == '7') {
                        ?>
                        <div class="row">
                            <!-- Border Left Utilities -->
                            <div class="col-lg-12">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Accounts</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable_module" width="100%"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>name_account</th>
                                                    <th>account_number</th>
                                                    <th>note</th>
                                                    <th>amount_account_transactions</th>
                                                    <th>reff_no</th>
                                                    <th>operation_date</th>

                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>name_account</th>
                                                    <th>account_number</th>
                                                    <th>note</th>
                                                    <th>amount_account_transactions</th>
                                                    <th>reff_no</th>
                                                    <th>operation_date</th>

                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php
                                                foreach (App::getDB()->query('SELECT accounts.id accID, accounts.business_id, accounts.name, accounts.account_number, accounts.account_type_id, accounts.note, accounts.created_by, accounts.is_closed, accounts.deleted_at, accounts.created_at, accounts.updated_at, 
                                                                                          a.id, a.account_id, a.type, a.sub_type, a.amount, a.reff_no, a.operation_date, a.created_by, a.transaction_id, a.transaction_payment_id, a.transfer_transaction_id, a.note, a.deleted_at, a.created_at, a.updated_at, 
                                                                                          t.id, t.name, t.parent_account_type_id, t.business_id, t.created_at, t.updated_at
                                                                                   FROM accounts 
                                                                                   INNER JOIN account_transactions a 
                                                                                   ON accounts.id = a.account_id
                                                                                   INNER JOIN account_types t 
                                                                                   ON accounts.account_type_id = t.id             
                                                                                   ORDER BY accounts.id DESC') as $cash):

                                                    echo '<tr>
                                                <td title="ID">#' . $cash->accID . '</td>
                                                <td title="account_number">' . $cash->account_number . '</td>
                                                <td title="note">' . $cash->note . '</td>
                                               
                                                <td title="amount">' . $cash->amount . '</td>
                                                <td title="tax_type">' . $cash->tax_type . '</td>
                                                <td title="reff_no">' . $cash->reff_no . '</td>
                                                <td title="operation_date">' . $cash->operation_date . '</td>
                                                
                                                <td title="created_at">' . $cash->created_at . '</td>
                                                <td title="updated_at">' . $cash->updated_at . '</td>
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
                        <?php
                    } else if ($_GET['id'] == '8') {
                        ?>
                        <div class="row">
                            <!-- Border Left Utilities -->
                            <div class="col-lg-12">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Variations</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable_module" width="100%"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>name</th>
                                                    <th>sub_sku</th>
                                                    <th>default_purchase_price</th>
                                                    <th>dpp_inc_tax</th>
                                                    <th>profit_percent</th>
                                                    <th>default_sell_price</th>
                                                    <th>sell_price_inc_tax</th>

                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>name</th>
                                                    <th>sub_sku</th>
                                                    <th>default_purchase_price</th>
                                                    <th>dpp_inc_tax</th>
                                                    <th>profit_percent</th>
                                                    <th>default_sell_price</th>
                                                    <th>sell_price_inc_tax</th>

                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php
                                                foreach (App::getDB()->query('SELECT * FROM variations 
                                                                                   ORDER BY variations.id DESC') as $cash):

                                                    echo '<tr>
                                                <td title="ID">#' . $cash->id . '</td>
                                                <td title="name">' . $cash->name . '</td>
                                                <td title="sub_sku">' . $cash->sub_sku . '</td>
                                                <td title="default_purchase_price">' . $cash->default_purchase_price . '</td>
                                                <td title="dpp_inc_tax">' . $cash->dpp_inc_tax . '</td>
                                                <td title="profit_percent">' . $cash->profit_percent . '</td>
                                                <td title="default_sell_price">' . $cash->default_sell_price . '</td>
                                                <td title="sell_price_inc_tax">' . $cash->sell_price_inc_tax . '</td>
                                                <td title="created_at">' . $cash->created_at . '</td>
                                                <td title="updated_at">' . $cash->updated_at . '</td>
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
                        <?php
                    } else if ($_GET['id'] == '9') {
                        ?>
                        <div class="row">
                            <!-- Border Left Utilities -->
                            <div class="col-lg-12">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Discounts</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable_module" width="100%"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>name</th>
                                                    <th>priority</th>
                                                    <th>discount_type</th>
                                                    <th>discount_amount</th>
                                                    <th>starts_at</th>
                                                    <th>ends_at</th>
                                                    <th>is_active</th>
                                                    <th>applicable_in_spg</th>
                                                    <th>applicable_in_cg</th>

                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>name</th>
                                                    <th>priority</th>
                                                    <th>discount_type</th>
                                                    <th>discount_amount</th>
                                                    <th>starts_at</th>
                                                    <th>ends_at</th>
                                                    <th>is_active</th>
                                                    <th>applicable_in_spg</th>
                                                    <th>applicable_in_cg</th>

                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php
                                                foreach (App::getDB()->query('SELECT *
                                                                                   FROM discounts            
                                                                                   ORDER BY discounts.id DESC') as $cash):

                                                    echo '<tr>
                                                <td title="ID">#' . $cash->id . '</td>
                                                <td title="name">' . $cash->name . '</td>
                                                <td title="priority">' . $cash->priority . '</td>
                                               
                                                <td title="discount_type">' . $cash->discount_type . '</td>
                                                <td title="discount_amount">' . $cash->discount_amount . '</td>
                                                <td title="ends_at">' . $cash->ends_at . '</td>
                                                <td title="is_active">' . $cash->is_active . '</td>
                                                <td title="applicable_in_spg">' . $cash->applicable_in_spg . '</td>
                                                <td title="applicable_in_cg">' . $cash->applicable_in_cg . '</td>
                                                
                                                <td title="created_at">' . $cash->created_at . '</td>
                                                <td title="updated_at">' . $cash->updated_at . '</td>
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
                        <?php
                    } else if ($_GET['id'] == '10') {
                        ?>
                        <div class="row">
                            <!-- Border Left Utilities -->
                            <div class="col-lg-12">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable_module" width="100%"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>name</th>
                                                    <th>short_code</th>
                                                    <th>category_type</th>
                                                    <th>description</th>
                                                    <th>slug</th>
                                                    <th>deleted_at</th>

                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>name</th>
                                                    <th>short_code</th>
                                                    <th>category_type</th>
                                                    <th>description</th>
                                                    <th>slug</th>
                                                    <th>deleted_at</th>

                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php
                                                foreach (App::getDB()->query('SELECT *
                                                                                   FROM categories            
                                                                                   ORDER BY categories.id DESC') as $cash):

                                                    echo '<tr>
                                                <td title="ID">#' . $cash->id . '</td>
                                                <td title="name">' . $cash->name . '</td>
                                                <td title="short_code">' . $cash->short_code . '</td>
                                               
                                                <td title="category_type">' . $cash->category_type . '</td>
                                                <td title="description">' . $cash->description . '</td>
                                                <td title="slug">' . $cash->slug . '</td>
                                                <td title="deleted_at">' . $cash->deleted_at . '</td>
                       
                                                <td title="created_at">' . $cash->created_at . '</td>
                                                <td title="updated_at">' . $cash->updated_at . '</td>
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
                        <?php
                    } else if ($_GET['id'] == '11') {
                        ?>
                        <div class="row">
                            <!-- Border Left Utilities -->
                            <div class="col-lg-12">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Business</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable_module" width="100%"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>name</th>
                                                    <th>start_date</th>
                                                    <th>tax_number_1</th>
                                                    <th>tax_label_1</th>
                                                    <th>tax_label_2</th>
                                                    <th>default_sales_tax</th>
                                                    <th>default_profit_percent</th>
                                                    <th>time_zone</th>
                                                    <th>fy_start_month</th>
                                                    <th>accounting_method</th>
                                                    <th>default_sales_discount</th>
                                                    <th>sell_price_tax</th>
                                                    <th>logo</th>
                                                    <th>sku_prefix</th>
                                                    <th>enable_product_expiry</th>
                                                    <th>expiry_type</th>
                                                    <th>on_product_expiry</th>
                                                    <th>stop_selling_before</th>
                                                    <th>enable_tooltip</th>
                                                    <th>purchase_in_diff_currency</th>
                                                    <th>p_exchange_rate</th>
                                                    <th>transaction_edit_days</th>
                                                    <th>stock_expiry_alert_days</th>
                                                    <th>keyboard_shortcuts</th>
                                                    <th>pos_settings</th>
                                                    <th>weighing_scale_setting</th>
                                                    <th>enable_brand</th>
                                                    <th>enable_category</th>
                                                    <th>enable_sub_category</th>
                                                    <th>enable_price_tax</th>
                                                    <th>enable_purchase_status</th>
                                                    <th>enable_lot_number</th>
                                                    <th>default_unit</th>
                                                    <th>enable_sub_units</th>
                                                    <th>enable_racks</th>
                                                    <th>enable_row</th>
                                                    <th>enable_position</th>
                                                    <th>enable_editing_product_from_purchase</th>
                                                    <th>sales_cmsn_agnt</th>
                                                    <th>item_addition_method</th>
                                                    <th>enable_inline_tax</th>
                                                    <th>currency_symbol_placement</th>
                                                    <th>enabled_modules</th>
                                                    <th>date_format</th>
                                                    <th>time_format</th>
                                                    <th>ref_no_prefixes</th>
                                                    <th>theme_color</th>
                                                    <th>enable_rp</th>
                                                    <th>rp_name</th>
                                                    <th>amount_for_unit_rp</th>
                                                    <th>min_order_total_for_rp</th>
                                                    <th>max_rp_per_order</th>
                                                    <th>redeem_amount_per_unit_rp</th>
                                                    <th>min_order_total_for_redeem</th>
                                                    <th>min_redeem_point</th>
                                                    <th>max_redeem_point</th>
                                                    <th>rp_expiry_period</th>
                                                    <th>rp_expiry_type</th>
                                                    <th>email_settings</th>
                                                    <th>sms_settings</th>
                                                    <th>custom_labels</th>
                                                    <th>common_settings</th>
                                                    <th>is_active</th>

                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>name</th>
                                                    <th>start_date</th>
                                                    <th>tax_number_1</th>
                                                    <th>tax_label_1</th>
                                                    <th>tax_label_2</th>
                                                    <th>default_sales_tax</th>
                                                    <th>default_profit_percent</th>
                                                    <th>time_zone</th>
                                                    <th>fy_start_month</th>
                                                    <th>accounting_method</th>
                                                    <th>default_sales_discount</th>
                                                    <th>sell_price_tax</th>
                                                    <th>logo</th>
                                                    <th>sku_prefix</th>
                                                    <th>enable_product_expiry</th>
                                                    <th>expiry_type</th>
                                                    <th>on_product_expiry</th>
                                                    <th>stop_selling_before</th>
                                                    <th>enable_tooltip</th>
                                                    <th>purchase_in_diff_currency</th>
                                                    <th>p_exchange_rate</th>
                                                    <th>transaction_edit_days</th>
                                                    <th>stock_expiry_alert_days</th>
                                                    <th>keyboard_shortcuts</th>
                                                    <th>pos_settings</th>
                                                    <th>weighing_scale_setting</th>
                                                    <th>enable_brand</th>
                                                    <th>enable_category</th>
                                                    <th>enable_sub_category</th>
                                                    <th>enable_price_tax</th>
                                                    <th>enable_purchase_status</th>
                                                    <th>enable_lot_number</th>
                                                    <th>default_unit</th>
                                                    <th>enable_sub_units</th>
                                                    <th>enable_racks</th>
                                                    <th>enable_row</th>
                                                    <th>enable_position</th>
                                                    <th>enable_editing_product_from_purchase</th>
                                                    <th>sales_cmsn_agnt</th>
                                                    <th>item_addition_method</th>
                                                    <th>enable_inline_tax</th>
                                                    <th>currency_symbol_placement</th>
                                                    <th>enabled_modules</th>
                                                    <th>date_format</th>
                                                    <th>time_format</th>
                                                    <th>ref_no_prefixes</th>
                                                    <th>theme_color</th>
                                                    <th>enable_rp</th>
                                                    <th>rp_name</th>
                                                    <th>amount_for_unit_rp</th>
                                                    <th>min_order_total_for_rp</th>
                                                    <th>max_rp_per_order</th>
                                                    <th>redeem_amount_per_unit_rp</th>
                                                    <th>min_order_total_for_redeem</th>
                                                    <th>min_redeem_point</th>
                                                    <th>max_redeem_point</th>
                                                    <th>rp_expiry_period</th>
                                                    <th>rp_expiry_type</th>
                                                    <th>email_settings</th>
                                                    <th>sms_settings</th>
                                                    <th>custom_labels</th>
                                                    <th>common_settings</th>
                                                    <th>is_active</th>

                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php
                                                foreach (App::getDB()->query('SELECT *
                                                                                   FROM business            
                                                                                   ORDER BY business.id DESC') as $cash):

                                                    echo '<tr>
                                                <td title="ID">#' . $cash->id . '</td>
                                                <td title="name">' . $cash->name . '</td>
                                                <td title="start_date">' . $cash->start_date . '</td>
                                                <td title="tax_number_1">' . $cash->tax_number_1 . '</td>
                                                <td title="tax_label_1">' . $cash->tax_label_1 . '</td>
                                                <td title="tax_label_2">' . $cash->tax_label_2 . '</td>
                                                <td title="default_sales_tax">' . $cash->default_sales_tax . '</td>
                                                <td title="default_profit_percent">' . $cash->default_profit_percent . '</td>
                       
                                                <td title="time_zone">' . $cash->time_zone . '</td>
                                                <td title="fy_start_month">' . $cash->fy_start_month . '</td>
                                                <td title="accounting_method">' . $cash->accounting_method . '</td>
                                                <td title="default_sales_discount">' . $cash->default_sales_discount . '</td>
                                                <td title="sell_price_tax">' . $cash->sell_price_tax . '</td>
                                                <td title="logo">' . $cash->logo . '</td>
                                                <td title="sku_prefix">' . $cash->sku_prefix . '</td>
                                                <td title="enable_product_expiry">' . $cash->enable_product_expiry . '</td>
                                                <td title="expiry_type">' . $cash->expiry_type . '</td>
                       
                       
                       
                                                <td title="on_product_expiry">' . $cash->on_product_expiry . '</td>
                                                <td title="stop_selling_before">' . $cash->stop_selling_before . '</td>
                                                <td title="enable_tooltip">' . $cash->enable_tooltip . '</td>
                                                <td title="purchase_in_diff_currency">' . $cash->purchase_in_diff_currency . '</td>
                                                <td title="p_exchange_rate">' . $cash->p_exchange_rate . '</td>
                                                <td title="transaction_edit_days">' . $cash->transaction_edit_days . '</td>
                                                <td title="stock_expiry_alert_days">' . $cash->stock_expiry_alert_days . '</td>
                                                <td title="keyboard_shortcuts">' . $cash->keyboard_shortcuts . '</td>
                                                <td title="pos_settings">' . $cash->pos_settings . '</td>
                                                <td title="weighing_scale_setting">' . $cash->weighing_scale_setting . '</td>
                       
                       
                                                <td title="enable_brand">' . $cash->enable_brand . '</td>
                                                <td title="enable_category">' . $cash->enable_category . '</td>
                                                <td title="enable_sub_category">' . $cash->enable_sub_category . '</td>
                                                <td title="enable_price_tax">' . $cash->enable_price_tax . '</td>
                                                <td title="enable_purchase_status">' . $cash->enable_purchase_status . '</td>
                                                <td title="enable_lot_number">' . $cash->enable_lot_number . '</td>
                                                <td title="default_unit">' . $cash->default_unit . '</td>
                                                <td title="enable_sub_units">' . $cash->enable_sub_units . '</td>
                                                <td title="enable_racks">' . $cash->enable_racks . '</td>
                                                
                                                
                                                <td title="enable_row">' . $cash->enable_row . '</td>
                                                <td title="enable_position">' . $cash->enable_position . '</td>
                                                <td title="enable_editing_product_from_purchase">' . $cash->enable_editing_product_from_purchase . '</td>
                                                <td title="sales_cmsn_agnt">' . $cash->sales_cmsn_agnt . '</td>
                                                <td title="item_addition_method">' . $cash->item_addition_method . '</td>
                                                <td title="enable_inline_tax">' . $cash->enable_inline_tax . '</td>
                                                <td title="currency_symbol_placement">' . $cash->currency_symbol_placement . '</td>
                                                <td title="enabled_modules">' . $cash->enabled_modules . '</td>
                                                <td title="date_format">' . $cash->date_format . '</td>
                                                
                                                
                                                <td title="time_format">' . $cash->time_format . '</td>
                                                <td title="ref_no_prefixes">' . $cash->ref_no_prefixes . '</td>
                                                <td title="theme_color">' . $cash->theme_color . '</td>
                                                <td title="enable_rp">' . $cash->enable_rp . '</td>
                                                <td title="rp_name">' . $cash->rp_name . '</td>
                                                <td title="amount_for_unit_rp">' . $cash->amount_for_unit_rp . '</td>
                                                <td title="min_order_total_for_rp">' . $cash->min_order_total_for_rp . '</td>
                                                <td title="max_rp_per_order">' . $cash->max_rp_per_order . '</td>
                                                <td title="redeem_amount_per_unit_rp">' . $cash->redeem_amount_per_unit_rp . '</td>
                                                
                                                
                                                <td title="min_order_total_for_redeem">' . $cash->min_order_total_for_redeem . '</td>
                                                <td title="min_redeem_point">' . $cash->min_redeem_point . '</td>
                                                <td title="max_redeem_point">' . $cash->max_redeem_point . '</td>
                                                <td title="rp_expiry_period">' . $cash->rp_expiry_period . '</td>
                                                <td title="rp_expiry_type">' . $cash->rp_expiry_type . '</td>
                                                <td title="email_settings">' . $cash->email_settings . '</td>
                                                <td title="sms_settings">' . $cash->sms_settings . '</td>
                                                <td title="custom_labels">' . $cash->custom_labels . '</td>
                                                <td title="common_settings">' . $cash->common_settings . '</td>
                                                <td title="is_active">' . $cash->is_active . '</td>
                       
                                                <td title="created_at">' . $cash->created_at . '</td>
                                                <td title="updated_at">' . $cash->updated_at . '</td>
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
                        <?php
                    } else if ($_GET['id'] == '12') {
                        ?>
                        <div class="row">
                            <!-- Border Left Utilities -->
                            <div class="col-lg-12">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable_module" width="100%"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>user_type</th>
                                                    <th>surname</th>
                                                    <th>first_name</th>
                                                    <th>last_name</th>
                                                    <th>username</th>
                                                    <th>email</th>
                                                    <th>language</th>
                                                    <th>contact_no</th>
                                                    <th>address</th>
                                                    <th>status</th>
                                                    <th>gender</th>
                                                    <th>marital_status</th>
                                                    <th>contact_number</th>

                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>#id</th>
                                                    <th>user_type</th>
                                                    <th>surname</th>
                                                    <th>first_name</th>
                                                    <th>last_name</th>
                                                    <th>username</th>
                                                    <th>email</th>
                                                    <th>language</th>
                                                    <th>contact_no</th>
                                                    <th>address</th>
                                                    <th>status</th>
                                                    <th>gender</th>
                                                    <th>marital_status</th>
                                                    <th>contact_number</th>

                                                    <th>created_at</th>
                                                    <th>updated_at</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php
                                                foreach (App::getDB()->query('SELECT *
                                                                                   FROM users            
                                                                                   ORDER BY users.id DESC') as $cash):

                                                    echo '<tr>
                                                <td title="ID">#' . $cash->id . '</td>
                                                <td title="user_type">' . $cash->user_type . '</td>
                                                <td title="surname">' . $cash->surname . '</td>
                                               
                                                <td title="first_name">' . $cash->first_name . '</td>
                                                <td title="last_name">' . $cash->last_name . '</td>
                                                <td title="username">' . $cash->username . '</td>
                                                <td title="email">' . $cash->email . '</td>
                                                <td title="language">' . $cash->language . '</td>
                                                <td title="contact_no">' . $cash->contact_no . '</td>
                                                <td title="address">' . $cash->address . '</td>
                                                <td title="status">' . $cash->status . '</td>
                                                <td title="gender">' . $cash->gender . '</td>
                                                <td title="marital_status">' . $cash->marital_status . '</td>
                                                <td title="contact_number">' . $cash->contact_number . '</td>
                       
                                                <td title="created_at">' . $cash->created_at . '</td>
                                                <td title="updated_at">' . $cash->updated_at . '</td>
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
                        <?php
                    }else if ($_GET['id'] == '13') {
                        ?>
                        <div class="row">
                            <!-- Border Left Utilities -->
                            <div class="col-lg-12">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Factures</h6>
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
                                                                                   FROM v_factures            
                                                                                   ORDER BY v_factures.id DESC') as $cash):

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
                        <?php
                    } else{
                        ?>
                        <!-- Page Wrapper -->
                        <div id="wrapper">
                            <!-- Content Wrapper -->
                            <div id="content-wrapper" class="d-flex flex-column">

                                <!-- Main Content -->
                                <div id="content">

                                    <!-- Begin Page Content -->
                                    <div class="container-fluid">

                                        <!-- 404 Error Text -->
                                        <div class="text-center">
                                            <div class="error mx-auto" data-text="404">404</div>
                                            <p class="lead text-gray-800 mb-5">Page Not Found</p>
                                            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                                            <a href="index.php">&larr; Back to Home</a>
                                        </div>

                                    </div>
                                    <!-- /.container-fluid -->

                                </div>
                                <!-- End of Main Content -->

                            </div>
                            <!-- End of Content Wrapper -->

                        </div>
                        <!-- End of Page Wrapper -->
                        <?php
                    }
                } else{
                    ?>
                    <!-- Page Wrapper -->
                    <div id="wrapper">
                        <!-- Content Wrapper -->
                        <div id="content-wrapper" class="d-flex flex-column">

                            <!-- Main Content -->
                            <div id="content">

                                <!-- Begin Page Content -->
                                <div class="container-fluid">

                                    <!-- 404 Error Text -->
                                    <div class="text-center">
                                        <div class="error mx-auto" data-text="404">404</div>
                                        <p class="lead text-gray-800 mb-5">Page Not Found</p>
                                        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                                        <a href="index.php">&larr; Back to Home</a>
                                    </div>

                                </div>
                                <!-- /.container-fluid -->

                            </div>
                            <!-- End of Main Content -->

                        </div>
                        <!-- End of Content Wrapper -->

                    </div>
                    <!-- End of Page Wrapper -->
                    <?php
                }
                ?>
            </div>

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php require 'footer.php'; ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<?php require 'required_js.php'; ?>

</body>

</html>
