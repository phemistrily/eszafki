<template>
    <div class="col-md-5 col-5" style="padding-left: 0px;" v-if="selected != null">
        <img width="40px" height="40px" src="/img/common/logo.svg" />
        <span style="flex: 1 1 auto;">
            <input type="hidden" name="front" v-bind:value="selected.id" />{{ selected.name  }}
        </span>
    </div>
</template>

<script>
export default {
    props: {
        selected: Object
    },
    data: () => ({
        selectedFront: false
    }),
    mounted() {
        console.log("Component mounted.");
    },
    // watch: {
    //     'selected': function(val) {
    //         console.log("value: ", val);

    //     }
    // },
    methods: {
        greet: function() {
            // `this` inside methods points to the Vue instance
            console.log(this);
            // `event` is the native DOM event
        }
    }
};
</script>
