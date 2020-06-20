<template>
    <div class="gray pl-5 pt-4 pb-0" style="width: calc(100% - 15px);">
        <div class="form-group row">
            <label for="height" class="col-md-4 col-5 col-form-label" style="padding-top: 8px;"><span>Grupa cenowa</span></label>
            <div class="col-md-3 col-5" style= "padding-left: 0px;">
                <select class="form-control" name="price_group">
                    <option value="1">Detal</option>
                    <option value="2">Hurt</option>
                </select>
            </div>
            <div class="col-md-4 col-1" style="padding-top: 7px; padding-left: 0px;"></div>
        </div>
        <div class="form-group row mb-0">
            <label for="" class="col-md-4 col-5 col-form-label" style="padding-top: 8px;"><span>Brutto</span></label>
            <div class="col-md-8 col-7" style= "padding-left: 0px;">
                <span style="font-size: 24px;"><b>840,12 <span style="color: #F1BC32;">PLN</span></b></span>
            </div>
        </div>
        <div class="form-group row mb-0">
            <label for="" class="col-md-4 col-5 col-form-label" style="padding-top: 2px;"><span>Netto</span></label>
            <div class="col-md-8 col-7" style= "padding-left: 0px;">
                <span><b>640,12 <span style="color: #74777B;">PLN</span></b></span>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-4 col-5 col-form-label" style="padding-top: 20px;"><span>Liczba sztuk</span></label>
            <div class="col-md-8 col-7" style= "padding-left: 0px;">
                <div class="input-group">
                    <input type="button" @click="substractQuantity" value="-" class="button-minus" data-field="quantity">
                    <input type="number" step="1" min="1" v-bind:value="quantity" @input="setQuantity" @change="setQuantity" name="quantity" class="quantity-field">
                    <input type="button" @click="additionQuantity" value="+" class="button-plus" data-field="quantity">
                    <button class="btn btn-primary" type="submit" style="margin-top: -5px;">
                        <img src="/img/common/cart.svg" alt="dodaj do koszyka"> Dodaj do koszyka
                    </button>
                </div>       
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        quantity: 1
    }),
    mounted() {
        console.log("Component mounted.");
    },
    methods: {
        substractQuantity() {
            this.quantity--;
            if(this.quantity <= 0) {
                this.quantity = 1;
            }
        },
        additionQuantity() {
            this.quantity ++;
            if(this.quantity <= 0) {
                this.quantity = 1;
            }
        },
        setQuantity({ type, target }) {
            this.quantity = target.value;
            if(this.quantity <= 0) {
                this.quantity = 1;
            }

        }
    },
};
</script>
