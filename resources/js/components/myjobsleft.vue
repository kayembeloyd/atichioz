<template>
    <div>
        <div class="main-content">
            <div class="left-div">
                <div v-if="related_jobs != []" class="jobs">
                    <ul>
                        <li v-for="related_job in related_jobs" v-bind:key="related_job.id">
                            <div class="job-card">
                                <div class="left-p">
                                    <img src="../images/job-search-svgrepo-com.svg" alt="">
                                </div>
                        
                                <div class="right-p">
                                    <label class="title">{{related_job.title}}</label>
                                    <label class="organization">{{related_job.organization_name}}</label>
                                    <label class="time">{{related_job.posted_at}}</label>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="load-more-wrapper">
                        <button @click="loadMoreJobs"> {{loadMoreStatus}} </button>
                    </div>
                </div>

                <div v-else>
                    Loading Related jobs
                </div>
                <!---->
            </div>
        
            <div class="right-div">
                <div v-if="current_job != null" class="job-card">
                    <div class="left-p">
                        <img src="../images/job-search-svgrepo-com.svg" alt="">
                        <label>{{current_job.posted_at}}</label>
                    </div>
                
                    <div class="right-p">
                        <label class="title">{{current_job.title}}</label>
                        <label class="organization">{{current_job.organization_name}}</label>
                        <p>{{current_job.organization_description}}</p>

                        <p>{{current_job.description_little}}</p>
                        
                        <p>{{current_job.description}}</p>

                        <label class="requirements">Requirements</label>
                        
                        <ul>
                            <li v-for="requirement in current_job.requirements" v-bind:key="requirement.id">
                                {{requirement.description}}
                            </li>
                        </ul>

                        <label class="how-to-apply">How to apply</label>

                        <p>
                            Cras gravida bibendum dolor eu varius. Morbi fermentum velit nisl, eget vehicula lorem
                            sodales eget. Donec quis volutpat orci. Sed ipsum felis, tristique id egestas etconvallis ac velit.
                            In consequat dolor libero, nec luctus orci rutrum nec.
                            Phasellus vel arcu sed nibh ornare accumsan. Vestibulum in elementum erat.
                            Interdum et malesuada fames ac ante ipsum primis in faucibus.
                            Aenean laoreet rhoncus ipsum eget tempus. Praesent convallis fermentum sagittis.
                        </p>

                        <div class="button-group">
                            <button>Apply</button>
                            <button>Shortlist</button>
                            <button>Share</button>
                        </div>
                    </div>
                </div>

                <div v-else>
                    Loading
                </div>
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
            related_jobs: [],
            current_job: null,
    
            mymeta: [],
            mylinks: [],
            isLoading: false,

            loadMoreStatus: 'LOAD MORE', 

            // Other data
            apiPath: this.api_path,
            currentJobId: this.current_job_id,
        }
    },

    created() {
        this.fetchRelatedJobs();
        this.fetchCurrentJob();
    },

    methods: {
        fetchRelatedJobs() {
            console.log('/api/job/related/' + this.currentJobId);

            this.loadMoreStatus = "Fetching Related jobs..."

            fetch('/api/job/related/' + this.currentJobId)
                .then(res => res.json())
                .then(res => {
                    this.related_jobs = res.data;
                    this.mymeta = res.meta;
                    this.mylinks = res.links;

                    this.loadMoreStatus = "Done Fetching jobs... LOAD MORE";
                })
        },

        fetchCurrentJob() {
            console.log('/api/job/' + this.currentJobId);

            fetch('/api/job/' + this.currentJobId)
                .then(res => res.json())
                .then(res => {
                    this.current_job = res.data
                })
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
                                this.related_jobs.push(element)
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
        'current_job_id',
        'job_urls'
    ],
}
</script>

<style scoped>
.main-content {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  padding: 0;
  margin: 0;
}

.main-content .left-div {
  width: 35%;
  margin: 0;
  background-color: #fff;
}

.main-content .left-div .jobs ul {
  margin: 0;
  padding: 0;
}

.main-content .left-div .jobs ul li {
  list-style: none;
  margin-top: 12px;
}

.main-content .left-div .jobs ul li .job-card {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  padding: 0;
  border-top: 1px solid #F8F8F8;
  border-top: 1px solid #F8F8F8;
  margin: 0 8px;
}

.main-content .left-div .jobs ul li .job-card .left-p img {
  width: 38px;
  height: 38px;
  margin: 0 20px;
}

.main-content .left-div .jobs ul li .job-card .right-p label {
  font-weight: lighter;
  display: block;
  margin: 10px 0;
}

.main-content .left-div .jobs ul li .job-card .right-p .time {
  font-size: small;
}

.main-content .right-div {
  width: 65%;
  padding: 10px;
}

.main-content .right-div .job-card {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  background-color: #fff;
  height: 100%;
}

.main-content .right-div .job-card label {
  display: block;
}

.main-content .right-div .job-card .left-p {
  margin: 5px 20px 0 20px;
}

.main-content .right-div .job-card .left-p img {
  width: 40px;
  height: 40px;
}

.main-content .right-div .job-card .left-p label {
  margin-top: 15px;
  font-size: 0.75em;
  font-weight: lighter;
}

.main-content .right-div .job-card .right-p .title {
  margin-top: 16px;
  margin-bottom: 12px;
  font-size: 1.1em;
}

.main-content .right-div .job-card .right-p p {
  padding: 0;
  margin: 12px 12px 8px 0;
  font-size: 0.9em;
}

.main-content .right-div .job-card .right-p ul {
  list-style-type: square;
}

.main-content .right-div .job-card .right-p .button-group button {
  padding: 10px 30px;
  font-size: small;
  font-weight: 300;
  color: #777777;
  outline: none;
  border-radius: 8px;
  border: 1px solid #ECECEC;
  background-color: #fff;
  margin: 20px 20px;
}

 .load-more-wrapper {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: distribute;
      justify-content: space-around;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.load-more-wrapper button {
  margin: 40px;
  color: #BEBEBE;
  padding: 5px 18px;
  font-size: small;
  font-weight: 300;
  outline: none;
  border: none;
  background-color: transparent;
}

@media (max-width: 770px) {
  .main-content {
    -webkit-box-orient: vertical;
    -webkit-box-direction: reverse;
        -ms-flex-direction: column-reverse;
            flex-direction: column-reverse;
  }
  .main-content .left-div {
    width: 100%;
  }
  .main-content .right-div {
    width: 100%;
  }
}

@media (max-width: 360px) {
  .main-content .right-div .job-card .left-p {
    display: none;
  }
}
</style>