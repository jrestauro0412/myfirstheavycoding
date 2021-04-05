function navigateregister() {
    window.location.href = "http://localhost/syncmethod/activity04012021/registration.php";
}

function onregister() {
    var registerObj = {
        'data1': firstname.value,
        'data2': lastname.value,
        'data3': address.value,
        'data4': username.value,
        'data5': password.value,
        'data6': confirmpass.value,
        'data7': male.value, 
        'data8': female.value,
        'trigger': true
    }
    validate(registerObj);
}


function validate(registerObj){
    if(registerObj.data5 != registerObj.data6) {
        alert("password mismatch");
        return false;
    }
    else{
        promiseAll(registerObj);
    }
}


async function promiseAll(registerObj){
    await Promise.all([_construct(registerObj)]);
}

async function _construct(registerObj){
    const promise = new Promise(resolve => {
        registerRequest(registerObj, resolve);
    })
    await promise.then(response => {
        console.log(response);
    })
}

function registerRequest(registerObj, resolve){
    $.post(app + helper + "/posthelper.php", registerObj, (response) => {
        resolve(response);
    })
    
}

function malechange() {
    female.value = null;
    male.value = "male";
}

function femalechange() {
    male.value = null;
    female.value = "female";
}

function navigatesignin() {
    window.location.href = "http://localhost/syncmethod/activity04012021/signin.php";
}

$('#onsignin').click(() =>{
    var signinobj = {
        'signin1': signinusername.value,
        'signin2': signinpassword.value,
        'signinonstate' : true
    }
    validatesignin(signinobj)
})

function validatesignin(signinobj) {
    if(!signinobj.signin1 || !signinobj.signin2){
        alert("Empty fields");
        return false;
    }else {
        commitPromise(signinobj);
    }
}

async function commitPromise(signinobj){
    await Promise.all([pushPromise(signinobj)]);
}

async function pushPromise(signinobj){
    const promise = new Promise((resolve)=>{
        signinrequest(signinobj, resolve);
    })
    await promise.then(response => {
        var jsondestroy = JSON.parse(response);
        if(jsondestroy.statusCode == 200){
            alert("Successfully Sign In");
            window.location.href = "http://localhost/syncmethod/activity04012021/welcome.php";
        }
        else if(jsondestroy.statusCode == 201){
            alert("Invalid password");
            return false;
        }else if(jsondestroy.statusCode == 202){
            alert("Username not found");
            return false;
        }
    })
}

function signinrequest(signinobj, resolve){
    $.post(app + helper + '/posthelper.php', signinobj, function(response){
        resolve(response);
    })
}


$('#onlogout').click(() =>{
    var ask = confirm("Are you sure you want to logout?");
    if(ask == true){
        $.post('logout.php', 
        logstate={
            logtrigger: true
        },(response) =>{
            var jsondestroy = JSON.parse(response);
            if(jsondestroy.statusCode == "logout") {
                window.location.href = "http://localhost/syncmethod/activity04012021/signin.php";
                
            }
        })
    }else{
        alert("Cancel");
    }
})

$('#oninsert').click(() =>{
    if(modifier == true) {
        finalupdate();
    }else{
        insertrequest();
    }
})

function finalupdate() {
    $.post(app + helper + "/posthelper.php",
    dataonupdate={
        id: updateId,
        data1: document.getElementById("txtdata1").value,
        finalupdateTrigger: true
    }, function (response){
        var jsondestroy = JSON.parse(response);
        if(jsondestroy.statusCode == 200){
            alert("Update successfull");
            window.location.href = "http://localhost/syncmethod/activity04012021/welcome.php";
        }
    })
}


function insertrequest(){
    $.post(app + helper + "/posthelper.php",
    insertstate={
    data1 : document.getElementById("txtdata1").value,
    insertTrigger: true
    }, function(response) {
    var jsondestroy = JSON.parse(response);
    if(jsondestroy.statusCode == 200){
        alert("Success added");
        window.location.href = "http://localhost/syncmethod/activity04012021/welcome.php";
        }
    } )
}

function ondelete(id) {
    var ask= confirm("are you sure you want to delete this data? ");
    if(ask == true){
        ondeletion(id);
    } else {
        alert("Cancel deletion");
    }
}

async function ondeletion(id) {
    await $.post(app + helper + "/posthelper.php", 
    deleteonstate={
        id: id,
        deletionTrigger: true
    }, (response) =>{
        var jsondestroy = JSON.parse(response);
        if(jsondestroy.statusCode == 200){
            alert("Success delete");
            window.location.href = "http://localhost/syncmethod/activity04012021/welcome.php";
        }
    } )
}

function onedit(id) {
    $.post(app + helper + "/posthelper.php",
    updateselectionstate = {
        id: id,
        upselect: true
    }, function (response){
        var jsondestroy = JSON.parse(response);
        modifier = true;
        updateId = id;
        if(modifier == true){
            document.getElementById("txtdata1").value = jsondestroy.data1;
            resetbtn.style.display = "block";
            insertbtn.innerHTML = "Update";
        }
    })
}

$('#onreset').click(() => {
    modifier = false;
    updateId = 0;
    document.getElementById("txtdata1").value = null;
    resetbtn.style.display = "none";
    insertbtn.innerHTML = "Insert";
})