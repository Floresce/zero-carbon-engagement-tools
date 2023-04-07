<!DOCTYPE html>
<html>

<head>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .cube {
            width: 100px;
            height: 100px;
            position: relative;
            transform-style: preserve-3d;
            animation: rotate 5s linear infinite;
        }

        .cube div {
            position: absolute;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            border: 2px solid white;
        }

        .cube .front {
            transform: translateZ(50px);
            background-color: #FF4136;
        }

        .cube .back {
            transform: translateZ(-50px) rotateY(180deg);
            background-color: #2ECC40;
        }

        .cube .right {
            transform: rotateY(-90deg) translateZ(50px);
            background-color: #0074D9;
        }

        .cube .left {
            transform: rotateY(90deg) translateZ(50px);
            background-color: #FF851B;
        }

        .cube .top {
            transform: rotateX(-90deg) translateZ(50px);
            background-color: #B10DC9;
        }

        .cube .bottom {
            transform: rotateX(90deg) translateZ(50px);
            background-color: #FFDC00;
        }

        @keyframes rotate {
            from {
                transform: rotateX(0) rotateY(0);
            }

            to {
                transform: rotateX(360deg) rotateY(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="cube">
            <div class="front"></div>
            <div class="back"></div>
            <div class="right"></div>
            <div class="left"></div>
            <div class="top"></div>
            <div class="bottom"></div>
        </div>
    </div>
</body>

</html>