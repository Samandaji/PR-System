<?php
  function sanitizeString($var)
 {
   if (get_magic_quotes_gpc())
   $var = stripslashes($var);
   $var = htmlentities($var);
   $var = htmlspecialchars($var);
   return $var;
 }

 function sanitizeMySQL($pdo, $var)
 {
 $var = $pdo->quote($var);
 $var = sanitizeString($var);
 return $var;
 }

 function validateEmail($user_email)
 {
   $user_email = filter_var($user_email, FILTER_SANITIZE_EMAIL);

   if (filter_var($user_email, FILTER_VALIDATE_EMAIL))
   {
     return true;
   }
   else
   {

     return false;

   }
 }

?>