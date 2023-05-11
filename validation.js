function validateFname(field)
{
  return (field == "") ? "Enter First Name Please.\n": ""
}

function validateSurname(field)
{
  return (field == "") ? "Enter Last Name Please.\n": ""
}

function validateUsername(field)
{
  if (field == "")
   return "Username is required.\n"
  else if (field.length < 6)
  return "Username must be at least 6 characters.\n "
  else if (/[^a-zA-Z0-9_-]/.test(field))
  return "Username must contain the combination of special characters.\n"
return ""
}


function validatePassword(field)
{
  if (field == "")
   return "Username is required.\n"
  else if (field.length < 6)
  return "Password must be at least 6 characters.\n "
  //else if (/[^a-zA-Z0-9_-]/.test(field))
  else if (!/[a-z]/.test(field) || !/[A-Z]/.test(field) || !/[0-9]/.test(field))
  return "Password must contain the combination of special characters.\n"
return ""
}

