</head>
<body>
    <div class="container">
        <div class="login-box animated fadeInUp" style="max-width:340px">
            <?php if(isset($mess) && !empty($mess)){ ?>
                <div class="row" style="padding:5px;">
                    <p><?php echo $mess;?></p>
                </div>
                <br/>
                <div class="row">
                    <a href="login.php" title="Đăng nhập">Đăng nhập</a>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>