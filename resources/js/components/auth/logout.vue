<template></template>
 
 
<script>

export default {

     //  log out class already create from user.js
     // call the log out class
     created() {
          User.logout()
          Toast.fire({
               icon: "success",
               type: 'success',
               title: "Log out successfully"
          });

     }




}

</script>
 
