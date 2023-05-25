import { configuracion } from "../config/methods.js";

let myForm = document.querySelector("#myForm");
let myHeaders = new Headers({ "Content-Type": "application/json" });

myForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    let data = Object.fromEntries(new FormData(e.target));
    let config = configuracion("POST", myHeaders, JSON.stringify(data));
    let res = await (await fetch("api.php", config)).text();
    document.querySelector("pre").innerHTML = res;
})

