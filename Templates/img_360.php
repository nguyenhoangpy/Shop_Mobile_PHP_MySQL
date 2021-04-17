<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div>
        <img id="productImg">
    </div>
    <script>
        let imgPrefix = `https://cdn.tgdd.vn/Products/Images/42/213033/Image360/iphone-12-pro-max-360-org`;
        let i = 0;
        setInterval(() => {
            $("#productImg").attr("src", `${imgPrefix}-${++i}.jpg`);
            if (i == 36) i = 0;
        }, 120);
    </script>
</body>