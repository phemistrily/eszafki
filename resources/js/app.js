/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "product-front",
    require("./components/ProductFront.vue").default
);
Vue.component(
    "selected-front",
    require("./components/SelectedFront.vue").default
);
Vue.component(
    "product-nozki",
    require("./components/ProductNozki.vue").default
);
Vue.component(
    "selected-nozka",
    require("./components/SelectedNozka.vue").default
);
Vue.component(
    "product-summary",
    require("./components/ProductSummary.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    data: () => ({
        selectedFront: null,
        selectedNozki: null,
        quantity: 1
    }),
    // mounted() {
    //     if (this.fronts.length > 1) {
    //         this.selectedFront = this.fronts[0];
    //     }
    // },
    methods: {
        selectFront(front) {
            this.selectedFront = front;
        },
        selectNozki(nozka) {
            this.selectedNozki = nozka;
        },
        substractQuantity() {
            this.quantity--;
            if (this.quantity <= 0) {
                this.quantity = 1;
            }
        },
        additionQuantity() {
            this.quantity++;
            if (this.quantity <= 0) {
                this.quantity = 1;
            }
        },
        setQuantity({ type, target }) {
            this.quantity = target.value;
            if (this.quantity <= 0) {
                this.quantity = 1;
            }

        }
    }
});

$('.no-collapsable').on('click', function (e) {
    e.stopPropagation();
});

function incrementValue(e) {
    e.preventDefault();
    var fieldName = $(e.target).data('field');
    var parent = $(e.target).closest('div');
    var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

    if (!isNaN(currentVal)) {
        parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
    } else {
        parent.find('input[name=' + fieldName + ']').val(0);
    }
}

function decrementValue(e) {
    e.preventDefault();
    var fieldName = $(e.target).data('field');
    var parent = $(e.target).closest('div');
    var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

    if (!isNaN(currentVal) && currentVal > 1) {
        parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
    } else {
        parent.find('input[name=' + fieldName + ']').val(1);
    }
}

function incrementProduct(productRow) {
    var productId = productRow.closest("tr").data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/basket/product/increment/' + productId,
        data: '',
        success: function (data) {
            var productPrice = productRow.closest("tr");
            var productPrices = productPrice.children(":nth-child(5)").children("b").html() * 100;
            var price = $(".brutto-change").first().html() * 100;
            price += productPrices;
            $(".brutto-change").each(function () {
                $(this).html(Math.round(price) / 100);
            });
            productRow.closest("tr").children(".total-brutto").html('<b>' + data.valueBrutto + '</b> PLN');
        }
    });
}
function decrementProduct(productRow) {
    var productId = productRow.closest("tr").data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/basket/product/decrement/' + productId,
        data: '',
        success: function (data) {
            var productPrice = productRow.closest("tr");
            var productPrices = productPrice.children(":nth-child(5)").children("b").html() * 100;
            var price = $(".brutto-change").first().html() * 100;
            price -= productPrices;
            $(".brutto-change").each(function () {
                $(this).html(Math.round(price) / 100);
            });
            productRow.closest("tr").children(".total-brutto").html('<b>' + data.valueBrutto + '</b> PLN');
        }
    });
}

function deleteProduct(productRow) {
    var productId = productRow.closest("tr").data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'DELETE',
        url: '/basket/product/' + productId,
        data: '',
        success: function (data) {
            var productPrice = productRow.closest("tr");
            var productPrices = productPrice.children(":nth-child(7)").children("b").html() * 100;
            var price = $(".brutto-change").first().html() * 100;
            price -= productPrices;
            $(".brutto-change").each(function () {
                $(this).html(Math.round(price) / 100);
            });
            productRow.closest("tr").hide();
        },
        error: function () {
            alert('Nie można usunąć produktu');
        }
    });
}

$('.input-group').on('click', '.button-plus', function (e) {
    incrementProduct($(this));
    incrementValue(e);

});

$('.input-group').on('click', '.button-minus', function (e) {
    decrementProduct($(this));
    decrementValue(e);
});

$('.delete-product').on('click', function (e) {
    deleteProduct($(this));

});

if ($("#product-page").length) {
    $("#product-form").change(function () {
        runProductUpdate();
    });
    $(document).on("click", ".change-form", function () {
        runProductUpdate();
    });
    $(document).ready(function () {
        runProductUpdate();
    });
    $(document).on('submit', '#product-form', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (data) {
                $('#summary-dimensions').html(data['width'] + ' x ' + data['height'] + ' x ' + data['depth']);
                $('#summary-nozki').html(data['nozki'] + ' cm');
                $('#summary-front').html(data['front']);
                $('#summary-akcesoria').html(data['akcesoria']);
                $('#summary-doors').html(data['doors']);
                $('#summary-uwagi').html(data['uwagi']);
                $('#summary-brutto').html($('#brutto-price').html());
                $('#summary-netto').html($('#netto-price').html());
                $('#summary-quantity').html(data['quantity']);
                $('#summary-modal').modal('show');
            },
            error: function () {
                alert('Nie można dodać produktu do koszyka');
            }
        });
    });
}

$(document).on('click', '.send-basket', function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/order/' + $(this).data('id'),
        data: '',
        success: function (data) {
            console.log(data);
            alert('Zamówienie zostało przesłane do systemu');
            location.reload();
        },
        error: function () {
            alert('Nie można wysłać zamówienia');
            location.reload();
        }
    });
})

function runProductUpdate() {
    var form = $('#product-form').serialize();
    var productId = $('#product-form input:hidden[name=product_id]').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: '/product/' + productId + "/price",
        data: form,
        success: function (data) {
            $("#netto-price").html(data['netto'] + '<span style="color: #74777B;">PLN</span>');
            $("#brutto-price").html(data['brutto'] + '<span style="color: #F1BC32;">PLN</span>');
        },
        error: function () {
            alert('Nie można zaktualizować produktu');
        }
    });
}