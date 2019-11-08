<template>
    <div :class="likes.userLike ? 'animated heartBeat' : 'animated shake'">
        <a @click.prevent="changeBadge" class="badge text-white badge-success" style="cursor: pointer;">
            <i class="fa fa-heart" :style="likes.userLike ? 'color: red;' : ''"></i> Like {{ likes.likeCount }}</a>
    </div>
</template>

<script>
    export default {
        props: ['user_id', 'post_id'],
        name: "LikePost",

        data(){
            return{
                count: 0,
                animate: 0,
                likes: ''
            }
        },
        mounted() {
            axios.get('/api/getlikes/' + this.user_id + '/' + this.post_id
                ).then(response => {
                    this.likes = response.data

                }).catch(error => {
                    console.log(error.message);
                });

            if(this.likes.userLike){
                this.animate = 1
            }
        },
        methods: {
            changeBadge(){
                if(this.user_id){
                    if(!this.likes.userLike){
                        axios.get('/api/togglelikes/' + this.user_id + '/' + this.post_id
                        ).then(response => {
                            this.likes.likeCount += 1
                            this.likes.userLike = !this.likes.userLike
                        }).catch(error => {
                            console.log(error.message);
                        });

                    } else{
                         axios.get('/api/togglelikes/' + this.user_id + '/' + this.post_id
                        ).then(response => {
                            this.likes.likeCount -= 1
                            this.likes.userLike = !this.likes.userLike
                        }).catch(error => {
                            console.log(error.message);
                        });

                    }
                }

            },
            toggleLike(user_id, post_id){
                    axios.get('/api/togglelikes/' + user_id + '/' + post_id
                ).then(response => {
                }).catch(error => {
                    console.log(error.message);
                });

            }

        }
    }
</script>
