


    $('#invoice_details').on('keyup blur', '.quantity', function () {
        let $row = $(this).closest('tr');
        let quantity = $row.find('.quantity').val() || 0;
        let unit_price = $row.find('.unit_price').val() || 0;

        $row.find('.row_sub_total').val((quantity * unit_price).toFixed(2));

        $('#sub_total').val(sum_total('.row_sub_total'));
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());

    });

    $('#invoice_details').on('keyup blur', '.unit_price', function () {
        let $row = $(this).closest('tr');
        let quantity = $row.find('.quantity').val() || 0;
        let unit_price = $row.find('.unit_price').val() || 0;

        $row.find('.row_sub_total').val((quantity * unit_price).toFixed(2));

        $('#sub_total').val(sum_total('.row_sub_total'));
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
    });


    $('#invoice_details').on('keyup blur', '.discount_type', function () {
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
    });

    $('#invoice_details').on('keyup blur', '.discount_value', function () {
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
    });
    $('#invoice_details').on('keyup blur', '.shipping', function () {
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
    });

    let sum_total = function ($selector) {
        let sum = 0;
        $($selector).each(function () {
            let selectorVal = $(this).val() != '' ? $(this).val() : 0;
            sum += parseFloat(selectorVal);
        });
        return sum.toFixed(2);
    }

    let calculate_vat = function () {
        let sub_totalVal = $('.sub_total').val() || 0;
        let discount_type = $('.discount_type').val();
        let discount_value = parseFloat($('.discount_value').val()) || 0;
        let discountVal = discount_value != 0 ? discount_type == 'percentage' ? sub_totalVal * (discount_value / 100) : discount_value : 0;

        let vatVal = (sub_totalVal - discountVal) * 0.05;

        return vatVal.toFixed(2);
    }

    let sum_due_total = function () {
        let sum = 0;
        let sub_totalVal = $('.sub_total').val() || 0;
        let discount_type = $('.discount_type').val();
        let discount_value = parseFloat($('.discount_value').val()) || 0;
        let discountVal = discount_value != 0 ? discount_type == 'percentage' ? sub_totalVal * (discount_value / 100) : discount_value : 0;

        let vatVal = parseFloat($('.vat_value').val()) || 0;
        let shippingVal = parseFloat($('.shipping').val()) || 0;

        sum += sub_totalVal;
        sum -= discountVal;
        sum += vatVal;
        sum += shippingVal;

        return sum.toFixed(2);
    }

    $(document).on('click', '.btn_add', function () {
        let trCount = $('#invoice_details').find('tr.cloning_row:last').length;
        let numberIncr = trCount > 0 ? parseInt($('#invoice_details').find('tr.cloning_row:last').attr('id')) + 1 : 0;

        $('#invoice_details').find('tbody').append($('' +
            '<tr class="cloning_row" id="' + numberIncr + '">' +
            '<td><button type="button" class="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></i></button></td>' +
            '<td><input type="text" name="product_name[' + numberIncr + ']" class="product_name form-control"></td>' +
            '<td><input type="number" name="product_number[' + numberIncr + ']" step="0.01" class="product_number form-control"></td>' +
            '<td><input type="number" name="quantity[' + numberIncr + ']" step="0.01" class="quantity form-control"></td>' +
            '<td><input type="number" name="unit_price[' + numberIncr + ']" step="0.01" class="unit_price form-control"></td>' +
            '<td><input type="number" name="row_sub_total[' + numberIncr + ']" step="0.01" class="row_sub_total form-control" readonly="readonly"></td>' +
            '</tr>'));
    });
    $(document).on('click', '.delegated-btn', function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
        $('#sub_total').val(sum_total('.row_sub_total'));
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
    });



