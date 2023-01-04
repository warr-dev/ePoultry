<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Setting up</title>
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Cabin+Sketch");

html {
	height: 100%;
}

body {
	min-height: 100%;
}

body {
	display: flex;
}

h1 {
	font-family: "Cabin Sketch", cursive;
	font-size: 3em;
	text-align: center;
	opacity: 0.8;
	order: 1;
}

h1 small {
	display: block;
}

.site {
	display: -webkit-box;
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
	-webkit-align-items: center;
	-ms-flex-align: center;
	align-items: center;
	flex-direction: column;
	margin: 0 auto;
	-webkit-box-pack: center;
	-webkit-justify-content: center;
	-ms-flex-pack: center;
	justify-content: center;
}

.sketch {
	position: relative;
	height: 400px;
	min-width: 400px;
	margin: 0;
	overflow: visible;
	order: 2;
}

.bee-sketch {
	height: 100%;
	width: 100%;
	position: absolute;
	top: 0;
	left: 0;
}



@media only screen and (min-width: 780px) {
	.site {
		flex-direction: row;
		padding: 1em 3em 1em 0em;
	}

	h1 {
		text-align: right;
		order: 2;
		padding-bottom: 2em;
		padding-left: 2em;
	}

	.sketch {
		order: 1;
	}
    ul{
        font-size: 1rem;
        text-align: left;
    }
}

    </style>
</head>
<body>
    <div class="site">
        <div class="sketch">
            {{-- <div class="bee-sketch red"></div>
            <div class="bee-sketch blue"></div> --}}
            <img height="100%" src="images/set.png" alt="" srcset="">
        </div>
    
    <h1>Setting Up
        <ul >
            <li>remove power from controller for water</li>
            <li>clear the water tank</li>
            <li>power on the microncontroller</li>
            <li>wait till this page reloads</li>
        </ul>
        <button class="btn btn-danger" onclick="cancel()">cancel</button>
    </h1>
    </div>
    <script>
        setInterval(() => {
            fetch('api/checkmode').then(res=>res.json()).then(json=>{
                console.log(json)
                if(json.mode!=='setup') window.history.back()
            })
        }, 1000);
        
    function cancel(){
        fetch('api/setmode?mode=run').then(res=>res.json()).then(json=>{
            if(json?.status=='success'){}
                window.location.href='{{route('water')}}';
        })
    }

    </script>
</body>
</html>