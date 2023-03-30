function select(event) {
    let xd = event.target;
    let xdd = xd.id;
    let y = xdd.slice(0, 1);
    let div = document.getElementById("answer_inpucik_" + xdd);
    let divv = document.getElementById(xdd);
    if (!div.checked) {
        for (let i = 0; i < 4; i++) {
            document
                .getElementById("" + y + i + "")
                .classList.remove("clicked");
        }
        divv.classList.add("clicked");
    } else {
    }
    let psad = document.getElementsByClassName("clicked");
    let button_submit = document.getElementById("submit_button");
    if (psad.length == 10) {
        button_submit.style.display = "initial";
    } else {
        button_submit.style.display = "none";
    }
}

function signUp() {
    let mm = document.getElementsByClassName("fog_register_popup");
    mm[0].classList.add("display_flex");
}

function logIn() {
    let mmm = document.getElementsByClassName("fog_login_popup");
    mmm[0].classList.add("display_flex");
}

function disappear() {
    let mm = document.getElementsByClassName("fog_register_popup");
    let mmm = document.getElementsByClassName("fog_login_popup");
    mm[0].classList.remove("display_flex");
    mmm[0].classList.remove("display_flex");
    mm[0].classList.remove("display_no");
    mmm[0].classList.remove("display_no");
}

function nothing() {}

function backToMain() {
    location.replace("../actions/session_destroyer.php");
}
