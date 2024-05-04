<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>RUN SHELL</title>
</head>
<body>

<form method="POST" id="punchForm" action="/work-start">
  <textarea name="STDIN" cols="50" rows="10"></textarea>

  <br>
  <?php
  $filelist = glob("*.sh");

  foreach ($filelist as $file) {
    echo "<button onclick=submitClick() data-action='/".$file."'>".$file."</button><br>";
  }
  ?>
</form>

<script>
function submitClick(){
    let elm       = event.target;
    let actionUrl = elm.getAttribute("data-action");
    document.getElementById("punchForm").action = actionUrl;
}
</script>

</body>
</html>
