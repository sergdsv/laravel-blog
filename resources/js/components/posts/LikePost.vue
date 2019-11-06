<template>
    <div :class="animate ? 'animated heartBeat' : ''">
        <a @click.prevent.once="changeBadge" class="badge text-white badge-success" style="cursor: pointer;">
            <i class="fa fa-heart" :style="animate ? 'color: red;' : ''"></i> Like {{ count }}</a>
    </div>
</template>

<script>
    export default {
        name: "LikePost",
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                count: 0,
                animate: 0
            }
        },
        methods: {
            changeBadge(){
                this.count = 1
                this.animate = 1
            }
        }
    }
</script>
