<template>
<span>
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
                <span style="font-size: 24px;"><b id="brutto-price">0,00 <span style="color: #F1BC32;">PLN</span></b></span>
            </div>
        </div>
        <div class="form-group row mb-0">
            <label for="" class="col-md-4 col-5 col-form-label" style="padding-top: 2px;"><span>Netto</span></label>
            <div class="col-md-8 col-7" style= "padding-left: 0px;">
                <span><b id="netto-price">0,00 <span style="color: #74777B;">PLN</span></b></span>
            </div>
        </div>
</span>
</template>

<script>
export default {
    data: () => ({
    }),
    mounted() {
        console.log("Component mounted.");
    },
    methods: {

    },
};
</script>
