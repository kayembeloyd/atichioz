<template>
    <div>
        <div class="sub-menu-wrapper">
            <template v-if="current_pg === '.jobs'">
                <nav class="sub-menu">
                    <li><a href="#">Jobs</a></li>
                    <li><a href="/categories">Job Categories</a></li>
                    <li><a href="/organizations">Companies/Organizations</a></li>
                    <li>About Us</li>
                </nav>
            </template>

            <template v-else-if="current_pg === '.categories'">
                <a class="bck" href="/"><img class="back-nav" src="../images/keyboard_arrow_left-24px-white.svg" alt=""></a>
            
                <nav class="sub-menu-s">
                    <li>Categories</li>
                    <!--<li><a href="/jobs">Categories</a> </li>-->
                    <!--<li><img src="../images/keyboard_arrow_right-24px-white.svg" alt=""></li>
                    <li>vkfl</li>-->
                </nav>
            </template>

            <template v-else-if="current_pg === '.organizations'">
                <a class="bck" href="/"><img class="back-nav" src="../images/keyboard_arrow_left-24px-white.svg" alt=""></a>
            
                <nav class="sub-menu-s">
                    <li>Organizations/Companies</li>
                    <!--<li><a href="/jobs">Categories</a> </li>-->
                    <!--<li><img src="../images/keyboard_arrow_right-24px-white.svg" alt=""></li>
                    <li>vkfl</li>-->
                </nav>
            </template>
            <template v-else-if="current_pg === '.jobs_in_category'">
                <a class="bck" href="/categories"><img class="back-nav" src="../images/keyboard_arrow_left-24px-white.svg" alt=""></a>
            
                <nav class="sub-menu-s">
                    <li><a href="/categories">Categories</a> </li>
                    <li><img src="../images/keyboard_arrow_right-24px-white.svg" alt=""></li>
                    <li>{{l1}}</li>
                </nav>
            </template>

            <template v-else-if="current_pg === '.jobs_in_organization'">
                <a class="bck" href="/organizations"><img class="back-nav" src="../images/keyboard_arrow_left-24px-white.svg" alt=""></a>
            
                <nav class="sub-menu-s">
                    <li><a href="/organizations">Organizations/Companies</a> </li>
                    <li><img src="../images/keyboard_arrow_right-24px-white.svg" alt=""></li>
                    <li>{{l1}}</li>
                </nav>
            </template>    
        </div>
    </div>
</template>


<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },

    props: [
        'current_pg',
        'l1',
        'l2',
        'l3'
    ],
}
</script>

<style scoped>    
.sub-menu-wrapper {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  background-color: #5F1CFF;
  padding: 11px;
  padding-left: 40px;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.sub-menu-wrapper .bck {
  height: 16px;
  margin-right: 30px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}

.sub-menu-wrapper .bck .back-nav {
  width: 16px;
  height: 16px;
  -ms-flex-item-align: center;
    -ms-grid-row-align: center;
    align-self: center;
}

.sub-menu-wrapper .sub-menu {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  font-size: small;
  overflow-x: auto;
  -webkit-box-align: start;
      -ms-flex-align: start;
          align-items: flex-start;
}

.sub-menu-wrapper .sub-menu li {
  list-style: none;
  margin-left: 20px;
  color: #fff;
  font-weight: bold;
  white-space: nowrap;
  -ms-flex-item-align: center;
      align-self: center;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}

.sub-menu-wrapper .sub-menu li a {
  text-decoration: none;
  color: #fff;
}

.sub-menu-wrapper .sub-menu li img {
  width: 16px;
  height: 16px;
  margin-left: 10px;
  margin-right: 10px;
  -ms-flex-item-align: center;
      -ms-grid-row-align: center;
      align-self: center;
}




.sub-menu-wrapper .sub-menu-s {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  font-size: small;
  overflow-x: auto;
  -webkit-box-align: start;
      -ms-flex-align: start;
          align-items: flex-start;
}

.sub-menu-wrapper .sub-menu-s li {
  list-style: none;
  color: #fff;
  font-weight: bold;
  white-space: nowrap;
  -ms-flex-item-align: center;
      align-self: center;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}

.sub-menu-wrapper .sub-menu-s li a {
  text-decoration: none;
  color: #fff;
}

.sub-menu-wrapper .sub-menu-s li img {
  width: 16px;
  height: 16px;
  margin-left: 10px;
  margin-right: 10px;
  -ms-flex-item-align: center;
      -ms-grid-row-align: center;
      align-self: center;
}

</style>