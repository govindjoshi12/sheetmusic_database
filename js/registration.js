function confirmData()
{
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;
  var passConfirm = document.getElementById('passConfirm').value;

  if(username.length > 3 && username.length < 20 && password === passConfirm)
  {
    document.getElementById("confirm").style.display = "none";
    document.getElementById("submit").style.display = "block";
    return;
  }

  var alert = "";
  if(username.length < 3)
  {
    alert += "Username must be greater than 3 characters...\n";
  }
  else if(username.length > 20)
  {
    alert += "Username cannot exceed 20 characters...\n";
  }
  if(password != passConfirm)
  {
    alert += "Passwords must match...\n";
  }
  if(password.length === 0)
  {
    alert += "Password field cannot be empty...\n";
  }

  window.alert(alert);
}
