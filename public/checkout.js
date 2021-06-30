Stripe.setPublishableKey('pk_test_51IJi02JQJSnz96gIqJ84iirqDB7EPk5qsUUax4LLoSTC60UJ8k4MGiTZUqQc3f7jFnceGoA6QWk40wkhulGTt7xy002x20JhoK');

var $form = $('#checkout_form')

$form.submit(function (event)
{
    $('#charge_error').addClass('hidden');
    $form.find('button').prop('disabled', true);
    Stripe.card.createToken({
        number : $('#card_number').val(),
        cvc : $('#card_cvc').val(),
        exp_month : $('#card_month').val(),
        exp_year : $('#card_year').val(),
        name : $('#card_name').val()
    }, stripeResponseHandler);
    return false;
});

function stripeResponseHandler(status, response)
{
    if (response.error)
    {
        $('#charge_error').removeClass('hidden');
        $('#charge_error').addClass('alert alert-danger');
        $('#charge_error').text(response.error.message);
        $form.find('button').prop('disabled', false);
    }
    else
    {
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        $form.get(0).submit();
    }
}
