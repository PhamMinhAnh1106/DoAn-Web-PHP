<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>VD</title>
<script src="js/jquery.js"></script>
<script>
$(document).ready(function () {
   $.ajax({
       type:'POST',
       url:"xllogin.php",
       dataType:"text",
       data:$(this).serialize()
   }).done(function(data) {
       alert(data);
   })
   .fail(function () {
       
   });
});
</script>
</head>
<body>

<form action="index.php" method="post">
      <input type="hidden" name="mo" value="login">
      <table>
          <tr>
              <td>Email</td>
              <td><input type="email" id="txtEmail" name="txtEmail"></td>
          </tr>
          <tr>
              <td>Password</td>
              <td><input type="password" id="txtPass" name="txtPass" ></td>
          </tr>
          <tr>
              <td colspan="2" align="center">
                  <input type="button" id="btnLogin" name="btnLogin" value="Dang nhap" onclick="login()" >
              </td>
          </tr>
      </table>
      <div id="kqlogin"></div>
  </form>

</body>
</html>
