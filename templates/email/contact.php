j-<?= $boundary."\n" ?>
Content-Type: text/plain; charset=utf-8

<?= $first_name ?> <?= $last_name ?> from <?= $email ?> has sent you a message:
<?= $message ?>

--<?= $boundary."\n" ?>
Content-Type: text/html; charset=utf-8

<html>
  <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <title>Contact</title>
  </head>
  <body>
    <table>
      <tr><td><b><?= $first_name ?> <?= $last_name ?></b> from <?= $email ?> has sent you a message:</td></tr>
      <tr><td><?= nl2br(htmlentities($message, ENT_COMPAT | ENT_HTML401, "UTF-8")) ?></td></tr>
    </table>
  </body>
</html>

--<?= $boundary ?>--
