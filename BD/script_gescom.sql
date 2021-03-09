create table account_transactions
(
    id                      int unsigned auto_increment
        primary key,
    account_id              int                                                  not null,
    type                    enum ('debit', 'credit')                             not null,
    sub_type                enum ('opening_balance', 'fund_transfer', 'deposit') null,
    amount                  decimal(22, 4)                                       not null,
    reff_no                 varchar(191)                                         null,
    operation_date          datetime                                             not null,
    created_by              int                                                  not null,
    transaction_id          int                                                  null,
    transaction_payment_id  int                                                  null,
    transfer_transaction_id int                                                  null,
    note                    text                                                 null,
    deleted_at              timestamp                                            null,
    created_at              timestamp                                            null,
    updated_at              timestamp                                            null
)
    collate = utf8mb4_unicode_ci;

create index account_transactions_account_id_index
    on account_transactions (account_id);

create index account_transactions_created_by_index
    on account_transactions (created_by);

create index account_transactions_transaction_id_index
    on account_transactions (transaction_id);

create index account_transactions_transaction_payment_id_index
    on account_transactions (transaction_payment_id);

create index account_transactions_transfer_transaction_id_index
    on account_transactions (transfer_transaction_id);

create table account_types
(
    id                     int unsigned auto_increment
        primary key,
    name                   varchar(191) not null,
    parent_account_type_id int          null,
    business_id            int          not null,
    created_at             timestamp    null,
    updated_at             timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table accounts
(
    id              int unsigned auto_increment
        primary key,
    business_id     int                  not null,
    name            varchar(191)         not null,
    account_number  varchar(191)         not null,
    account_type_id int                  null,
    note            text                 null,
    created_by      int                  not null,
    is_closed       tinyint(1) default 0 not null,
    deleted_at      timestamp            null,
    created_at      timestamp            null,
    updated_at      timestamp            null
)
    collate = utf8mb4_unicode_ci;

create table activity_log
(
    id           int unsigned auto_increment
        primary key,
    log_name     varchar(191) null,
    description  text         not null,
    subject_id   int          null,
    subject_type varchar(191) null,
    causer_id    int          null,
    causer_type  varchar(191) null,
    properties   text         null,
    created_at   timestamp    null,
    updated_at   timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index activity_log_log_name_index
    on activity_log (log_name);

create table categorizables
(
    category_id        int             not null,
    categorizable_type varchar(191)    not null,
    categorizable_id   bigint unsigned not null
)
    collate = utf8mb4_unicode_ci;

create index categorizables_categorizable_type_categorizable_id_index
    on categorizables (categorizable_type, categorizable_id);

create table currencies
(
    id                 int unsigned auto_increment
        primary key,
    country            varchar(100) not null,
    currency           varchar(100) not null,
    code               varchar(25)  not null,
    symbol             varchar(25)  not null,
    thousand_separator varchar(10)  not null,
    decimal_separator  varchar(10)  not null,
    created_at         timestamp    null,
    updated_at         timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table discounts
(
    id                int unsigned auto_increment
        primary key,
    name              varchar(191)                  not null,
    business_id       int                           not null,
    brand_id          int                           null,
    category_id       int                           null,
    location_id       int                           null,
    priority          int                           null,
    discount_type     varchar(191)                  null,
    discount_amount   decimal(22, 4) default 0.0000 not null,
    starts_at         datetime                      null,
    ends_at           datetime                      null,
    is_active         tinyint(1)     default 1      not null,
    applicable_in_spg tinyint(1)     default 0      null,
    applicable_in_cg  tinyint(1)     default 0      null,
    created_at        timestamp                     null,
    updated_at        timestamp                     null
)
    collate = utf8mb4_unicode_ci;

create index discounts_brand_id_index
    on discounts (brand_id);

create index discounts_business_id_index
    on discounts (business_id);

create index discounts_category_id_index
    on discounts (category_id);

create index discounts_location_id_index
    on discounts (location_id);

create index discounts_priority_index
    on discounts (priority);

create table document_and_notes
(
    id           int unsigned auto_increment
        primary key,
    business_id  int                  not null,
    notable_id   int                  not null,
    notable_type varchar(191)         not null,
    heading      text                 null,
    description  text                 null,
    is_private   tinyint(1) default 0 not null,
    created_by   int                  not null,
    created_at   timestamp            null,
    updated_at   timestamp            null
)
    collate = utf8mb4_unicode_ci;

create index document_and_notes_business_id_index
    on document_and_notes (business_id);

create index document_and_notes_created_by_index
    on document_and_notes (created_by);

create index document_and_notes_notable_id_index
    on document_and_notes (notable_id);

create table media
(
    id          int unsigned auto_increment
        primary key,
    business_id int             not null,
    file_name   varchar(191)    not null,
    description text            null,
    uploaded_by int             null,
    model_type  varchar(191)    not null,
    model_id    bigint unsigned not null,
    created_at  timestamp       null,
    updated_at  timestamp       null
)
    collate = utf8mb4_unicode_ci;

create index media_model_type_model_id_index
    on media (model_type, model_id);

create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(191) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci;

create table notification_templates
(
    id            int unsigned auto_increment
        primary key,
    business_id   int                  not null,
    template_for  varchar(191)         not null,
    email_body    text                 null,
    sms_body      text                 null,
    subject       varchar(191)         null,
    cc            varchar(191)         null,
    bcc           varchar(191)         null,
    auto_send     tinyint(1) default 0 not null,
    auto_send_sms tinyint(1) default 0 not null,
    created_at    timestamp            null,
    updated_at    timestamp            null
)
    collate = utf8mb4_unicode_ci;

create table notifications
(
    id              char(36)        not null
        primary key,
    type            varchar(191)    not null,
    notifiable_type varchar(191)    not null,
    notifiable_id   bigint unsigned not null,
    data            text            not null,
    read_at         timestamp       null,
    created_at      timestamp       null,
    updated_at      timestamp       null
)
    collate = utf8mb4_unicode_ci;

create index notifications_notifiable_type_notifiable_id_index
    on notifications (notifiable_type, notifiable_id);

create table oauth_access_tokens
(
    id         varchar(100) not null
        primary key,
    user_id    bigint       null,
    client_id  int unsigned not null,
    name       varchar(191) null,
    scopes     text         null,
    revoked    tinyint(1)   not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    expires_at datetime     null
)
    collate = utf8mb4_unicode_ci;

create index oauth_access_tokens_user_id_index
    on oauth_access_tokens (user_id);

create table oauth_auth_codes
(
    id         varchar(100) not null
        primary key,
    user_id    bigint       not null,
    client_id  int unsigned not null,
    scopes     text         null,
    revoked    tinyint(1)   not null,
    expires_at datetime     null
)
    collate = utf8mb4_unicode_ci;

create table oauth_clients
(
    id                     int unsigned auto_increment
        primary key,
    user_id                bigint       null,
    name                   varchar(191) not null,
    secret                 varchar(100) not null,
    redirect               text         not null,
    personal_access_client tinyint(1)   not null,
    password_client        tinyint(1)   not null,
    revoked                tinyint(1)   not null,
    created_at             timestamp    null,
    updated_at             timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index oauth_clients_user_id_index
    on oauth_clients (user_id);

create table oauth_personal_access_clients
(
    id         int unsigned auto_increment
        primary key,
    client_id  int unsigned not null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index oauth_personal_access_clients_client_id_index
    on oauth_personal_access_clients (client_id);

create table oauth_refresh_tokens
(
    id              varchar(100) not null
        primary key,
    access_token_id varchar(100) not null,
    revoked         tinyint(1)   not null,
    expires_at      datetime     null
)
    collate = utf8mb4_unicode_ci;

create index oauth_refresh_tokens_access_token_id_index
    on oauth_refresh_tokens (access_token_id);

create table packages
(
    id                 int unsigned auto_increment
        primary key,
    name               varchar(191)                     not null,
    description        text                             not null,
    location_count     int                              not null comment 'No. of Business Locations, 0 = infinite option.',
    user_count         int                              not null,
    product_count      int                              not null,
    bookings           tinyint(1) default 0             not null comment 'Enable/Disable bookings',
    kitchen            tinyint(1) default 0             not null comment 'Enable/Disable kitchen',
    order_screen       tinyint(1) default 0             not null comment 'Enable/Disable order_screen',
    tables             tinyint(1) default 0             not null comment 'Enable/Disable tables',
    invoice_count      int                              not null,
    `interval`         enum ('days', 'months', 'years') not null,
    interval_count     int                              not null,
    trial_days         int                              not null,
    price              decimal(22, 4)                   not null,
    custom_permissions longtext                         not null,
    created_by         int                              not null,
    sort_order         int        default 0             not null,
    is_active          tinyint(1)                       not null,
    is_private         tinyint(1) default 0             not null,
    is_one_time        tinyint(1) default 0             not null,
    enable_custom_link tinyint(1) default 0             not null,
    custom_link        varchar(191)                     null,
    custom_link_text   varchar(191)                     null,
    deleted_at         timestamp                        null,
    created_at         timestamp                        null,
    updated_at         timestamp                        null
)
    collate = utf8mb4_unicode_ci;

create table password_resets
(
    email      varchar(191) not null,
    token      varchar(191) not null,
    created_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index password_resets_email_index
    on password_resets (email);

create table permissions
(
    id         int unsigned auto_increment
        primary key,
    name       varchar(191) not null,
    guard_name varchar(191) not null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table model_has_permissions
(
    permission_id int unsigned    not null,
    model_type    varchar(191)    not null,
    model_id      bigint unsigned not null,
    primary key (permission_id, model_id, model_type),
    constraint model_has_permissions_permission_id_foreign
        foreign key (permission_id) references permissions (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create index model_has_permissions_model_type_model_id_index
    on model_has_permissions (model_type, model_id);

create table product_locations
(
    product_id  int not null,
    location_id int not null
)
    collate = utf8mb4_unicode_ci;

create index product_locations_location_id_index
    on product_locations (location_id);

create index product_locations_product_id_index
    on product_locations (product_id);

create table product_racks
(
    id          int unsigned auto_increment
        primary key,
    business_id int unsigned not null,
    location_id int unsigned not null,
    product_id  int unsigned not null,
    rack        varchar(191) null,
    row         varchar(191) null,
    position    varchar(191) null,
    created_at  timestamp    null,
    updated_at  timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table product_variations
(
    id                    int unsigned auto_increment
        primary key,
    variation_template_id int                  null,
    name                  varchar(191)         not null,
    product_id            int unsigned         not null,
    is_dummy              tinyint(1) default 1 not null,
    created_at            timestamp            null,
    updated_at            timestamp            null
)
    collate = utf8mb4_unicode_ci;

create index product_variations_name_index
    on product_variations (name);

create index product_variations_product_id_index
    on product_variations (product_id);

create table purchase_lines
(
    id                     int unsigned auto_increment
        primary key,
    transaction_id         int unsigned                  not null,
    product_id             int unsigned                  not null,
    variation_id           int unsigned                  not null,
    quantity               decimal(22, 4) default 0.0000 not null,
    pp_without_discount    decimal(22, 4) default 0.0000 not null comment 'Purchase price before inline discounts',
    discount_percent       decimal(5, 2)  default 0.00   not null comment 'Inline discount percentage',
    purchase_price         decimal(22, 4)                not null,
    purchase_price_inc_tax decimal(22, 4) default 0.0000 not null,
    item_tax               decimal(22, 4)                not null comment 'Tax for one quantity',
    tax_id                 int unsigned                  null,
    quantity_sold          decimal(22, 4) default 0.0000 not null comment 'Quanity sold from this purchase line',
    quantity_adjusted      decimal(22, 4) default 0.0000 not null comment 'Quanity adjusted in stock adjustment from this purchase line',
    quantity_returned      decimal(22, 4) default 0.0000 not null,
    mfg_quantity_used      decimal(22, 4) default 0.0000 not null,
    mfg_date               date                          null,
    exp_date               date                          null,
    lot_number             varchar(191)                  null,
    sub_unit_id            int                           null,
    created_at             timestamp                     null,
    updated_at             timestamp                     null
)
    collate = utf8mb4_unicode_ci;

create index purchase_lines_lot_number_index
    on purchase_lines (lot_number);

create index purchase_lines_product_id_foreign
    on purchase_lines (product_id);

create index purchase_lines_sub_unit_id_index
    on purchase_lines (sub_unit_id);

create index purchase_lines_tax_id_foreign
    on purchase_lines (tax_id);

create index purchase_lines_transaction_id_foreign
    on purchase_lines (transaction_id);

create index purchase_lines_variation_id_foreign
    on purchase_lines (variation_id);

create table reference_counts
(
    id          int unsigned auto_increment
        primary key,
    ref_type    varchar(191) not null,
    ref_count   int          not null,
    business_id int          not null,
    created_at  timestamp    null,
    updated_at  timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table res_product_modifier_sets
(
    modifier_set_id int unsigned not null,
    product_id      int unsigned not null comment 'Table use to store the modifier sets applicable for a product'
)
    collate = utf8mb4_unicode_ci;

create index res_product_modifier_sets_modifier_set_id_foreign
    on res_product_modifier_sets (modifier_set_id);

create table res_tables
(
    id          int unsigned auto_increment
        primary key,
    business_id int unsigned not null,
    location_id int unsigned not null,
    name        varchar(191) not null,
    description text         null,
    created_by  int unsigned not null,
    deleted_at  timestamp    null,
    created_at  timestamp    null,
    updated_at  timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index res_tables_business_id_foreign
    on res_tables (business_id);

create table role_has_permissions
(
    permission_id int unsigned not null,
    role_id       int unsigned not null,
    primary key (permission_id, role_id)
)
    collate = utf8mb4_unicode_ci;

create index role_has_permissions_role_id_foreign
    on role_has_permissions (role_id);

create table roles
(
    id               int unsigned auto_increment
        primary key,
    name             varchar(191)         not null,
    guard_name       varchar(191)         not null,
    business_id      int unsigned         not null,
    is_default       tinyint(1) default 0 not null,
    is_service_staff tinyint(1) default 0 not null,
    created_at       timestamp            null,
    updated_at       timestamp            null
)
    collate = utf8mb4_unicode_ci;

create table model_has_roles
(
    role_id    int unsigned    not null,
    model_type varchar(191)    not null,
    model_id   bigint unsigned not null,
    primary key (role_id, model_id, model_type),
    constraint model_has_roles_role_id_foreign
        foreign key (role_id) references roles (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create index model_has_roles_model_type_model_id_index
    on model_has_roles (model_type, model_id);

create index roles_business_id_foreign
    on roles (business_id);

create table sell_line_warranties
(
    sell_line_id int not null,
    warranty_id  int not null
)
    collate = utf8mb4_unicode_ci;

create table selling_price_groups
(
    id          int unsigned auto_increment
        primary key,
    name        varchar(191)         not null,
    description text                 null,
    business_id int unsigned         not null,
    is_active   tinyint(1) default 1 not null,
    deleted_at  timestamp            null,
    created_at  timestamp            null,
    updated_at  timestamp            null
)
    collate = utf8mb4_unicode_ci;

create index selling_price_groups_business_id_foreign
    on selling_price_groups (business_id);

create table sessions
(
    id            varchar(191) not null,
    user_id       int unsigned null,
    ip_address    varchar(45)  null,
    user_agent    text         null,
    payload       text         not null,
    last_activity int          not null,
    constraint sessions_id_unique
        unique (id)
)
    collate = utf8mb4_unicode_ci;

create table stock_adjustment_lines
(
    id                    int unsigned auto_increment
        primary key,
    transaction_id        int unsigned   not null,
    product_id            int unsigned   not null,
    variation_id          int unsigned   not null,
    quantity              decimal(22, 4) not null,
    unit_price            decimal(22, 4) null comment 'Last purchase unit price',
    removed_purchase_line int            null,
    lot_no_line_id        int            null,
    created_at            timestamp      null,
    updated_at            timestamp      null
)
    collate = utf8mb4_unicode_ci;

create index stock_adjustment_lines_product_id_foreign
    on stock_adjustment_lines (product_id);

create index stock_adjustment_lines_transaction_id_index
    on stock_adjustment_lines (transaction_id);

create index stock_adjustment_lines_variation_id_foreign
    on stock_adjustment_lines (variation_id);

create table stock_adjustments_temp
(
    id int null
)
    charset = latin1;

create table subscriptions
(
    id                     int unsigned auto_increment
        primary key,
    business_id            int unsigned                                               not null,
    package_id             int unsigned                                               not null,
    start_date             date                                                       null,
    trial_end_date         date                                                       null,
    end_date               date                                                       null,
    package_price          decimal(22, 4)                                             not null,
    package_details        longtext                                                   not null,
    created_id             int unsigned                                               not null,
    paid_via               varchar(191)                                               null,
    payment_transaction_id varchar(191)                                               null,
    status                 enum ('approved', 'waiting', 'declined') default 'waiting' not null,
    deleted_at             timestamp                                                  null,
    created_at             timestamp                                                  null,
    updated_at             timestamp                                                  null
)
    collate = utf8mb4_unicode_ci;

create index subscriptions_business_id_foreign
    on subscriptions (business_id);

create index subscriptions_created_id_index
    on subscriptions (created_id);

create index subscriptions_package_id_index
    on subscriptions (package_id);

create table superadmin_communicator_logs
(
    id           int unsigned auto_increment
        primary key,
    business_ids text         null,
    subject      varchar(191) null,
    message      text         null,
    created_at   timestamp    null,
    updated_at   timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table superadmin_frontend_pages
(
    id         int unsigned auto_increment
        primary key,
    title      varchar(191)  null,
    slug       varchar(191)  not null,
    content    longtext      not null,
    is_shown   tinyint(1)    not null,
    menu_order int default 0 null,
    created_at timestamp     null,
    updated_at timestamp     null
)
    collate = utf8mb4_unicode_ci;

create table `system`
(
    id    int unsigned auto_increment
        primary key,
    `key` varchar(191) not null,
    value text         null
)
    collate = utf8mb4_unicode_ci;

create table tax_rates
(
    id           int unsigned auto_increment
        primary key,
    business_id  int unsigned         not null,
    name         varchar(191)         not null,
    amount       double(22, 4)        not null,
    is_tax_group tinyint(1) default 0 not null,
    created_by   int unsigned         not null,
    deleted_at   timestamp            null,
    created_at   timestamp            null,
    updated_at   timestamp            null
)
    collate = utf8mb4_unicode_ci;

create table group_sub_taxes
(
    group_tax_id int unsigned not null,
    tax_id       int unsigned not null,
    constraint group_sub_taxes_group_tax_id_foreign
        foreign key (group_tax_id) references tax_rates (id)
            on delete cascade,
    constraint group_sub_taxes_tax_id_foreign
        foreign key (tax_id) references tax_rates (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create index tax_rates_business_id_foreign
    on tax_rates (business_id);

create index tax_rates_created_by_foreign
    on tax_rates (created_by);

create table transaction_payments
(
    id                      int unsigned auto_increment
        primary key,
    transaction_id          int(11) unsigned              null,
    business_id             int                           null,
    is_return               tinyint(1)     default 0      not null comment 'Used during sales to return the change',
    amount                  decimal(22, 4) default 0.0000 not null,
    method                  varchar(191)                  null,
    transaction_no          varchar(191)                  null,
    card_transaction_number varchar(191)                  null,
    card_number             varchar(191)                  null,
    card_type               varchar(191)                  null,
    card_holder_name        varchar(191)                  null,
    card_month              varchar(191)                  null,
    card_year               varchar(191)                  null,
    card_security           varchar(5)                    null,
    cheque_number           varchar(191)                  null,
    bank_account_number     varchar(191)                  null,
    paid_on                 datetime                      null,
    created_by              int                           not null,
    is_advance              tinyint(1)     default 0      not null,
    payment_for             int                           null,
    parent_id               int                           null,
    note                    varchar(191)                  null,
    document                varchar(191)                  null,
    payment_ref_no          varchar(191)                  null,
    account_id              int                           null,
    created_at              timestamp                     null,
    updated_at              timestamp                     null
)
    collate = utf8mb4_unicode_ci;

create index transaction_payments_created_by_index
    on transaction_payments (created_by);

create index transaction_payments_parent_id_index
    on transaction_payments (parent_id);

create index transaction_payments_transaction_id_foreign
    on transaction_payments (transaction_id);

create table transaction_sell_lines
(
    id                         int unsigned auto_increment
        primary key,
    transaction_id             int unsigned                  not null,
    product_id                 int unsigned                  not null,
    variation_id               int unsigned                  not null,
    quantity                   decimal(22, 4) default 0.0000 not null,
    quantity_returned          decimal(20, 4) default 0.0000 not null,
    unit_price_before_discount decimal(22, 4) default 0.0000 not null,
    unit_price                 decimal(22, 4)                null comment 'Sell price excluding tax',
    line_discount_type         enum ('fixed', 'percentage')  null,
    line_discount_amount       decimal(22, 4) default 0.0000 not null,
    unit_price_inc_tax         decimal(22, 4)                null comment 'Sell price including tax',
    item_tax                   decimal(22, 4)                not null comment 'Tax for one quantity',
    tax_id                     int unsigned                  null,
    discount_id                int                           null,
    lot_no_line_id             int                           null,
    sell_line_note             text                          null,
    res_service_staff_id       int                           null,
    res_line_order_status      varchar(191)                  null,
    parent_sell_line_id        int                           null,
    children_type              varchar(191)   default ''     not null comment 'Type of children for the parent, like modifier or combo',
    sub_unit_id                int                           null,
    created_at                 timestamp                     null,
    updated_at                 timestamp                     null
)
    collate = utf8mb4_unicode_ci;

create index transaction_sell_lines_children_type_index
    on transaction_sell_lines (children_type);

create index transaction_sell_lines_parent_sell_line_id_index
    on transaction_sell_lines (parent_sell_line_id);

create index transaction_sell_lines_product_id_foreign
    on transaction_sell_lines (product_id);

create index transaction_sell_lines_tax_id_foreign
    on transaction_sell_lines (tax_id);

create index transaction_sell_lines_transaction_id_foreign
    on transaction_sell_lines (transaction_id);

create index transaction_sell_lines_variation_id_foreign
    on transaction_sell_lines (variation_id);

create table transaction_sell_lines_purchase_lines
(
    id                       int unsigned auto_increment
        primary key,
    sell_line_id             int unsigned                  null comment 'id from transaction_sell_lines',
    stock_adjustment_line_id int unsigned                  null comment 'id from stock_adjustment_lines',
    purchase_line_id         int unsigned                  not null comment 'id from purchase_lines',
    quantity                 decimal(22, 4)                not null,
    qty_returned             decimal(22, 4) default 0.0000 not null,
    created_at               timestamp                     null,
    updated_at               timestamp                     null
)
    collate = utf8mb4_unicode_ci;

create index purchase_line_id
    on transaction_sell_lines_purchase_lines (purchase_line_id);

create index sell_line_id
    on transaction_sell_lines_purchase_lines (sell_line_id);

create index stock_adjustment_line_id
    on transaction_sell_lines_purchase_lines (stock_adjustment_line_id);

create table transactions
(
    id                       int unsigned auto_increment
        primary key,
    business_id              int unsigned                          not null,
    location_id              int unsigned                          null,
    res_table_id             int unsigned                          null comment 'fields to restaurant module',
    res_waiter_id            int unsigned                          null comment 'fields to restaurant module',
    res_order_status         enum ('received', 'cooked', 'served') null,
    type                     varchar(191)                          null,
    sub_type                 varchar(20)                           null,
    status                   varchar(191)                          not null,
    is_quotation             tinyint(1)     default 0              not null,
    payment_status           enum ('paid', 'due', 'partial')       null,
    adjustment_type          enum ('normal', 'abnormal')           null,
    contact_id               int(11) unsigned                      null,
    customer_group_id        int                                   null comment 'used to add customer group while selling',
    invoice_no               varchar(191)                          null,
    ref_no                   varchar(191)                          null,
    subscription_no          varchar(191)                          null,
    subscription_repeat_on   varchar(191)                          null,
    transaction_date         datetime                              not null,
    total_before_tax         decimal(22, 4) default 0.0000         not null comment 'Total before the purchase/invoice tax, this includeds the indivisual product tax',
    tax_id                   int unsigned                          null,
    tax_amount               decimal(22, 4) default 0.0000         not null,
    discount_type            enum ('fixed', 'percentage')          null,
    discount_amount          decimal(22, 4) default 0.0000         null,
    rp_redeemed              int            default 0              not null comment 'rp is the short form of reward points',
    rp_redeemed_amount       decimal(22, 4) default 0.0000         not null comment 'rp is the short form of reward points',
    shipping_details         varchar(191)                          null,
    shipping_address         text                                  null,
    shipping_status          varchar(191)                          null,
    delivered_to             varchar(191)                          null,
    shipping_charges         decimal(22, 4) default 0.0000         not null,
    additional_notes         text                                  null,
    staff_note               text                                  null,
    round_off_amount         decimal(22, 4) default 0.0000         not null comment 'Difference of rounded total and actual total',
    final_total              decimal(22, 4) default 0.0000         not null,
    expense_category_id      int unsigned                          null,
    expense_for              int unsigned                          null,
    commission_agent         int                                   null,
    document                 varchar(191)                          null,
    is_direct_sale           tinyint(1)     default 0              not null,
    is_suspend               tinyint(1)     default 0              not null,
    exchange_rate            decimal(20, 3) default 1.000          not null,
    total_amount_recovered   decimal(22, 4)                        null comment 'Used for stock adjustment.',
    transfer_parent_id       int                                   null,
    return_parent_id         int                                   null,
    opening_stock_product_id int                                   null,
    created_by               int unsigned                          not null,
    import_batch             int                                   null,
    import_time              datetime                              null,
    types_of_service_id      int                                   null,
    packing_charge           decimal(22, 4)                        null,
    packing_charge_type      enum ('fixed', 'percent')             null,
    service_custom_field_1   text                                  null,
    service_custom_field_2   text                                  null,
    service_custom_field_3   text                                  null,
    service_custom_field_4   text                                  null,
    is_created_from_api      tinyint(1)     default 0              not null,
    rp_earned                int            default 0              not null comment 'rp is the short form of reward points',
    order_addresses          text                                  null,
    is_recurring             tinyint(1)     default 0              not null,
    recur_interval           double(22, 4)                         null,
    recur_interval_type      enum ('days', 'months', 'years')      null,
    recur_repetitions        int                                   null,
    recur_stopped_on         datetime                              null,
    recur_parent_id          int                                   null,
    invoice_token            varchar(191)                          null,
    pay_term_number          int                                   null,
    pay_term_type            enum ('days', 'months')               null,
    selling_price_group_id   int                                   null,
    created_at               timestamp                             null,
    updated_at               timestamp                             null
)
    collate = utf8mb4_unicode_ci;

create index transactions_business_id_index
    on transactions (business_id);

create index transactions_contact_id_index
    on transactions (contact_id);

create index transactions_created_by_index
    on transactions (created_by);

create index transactions_expense_category_id_index
    on transactions (expense_category_id);

create index transactions_expense_for_foreign
    on transactions (expense_for);

create index transactions_location_id_index
    on transactions (location_id);

create index transactions_return_parent_id_index
    on transactions (return_parent_id);

create index transactions_sub_type_index
    on transactions (sub_type);

create index transactions_tax_id_foreign
    on transactions (tax_id);

create index transactions_transaction_date_index
    on transactions (transaction_date);

create index transactions_type_index
    on transactions (type);

create index type
    on transactions (type);

create table types_of_services
(
    id                   int unsigned auto_increment
        primary key,
    name                 varchar(191)              not null,
    description          text                      null,
    business_id          int                       not null,
    location_price_group text                      null,
    packing_charge       decimal(22, 4)            null,
    packing_charge_type  enum ('fixed', 'percent') null,
    enable_custom_fields tinyint(1) default 0      not null,
    created_at           timestamp                 null,
    updated_at           timestamp                 null
)
    collate = utf8mb4_unicode_ci;

create index types_of_services_business_id_index
    on types_of_services (business_id);

create table units
(
    id                   int unsigned auto_increment
        primary key,
    business_id          int unsigned   not null,
    actual_name          varchar(191)   not null,
    short_name           varchar(191)   null,
    allow_decimal        tinyint(1)     not null,
    base_unit_id         int            null,
    base_unit_multiplier decimal(20, 4) null,
    created_by           int unsigned   not null,
    deleted_at           timestamp      null,
    created_at           timestamp      null,
    updated_at           timestamp      null
)
    collate = utf8mb4_unicode_ci;

create index units_base_unit_id_index
    on units (base_unit_id);

create index units_business_id_foreign
    on units (business_id);

create index units_created_by_foreign
    on units (created_by);

create table user_contact_access
(
    id         int unsigned auto_increment
        primary key,
    user_id    int not null,
    contact_id int not null
)
    collate = utf8mb4_unicode_ci;

create table users
(
    id                         int unsigned auto_increment
        primary key,
    user_type                  varchar(191)                              default 'user'   not null,
    surname                    char(10)                                                   null,
    first_name                 varchar(191)                                               not null,
    last_name                  varchar(191)                                               null,
    username                   varchar(191)                                               null,
    email                      varchar(191)                                               null,
    password                   varchar(191)                                               null,
    language                   char(7)                                   default 'en'     not null,
    contact_no                 char(15)                                                   null,
    address                    text                                                       null,
    remember_token             varchar(100)                                               null,
    business_id                int unsigned                                               null,
    max_sales_discount_percent decimal(5, 2)                                              null,
    allow_login                tinyint(1)                                default 1        not null,
    status                     enum ('active', 'inactive', 'terminated') default 'active' not null,
    is_cmmsn_agnt              tinyint(1)                                default 0        not null,
    cmmsn_percent              decimal(4, 2)                             default 0.00     not null,
    selected_contacts          tinyint(1)                                default 0        not null,
    dob                        date                                                       null,
    gender                     varchar(191)                                               null,
    marital_status             enum ('married', 'unmarried', 'divorced')                  null,
    blood_group                char(10)                                                   null,
    contact_number             char(20)                                                   null,
    fb_link                    varchar(191)                                               null,
    twitter_link               varchar(191)                                               null,
    social_media_1             varchar(191)                                               null,
    social_media_2             varchar(191)                                               null,
    permanent_address          text                                                       null,
    current_address            text                                                       null,
    guardian_name              varchar(191)                                               null,
    custom_field_1             varchar(191)                                               null,
    custom_field_2             varchar(191)                                               null,
    custom_field_3             varchar(191)                                               null,
    custom_field_4             varchar(191)                                               null,
    bank_details               longtext                                                   null,
    id_proof_name              varchar(191)                                               null,
    id_proof_number            varchar(191)                                               null,
    deleted_at                 timestamp                                                  null,
    created_at                 timestamp                                                  null,
    updated_at                 timestamp                                                  null,
    constraint users_username_unique
        unique (username)
)
    collate = utf8mb4_unicode_ci;

create table business
(
    id                                   int unsigned auto_increment
        primary key,
    name                                 varchar(191)                                                                not null,
    currency_id                          int unsigned                                                                not null,
    start_date                           date                                                                        null,
    tax_number_1                         varchar(100)                                                                null,
    tax_label_1                          varchar(10)                                                                 null,
    tax_number_2                         varchar(100)                                                                null,
    tax_label_2                          varchar(10)                                                                 null,
    default_sales_tax                    int unsigned                                                                null,
    default_profit_percent               double(5, 2)                                         default 0.00           not null,
    owner_id                             int unsigned                                                                not null,
    time_zone                            varchar(191)                                         default 'Asia/Kolkata' not null,
    fy_start_month                       tinyint                                              default 1              not null,
    accounting_method                    enum ('fifo', 'lifo', 'avco')                        default 'fifo'         not null,
    default_sales_discount               decimal(5, 2)                                                               null,
    sell_price_tax                       enum ('includes', 'excludes')                        default 'includes'     not null,
    logo                                 varchar(191)                                                                null,
    sku_prefix                           varchar(191)                                                                null,
    enable_product_expiry                tinyint(1)                                           default 0              not null,
    expiry_type                          enum ('add_expiry', 'add_manufacturing')             default 'add_expiry'   not null,
    on_product_expiry                    enum ('keep_selling', 'stop_selling', 'auto_delete') default 'keep_selling' not null,
    stop_selling_before                  int                                                                         not null comment 'Stop selling expied item n days before expiry',
    enable_tooltip                       tinyint(1)                                           default 1              not null,
    purchase_in_diff_currency            tinyint(1)                                           default 0              not null comment 'Allow purchase to be in different currency then the business currency',
    purchase_currency_id                 int unsigned                                                                null,
    p_exchange_rate                      decimal(20, 3)                                       default 1.000          not null,
    transaction_edit_days                int unsigned                                         default 30             not null,
    stock_expiry_alert_days              int unsigned                                         default 30             not null,
    keyboard_shortcuts                   text                                                                        null,
    pos_settings                         text                                                                        null,
    weighing_scale_setting               text                                                                        not null comment 'used to store the configuration of weighing scale',
    enable_brand                         tinyint(1)                                           default 1              not null,
    enable_category                      tinyint(1)                                           default 1              not null,
    enable_sub_category                  tinyint(1)                                           default 1              not null,
    enable_price_tax                     tinyint(1)                                           default 1              not null,
    enable_purchase_status               tinyint(1)                                           default 1              null,
    enable_lot_number                    tinyint(1)                                           default 0              not null,
    default_unit                         int                                                                         null,
    enable_sub_units                     tinyint(1)                                           default 0              not null,
    enable_racks                         tinyint(1)                                           default 0              not null,
    enable_row                           tinyint(1)                                           default 0              not null,
    enable_position                      tinyint(1)                                           default 0              not null,
    enable_editing_product_from_purchase tinyint(1)                                           default 1              not null,
    sales_cmsn_agnt                      enum ('logged_in_user', 'user', 'cmsn_agnt')                                null,
    item_addition_method                 tinyint(1)                                           default 1              not null,
    enable_inline_tax                    tinyint(1)                                           default 1              not null,
    currency_symbol_placement            enum ('before', 'after')                             default 'before'       not null,
    enabled_modules                      text                                                                        null,
    date_format                          varchar(191)                                         default 'm/d/Y'        not null,
    time_format                          enum ('12', '24')                                    default '24'           not null,
    ref_no_prefixes                      text                                                                        null,
    theme_color                          char(20)                                                                    null,
    created_by                           int                                                                         null,
    enable_rp                            tinyint(1)                                           default 0              not null comment 'rp is the short form of reward points',
    rp_name                              varchar(191)                                                                null comment 'rp is the short form of reward points',
    amount_for_unit_rp                   decimal(22, 4)                                       default 1.0000         not null comment 'rp is the short form of reward points',
    min_order_total_for_rp               decimal(22, 4)                                       default 1.0000         not null comment 'rp is the short form of reward points',
    max_rp_per_order                     int                                                                         null comment 'rp is the short form of reward points',
    redeem_amount_per_unit_rp            decimal(22, 4)                                       default 1.0000         not null comment 'rp is the short form of reward points',
    min_order_total_for_redeem           decimal(22, 4)                                       default 1.0000         not null comment 'rp is the short form of reward points',
    min_redeem_point                     int                                                                         null comment 'rp is the short form of reward points',
    max_redeem_point                     int                                                                         null comment 'rp is the short form of reward points',
    rp_expiry_period                     int                                                                         null comment 'rp is the short form of reward points',
    rp_expiry_type                       enum ('month', 'year')                               default 'year'         not null comment 'rp is the short form of reward points',
    email_settings                       text                                                                        null,
    sms_settings                         text                                                                        null,
    custom_labels                        text                                                                        null,
    common_settings                      text                                                                        null,
    is_active                            tinyint(1)                                           default 1              not null,
    created_at                           timestamp                                                                   null,
    updated_at                           timestamp                                                                   null,
    constraint business_currency_id_foreign
        foreign key (currency_id) references currencies (id),
    constraint business_default_sales_tax_foreign
        foreign key (default_sales_tax) references tax_rates (id),
    constraint business_owner_id_foreign
        foreign key (owner_id) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table barcodes
(
    id                    int unsigned auto_increment
        primary key,
    name                  varchar(191)         not null,
    description           text                 null,
    width                 double(22, 4)        null,
    height                double(22, 4)        null,
    paper_width           double(22, 4)        null,
    paper_height          double(22, 4)        null,
    top_margin            double(22, 4)        null,
    left_margin           double(22, 4)        null,
    row_distance          double(22, 4)        null,
    col_distance          double(22, 4)        null,
    stickers_in_one_row   int                  null,
    is_default            tinyint(1) default 0 not null,
    is_continuous         tinyint(1) default 0 not null,
    stickers_in_one_sheet int                  null,
    business_id           int unsigned         null,
    created_at            timestamp            null,
    updated_at            timestamp            null,
    constraint barcodes_business_id_foreign
        foreign key (business_id) references business (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table brands
(
    id          int unsigned auto_increment
        primary key,
    business_id int unsigned not null,
    name        varchar(191) not null,
    description text         null,
    created_by  int unsigned not null,
    deleted_at  timestamp    null,
    created_at  timestamp    null,
    updated_at  timestamp    null,
    constraint brands_business_id_foreign
        foreign key (business_id) references business (id)
            on delete cascade,
    constraint brands_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table cash_registers
(
    id               int unsigned auto_increment
        primary key,
    business_id      int unsigned                          not null,
    location_id      int                                   null,
    user_id          int unsigned                          null,
    status           enum ('close', 'open') default 'open' not null,
    closed_at        datetime                              null,
    closing_amount   decimal(22, 4)         default 0.0000 not null,
    total_card_slips int                    default 0      not null,
    total_cheques    int                    default 0      not null,
    closing_note     text                                  null,
    created_at       timestamp                             null,
    updated_at       timestamp                             null,
    constraint cash_registers_business_id_foreign
        foreign key (business_id) references business (id)
            on delete cascade,
    constraint cash_registers_user_id_foreign
        foreign key (user_id) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table cash_register_transactions
(
    id               int unsigned auto_increment
        primary key,
    cash_register_id int unsigned                                   not null,
    amount           decimal(22, 4) default 0.0000                  not null,
    pay_method       varchar(191)                                   null,
    type             enum ('debit', 'credit')                       not null,
    transaction_type enum ('initial', 'sell', 'transfer', 'refund') not null,
    transaction_id   int                                            null,
    created_at       timestamp                                      null,
    updated_at       timestamp                                      null,
    constraint cash_register_transactions_cash_register_id_foreign
        foreign key (cash_register_id) references cash_registers (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create index cash_register_transactions_transaction_id_index
    on cash_register_transactions (transaction_id);

create index cash_registers_location_id_index
    on cash_registers (location_id);

create table categories
(
    id            int unsigned auto_increment
        primary key,
    name          varchar(191) not null,
    business_id   int unsigned not null,
    short_code    varchar(191) null,
    parent_id     int          not null,
    created_by    int unsigned not null,
    category_type varchar(191) null,
    description   text         null,
    slug          varchar(191) null,
    deleted_at    timestamp    null,
    created_at    timestamp    null,
    updated_at    timestamp    null,
    constraint categories_business_id_foreign
        foreign key (business_id) references business (id)
            on delete cascade,
    constraint categories_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table contacts
(
    id                     int unsigned auto_increment
        primary key,
    business_id            int unsigned                  not null,
    type                   varchar(191)                  not null,
    supplier_business_name varchar(191)                  null,
    name                   varchar(191)                  not null,
    prefix                 varchar(191)                  null,
    first_name             varchar(191)                  null,
    middle_name            varchar(191)                  null,
    last_name              varchar(191)                  null,
    email                  varchar(191)                  null,
    contact_id             varchar(191)                  null,
    contact_status         varchar(191) default 'active' not null,
    tax_number             varchar(191)                  null,
    city                   varchar(191)                  null,
    state                  varchar(191)                  null,
    country                varchar(191)                  null,
    address_line_1         text                          null,
    address_line_2         text                          null,
    zip_code               varchar(191)                  null,
    dob                    date                          null,
    mobile                 varchar(191)                  null,
    landline               varchar(191)                  null,
    alternate_number       varchar(191)                  null,
    pay_term_number        int                           null,
    pay_term_type          enum ('days', 'months')       null,
    credit_limit           decimal(22)                   null,
    created_by             int unsigned                  not null,
    balance                decimal(22)  default 0        not null,
    total_rp               int          default 0        not null comment 'rp is the short form of reward points',
    total_rp_used          int          default 0        not null comment 'rp is the short form of reward points',
    total_rp_expired       int          default 0        not null comment 'rp is the short form of reward points',
    is_default             tinyint(1)   default 0        not null,
    shipping_address       text                          null,
    position               varchar(191)                  null,
    customer_group_id      int                           null,
    custom_field1          varchar(191)                  null,
    custom_field2          varchar(191)                  null,
    custom_field3          varchar(191)                  null,
    custom_field4          varchar(191)                  null,
    deleted_at             timestamp                     null,
    created_at             timestamp                     null,
    updated_at             timestamp                     null,
    constraint contacts_business_id_foreign
        foreign key (business_id) references business (id)
            on delete cascade,
    constraint contacts_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table bookings
(
    id               int unsigned auto_increment
        primary key,
    contact_id       int unsigned                              not null,
    waiter_id        int unsigned                              null,
    table_id         int unsigned                              null,
    correspondent_id int                                       null,
    business_id      int unsigned                              not null,
    location_id      int unsigned                              not null,
    booking_start    datetime                                  not null,
    booking_end      datetime                                  not null,
    created_by       int unsigned                              not null,
    booking_status   enum ('booked', 'completed', 'cancelled') not null,
    booking_note     text                                      null,
    created_at       timestamp                                 null,
    updated_at       timestamp                                 null,
    constraint bookings_business_id_foreign
        foreign key (business_id) references business (id)
            on delete cascade,
    constraint bookings_contact_id_foreign
        foreign key (contact_id) references contacts (id)
            on delete cascade,
    constraint bookings_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create index bookings_location_id_index
    on bookings (location_id);

create index bookings_table_id_index
    on bookings (table_id);

create index bookings_waiter_id_index
    on bookings (waiter_id);

create index contacts_contact_status_index
    on contacts (contact_status);

create index contacts_type_index
    on contacts (type);

create table customer_groups
(
    id          int unsigned auto_increment
        primary key,
    business_id int unsigned not null,
    name        varchar(191) not null,
    amount      double(5, 2) not null,
    created_by  int unsigned not null,
    created_at  timestamp    null,
    updated_at  timestamp    null,
    constraint customer_groups_business_id_foreign
        foreign key (business_id) references business (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table dashboard_configurations
(
    id            int unsigned auto_increment
        primary key,
    business_id   int unsigned not null,
    created_by    int          not null,
    name          varchar(191) not null,
    color         varchar(191) not null,
    configuration text         null,
    created_at    timestamp    null,
    updated_at    timestamp    null,
    constraint dashboard_configurations_business_id_foreign
        foreign key (business_id) references business (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table expense_categories
(
    id          int unsigned auto_increment
        primary key,
    name        varchar(191) not null,
    business_id int unsigned not null,
    code        varchar(191) null,
    deleted_at  timestamp    null,
    created_at  timestamp    null,
    updated_at  timestamp    null,
    constraint expense_categories_business_id_foreign
        foreign key (business_id) references business (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table invoice_layouts
(
    id                       int unsigned auto_increment
        primary key,
    name                     varchar(191)                   not null,
    header_text              text                           null,
    invoice_no_prefix        varchar(191)                   null,
    quotation_no_prefix      varchar(191)                   null,
    invoice_heading          varchar(191)                   null,
    sub_heading_line1        varchar(191)                   null,
    sub_heading_line2        varchar(191)                   null,
    sub_heading_line3        varchar(191)                   null,
    sub_heading_line4        varchar(191)                   null,
    sub_heading_line5        varchar(191)                   null,
    invoice_heading_not_paid varchar(191)                   null,
    invoice_heading_paid     varchar(191)                   null,
    quotation_heading        varchar(191)                   null,
    sub_total_label          varchar(191)                   null,
    discount_label           varchar(191)                   null,
    tax_label                varchar(191)                   null,
    total_label              varchar(191)                   null,
    round_off_label          varchar(191)                   null,
    total_due_label          varchar(191)                   null,
    paid_label               varchar(191)                   null,
    show_client_id           tinyint(1)   default 0         not null,
    client_id_label          varchar(191)                   null,
    client_tax_label         varchar(191)                   null,
    date_label               varchar(191)                   null,
    date_time_format         varchar(191)                   null,
    show_time                tinyint(1)   default 1         not null,
    show_brand               tinyint(1)   default 0         not null,
    show_sku                 tinyint(1)   default 1         not null,
    show_cat_code            tinyint(1)   default 1         not null,
    show_expiry              tinyint(1)   default 0         not null,
    show_lot                 tinyint(1)   default 0         not null,
    show_image               tinyint(1)   default 0         not null,
    show_sale_description    tinyint(1)   default 0         not null,
    sales_person_label       varchar(191)                   null,
    show_sales_person        tinyint(1)   default 0         not null,
    table_product_label      varchar(191)                   null,
    table_qty_label          varchar(191)                   null,
    table_unit_price_label   varchar(191)                   null,
    table_subtotal_label     varchar(191)                   null,
    cat_code_label           varchar(191)                   null,
    logo                     varchar(191)                   null,
    show_logo                tinyint(1)   default 0         not null,
    show_business_name       tinyint(1)   default 0         not null,
    show_location_name       tinyint(1)   default 1         not null,
    show_landmark            tinyint(1)   default 1         not null,
    show_city                tinyint(1)   default 1         not null,
    show_state               tinyint(1)   default 1         not null,
    show_zip_code            tinyint(1)   default 1         not null,
    show_country             tinyint(1)   default 1         not null,
    show_mobile_number       tinyint(1)   default 1         not null,
    show_alternate_number    tinyint(1)   default 0         not null,
    show_email               tinyint(1)   default 0         not null,
    show_tax_1               tinyint(1)   default 1         not null,
    show_tax_2               tinyint(1)   default 0         not null,
    show_barcode             tinyint(1)   default 0         not null,
    show_payments            tinyint(1)   default 0         not null,
    show_customer            tinyint(1)   default 0         not null,
    customer_label           varchar(191)                   null,
    show_reward_point        tinyint(1)   default 0         not null,
    highlight_color          varchar(10)                    null,
    footer_text              text                           null,
    module_info              text                           null,
    common_settings          text                           null,
    is_default               tinyint(1)   default 0         not null,
    business_id              int unsigned                   not null,
    design                   varchar(190) default 'classic' null,
    cn_heading               varchar(191)                   null comment 'cn = credit note',
    cn_no_label              varchar(191)                   null,
    cn_amount_label          varchar(191)                   null,
    table_tax_headings       text                           null,
    show_previous_bal        tinyint(1)   default 0         not null,
    prev_bal_label           varchar(191)                   null,
    change_return_label      varchar(191)                   null,
    product_custom_fields    text                           null,
    contact_custom_fields    text                           null,
    location_custom_fields   text                           null,
    created_at               timestamp                      null,
    updated_at               timestamp                      null,
    constraint invoice_layouts_business_id_foreign
        foreign key (business_id) references business (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table invoice_schemes
(
    id            int unsigned auto_increment
        primary key,
    business_id   int unsigned           not null,
    name          varchar(191)           not null,
    scheme_type   enum ('blank', 'year') not null,
    prefix        varchar(191)           null,
    start_number  int                    null,
    invoice_count int        default 0   not null,
    total_digits  int                    null,
    is_default    tinyint(1) default 0   not null,
    created_at    timestamp              null,
    updated_at    timestamp              null,
    constraint invoice_schemes_business_id_foreign
        foreign key (business_id) references business (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table business_locations
(
    id                       int unsigned auto_increment
        primary key,
    business_id              int unsigned                                  not null,
    location_id              varchar(191)                                  null,
    name                     varchar(256)                                  not null,
    landmark                 text                                          null,
    country                  varchar(100)                                  not null,
    state                    varchar(100)                                  not null,
    city                     varchar(100)                                  not null,
    zip_code                 char(7)                                       not null,
    invoice_scheme_id        int unsigned                                  not null,
    invoice_layout_id        int unsigned                                  not null,
    selling_price_group_id   int                                           null,
    print_receipt_on_invoice tinyint(1)                  default 1         null,
    receipt_printer_type     enum ('browser', 'printer') default 'browser' not null,
    printer_id               int                                           null,
    mobile                   varchar(191)                                  null,
    alternate_number         varchar(191)                                  null,
    email                    varchar(191)                                  null,
    website                  varchar(191)                                  null,
    featured_products        text                                          null,
    is_active                tinyint(1)                  default 1         not null,
    default_payment_accounts text                                          null,
    custom_field1            varchar(191)                                  null,
    custom_field2            varchar(191)                                  null,
    custom_field3            varchar(191)                                  null,
    custom_field4            varchar(191)                                  null,
    deleted_at               timestamp                                     null,
    created_at               timestamp                                     null,
    updated_at               timestamp                                     null,
    constraint business_locations_business_id_foreign
        foreign key (business_id) references business (id)
            on delete cascade,
    constraint business_locations_invoice_layout_id_foreign
        foreign key (invoice_layout_id) references invoice_layouts (id)
            on delete cascade,
    constraint business_locations_invoice_scheme_id_foreign
        foreign key (invoice_scheme_id) references invoice_schemes (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create index business_locations_business_id_index
    on business_locations (business_id);

create table printers
(
    id                 int unsigned auto_increment
        primary key,
    business_id        int unsigned                                                                not null,
    name               varchar(191)                                                                not null,
    connection_type    enum ('network', 'windows', 'linux')                                        not null,
    capability_profile enum ('default', 'simple', 'SP2000', 'TEP-200M', 'P822D') default 'default' not null,
    char_per_line      varchar(191)                                                                null,
    ip_address         varchar(191)                                                                null,
    port               varchar(191)                                                                null,
    path               varchar(191)                                                                null,
    created_by         int unsigned                                                                not null,
    created_at         timestamp                                                                   null,
    updated_at         timestamp                                                                   null,
    constraint printers_business_id_foreign
        foreign key (business_id) references business (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table products
(
    id                    int unsigned auto_increment
        primary key,
    name                  varchar(191)                                                         not null,
    business_id           int unsigned                                                         not null,
    type                  enum ('single', 'variable', 'modifier', 'combo')                     null,
    unit_id               int(11) unsigned                                                     null,
    sub_unit_ids          text                                                                 null,
    brand_id              int unsigned                                                         null,
    category_id           int unsigned                                                         null,
    sub_category_id       int unsigned                                                         null,
    tax                   int unsigned                                                         null,
    tax_type              enum ('inclusive', 'exclusive')                                      not null,
    enable_stock          tinyint(1)                                            default 0      not null,
    alert_quantity        decimal(22, 4)                                                       null,
    sku                   varchar(191)                                                         not null,
    barcode_type          enum ('C39', 'C128', 'EAN13', 'EAN8', 'UPCA', 'UPCE') default 'C128' null,
    expiry_period         decimal(4, 2)                                                        null,
    expiry_period_type    enum ('days', 'months')                                              null,
    enable_sr_no          tinyint(1)                                            default 0      not null,
    weight                varchar(191)                                                         null,
    product_custom_field1 varchar(191)                                                         null,
    product_custom_field2 varchar(191)                                                         null,
    product_custom_field3 varchar(191)                                                         null,
    product_custom_field4 varchar(191)                                                         null,
    image                 varchar(191)                                                         null,
    product_description   text                                                                 null,
    created_by            int unsigned                                                         not null,
    warranty_id           int                                                                  null,
    is_inactive           tinyint(1)                                            default 0      not null,
    not_for_selling       tinyint(1)                                            default 0      not null,
    created_at            timestamp                                                            null,
    updated_at            timestamp                                                            null,
    constraint products_brand_id_foreign
        foreign key (brand_id) references brands (id)
            on delete cascade,
    constraint products_business_id_foreign
        foreign key (business_id) references business (id)
            on delete cascade,
    constraint products_category_id_foreign
        foreign key (category_id) references categories (id)
            on delete cascade,
    constraint products_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint products_sub_category_id_foreign
        foreign key (sub_category_id) references categories (id)
            on delete cascade,
    constraint products_tax_foreign
        foreign key (tax) references tax_rates (id),
    constraint products_unit_id_foreign
        foreign key (unit_id) references units (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create index products_business_id_index
    on products (business_id);

create index products_created_by_index
    on products (created_by);

create index products_name_index
    on products (name);

create index products_unit_id_index
    on products (unit_id);

create index products_warranty_id_index
    on products (warranty_id);

create index users_business_id_foreign
    on users (business_id);

create index users_user_type_index
    on users (user_type);

create table variation_group_prices
(
    id             int unsigned auto_increment
        primary key,
    variation_id   int unsigned   not null,
    price_group_id int unsigned   not null,
    price_inc_tax  decimal(22, 4) not null,
    created_at     timestamp      null,
    updated_at     timestamp      null
)
    collate = utf8mb4_unicode_ci;

create index variation_group_prices_price_group_id_foreign
    on variation_group_prices (price_group_id);

create index variation_group_prices_variation_id_foreign
    on variation_group_prices (variation_id);

create table variation_location_details
(
    id                   int unsigned auto_increment
        primary key,
    product_id           int unsigned                  not null,
    product_variation_id int unsigned                  not null comment 'id from product_variations table',
    variation_id         int unsigned                  not null,
    location_id          int unsigned                  not null,
    qty_available        decimal(22, 4) default 0.0000 not null,
    created_at           timestamp                     null,
    updated_at           timestamp                     null
)
    collate = utf8mb4_unicode_ci;

create index variation_location_details_location_id_foreign
    on variation_location_details (location_id);

create index variation_location_details_product_id_index
    on variation_location_details (product_id);

create index variation_location_details_product_variation_id_index
    on variation_location_details (product_variation_id);

create index variation_location_details_variation_id_index
    on variation_location_details (variation_id);

create table variation_templates
(
    id          int unsigned auto_increment
        primary key,
    name        varchar(191) not null,
    business_id int unsigned not null,
    created_at  timestamp    null,
    updated_at  timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index variation_templates_business_id_foreign
    on variation_templates (business_id);

create table variation_value_templates
(
    id                    int unsigned auto_increment
        primary key,
    name                  varchar(191) not null,
    variation_template_id int unsigned not null,
    created_at            timestamp    null,
    updated_at            timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index variation_value_templates_name_index
    on variation_value_templates (name);

create index variation_value_templates_variation_template_id_index
    on variation_value_templates (variation_template_id);

create table variations
(
    id                     int unsigned auto_increment
        primary key,
    name                   varchar(191)                  not null,
    product_id             int unsigned                  not null,
    sub_sku                varchar(191)                  null,
    product_variation_id   int unsigned                  not null,
    variation_value_id     int                           null,
    default_purchase_price decimal(22, 4)                null,
    dpp_inc_tax            decimal(22, 4) default 0.0000 not null,
    profit_percent         decimal(22, 4) default 0.0000 not null,
    default_sell_price     decimal(22, 4)                null,
    sell_price_inc_tax     decimal(22, 4)                null comment 'Sell price including tax',
    created_at             timestamp                     null,
    updated_at             timestamp                     null,
    deleted_at             timestamp                     null,
    combo_variations       text                          null comment 'Contains the combo variation details'
)
    collate = utf8mb4_unicode_ci;

create index variations_name_index
    on variations (name);

create index variations_product_id_foreign
    on variations (product_id);

create index variations_product_variation_id_foreign
    on variations (product_variation_id);

create index variations_sub_sku_index
    on variations (sub_sku);

create index variations_variation_value_id_index
    on variations (variation_value_id);

create table warranties
(
    id            int unsigned auto_increment
        primary key,
    name          varchar(191)                     not null,
    business_id   int                              not null,
    description   text                             null,
    duration      int                              not null,
    duration_type enum ('days', 'months', 'years') not null,
    created_at    timestamp                        null,
    updated_at    timestamp                        null
)
    collate = utf8mb4_unicode_ci;


