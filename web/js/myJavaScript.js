const btnActionDisable = (selector)=>{
    $('#'+selector).prop('disabled', true);
}

const btnActionEnable = (selector)=>{
    $('#'+selector).prop('disabled', false);
}

const parseJsonData = (resp, key) =>{
    var json = JSON.parse(resp);
    return json[key];
}

const tAlert = (contant, css)=>{
    M.toast({html:  contant, classes: css});
}

const inputCheck = (selector)=>{
    return $('#'+selector).val()==="";
}

const inputFocus = (selector)=>{
    $('#'+selector).focus();
}

const selectCheck = (selector)=>{
    return $('#'+selector).val()===null;
}

const formReset = (selector)=>{
    $('#'+selector)[0].reset();
}

const alertBox = (selector, msg, className)=>{
    $('#'+selector).removeClass('d-none');
    $('#'+selector).text(msg);
    $('#'+selector).addClass(' '+className);
}

const classRemove = (selector, className)=>{
    $('#'+selector).removeClass(' '+className);
    $('#'+selector).addClass(' d-none');
}