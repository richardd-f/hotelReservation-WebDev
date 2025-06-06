function isEmail(email) {
            var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return pattern.test(email);
        }

        function isEmpty(text){
            return (text.length>0 ? false : true);
        }