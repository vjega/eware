common_attributes at the end
----------------------------
1. created_ts
2. created_by_id
3. updated_ts
4. updated_by_id
5. status ->varchar 50
6. status_reason text
6. is_deleted bool

product
=======
    
    id pk autogen
    sku_id varchar 
    client_code #Client Code (Drop down list box, should capture from party master)
    product_code #Product  Code 
    name #Product Name 
    description #Product description
    cat_id fk ref to category->id #Product Category
    uom fk to uom->code (Drop down list box)
    dimenstions #Product Dimensions ( Length, Width, height )
    serial_no #Serial Number
    exp_dt #Expiry date.
    storage_cond text #Storage Form.
    loc_id #Location Area

loc
====
    
    id int auto pk #Location No
    whid int fk ref to wh -> whname #Warehouse Name
    area_id fk ref to area -> areaname #Location area (Drop down list box)
    type fk to ltype->l_id #Location type (Drop down list box)
    loc fk to lsection->lsec_id #Location section (Drop down list box)
    bin_no varchar 100 #Bin Number
    min_vol decimal 10,2 #Minimum Volume
    max_vol decimal 10,2 #Maximum Volume
    loc_cond varchar 100 #Location condition
    loc_indictr varchar 100 #Location Indicator

uom
===

    code #UOM Code 
    desciption #Description

uom_converstion
===============

    
    cli_code #Client Code
    prod_code #Product No
    fr_uom #From UOM
    con_rate #Conversion rate.
    to_uom #To UOM

inv_adj_reason
==============

    code #Reason Code
    rtype #Reason type
    description #Description

wh_transaction
==============
    
    cli_code #Client Code
    adj_dt #Adjustment Date
    adj_no #Adjustment number
    remarks #Remarks
    ref_no #Reference No

stock_control
=============

    cli_code #Client Code
    stock_cntrl_dt #Stock Control Date
    stock_cntrl_no #Stock Control number
    remarks #Remarks
    ref_no #Reference No

inbound #In Bound
=================

    cli_code #Client Code
    grn_dt #Grn Date
    grn_no #Grn No
    po_no #PO No
    inv_no #Invoice No
    trans_mode #Transport Mode
    frwd_code #Forwarder Code
    supplier_code #Supplier Code
    rvno #RV NO
    receipt_vou_no #Receipt Voucher No
    remarks #Remarks
    product_code #Product Code
    exp_dt #Expiry Date
    uom #UOM
    status #Status
    exp_qty #Expected Qty
    del_qty #Delivery Qty
    acc_qty #Accepted Qty
    rej_qty #Rejected Qty
    outstanding_qty #Outstanding Qty
    overallshort #Short (+) or (-)
    addln_Remarks #Remarks

srv #Confirm SRV (site receipt voucher) PUTAWAY

    cli_code Client Code
    rv_no RV NO
    rv_dt Date

out_bound Out Bound
===================

    cli_code #Client Code
    order_no #Order No
    order_dt #Order Date
    issue_no #Issue No
    issue_dt #Issue Date
    customer_po #Customer Po
    consignee_code #Consignee Code
    forwarder_code #Forwarder code
    shipment_type #Shipment type
    movement_type #Movement type
    status #Status
    details #Details
    product_no #Product No
    issue_price #Issue price
    discount_price #Discount price
    location_no #Location No
    product_disc #Product disc
    uom #UOM
    order_qty #Order Qty
    issue_qty #Issue Qty
    tot_issue_price #Total Issue price
    loc_qty Location #Qty

stock_take
==========
    cli_code #Client Code
    cycle_count_dt #Cycle count Date
    ref_no #Reference No
    cycle_count_no #Cycle count No
    status #Status
    remartks #Remarks

users
=====
login_id
passwd
first_name Username
last_name 
wh_id pk -> warehouse->id Warehouse ID
permission varchar(4) 'rw', 'r', '' Permission
email_id Email-id
exp_dt Expiry Date
status ({"Choice" :
    {
        "Account Disabled",
        "Locked Out"
    }
})
