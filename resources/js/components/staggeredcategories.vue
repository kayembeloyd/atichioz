<template>
    <div>
        <!--Staggered Categories-->
        <div class="staggered-categories-wrapper">
            <ul>
                <li v-for="category in categories" v-bind:key="category.id">
                    <a :href="'categories/' + category.name" >{{category.name}}</a>
                </li> 
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },

    data() {
        return {
            categories: [], 
        }
    },

    created() {
        this.fetchDefaultCategories();
    },

    methods: {
        fetchDefaultCategories() {
            fetch('api/categories')
                .then(res => res.json())
                .then(res => {
                    this.categories = res.data;
                })
        }, 
    },

    props: ['current_pg'],
}
</script>

<style scoped>
    .staggered-categories-wrapper {
    min-height: 88px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    }

    .staggered-categories-wrapper ul {
    margin: 0;
    padding: 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .staggered-categories-wrapper ul li {
    list-style: none;
    text-align: center;
    font-size: small;
    font-weight: 500;
    color: #777777;
    padding: 5px 20px 5px 20px;
    margin: 5px;
    }
</style>