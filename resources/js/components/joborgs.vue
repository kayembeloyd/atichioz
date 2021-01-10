<template>
    <div>
        <div class="main-content">
            <div class="organizations">
                <ul>
                    <li v-for="organization in organizations" v-bind:key="organization.id">
                        <div class="organization-card">
                            <h3>
                                <img src="../images/job-search-svgrepo-com.svg" alt="">
                                <a v-bind:href="'organizations/' + organization.name" >{{organization.name}}</a>
                            </h3>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="load-more-wrapper">
                <button @click="loadMoreJobs"> {{loadMoreStatus}}</button>
            </div>
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
            organizations: [],
            mymeta: [],
            mylinks: [],
            pagination: {},
            isLoading: false,

            loadMoreStatus: 'LOAD MORE organizations'
        }
    },

    created() {
        this.fetchDefaultorganizations();
    },

    methods: {
        fetchDefaultorganizations() {
            fetch('api/organizations')
                .then(res => res.json())
                .then(res => {
                    this.organizations = res.data;
                    this.mymeta = res.meta;
                    this.mylinks = res.links;
                })
        }, 

        loadMoreJobs: function () {
            if(!this.isLoading){
                if (this.mymeta.last_page <= this.mymeta.current_page){
                    // Dont execute
                    // console.log("No more jobs");
                    this.loadMoreStatus = "No more organizations"
                } else {
                    // Execute
                    this.loadMoreStatus = "Fetching organizations..."
                    // console.log("Fetching jobs...");

                    fetch(this.mylinks.next)
                        .then(res => res.json())
                        .then(res => {
                            // console.log(res.data);
                            res.data.forEach(element => {
                                this.organizations.push(element)
                            });

                            // this.jobs.push(res.data);
                            this.mymeta = res.meta;
                            this.mylinks = res.links;
                            this.isLoading = false;
                            // console.log("Done Fetching jobs...");
                            this.loadMoreStatus = "Done Fetching organizations... LOAD MORE";
                        })
                }
            }
        }
    }
}
</script>

<style scoped>
.main-content {
  background-color: #FCFCFC;
}

.main-content .organizations ul {
  padding: 0;
  margin: 0;
  display: -ms-grid;
  display: grid;
  -ms-grid-columns: (minmax(300px, 1fr))[auto-fit];
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  -ms-flex-pack: distribute;
      justify-content: space-around;
}

.main-content .organizations ul li {
  list-style: none;
  margin: 10px;
}

.main-content .organizations ul li .organization-card {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  background-color: #fff;
  -webkit-box-shadow: 0 0px 5px rgba(0, 0, 0, 0.1);
          box-shadow: 0 0px 5px rgba(0, 0, 0, 0.1);
  border-radius: 5px;
}

.main-content .organizations ul li .organization-card h3 {
  font-weight: 400;
  font-size: 1.1em;
  margin: 12px 20px;
}

.main-content .organizations ul li .organization-card img {
  width: 24px;
  height: 24px;
  margin: 0 20px;
}

.main-content .load-more-wrapper {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: distribute;
      justify-content: space-around;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.main-content .load-more-wrapper button {
  margin: 40px;
  color: #BEBEBE;
  padding: 5px 18px;
  font-size: small;
  font-weight: 300;
  outline: none;
  border: none;
  background-color: transparent;
}
</style>