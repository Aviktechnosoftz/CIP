<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
  <script src="js/fullclip.js"></script>
<title>jQuery Full Clip Demo</title>
</head>
<body>
  <section class="container">
    <div class="fullBackground"></div>
    <h2 class="caption">Full Clip</h2>
  </section>
    <script>
    $('.fullBackground').fullClip({
      images: ['image/web.png', 'image/red.png', 'image/blue.png'],
      transitionTime: 2000,
      wait: 5000
    });
    </script>
    <section class="container">
    <div class="fullBackground2"></div>
    <h2 class="caption">Full Clip</h2>
  </section>

    <script>
    $('.fullBackground2').fullClip({
      images: ['image/app.png', 'image/green.png', 'image/blue.png'],
      transitionTime: 2000,
      wait: 5000
    });
    </script>

</body>
</html>
<style>
  body {
  margin: 0;
  padding: 0;
  font-family: 'Montserrat', sans-serif;
}

.fullBackground {
  background-position: center center;
  background-attachment: fixed;
  background-size: cover;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.caption {
  font-size: 30pt;
  text-transform: uppercase;
  color: #fff;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.caption:after {
  content:"\A";
  width:10px;
  height:10px;
  border-radius:50%;
  background: #00bbeb;
  display: inline-block;
  margin: 0 0 -2px;
}


.fullBackground {
  background-position: center center;
  background-attachment: fixed;
  background-size: cover;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>