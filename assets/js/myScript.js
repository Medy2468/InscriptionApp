function premiere(Obj){
    chaine = Obj.value;
    Obj.value = chaine.substr(0,1).toUppercase()+chaine.substr(1,chaine.length).toLowerCase();
}

var valideNom = 0;
var validePrenom = 0;
var valideTel = 0;


var inputNom = document.getElementById('nom')

inputNom.onblur = function () {
    if (inputNom.value.trim() != '') {
        if (inputNom.value.length < 3 || inputNom.value.length > 25) {
            inputNom.style.border = "2px solid red";
            valideNom = 0;
        } else {
            inputNom.style.border = "1px solid black";
            valideNom = 1;
        }
    }

}

function verifPrenom() {
    prenomInput = document.getElementById('prenom');
    if (prenomInput.value.trim() != '') {
        if (prenomInput.value.length < 4 || prenomInput.value.length > 50) {
            prenomInput.style.border = "2px solid red";
            validePrenom = 0;
        } else {
            prenomInput.style.border = "1px solid black";
            validePrenom = 1;
        }
    }
}


var telInput = document.getElementById('telephone');
telInput.addEventListener('blur', function () {
    if (telInput.value.trim() != '') {
        if (verif_numero(telInput.value.trim()) == 0) {
            telInput.style.border = "2px solid red";
            valideTelephone = 0;
        } else {
            telInput.style.border = "1px solid skyblue";
            valideTelephone = 1;
        }
    }
})

function verif_numero(numero) {
    console.log(numero.length)
    if (numero.length == 9 && !isNaN(numero)) {
        if (numero[0] == '7' && (numero[1] == '0' || numero[1] == '7' || numero[1] == '8' || numero[1] == '6')) {
            return 1;
        }
    }
    return 0;
}
