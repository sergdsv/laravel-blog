<template>
    <div>
        <a @click.prevent="count += 1" class="badge text-white badge-success" style="cursor: pointer;">
            <i class="fa fa-heart"></i> Like {{ count }}</a>
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
                count: 0
            }
        }
    }
</script>
