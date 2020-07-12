<template>
    
    <div class="col-md-5 col-xs-8 col-5" style= "padding-top: 7px; padding-left: 0px;" v-if="selected != null">
        <input type="hidden" name="nozki" v-bind:value="selected.id" />
        <span><b>{{ selected.height }} cm</b> (regulacja {{ selected.min_height }}-{{ selected.max_height }}) </span>
    </div>
</template>

<script>
export default {
    props: {
        selected: Object
    },
    data: () => ({
        selectedNozki: false
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
