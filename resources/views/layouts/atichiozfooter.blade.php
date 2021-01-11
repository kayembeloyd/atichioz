<div>
    <footer>
        <div class="rating">
            <label>Rate site</label>
            <ul>
                <li><img src="/images/star.svg" alt=""></li>
                <li><img src="/images/star.svg" alt=""></li>
                <li><img src="/images/star.svg" alt=""></li>
                <li><img src="/images/star.svg" alt=""></li>
                <li><img src="/images/star.svg" alt=""></li>
            </ul>
        </div>

        <div class="say-something">
            <label>Please say something</label>
            <input id="feedback_body" type="text">
        </div>

        <div class="submit">
            <button id="submitBtn" onclick="
                                    event.preventDefault();
                                    console.log('Lloyd is feedbacking');

                                    const dataToSend = JSON.stringify({'feedback_body' : document.getElementById('feedback_body').value});

                                    console.log(dataToSend);

                                    let dataReceived = '';
                                    fetch('/api/feedback', {
                                        credentials: 'same-origin',
                                        mode: 'same-origin',
                                        method: 'post',
                                        headers: {
                                            'Content-Type' : 'application/json'
                                        },
                                        body: dataToSend
                                    })
                                        .then(resp => {
                                            if (resp.status === 200) {
                                                document.getElementById('feedback_body').value = '';
                                                console.log(resp);
                                                return resp.json();
                                            } else {
                                                document.getElementById('feedback_body').value = '';
                                                console.log('Status : ' + resp.status);
                                                return Promise.reject('server');
                                            }
                                        })
                                        .catch(err => {
                                            if (err === 'server') return 
                                            console.log(err)
                                            document.getElementById('feedback_body').value = '';
                                        })
                                    
                                    console.log('Received: ${dataReceived}')
                                    // event.preventDefault();
                                    // myjobs.doSomethingFromOutside(document.getElementById('s-jobtitle').value);
                                    // document.getElementById('search-form').submit();
                                    "> Submit </button>
        </div>

        <div class="by">
            <label>call : +265 882 264 081</label>
        </div>
    </footer>
</div>