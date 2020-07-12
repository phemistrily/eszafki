<template>
<div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><b>Wybierz nóżki</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
            <table class="table table-nozki">
                <thead>
                    <tr>
                    <th scope="col">Wysokość (mm)</th>
                    <th scope="col">Możliwość regulacji (mm)</th>
                    <th scope="col">Nr artykułu</th>
                    </tr>
                </thead>
                <tbody class="table-nozki-body">
                    <tr v-for="(nozka, index) in nozki" :key="nozka.id"
                    :class="{ 'selected-nozka': selectedNozka.id == nozka.id }"
                    @click="selectNozki(nozka)">
                    <th scope="row">{{ nozka.height }} </th>
                    <td>{{ nozka.min_height }} - {{ nozka.max_height }}</td>
                    <td>{{ nozka.name }}</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="cancelNozki">Anuluj</button>
            <button type="button" class="btn btn-primary change-form"  data-dismiss="modal" @click="acceptNozki">Wybierz</button>
        </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        nozki: { type: Array }
    },
    data: () => ({
        chosedNozka: false,
        selectedNozka: false
    }),
    mounted() {
        if (this.nozki.length > 1) {
            this.selectedNozka = this.nozki[0];
            this.chosedNozka = this.nozki[0];
            this.$emit("modal-select-nozki", this.selectedNozka);
        }
    },
    methods: {
        selectNozki(nozka) {
            this.selectedNozka = nozka;
        },
        acceptNozki() {
            this.chosedNozka = this.selectedNozka;
            this.$emit("modal-select-nozki", this.chosedNozka);
        },
        cancelNozki() {
            this.selectedNozka = this.chosedNozka;
            this.$emit("modal-select-nozki", this.selectedNozka);
        }
    }
};
</script>
