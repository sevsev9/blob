function logout() {
    $.get("../php/killsession.php");
    return false;
}