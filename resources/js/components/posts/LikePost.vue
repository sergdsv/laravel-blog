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
            var app = this;
            axios.get('/api/getlikes/' + app.user_id + '/' + app.post_id
                ).then(function(response) {
                    app.likes = response.data

                }).catch(error => {
                    console.log(error.message);
                });

            if(this.likes.userLike){
                this.animate = 1
            }
        },
        methods: {
            changeBadge(){
                var app = this;
                if(app.user_id){
                    if(!app.likes.userLike){
                        axios.get('/api/togglelikes/' + app.user_id + '/' + app.post_id
                        ).then(function(response) {
                            app.likes.likeCount += 1
                            app.likes.userLike = !app.likes.userLike
                        }).catch(error => {
                            console.log(error.message);
                        });

                    } else{
                         axios.get('/api/togglelikes/' + app.user_id + '/' + app.post_id
                        ).then(function(response) {
                            app.likes.likeCount -= 1
                            app.likes.userLike = !app.likes.userLike
                        }).catch(error => {
                            console.log(error.message);
                        });

                    }
                }

            },
            toggleLike(user_id, post_id){
                    axios.get('/api/togglelikes/' + user_id + '/' + post_id
                ).then(function(response) {
                }).catch(error => {
                    console.log(error.message);
                });

            }

        }
    }
</script>
