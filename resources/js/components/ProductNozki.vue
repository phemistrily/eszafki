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
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
            <button type="button" class="btn btn-primary">Wybierz</button>
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
