<template>
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title"><b>Wybierz front</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-3" v-for="(front, index) in fronts" :key="front.id">
                <div
                    class="card card-front"
                    :class="{ 'selected-front': selectedFront.id == front.id }"
                    @click="selectFront(front)"
                >
                    <img
                        class="card-img-top"
                        src="/img/common/left_arrow.svg"
                        alt="Card image cap"
                    />
                    <div class="card-body py-2">
                        <div class="row d-flex justify-content-end">
                            <div class="col-12 card-text mb-4">
                                <b>{{ front.name }}</b>
                            </div>
                            <div class="col-6">
                                {{ front.price }}
                            </div>
                            <div class="col-6 align-right">PLN m<sup>2</sup></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="cancelFront">Anuluj</button>
        <button type="button" class="btn btn-primary change-form" data-dismiss="modal" @click="acceptFront">Wybierz</button>
    </div>
    </div>
</div>
</template>

<script>
export default {
    props: {
        fronts: { type: Array }
    },
    data: () => ({
        chosedFront: false,
        selectedFront: false
    }),
    mounted() {
        if (this.fronts.length > 1) {
            this.selectedFront = this.fronts[0];
            this.chosedFront = this.fronts[0];
            this.$emit("modal-select-front", this.selectedFront);
        }
    },
    methods: {
        selectFront(front) {
            this.selectedFront = front;
        },
        acceptFront() {
            this.chosedFront = this.selectedFront;
            this.$emit("modal-select-front", this.chosedFront);
        },
        cancelFront() {
            this.selectedFront = this.chosedFront;
            this.$emit("modal-select-front", this.selectedFront);
        }
    }
};
</script>
