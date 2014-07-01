j-<?= $boundary."\n" ?>
Content-Type: text/plain; charset=ISO-8859-1
Content-Transfer-Encoding: base64

<?= $first_name ?> <?= $last_name ?> from <?= $email ?> has sent you a message:
<?= chunk_split($message, 76, "\n") ?>

--<?= $boundary."\n" ?>
Content-Type: text/html; charset=ISO-8859-1
Content-Transfer-Encoding: base64

<html>
  <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <title>Contact</title>
  </head>
  <body>
    <table>
      <tr><td><b><?= $first_name ?> <?= $last_name ?></b> from <?= $email ?> has sent you a message:</td></tr>
      <tr><td><?= chunk_split(nl2br(htmlentities($message)), 76, "\n") ?></td></tr>
    </table>
  </body>
</html>

--<?= $boundary ?>--
