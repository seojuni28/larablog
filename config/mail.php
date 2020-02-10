<?php
return [
  "driver" => "smtp",
  "host" => "smtp.mailtrap.io",
  "port" => 2525,
  "from" => array(
      "address" => "from@example.com",
      "name" => "Example"
  ),
  "username" => "e37e2a1a04cae5",
  "password" => "209a474e0222f1",
  "sendmail" => "/usr/sbin/sendmail -bs"
];