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

        <label for="organization_name">Organization name</label>
        <input id="org_name" name="organization_name" type="text">

        @if ($errors->has('organization_name'))
            <span><strong>{{ $errors->first('organization_name') }}</strong></span>
        @endif

        <label for="organization_description">Organization description</label>
        <input id="org_description" name="organization_description" type="text">

        @if ($errors->has('organization_description'))
            <span><strong>{{ $errors->first('organization_description') }}</strong></span>
        @endif

        <select name="categories" id="organization_categories" multiple>
            <!--Ntchito ina ili apa-->
            @foreach ($categories as $category)
                <option value="{{$category->name}}">{{$category->name}}</option>
            @endforeach
            <!--<option value="Fitness">Fitness</option>
            <option value="Engineering">Engineering</option>
            <option value="Construction">Construction</option>
            <option value="Education">Education</option>-->
        </select>

        <button id="createOrg">Create Organization</button>
    </form>

    <script>
        window.onload = function (){
            document.getElementById("createOrg").onclick = function () {
                event.preventDefault();
                console.log('my name is Lloyd');

                var mySelectList = document.getElementsByTagName('SELECT')[0];
                var chosen = [];

                for (i = 0; i < mySelectList.length; i++){
                    if (mySelectList[i].selected){
                        chosen.push(mySelectList[i].value);
                    }
                }

                console.log(JSON.stringify({"organization_name" : document.getElementById("org_name").value,
                                            "organization_description" : document.getElementById("org_description").value, 
                                            "selected_categories" : chosen}));

                const dataToSend = JSON.stringify({"organization_name" : document.getElementById("org_name").value,
                                            "organization_description" : document.getElementById("org_description").value, 
                                            "selected_categories" : chosen});
                
                let dataReceived = "";
                fetch("/api/organizations", {
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