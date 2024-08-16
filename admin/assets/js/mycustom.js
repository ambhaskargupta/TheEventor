    function showhide(Inpid,crntId){
            var n_pass = $(Inpid);
            if(n_pass.attr('type')==='password'){
                $(crntId).removeClass('fa-eye');
                $(crntId).addClass('fa-eye-slash');
                n_pass.attr('type','text');
                }
            else{
                $(crntId).removeClass('fa-eye-slash');
                $(crntId).addClass('fa-eye');
                n_pass.attr('type','password');
            }
    }