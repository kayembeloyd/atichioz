<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/api/organizations" enctype="multipart/form-data" method="POST">
        {!! csrf_field() !!}

        <!--
        Job title 
        Job Description little
        Job Description

        Job Category -> Select multiple
        Job Organization -> Select 1 

        Job Requirements -> input multiple
            Requirement Description
        -->

        <label for="job_title">Job title</label>
        <input id="j_title" name="job_title" type="text">
        @if ($errors->has('job_title'))
            <span><strong>{{ $errors->first('job_title') }}</strong></span>
        @endif

        <label for="job_description_little">Job description little</label>
        <input id="j_description_little" name="job_description_little" type="text">
        @if ($errors->has('job_description_little'))
            <span><strong>{{ $errors->first('job_description_little') }}</strong></span>
        @endif

        <label for="job_description">Job description</label>
        <input id="j_description" name="job_description" type="text">
        @if ($errors->has('job_description'))
            <span><strong>{{ $errors->first('job_description') }}</strong></span>
        @endif

        <label for="categories">Select Categories</label>
        <select name="categories" id="organization_categories" multiple>
            <!--Ntchito ina ili apa-->
            @foreach ($categories as $category)
                <option value="{{$category->name}}">{{$category->name}}</option>
            @endforeach 
        </select>

        <label for="organization">Select organization</label>
        <select name="organizations" id="organizations">
            <!--Ntchito ina ili apa-->
            @foreach ($organizations as $organization)
                <option value="{{$organization->name}}">{{$organization->name}}</option>
            @endforeach 
        </select>


        <label for="r1">Requirement 1</label>
        <input id="r1" name="r1" type="text">

        <label for="r2">Requirement 2</label>
        <input id="r2" name="r1" type="text">
        
        <label for="r3">Requirement 3</label>
        <input id="r3" name="r1" type="text">
        
        <label for="r4">Requirement 4</label>
        <input id="r4" name="r4" type="text">
        
        <button id="createJob">Create Job</button>
    </form>


    <script>
        window.onload = function (){
            document.getElementById("createJob").onclick = function () {
                event.preventDefault();
                console.log('my name is Lloyd');

                var mySelectList = document.getElementsByTagName('SELECT')[0];
                var chosen = [];

                for (i = 0; i < mySelectList.length; i++){
                    if (mySelectList[i].selected){
                        chosen.push(mySelectList[i].value);
                    }
                }

                var sorg = "";
                var selectedOrg = document.getElementsByTagName('SELECT')[1];
                for (i = 0; i < selectedOrg.length; i++){
                    if (selectedOrg[i].selected){
                        sorg = selectedOrg[i].value;
                    }
                }

                const dataToSend = JSON.stringify({"job_title" : document.getElementById("j_title").value,
                                            "job_description_little" : document.getElementById("j_description_little").value, 
                                            "job_description" : document.getElementById("j_description").value,
                                            "job_organization" : sorg,
                                            "r1": document.getElementById("r1").value,
                                            "r2": document.getElementById("r2").value,
                                            "r3": document.getElementById("r3").value,
                                            "r4": document.getElementById("r4").value,
                                            "selected_categories" : chosen});
                
                let dataReceived = "";
                fetch("/api/jobs", {
                    credentials: "same-origin",
                    mode: "same-origin",
                    method: "post",
                    headers: {
                        "Content-Type" : "application/json"
                    },
                    body: dataToSend
                })
                    .then(resp => {
                        if (resp.status === 200) {
                            console.log(resp);
                            return resp.json();
                        } else {
                            console.log("Status : " + resp.status);
                            return Promise.reject("server");
                        }
                    })
                    .catch(err => {
                        if (err === "server") return 
                        console.log(err)
                    })
                
                console.log('Received: ${dataReceived}')

            }
        }
    </script>
</body>
</html>