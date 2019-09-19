<template>
        <div class="col-md-8">
            <div class="card m-3" v-for="item in items">
                <div class="card-header">{{ item.title }}</div>
                <img :src=" item.image " class="card-img-top" alt="...">
                <div class="card-body">
                    <p>{{ item.description }}</p>
                </div>
            </div>

            <infinite-loading @distance="1" @infinite="infiniteHandler"></infinite-loading>
        </div>
</template>

<script>
    import InfiniteLoading from 'vue-infinite-loading';
    export default {
        mounted() {
            this.loadItems();
        },
        data() {
            return {
                items: [],
                page: 1,
            };
        },

        methods: {
            infiniteHandler($state) {
                this.loadItems($state);
            },

            loadItems($state = null){
                let vm = this;
                this.$http.get('/load-item?page='+this.page)
                    .then(response => {
                        return response.json();
                    }).then(data => {
                        $.each(data.data, function(key, value) {
                            // for local images
                            if(value.image.split(':')[1] == null){
                                value.image = 'storage/'+value.image;
                            }
                            vm.items.push(value);
                        });
                        if($state != null){
                            $state.loaded();
                        }
                        
                    });
                this.page = this.page + 1;
            }
        },
    }
</script>