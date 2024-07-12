const form = document.querySelector('form');
form.addEventListener("submit",function(event)
{
    event.preventDefault();
}
);
function login()
{
const id = $("#mailid").val();
const pass = $("#password").val();
$.ajax({
    type:'post',
    url:'../Php/data.php',
    data:{id:id , password :pass},
success : function(data)
{
    window.location.href = '../login.html';
}
});
}