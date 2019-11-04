<template>
<div class="form-cart">
    <div class="input-group inputflex" v-show="!show">
        <select name="category_id" class="form-control" placeholder="Категория">
            <option selected disabled>Выберите категорию</option>
            <option v-for="(category, index) in cat" :key="index" :value="category.id">
                {{ category.title }}
            </option>
        </select>
            <button v-show="!show" v-on:click.prevent="show = !show" type="submit" class="btn btn-default btn-sm">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
        <div v-show="show">
            <form v-on:submit.prevent="addCategories()"
            :class="{'has-error': ($v.newCategory.$dirty && !$v.newCategory.required) || ($v.newCategory.$dirty && !$v.newCategory.minLentgh)}"
            >
            <div class="form-inline animated fadeIn">
                <div class="input-group inputflex">
                    <input v-model="newCategory" name="newCategory"
                    type="text" class="form-control">
                    <span class="text-danger"
                            v-if="$v.newCategory.$dirty && !$v.newCategory.required"
                            >Введите пароль
                    </span>
                    <span class="text-danger"
                        v-else-if="$v.newCategory.$dirty && !$v.newCategory.minLentgh"
                        >Пароль должен быть не меньше {{$v.newCategory.$params.minLentgh.min}} символов. Сейчас Вы ввели {{newCategory.length}}
                    </span>


                <button class="btn btn-danger btn-sm btnmagin">Добавить категорию</button>
                <button v-show="show" v-on:click.prevent="show = !show" class="btn btn-default btn-sm">
                    <i class="glyphicon glyphicon-minus"></i>
                </button>
                </div>
            </div>
            </form>
        </div>


</div>
</template>

<script>
import {required, minLength} from 'vuelidate/lib/validators'
    export default {
        name: "AddCategory",
        props: ['categories'],
        data(){
            return{
                show: false,
                cat: this.categories,
                newCategory: ''

            }
        },
        validations: {
            newCategory: {required, minLentgh: minLength(2)}
        },
        methods: {
            addCategories(){
                if (this.$v.$invalid){
                    this.$v.$touch()
                    this.card_error = true
                return
            }
                var app = this;
                let formData = new FormData();
                formData.append('newCategory', app.newCategory)
                app.newCategory = ''
                console.log(app.newCategory);
                axios.post('/api/admin/categories', formData
                ).then(function(response) {
                    app.cat = response.data
                    app.show = false
                    // app.$router.push({path: '/'});
                }).catch(error => {
                    console.log(error.message);
                })
            }
        }

    }
</script>

<style scoped>
        .inputflex{
            display: flex;
        }
        .btnmagin{
            margin: 0 5px 0 5px;
        }
</style>

