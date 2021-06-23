function validator(selector,option) {
    if (!option){
        option = {};
    }
    function getParent(currentElement,selector){
        while(currentElement.parentElement){
            if(currentElement.parentElement.matches(selector)){
                return currentElement.parentElement;
            }
            currentElement = currentElement.parentElement;
        }
    }
    var formRules = {
       // fullname: 'required'
    };
    function confirmation(){
        return document.querySelector('#form-1 #password').value;
    }
    var validatorRule = {
        required: function(value){
            return value ? undefined : `Vui lòng nhập trường này`
        },
        email: function(Value){
            var regex = /\S+@\S+\.\S+/;
            return regex.test(Value) ? undefined : `Vui lòng nhập email`
        },
        min: function(min){
            return function(value){
                return value.length >= min ? undefined : `Vui lòng nhập ít nhất ${min} ký tự`
            }
        },
        match: function(value){
            return value === confirmation() ? undefined : `Mật khẩu nhập không chính xác`
        }
        
    }
    var formElement = document.querySelector(selector);
    if (formElement)
    {
        var inputs = formElement.querySelectorAll('[name][rules]')
        for(var input of inputs){
            
           var rules = input.getAttribute('rules').split('|');
           for(var rule of rules){
              var ruleInf;
              var ruleHasValue = rule.includes(':');
              if(ruleHasValue){
                  ruleInf = rule.split(':');
                  rule = ruleInf[0];
              }
              var ruleFunc = validatorRule[rule];
              if(ruleHasValue){
                  ruleFunc = ruleFunc(ruleInf[1]);
              }

              if(Array.isArray(formRules[input.name])){
                formRules[input.name].push(ruleFunc)

              }else{
                formRules[input.name] = [ruleFunc]
            }
               
           }
           // lắng nghe sự kiện
           input.onblur = handleValidate;
           input.oninput = handleOnInPut;
            
        }
        // validator khi gặp lỗi
        function handleValidate(event){
            var rules = formRules[event.target.name];
            var messageError;
            for(var rule of rules){
                
                messageError = rule(event.target.value)
                if(messageError) break;
            }
            if(messageError){
                var formGroup = getParent(event.target,'.form-group');
                if (formGroup){
                    formGroup.classList.add('invalid');
                    var formMessage = formGroup.querySelector('.form-message');
                    if(messageError){
                        formMessage.innerHTML = messageError;
                    }
                }
            }
            return !messageError
        }

        //clear validate
        function handleOnInPut(event) {
            var formGroup = getParent(event.target,'.form-group');
            if(formGroup.classList.contains('invalid')){
                formGroup.classList.remove('invalid');
                var formMessage = formGroup.querySelector('.form-message');
                if(formMessage){
                    formMessage.innerHTML = '';
                }
            }
        }
        //xử lý khi submit form
        formElement.onsubmit = function(e) {
            e.preventDefault();
            var inputs = formElement.querySelectorAll('[name][rules]')
            var isValid = true;
            // có lỗi thì validator
            for(var input of inputs)
            {  
                if(!handleValidate({target:input})){
                    isValid = false;
                }
            }
            // nếu không có lỗi thì submit form
            if(isValid)
            {
                if( typeof option.onSubmit === 'function'){
                    var enableInput = formElement.querySelectorAll('[name]');
                    var formData = Array.from(enableInput).reduce(function (values, input) {
                        switch (input.type){
                            case 'radio':
                                values[input.name] = formElement.querySelector('input[name="' + input.name + '"]:checked').value;
                                break;
                            case 'checkbox':
                                // trường hợp kick
                                if (!input.matches(':checked')) return values;

                                // //trường hợp k kích j nó trả về chuỗi rỗng
                                // if (!input.matches(':checked')){
                                //     values[input.name]  = '';
                                //     return values;                                  
                                // }
                                if(!Array.isArray(values[input.name])) {
                                    values[input.name]  = [];
                                }
                                values[input.name].push(input.value);
                                break;
                            case 'file':
                                values[input.name] = input.files;
                                break;
                            default:
                                values[input.name] = input.value;
                                break;
                        } 
                        return  values;
                    }, {});
                    // gọi lại hàm onSubmit và trả về form data
                    option.onSubmit(formData);
                }else{
                    formElement.submit();
                }
            }
        }
        
    }
}