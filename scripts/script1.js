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
        alert("XDDDD");
    } else {
    }
}
