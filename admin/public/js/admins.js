
function addPasswordField() {
  var div = document.getElementById('password_field');
  div.innerHTML = "<input type='password' name='admins[password]'> <a href='javascript:;' onClick='removePasswordField();'><img src='http://admin.sky-express.rs/public/img/del.gif' title='ukloni'/></a>";
}
function removePasswordField() {
  var div = document.getElementById('password_field');
  div.innerHTML = "<a href='javascript:;' onclick='addPasswordField();'>izmeni lozinku</a>";
}


function p_addPasswordField() {
  var div = document.getElementById('password_field');
  div.innerHTML = "<input type='password' name='aboutus[password]'> <a href='javascript:;' onClick='p_removePasswordField();'><img src='http://admin.sky-express.rs/public/img/del.gif' title='ukloni'/></a>";
}
function p_removePasswordField() {
  var div = document.getElementById('password_field');
  div.innerHTML = "<a href='javascript:;' onclick='p_addPasswordField();'>izmeni lozinku</a>";
}