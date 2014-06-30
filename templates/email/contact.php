--<?= $boundary."\n" ?>
Content-Type: text/plain; charset=ISO-8859-1
Content-Transfer-Encoding: base64

<?= $first_name ?> <?= $last_name ?> from <?= $email ?> has sent you a message:
<?= chunk_split(base64_encode($message, 76, "\n")) ?>

--<?= $boundary."\n" ?>
Content-Type: text/html; charset=ISO-8859-1
Content-Transfer-Encoding: base64

<table>
  <tr><td><b><?= $first_name ?> <?= $last_name ?></b> from <?= $email ?> has sent you a message:</td></tr>
  <tr><td><?= chunk_split(base64_encode(nl2br(htmlentities($message)), 76, "\n")) ?></td></tr>
</table>

--<?= $boundary ?>--
