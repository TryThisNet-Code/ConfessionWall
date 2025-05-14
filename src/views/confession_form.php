<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <textarea name="confession" id="confession" placeholder="Enter your confession"></textarea>
    <button onclick="sendConfession()">Submit</button>
    <div id="showSuccess">

    </div>
    <div id="confessionList">

    </div>
    <script>
        function sendConfession(){
            const confession = document.querySelector('textarea[name="confession"]').value;
            const feedback = document.getElementById("showSuccess");

            if(confession.length < 20){
                feedback.innerHTML = "Confession must be atleast 20 characters";
                feedback.style.color = "red";
                return;
            }

            fetch("", {
                method: "POST",
                body: {"Content-Type":"application/json"},
                header: JSON.stringify({message : confession})
            })
            .then(res => res.json())
            .then(data => {
                feedback.innerText = data.message;
                feedback.style.color = data.success ? "green" : "red";

                if(data.success){
                    document.getElementById("confessionList").value = "";
                    const newConf = document.createElement("div");
                    newConf.classList.add("confession");
                    newConf.innerHTML = `<p> ${data.entry.message}</p>
                                         <small>Posted at: ${data.entry.date}</small>`;
                    document.getElementById("confessionList").prepend(newConf);
                }
            })
        }
    </script>
</body>
</html>