    $(document).ready(function () {
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetical characters"); 

        jQuery.validator.addMethod("validEmail", function(value, element) 
        {
            if(value == '') 
                return true;
            var temp1;
            temp1 = true;
            var ind = value.indexOf('@');
            var str2=value.substr(ind+1);
            var str3=str2.substr(0,str2.indexOf('.'));
            if(str3.lastIndexOf('-')==(str3.length-1)||(str3.indexOf('-')!=str3.lastIndexOf('-')))
                return false;
            var str1=value.substr(0,ind);
            if((str1.lastIndexOf('_')==(str1.length-1))||(str1.lastIndexOf('.')==(str1.length-1))||(str1.lastIndexOf('-')==(str1.length-1)))
                return false;
            str = /(^[a-zA-Z0-9]+[\._-]{0,1})+([a-zA-Z0-9]+[_]{0,1})*@([a-zA-Z0-9]+[-]{0,1})+(\.[a-zA-Z0-9]+)*(\.[a-zA-Z]{2,3})$/;
            temp1 = str.test(value);
            return temp1;
        }, "Please enter valid email.");

         $.validator.addMethod("teamName", 
                           function(value, element) {
                               return /^(?!.*?__)\w+$/gm.test(value);
                           }, 
                           "Enter valid teamname."


      );
         $.validator.addMethod("customEmail", 
                           function(value, element) {
                               return  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(value);
                           }, 
                           "Enter valid emailId."


      );

        
        $('#csForm').validate({
            rules: {
                team: {
                    required: true,
                    teamName: true,
                    minlength: 4,
                },
                name1: {
                    lettersonly: true,
                    required: true,                    
                },
                email1: {
                    required: true,
                    customEmail : true,
                },
                number1:{
                    required: true,
                    number:true,
                    minlength:10,
                    maxlength:10,
                },
                department1:{
                    required: true,
                },
                year1:{
                    required:true,
                },
                college1:{
                    required:true,
                    lettersonly:true,
                },                
                name2: {
                    lettersonly: true,
                    required: true,                    
                },
                email2: {
                    required: true,
                    customEmail: true,
                },
                name3: {
                    required: true,
                    lettersonly: true,
                },
                email3: {
                    required: true,
                    customEmail: true,
                },
                name4:{
                    lettersonly:true,
                },
                email4: {
                    email: true,
                }, 
            },
            errorElement : 'span',
            errorClass: 'errorTxt',
            errorPlacement: function(error, element) {
                if(element.parent('.input').length) {
                    error.insertBefore(element.parent());
                } else {
                    error.insertBefore(element);
                }
            }
        });

});