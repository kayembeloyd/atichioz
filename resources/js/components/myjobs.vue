<template>
    <div>
        <div class="main-content"> 
            <div class="jobs">
                <ul>
                    <!--Put v-for in the li element-->

                    <li v-for="job in jobs" v-bind:key="job.id">
                        <div class="job-card">
                            <div class="left-p">
                                <img src="../images/job-search-svgrepo-com.svg" alt="">
                                <label>{{job.posted_at}}</label>
                            </div>
        
                            <div class="right-p">
                                <label class="title">
                                    <a v-bind:href="job_urls + job.id">{{ job.title }}</a> 
                                </label>
                                <label class="organization">{{job.organization_name}}</label>
                                <p>{{ job.description_little }}</p>
                            </div>
        
                        </div>
                    </li>
                </ul>
            </div>
        
            <div class="load-more-wrapper">
                <button @click="loadMoreJobs"> {{loadMoreStatus}} </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Jobs Component mounted.');
        document.getElementById('search-action').addEventListener('click', evt => {
            this.doSomethingFromOutside(document.getElementById('s-jobtitle').value);
        });
        console.log('Event listener added');
    },
    data() {
        return {
            jobs: [],
            job: {
                id: '',
                title: '',
                organization_id: '',
            },
            mymeta: [],
            mylinks: [],
            job_id: '',
            pagination: {},
            edit: false,
            isLoading: false,

            loadMoreStatus: 'LOAD MORE', 

            // Other data
            apiPath: this.api_path,
        }
    },

    created() {
        this.fetchJobs();
    },

    methods: {
        fetchJobs() {
            console.log(this.apiPath);

            this.loadMoreStatus = "Fetching jobs..."

            fetch(this.apiPath)
                .then(res => res.json())
                .then(res => {
                    this.jobs = res.data;
                    this.mymeta = res.meta;
                    this.mylinks = res.links;

                    this.loadMoreStatus = "Done Fetching jobs... LOAD MORE";
                })
        },

        doSomethingFromOutside: function (params){
            console.log("Doing something great from outside with params = " + params);
        },

        loadMoreJobs: function () {
            if(!this.isLoading){
                if (this.mymeta.last_page <= this.mymeta.current_page){
                    // Dont execute
                    // console.log("No more jobs");
                    this.loadMoreStatus = "No more jobs"
                } else {
                    // Execute
                    this.loadMoreStatus = "Fetching jobs..."
                    // console.log("Fetching jobs...");

                    fetch(this.mylinks.next)
                        .then(res => res.json())
                        .then(res => {
                            // console.log(res.data);
                            res.data.forEach(element => {
                                this.jobs.push(element)
                            });

                            // this.jobs.push(res.data);
                            this.mymeta = res.meta;
                            this.mylinks = res.links;
                            this.isLoading = false;
                            // console.log("Done Fetching jobs...");
                            this.loadMoreStatus = "Done Fetching jobs... LOAD MORE";
                        })
                }
            }
        }
    },

    props: [
        'api_path',
        'job_urls'
    ],
}
</script>

<style scoped>
 .main-content {
  background-color: #FCFCFC;
}

 .main-content .jobs ul {
  padding: 0;
  margin: 0;
  padding-top: 5px;
  display: -ms-grid;
  display: grid;
  -ms-grid-columns: (minmax(300px, 1fr))[auto-fit];
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  -ms-flex-pack: distribute;
      justify-content: space-around;
  font-weight: lighter;
}

 .main-content .jobs ul li {
  list-style: none;
  margin: 7px;
}

 .main-content .jobs ul li .job-card {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  background-color: #F2F2F2;
}

 .main-content .jobs ul li .job-card label {
  display: block;
}

 .main-content .jobs ul li .job-card .left-p {
  margin: 5px 20px 0 20px;
}

 .main-content .jobs ul li .job-card .left-p img {
  width: 40px;
  height: 40px;
}

 .main-content .jobs ul li .job-card .left-p label {
  margin-top: 15px;
  font-size: 0.75em;
  font-weight: lighter;
}

 .main-content .jobs ul li .job-card .right-p .title {
  margin-top: 16px;
  margin-bottom: 12px;
  font-size: 1.1em;
}

 .main-content .jobs ul li .job-card .right-p p {
  padding: 0;
  margin: 12px 12px 8px 0;
  font-size: 0.9em;
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